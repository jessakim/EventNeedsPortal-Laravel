<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function show(Post $post){
        return view('blog-post', ['post'=> $post]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(){
        $announcement_data = request()->validate([
            'title'=> 'required|min:8|max:255',
            'post_image'=> 'mimes:png,jpg',
            'body'=> 'required'
        ]);

        if(request('post_image')){
            $announcement_data['post_image'] = request('post_image')->store('uploads');
        }

        auth()->user()->posts()->create($announcement_data);

        Session::flash('messageAdded', 'Announcement was created successfully');

        return redirect()->route('post.index');
    }

    public function index(){
        //$posts = auth()->user()->posts()->paginate(3);
        $posts = Post::all();
        return view('admin.posts.index', ['posts'=>$posts]);
    }

    public function edit(Post $post){
        $this->authorize('view', $post);
        return view('admin.posts.edit', ['posts'=>$post]);
    }

    public function remove(Post $post){
        $this->authorize('delete', $post);

        $post->delete();

        Session::flash('messageDeleted', 'Announcement was deleted successfully');

        return back();
    }

    public function update(Post $post){
        $announcement_data = request()->validate([
            'title'=> 'required|min:8|max:255',
            'post_image'=> 'mimes:png,jpg',
            'body'=> 'required'
        ]);

        if(request('post_image')){
            $announcement_data['post_image'] = request('post_image')->store('uploads');
            $post->post_image = $announcement_data['post_image'];
        }

        $post->title = $announcement_data['title'];
        $post->body = $announcement_data['body'];

        $this->authorize('update', $post);

        $post->update();

        Session::flash('announcementUpdated', 'Announcement was updated successfully');

        return redirect()->route('post.index');
    }
}

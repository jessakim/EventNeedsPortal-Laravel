<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //Generic columns
            $table->id();
            $table->text('avatar')->nullable();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('usertype');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->text('valid')->nullable();
            $table->text('address')->nullable();
            $table->boolean('approved')->default(false);

            //EventStaff
            $table->string('stafftype')->nullable();
            $table->double('fee', '6', '2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

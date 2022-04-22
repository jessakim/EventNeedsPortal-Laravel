// Call the dataTables jQuery plugin
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var budget = parseFloat( data[4] ) || 0; // use data for the age column

        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && budget <= max ) ||
             ( min <= budget   && isNaN( max ) ) ||
             ( min <= budget   && budget <= max ) )
        {
            return true;
        }
        return false;
    }
);

$(document).ready(function() {
    var table = $('#dataTable').DataTable();

    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max',).keyup( function() {
        table.draw();
    } );
} );

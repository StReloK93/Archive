$( "#openform" ).click(function() {
    $('#form1').toggleClass( "d-none" );
});

function celles(warid){
    $.ajax({
        type: 'GET',
        url: '/celles/'+warid,
        success: function(data){
            selectcell.innerHTML = data;
        }
    });
}
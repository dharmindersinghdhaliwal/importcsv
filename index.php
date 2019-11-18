<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="assets/bootstrap-4/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="assets/css/search-filter.css" rel="stylesheet" id="bootstrap-css">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/bootstrap-4/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="wrap">
            <div class="container">
                <div class="row searchFilter" >
                    <div class="col-sm-8" style="margin: 0 auto;" >
                        <p>&nbsp;</p>
                        <h1 class="h1">Search Books</h1>
                        <p>&nbsp;</p>
                        <div id="message"></div>
                        <div class="input-group" >
                            <input id="table_filter" type="text" class="form-control" aria-label="Text input with segmented button dropdown" >

                            <div class="input-group-btn" >
                                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    <span class="label-icon" >Search By</span> <span class="caret" >&nbsp;</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                <ul class="category_filters">
                                    <li >
                                     <input type="radio" name="radios" id="book_name" value="book_name" checked="" >
                                        <label class="category-label" for="book_name" >Book Name</label>
                                    </li>
                                    <li >
                                     <input type="radio" name="radios" id="author_name" value="author_name" >
                                        <label class="category-label" for="author_name" >Author Name</label>
                                    </li>
                                    <li >
                                     <input type="radio" name="radios" id="topic" value="topic" >
                                        <label class="category-label" for="topic" >Topic </label>
                                    </li>
                                </ul>
                                </div>
                                <button id="searchBtn" type="button" class="btn btn-secondary btn-search" >
                                    <span class="glyphicon glyphicon-search" >&nbsp;</span> <span class="label-icon" >Search</span>
                                </button>
                            </div><!--/input-group-btn-->

                        </div><!--/input-group-->

                        <div class='table-responsive'>
                            <p>&nbsp;</p>
                             <p>&nbsp;</p>
                            <table id='myTable' class='table table-striped table-bordered' style="display: none">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Book Name</th>
                                        <th>Author Name</th>
                                        <th>Book Topic</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody> </tbody>
                            </table>
                        </div><!--/table-responsive-->

                    </div><!--/col-->
              </div><!--/searchFilter-->

                <div class="loader"><img src="assets/imgs/loader.gif" /></div>

            </div><!--/container-->
        </div>

    </body>
</html>
<script type="text/javascript">

   $(function() {

        $('#searchBtn').click(function(){

            var searchBy = $('input[name=radios]:checked').val();
            var text     = $('#table_filter').val();

            $.ajax({
                beforeSend: function(){
                   $('.loader').show();
                     $('#myTable').fadeOut();
                },
                url: 'functions.php',
                type: 'POST',
                data: {'searchBy':searchBy,'text':text}
            }).done(function(res) {

                $('#myTable tbody').html('');
                $('.loader').hide();
                if(res.data){
                    jQuery.each( res.data, function( index, val ) {
                        var html    =   '';
                        var index   =   index+1;

                        html +='<tr>';
                        html += '<td>'+index+'</td>';
                        html += '<td>'+val.book+'</td>';
                        html += '<td>'+val.author+'</td>';
                        html += '<td>'+val.topic+'</td>';
                        html += '<td><a href="'+val.download_url+'"><img src="'+val.image_url+'" alt="'+val.book+'" title="'+val.book+'"/></td>';
                        html +='</tr>';

                        $('#myTable').fadeIn();
                        $('#myTable tbody').append(html);

                    });
                }
                $('#message').html(res.message);
                $('#message').fadeIn();
                setTimeout(function(){ 
                    $('#message').fadeOut();
                }, 3000);

            }).fail(function() {
                $('#message').html('<div class="alert alert-danger">Error..!</div>');
                $('#message').fadeIn();
                setTimeout(function(){ 
                    $('#message').fadeOut();
                }, 3000);
            })
            
        });

   });
</script>
<style type="text/css">
    .loader img{margin:auto;left:0;right:0; top:0;bottom:0;position:fixed;width: 100px;display: none}
</style>
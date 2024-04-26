<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MyAfyaCard</title>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        
  <style>
   
  </style>

    </head>

    <body>

  
<div class="container search-table">
            <div class="search-box">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Search All Fields</h5>
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search all fields e.g. HTML">
                        <script>
                            $(document).ready(function () {
                                $("#myInput").on("keyup", function () {
                                    var value = $(this).val().toLowerCase();
                                    $("#myTable tr").filter(function () {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            });
                        </script>
                    </div> 
                </div>
            </div>
            <div class="search-list">
                <h3>303 Records Found</h3>
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    
                    <tr>
                        <td>HTML</td>
                        <td>Web Development</td>
                    </tr>
                    <tr>
                        <td>PHP</td>
                        <td>Web Development</td>
                    </tr>
                    <tr>
                        <td>C#</td>
                        <td>Programming Language</td>
                    </tr>
                    <tr>
                        <td>JavaScript</td>
                        <td>Web Development</td>
                    </tr>
                    <tr>
                        <td>Bootstrap</td>
                        <td>Web Design</td>
                    </tr>
                    <tr>
                        <td>Python</td>
                        <td>Programming Language</td>
                    </tr>
                    <tr>
                        <td>Android</td>
                        <td>App Development</td>
                    </tr>
                    <tr>
                        <td>Angular JS</td>
                        <td>Web Delopment</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
       
    </body>
        <script>


        </script>
    </body>
</html>
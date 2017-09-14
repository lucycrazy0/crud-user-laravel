<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

    <!-- link icon -->
    <link rel="shortcut icon" href="admin_asset/img/icon.ico" type="image/x-icon">
    <base href="{{asset('')}}" target="_parent">
    <!-- Css Bootstrap 4 beta -->
    <link rel="stylesheet" href="admin_asset/css/bootstrap.min.css">

    <!-- Fonts Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body> 
    <div class="wrapper">
        @include('admin.layout.menu')
        @yield('content')
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="admin_asset/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#changePassword').change(function(){
                    if($(this).is(":checked"))
                    {
                        $('.password').removeAttr('disabled');
                    }
                    else
                    {
                        $('.password').attr('disabled','');
                    }
            });
            $('.delete').click(function(){
                var kq = confirm("You want delete user ??");
                if(kq == true)
                {
                    var id = $(this).attr("id");
                    var form_data = {
					    idUser    : id
                    };
                    alert();
                    $.ajax({
                        url:"http://localhost:82/admin",
                        type: 'POST',
                        headers: { _token : '{{ csrf_token() }}' },
                        async : false,
                        data: form_data,
                        dataType: 'text',
                        success: function(data){
                            alert('Delete a successful user');          
                        },
                        error: function(error){
                            alert(error.statusText)	
                        }
                    });
                    return false;	
                }
            });
        });
    </script>
</html>
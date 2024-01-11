<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentBOOK | Register </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body background="https://static.vecteezy.com/system/resources/previews/006/849/480/non_2x/abstract-background-with-soft-gradient-color-and-dynamic-shadow-on-background-background-for-wallpaper-eps-10-free-vector.jpg" style="background-size: cover;">

<style>
    .main {
        height: 100vh;
        box-sizing: border-box;
         
    }

    .register-box {
        width: 600px;
        border: solid 1px;
        padding: 30px;
    }
     
     form div{
         margin-bottom: 14px;
     }

</style>

<body>
    
    <div class ="main d-flex flex-column w-100 justify-content-center align-items-center">
        @if ($errors->any())
            <div class="alert alert-danger" style="width: 600px">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
        <div class="alert alert-success "style ="width: 600px">
            {{ session('message') }}
        </div>
            @endif

        <div class="register-box">
            <form action="" method="post">
                @csrf
                <div>
                    <label for="username"class= "form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control"  
                </div>
                <div>
                    <label for="phone" class="form-label">Phone</label>
                    <input type="phone " name="phone" id="phone" class="form-control" >
                </div>
                <div>
                    <label for="address" class="form-label">Address</label>
                   <textarea name="address" id="address" class="form-control" rows="6" required></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Register</button>
                </div>
                <div class="d-flex justify-content-center">
                    Have Account ?  <a href=" login"> login</a>
                </div>
            </form>
        </div>        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="main">
        <div class="wrapper">
            <form action="login_action" method="POST" class="form_login">
                @csrf
                <h3>Login for acccess</h3>
                <br>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="" name="username" placeholder="Enter username...">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="" name="password" placeholder="Enter password...">
                </div>
            
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <br><br>
                @if ($fail == 'true')
                    {{ 'Wrong username or password !' }}
                @endif
            </form>

        </div>
    </div>
</body>

<style>
    html,
    body {
        height: 100%;
    }

    .main {
        height: 100%;
        width: 100%;
        display: table;
    }

    .wrapper {
        display: table-cell;
        height: 100%;
        vertical-align: middle;
    }

    .form_login {
        margin: auto;
        width: 50%;
        border: 3px solid #73AD21;
        padding: 10px;
    }

</style>

</html>

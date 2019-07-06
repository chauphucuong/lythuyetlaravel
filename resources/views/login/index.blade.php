<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style type="text/css">
    .error {width: 220px;height : 30px;background: #F25252;color:white;
        line-height:30px;text-align:center;
    }
    </style>
</head>
<body>
    @if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach  
    </ul>
    
    @endif
    <form action="" method="POST">
        @csrf
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="user"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass"/></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnLogin" value="Login"/></td>
            </tr>
        </table>
    </form>
</body>
</html>
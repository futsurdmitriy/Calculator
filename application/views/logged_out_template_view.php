<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/navbar.css">
    <title>Calculator</title>
</head>
<body>
    <ul>
        <li><a href="/Home/">Home</a></li>
        <li><a href="/Calculator/">Calculator</a></li>
        <li><a href="/About/">About</a></li>
        <li id="SignInSignUp"><a href="/Login/">SignIn / SignUp</a></li>        
    </ul>
    <?php include 'application/views/'.$content_view; ?>
</body>
</html>
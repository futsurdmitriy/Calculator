<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>Calculator</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>THis is a simple Calculator</h1>
            <nav>
                <ul>
                    <li><a href="/Home/">Home</a></li>
                    <li><a href="/Calculator/">Calculator</a></li>
                    <li><a href="/About/">About</a></li>
                    <li id="SignInSignUp"><a href="/Login/">SignIn / SignUp</a></li>        
                </ul>
            </nav>
        </header>    
        <?php include 'application/views/'.$content_view; ?>        
    </div>
</body>
</html>
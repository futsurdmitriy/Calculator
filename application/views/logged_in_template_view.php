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
            <h1>This is simple Calculator</h1>
            <nav>
                <ul>
                    <li><a href="/Home/">Home</a></li>
                    <li><a href="/Calculator/">Calculator</a></li>
                    <li><a href="/About/">About</a></li>
                    <li id="logout1">
                        <form  method='post'>
                            <input id="logout" type="submit" name="logout" value="Logout"/>
                        </form>
                    </li>
                    <li id="login">
                            <?php echo "Hello: " . $session->get('UserName','Users');?>
                    </li>
                </ul>
            </nav>
        </header>
        <?php include 'application/views/'.$content_view; ?>
        <footer>© 2018</footer>
    </div>
</body>
</html>
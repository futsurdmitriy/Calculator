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
        <li id="logout1">
            <form action="" method='post'>
                <input id="logout" type="submit" name="logout" value="Logout"/>
            </form>
        </li>
        <li id="login">
                <?php echo "Hello: " . $session->get('userLogged');?>
        </li>
               
    </ul>
    <?php include 'application/views/'.$content_view; ?>
</body>
</html>
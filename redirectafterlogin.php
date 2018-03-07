<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Calculator is my precious</title>
</head>
<body>
<header>
    <div align ="right">
        <form action="http://127.0.0.1/info.php">
            <input type="submit" name="submit" value="Logout" />
        </form>
    </div>
</header>
<?php

include'calculator.php';
$calculator = new Calculator;

echo '<div align="center">'.
'<h2 style = "color:blue">Calculator</h2>';

$calculator->formPacking($_POST,'post');
echo '<hr />';
$calculator->formPacking($_GET,'get');
echo '<p>'.'Result:' ;


 if(!isset($_POST['submit']))
 {
    if (!empty($_GET)) 
    {
        echo $calculator->calculate( $_GET );
        echo $calculator->writeToLogFile($_GET);
    }
    else if (!empty($_POST)) 
    {
        echo $calculator->calculate( $_POST );
        echo $calculator->writeToLogFile($_POST);
    }
}
else {
    $_SESSION['isLoginned'] = false;
}       
    echo '</p></div>';
?> 

</body>
</html>
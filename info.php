<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Calculator is my precious</title>
</head>
<body>

<?php 
include'userLoginData.php';
include'messages.php';
$userData = new UserLoginData;
$message = new Messages;
?> 

<div align="center">
    <h2 style = "color:blue">Calculator</h2>
    <form method="post">
        <input type="text" name="login" placeholder = "Login"/><br/>
        <input type="password" name="password"/placeholder = "Password"><br/>
        <input type="submit" name="submit"/><br/>
    </form>
</div> 


<?php
$message->showMessage();

if (!empty($_POST)) 
{
    $data = $userData->userDataCheck($_POST);  
    if($data)
    {
        header('Location: http://127.0.0.1/redirectafterlogin.php'); 
    } 
    else 
    {
        
        $message->showMessage('Error','Please relogin to continue');
        $message->showMessage('Error','Wrong login or password');


        $message->deleteMessage('Error','Wrong login or password');
        $message->deleteMessage('Error','Please relogin to continue');
        //echo $userData->messageShow("Wrong login or password");
    }
}
?>
</body>
</html>


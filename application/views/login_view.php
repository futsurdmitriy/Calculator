
    <form id="login-form" method="post" action="/">
        <input type="text" name="login" placeholder = "Login"/><br/>
        <input type="password" name="password"/placeholder = "Password"><br/>
        <input type="submit" name="submit" value="Enter"/><br/>
    </form>

    <?php
        $message = new Messages;
        $message->showMessage();
    ?>

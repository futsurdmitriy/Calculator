<div>
    <form action="/" method="post" >
        <input type="text" name="login" placeholder = "Login"/><br/>
        <input type="password" name="password"/placeholder = "Password"><br/>
        <input type="submit" name="submit" value="Enter"/><br/>
    </form>
</div>
    <?php
        $message = new Messages;
        $message->showMessage();
    ?>

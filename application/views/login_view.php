<section class="login">
    <div>
        <form action="/Login/" method="post" >
            <input type="text" name="login" placeholder = "Login"/><br/>
            <input type="password" name="password"/placeholder = "Password"><br/>
            <input type="submit" name="submit" value="Enter"/><br/>
        </form>
    </div>
        <?php
            Messages::showMessage();
        ?>
</section>

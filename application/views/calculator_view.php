<header>
    <div align ="right">
        <h3>Hello: <?php echo $data['UserName']; ?> 
        <form action="/" method="post">
            <input type="submit" name="logout" value="Logout"/>
        </form>
    </div>
</header>   
   
   <form action="/Calculator" method="post">
        <input type="text" name = "number1" />
        <br/>
        <button name="Add">+</button>
        <button name="Subtract">-</button>
        <button name="Multiply">*</button>
        <button name="Divide">/</button>
        <br/>
        <input type="text" name ="number2" />
    </form>

    <h1> Result: <?php echo $data['result']; ?> </h1>
    <?php
        $message = new Messages;
        $message->showMessage();
        
        
    ?>


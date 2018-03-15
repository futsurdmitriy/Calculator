
<div>
    <form action="/Calculator/" method="post">
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
</div>

<?php
    $message = new Messages;
    $message->showMessage();    
?>


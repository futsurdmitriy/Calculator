
<div class="calculator_content">
    <div id="calculator">
        <form action="/Calculator/" method="post">
            <input type="text" name = "number1" placeholder="Number1" />
            <br/>
            <button name="Add">+</button>
            <button name="Subtract">-</button>
            <button name="Multiply">*</button>
            <button name="Divide">/</button>
            <br/>
            <input type="text" name ="number2" placeholder="Number2"/>
        </form>
        <h3> Result: <?php echo $data['result'] . $message->showMessage();; ?> </h3>
    </div>   
</div>



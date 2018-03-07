<?php
  $arr = [
      'page.html' => 'Link 1',
      'about.html' => 'About',
      'login' => 'Login',
      '/' => 'Home',
  ];
 $keys = array_keys($arr);
foreach ($arr as $key => $value) {
    echo '<a href="' . $key . '">' . $value . '</a><br/>' . PHP_EOL;
}
echo '<br/>';
for ($i=0;$i<count($arr);$i++)
{
    echo '<a href="' . $keys[$i] . '">' . $arr[$keys[$i]] . '</a><br/>' . PHP_EOL;
}
echo '<br/>';
$i=0;
while ($i<count($arr))
{
    echo '<a href="' . $keys[$i] . '">' . $arr[$keys[$i]] . '</a><br/>' . PHP_EOL;
    $i++;
}

?>

<?php
 function formValueSet($data,$txtNumber)
 {

    return (isset($data[$txtNumber]))?$data[$txtNumber]:'';
 }

function formPacking ($data,$txtMethod)
{
    echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="' . $txtMethod . '">' .
        '<input type="text" name = "number1" value = "' . formValueSet($data,'number1') . '" />' .
        '<br/>' .
        '<button name="Add">+</button>'.
        '<button name="Subtract">-</button>' .
        '<button name="Multiply">*</button>' .
        '<button name="Divide">/</button>' .
        '<br/>' .
        '<input type="text" name ="number2" value = "' . formValueSet($data,'number2') . '" />' .
        '<input type="hidden" name="form" value="1" />' .
    '</form>';

}

 echo '<h2 style = "color:blue">Calculator</h2>';
 formPacking($_POST,'post');
 echo '<hr />';
 formPacking($_GET,'get');
 echo '<p>';



function output_message ($txt)
{
    echo "<span style=\"background:red\">" . $txt . "</span>";
}
function CorrectDataCheck($dataToCheck){
    if(empty($dataToCheck)&&(!isset($dataToCheck['number1']) || !isset($dataToCheck['number2'])))
    {
        return false;
    }
    else if (!empty($dataToCheck) && ((isset($dataToCheck['number1']) || isset($dataToCheck['number2']))&&($dataToCheck['number1']==NULL)||($dataToCheck['number2']==NULL)) )
    {
        output_message ('Please Enter The Numbers to Calculate');
        return false;

    }

    $dataToCheck = str_replace(",", ".", $dataToCheck);

    if (!is_numeric($dataToCheck['number1']) || !is_numeric($dataToCheck['number2']))
    {
        output_message ('Please Enter The Correct Data to Calculate');
        return false;
    }
    return $dataToCheck;
}

function calculate ($data) {
    $data = CorrectDataCheck($data);

    if(false !== $data )
    {
        $result1 = $data['number1'];
        $result2 = $data['number2'];

        if(isset($data['Add']))
        {
            return $result1 + $result2;
        }
        else if(isset($data['Subtract']))
        {
            return $result1 - $result2;
        }
        else if(isset($data['Multiply']))
        {
            return $result1 * $result2;
        }
        else if(isset($data['Divide']))
        {
            if ($result2 == 0)
            {
                return "Error: divide by zero.";
            }
            else
            {
                return $result1 / $result2;
            }
        }
    }

}
echo '<strong>Result</strong>:';
if (!empty($_GET)) {
 echo calculate ( $_GET );
}
else if (!empty($_POST)) {
 echo calculate ( $_POST );
}

/*
    <form action=" <?php// echo $_SERVER['PHP_SELF']; ?>" method="get">
    <input type="text" name = "number1"  value = "<?php// echo (isset($_GET['number1']))?$_GET['number1']:'';?>" />
    <br/>
    <button name="Add">+</button>
    <button name="Subtract">-</button>
    <button name="Multiply">*</button>
    <button name="Divide">/</button>
    <br/>
    <input type="text" name ="number2" value = "<?php// echo (isset($_GET['number2']))?$_GET['number2']:'';?>" />
    <input type="hidden" name="form" value="2" />
</form>
*/
    echo '</p>';
?>
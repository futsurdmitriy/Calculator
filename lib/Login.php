<?php
class Login
{
    public $usersData = array(
        "JohnDoe"     => "1234",
        "CarlJohnson" => "1997",
        "Jabba"       => "Hatt1981",
        );


protected $servername = "localhost";
protected $username = "root";
protected $password = "1Qazqwer97";
protected $dbname = "mydb";

public function sqlsmth($userDataToCheck)
{
    $session = Session::getInstance();
    $message = new Messages;

    // Create connection
    $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT  UserName, Password FROM users";
    $result = $conn->query($sql);

    if (
        empty($userDataToCheck) &&
        (
            !isset($userDataToCheck['login']) ||
            !isset($userDataToCheck['password'])
        )
    ) {
        //do nothing
    } elseif (
        !empty($userDataToCheck) &&
        (
            isset($userDataToCheck['login']) ||
            isset($userDataToCheck['password'])
        )
    ) {
        if ($result->num_rows > 0) {
            // output data of each row
            foreach ($result as $value ) {
                if (
                    $userDataToCheck['login']==$value['UserName'] &&
                    $userDataToCheck['password']==$value['Password']
                ) {
                    $session->set('userLogged',$value['UserName']);
                    header('Location: /Calculator/');
                }
            }
        $message->setMessage('Error','Wrong login or password'); 
            }
        }
        $conn->close();
    } 
    

     public function userDataCheck($userDataToCheck)
    {
        $session = Session::getInstance();
        $message = new Messages;

        if (
            empty($userDataToCheck) &&
            (
                !isset($userDataToCheck['login']) ||
                !isset($userDataToCheck['password'])
            )
        ) {
            //do nothing
        } elseif (
            !empty($userDataToCheck) &&
            (
                isset($userDataToCheck['login']) ||
                isset($userDataToCheck['password'])
            )
        ) {
            foreach ($this->usersData as $key => $value) {
                    if (
                        $userDataToCheck['login']==$key &&
                        $userDataToCheck['password']==$value
                    ) {
                        $session->set('userLogged',$key);
                        header('Location: /Calculator/');
                    }
                }
            $message->setMessage('Error','Wrong login or password');
        }
    }
}

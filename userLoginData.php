<?php
session_start();
$_SESSION['isLoginned'] = false;

class UserLoginData {

    public $usersData = array (
            "JohnDoe" =>"1234",
            "CarlJohnson" =>"1997",
            "Jabba" =>"Hatt1981",
    );

    public $successfullyLogined = false;

    public function messageShow($txt){
        echo '<div align="center">'.$txt.'</div>';
    }

    public function userDataCheck($userDataToCheck){
        if(empty($userDataToCheck)&&(!isset($userDataToCheck['login']) || !isset($userDataToCheck['password'])))
        {
            return false;
        }
       
        else if (!empty($userDataToCheck) && (isset($userDataToCheck['login']) || isset($userDataToCheck['password'])) )
        {
            foreach ($this->usersData as $key => $value)
                {
                    if(($userDataToCheck['login']==$key) && ($userDataToCheck['password']==$value))
                    {
                        $successfullyLogined = true;
                        $_SESSION['isLoginned'] = true;
                        return $successfullyLogined;
                    }
                }
              return $this->successfullyLogined;
        }
   }
}
?>
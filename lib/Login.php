<?php
class Login
{

public function sqlsmth($userDataToCheck)
{
    $session = Session::getInstance();
    $SQLQuery = new SQLQueries;

    $result = $SQLQuery->SelectFrom('Id, UserName, Password', 'users');

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
        if (null!=$result) {
            // output data of each row
            foreach ($result as $value ) {
                if (
                    $userDataToCheck['login']==$value['UserName'] &&
                    $userDataToCheck['password']==$value['Password']
                ) {
                    $session->set('Id', $value['Id'], 'Users');
                    $session->set('UserName', $value['UserName'], 'Users');
                    $session->set('UserLogged', true, 'Users');
                    
                    header('Location: /Calculator/');
                }
            }
            Messages::setMessage('Error','Wrong login or password');
            }
        }
    }
}

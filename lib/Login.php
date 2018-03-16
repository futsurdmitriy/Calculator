<?php
class Login
{
    /*$users = [
        [
            'id'       => 1,
            'username' => 'JohnDoe',
            'password' => '1234'
        ],
        [
            'id'       => 2,
            'username' => 'CarlJohnson',
            'password' => '1997'
        ]
    ];*/

    public $usersData = array(
        "JohnDoe"     => "1234",
        "CarlJohnson" => "1997",
        "Jabba"       => "Hatt1981",
        );

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

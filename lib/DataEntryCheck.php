<?php
class DataEntryCheck
{
    public function correctDataCheck($dataToCheck)
    {
        $session = Session::getInstance();
        $message = new Messages;

            if (empty($dataToCheck)&&(!isset($dataToCheck['number1']) || !isset($dataToCheck['number2']))) {
                return false;
            } elseif (
                !empty($dataToCheck) &&
                (
                    (
                        isset($dataToCheck['number1']) ||
                        isset($dataToCheck['number2'])
                    ) && (
                        NULL==($dataToCheck['number1'])
                    ) || (
                        NULL==($dataToCheck['number2'])
                    )
                )
            ) {
                $message->setMessage('Error','Please Enter The Numbers to Calculate');

                return false;
            }

            $dataToCheck = str_replace(",", ".", $dataToCheck);

            if (!is_numeric($dataToCheck['number1']) || !is_numeric($dataToCheck['number2'])) {
                $message->setMessage('Error','Please Enter The Correct Data to Calculate');

                return false;
            }

            return $dataToCheck;

    }
}

<?php
session_start();

class session
{
    private $user_is_logged_in = false;
    public $msg;
    public $user;


    public function getCurrentUser(){
        return $this->user;
    }
    function __construct()
    {
        $this->flash_message();
        $this->loginSetup();
    }

    public function isUserLoggedIn()
    {
        return $this->user_is_logged_in;
    }

    public function login($user_id)
    {
        $_SESSION['user_id'] = $user_id;
        $this->user = $user_id;
    }



    private function loginSetup()
    {
        if (isset($_SESSION['user_id'])) {
            $this->user_is_logged_in = true;
        } else {
            $this->user_is_logged_in = false;
        }

    }

    public function logout()
    {
        unset($_SESSION['user_id']);
    }

    public function message($type = '', $msg = '')
    {
        if (!empty($msg)) {
            if (strlen(trim($type)) == 1) {
                $type = str_replace(array('d', 'i', 'w', 's'), array('danger', 'info', 'warning', 'success'), $type);
            }
            $_SESSION['msg'][$type] = $msg;
        } else {
            return $this->msg;
        }
    }

    private function flash_message()
    {

        if (isset($_SESSION['msg'])) {
            $this->msg = $_SESSION['msg'];
            unset($_SESSION['msg']);
        } else {
            $this->msg;
        }
    }
}

$session = new session();
$msg = $session->message();

?>

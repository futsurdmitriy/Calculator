<?php

class Session
{    
    private static $_instance = null;

    private function __construct()
    {
        //session_destroy();
        //session_unset();
        session_start();
    }
    
    static public function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function set($key, $value, $namespace)
    {
        $_SESSION[$namespace][$key] = $value; 
    }

    public function _delete($key, $namespace, $default = '')
    {
        if (isset($_SESSION[$namespace]) && isset($_SESSION[$namespace][$key])) {
            unset($_SESSION[$namespace][$key]);
        } 

        return $default;
    }

    public function get($key, $namespace, $default = '')
    {
        if (isset($_SESSION[$namespace]) && isset($_SESSION[$namespace][$key])) {
            return $_SESSION[$namespace][$key];
        }
        
        return $default;
    }
}




<?php

class User
{
    private $_DB;

    public function __construct()
    {
        $this->_DB = Database::getInstance();
    }

    public function registerAdmin($fields = array())
    {
        if ($this->_DB->insert('users', $fields)) {
            return true;
        } else {
            return false;
        }
    }
}

<?php

/**
 * Created by PhpStorm.
 * User: Renjun
 * Date: 2016/4/14
 * Time: 8:56
 */
class User
{
    protected $username;
    protected $password;

    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getUsername(){
        return $this->username;
    }
    public  function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
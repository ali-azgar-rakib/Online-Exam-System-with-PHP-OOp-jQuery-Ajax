<?php

class Admin
{

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAdminData($data)
    {
        $email = $this->fm->validation($data['email']);
        $password = $this->fm->validation($data['password']);
        $email = $this->db->link->real_escape_string($email);
        $password = $this->db->link->real_escape_string($password);
        $error = [];
        if (empty($email)) {
            $error['email'] = "field should not be empty";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Email address not valid";
        }
        if (empty($password)) {
            $error['password'] = "Field shoud not be empty";
        }

        if (empty($error)) {
            $password = md5($password);
            $query = "SELECT * FROM admins WHERE email='$email' AND password ='$password'";
            $result = $this->db->select($query);
            if ($result) {
                $loginData = $result->fetch_assoc();
                Session::init();
                Session::set('adminLogin', true);
                Session::set('adminName', $loginData['name']);
                Session::set('adminEmail', $loginData['email']);
                header('location: index.php');
            } else {
                $error['notMatch'] = "Email or Password not match";
                return $error;
            }
        } else {
            return $error;
        }
    }
}
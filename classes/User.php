<?php

class User
{

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    // for gettting all user 
    public function getUserData()
    {
        $query = "SELECT * FROM users ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    // for disable a user 
    public function userDisabled($diaid)
    {
        $query = "UPDATE users SET status=0 WHERE id=$diaid";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>User successfully disabled</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>User not disabled</span>";
            return $msg;
        }
    }


    // for enable a user 
    public function userEnable($enaid)
    {
        $query = "UPDATE users SET status=1 WHERE id=$enaid";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>User successfully Enabled</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>User not Enabled</span>";
            return $msg;
        }
    }

    // for delete a user 
    public function userDelete($remid)
    {
        $query = "DELETE FROM users WHERE id=$remid";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "<span class='success'>User successfully Deleted</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>User not Deleted</span>";
            return $msg;
        }
    }

    // for register a user 
    public function checkReg($data)
    {
        $name     = $this->db->link->real_escape_string($data['name']);
        $email    = $this->db->link->real_escape_string($data['email']);
        $password = $this->db->link->real_escape_string($data['password']);
        if (empty($name) || empty($email) || empty($password)) {
            echo "<span class='error'>Field should not be empty</span>";
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<span class='error'>Email not valid</span>";
            exit();
        } elseif ($this->emailExist($email)) {
            echo "<span class='error'>Email already exist</span>";
            exit();
        } elseif (strlen($password) < 4) {
            echo "<span class='error'>Password must atleast 4 character</span>";
            exit();
        } else {
            $password = md5($password);
            $query    = "INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
            $result   = $this->db->insert($query);
            if ($result) {
                echo "Register successfully";
                exit();
            }
        }
    }

    //  check a email exist or not 
    private function emailExist($email)
    {
        $query = "SELECT * FROM users WHERE email = '$email'";
        $response = $this->db->select($query);
        if ($response) {
            if ($response->num_rows > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    // for login a user 
    public function checkLogin($data)
    {
        $email    = $this->db->link->real_escape_string($data['email']);
        $password = $this->db->link->real_escape_string($data['password']);
        if (empty($email) || empty($password)) {
            echo 'empty';
            exit();
        } else {
            $password = md5($password);
            $query    = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $response = $this->db->select($query);
            if ($response) {
                $loginData = $response->fetch_assoc();
                if ($loginData['status'] == 0) {
                    echo 'deactive';
                    exit();
                } else {
                    Session::init();
                    Session::set('login', true);
                    Session::set('loginId', $loginData['id']);
                    Session::set('name', $loginData['name']);
                    Session::set('email', $loginData['email']);
                    echo 'success';
                    exit();
                }
            } else {
                echo 'not_matched';
                exit();
            }
        }
    }
}

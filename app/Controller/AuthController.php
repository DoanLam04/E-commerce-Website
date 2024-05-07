<?php

namespace Application;

require_once "../thietkewepLam/app/Models/User.php";
require_once './app/Library/MyClass.php';

use Application\Models\User;
use Application\Libraries\MyClass;

class Authcontroller
{
    private  $conn;
    public function __construct()
    {

        $this->conn = mysqli_connect("localhost", "root", "", "thietkeweplam");
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    private function checkEmail($email)
    {
        // Check if the connection is valid before executing the query
        if ($this->conn) {
            $sql = mysqli_query($this->conn, "SELECT * from user where email= '{$email}'");
            if ($sql) {
                if (mysqli_num_rows($sql) > 0) {
                    echo "This email already exists.";
                    return true;
                } else {
                    return false;
                }
            } else {
                echo "Error executing query: " . mysqli_error($this->conn);
                return false;
            }
        } else {
            echo "Database connection is not available.";
            return false;
        }
    }

    public function logIn()
    {
        $username = mysqli_real_escape_string($this->conn, $_POST['username']);
        $password = mysqli_real_escape_string($this->conn, $_POST['password']);

        if (empty($username) || empty($password)) {
            echo "Please fill out this field.";
            return;
        }
        $args = null;
        if (!empty($username)) {
            // Check if email exists
            if ($this->checkEmail($username)) {
                $args = [
                    ['email', '=', $username],
                    ['status', '=', 1]
                ];
            } else {
                $args = [
                    ['username', '=', $username],
                    ['status', '=', 1]
                ];
            }
        } else {
            echo "Please provide either username or email.";
            return;
        }
        $user = User::where($args)->first();
        if ($user == null) {
            MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Username not found']);
            return;
        }
        $user_pass = sha1($password);
        $enc_pass = $user->password;
        if ($user_pass !== $enc_pass) {
            MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Email or password incorrect.']);
            return;
        } else {
            $_SESSION['logincustomer'] = $username;
            $_SESSION['logincustomer_id'] = $user->id;
            echo "Successfully";
            MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Login Successfully']);
            header('location:index.php?option=home');
            return;
        }
    }

    public function register()
    {
        $name = mysqli_real_escape_string($this->conn, $_POST['name']);
        $username = mysqli_real_escape_string($this->conn, $_POST['username']);
        $email = mysqli_real_escape_string($this->conn, $_POST['email']);
        $phone = mysqli_real_escape_string($this->conn, $_POST['phone']);
        $password = mysqli_real_escape_string($this->conn, $_POST['password']);

        if (empty($username) || empty($phone) || empty($email) || empty($password)) {
            echo "Please fill out this field.";
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email is invalid.";
            return;
        }
        if ($this->checkEmail($email)) {
            return;
        }
        // Encrypt the password using SHA1
        $encrypted_password = sha1($password);
        $insert_query = mysqli_query(
            $this->conn,
            "INSERT INTO user ( name ,username, email ,phone, password, roles,status)
                         VALUES ('{$name}','{$username}', '{$email}', '{$phone}', '{$encrypted_password}','0','1')"
        );
        if (!$insert_query) {
            echo "Error. Please try again.";
            return;
        }
        $select_sql2 = mysqli_query($this->conn, "SELECT * FROM user WHERE email = '{$email}'");
        if (!mysqli_num_rows($select_sql2) > 0) {
            echo "Email is not exists.";
        }
        // $result = mysqli_fetch_assoc($select_sql2);
        // $_SESSION['logincustomer'] = $result['id'];
        echo "success.";
    }
    public function checkAuth()
    {
        if (!isset($_SESSION['logincustomer'])) {
            header("location:index.php?option=customer-login");
        }
    }
    public function logOut()
    {
        unset($_SESSION['logincustomer']);
        header('location:index.php?option=customer-login');
    }
}

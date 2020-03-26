<?php
    require 'DB.php';

    class UserModel {
        private $name;
        private $email;
        private $pass;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($name, $email, $pass) {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
        }

        public function validForm() {
            if(strlen($this->name) < 3)
                return "Логин слишком короткий";
            else if($this->isUser($this->name))
                return "Пользователь с таким логином уже существует";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(strlen($this->pass) < 3)
                return "Пароль не менее 3 символов";
            else
                return "Верно";
        }

        public function addUser() {
            $sql = 'INSERT INTO users(name, email, pass) VALUES(:name, :email, :pass)';
            $query = $this->_db->prepare($sql);

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute(['name' => $this->name, 'email' => $this->email, 'pass' => $pass]);

            $this->setAuth($this->email);
        }

        public function getUser() {
            $login = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users` WHERE `name` = '$login'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function isUser($login) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `name` = '$login'");
            $user = $result->fetch(PDO::FETCH_ASSOC);
            if($user != "")
                return 1;
            else
                return 0;
        }

        public function logOut() {
            setcookie('login', $this->email, time() - 3600, '/');
            unset($_COOKIE['login']);
            header('Location: /user/auth');
        }

        public function auth($login, $pass) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `name` = '$login'");
            $user = $result->fetch(PDO::FETCH_ASSOC);

            if($user['name'] == '')
                return 'Пользователя с таким логином не существует';
            else if(password_verify($pass, $user['pass']))
                $this->setAuth($login);
            else
                return 'Пароли не совпадают';
        }

        public function setAuth($login) {
            setcookie('login', $login, time() + 3600, '/');
            header('Location: /user/dashboard');
        }

    }
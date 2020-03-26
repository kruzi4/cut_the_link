<?php
    require "DB.php";

    class SModel {
        private $link;
        private $shortlink;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($link, $shortlink) {
            $this->link = $link;
            $this->shortlink = $shortlink;
        }

        public function isReserved() {
            $result = $this->_db->query("SELECT * FROM `links` WHERE `shortlink` = '$this->shortlink'");
            $link = $result->fetch(PDO::FETCH_ASSOC);
            if($link != "")
                return 1;
            else
                return 0;
        }

        public function addLink() {
            $sql = 'INSERT INTO links(link, shortlink, user) VALUES(:link, :shortlink, :user)';
            $query = $this->_db->prepare($sql);
            $user = $_COOKIE['login'];

            $query->execute(['link' => $this->link, 'shortlink' => $this->shortlink, 'user' => $user]);
        }

        public function getAllUserLinks() {
            $result = $this->_db->query("SELECT * FROM `links` ORDER BY `id` DESC");
            $link = $result->fetchAll(PDO::FETCH_ASSOC);

            return $link;
        }

    }
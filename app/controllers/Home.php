<?php
    class Home extends Controller {
        public function index() {
            if($_COOKIE['login'] != '')
                $this->view('s');
            $this->view('user/reg');
        }
    }
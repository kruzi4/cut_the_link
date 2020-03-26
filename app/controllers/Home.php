<?php
    class Home extends Controller {
        public function index() {
            if($_COOKIE['login'] != '')
                $this->view('shortlink/s');
            else
                $this->view('user/reg');
        }
    }
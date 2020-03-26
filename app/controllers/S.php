<?php

class S extends Controller {
    public function index() {
        if($_COOKIE['login'] != '') {
            $data = [];

            $cutter = $this->model('SModel');

            if(isset($_POST['link'])) {
                $cutter->setData($_POST['link'], $_POST['shortlink']);

                if($cutter->isReserved()) {
                    $data['message'] = "Короткая ссылка уже занята!";
                }else{
                    $cutter->addLink();
                }
            }

            $data['links'] = $cutter->getAllUserLinks();

            $this->view('shortlink/s', $data);
        }else
            $this->view('user/reg');
    }


}
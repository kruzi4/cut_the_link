<?php
    class Home extends Controller {
        public function index()
        {
            if ($_COOKIE['login'] != '') {
                $data = [];

                $cutter = $this->model('SModel');

                if (isset($_POST['link'])) {
                    $cutter->setData($_POST['link'], $_POST['shortlink']);

                    if ($cutter->isReserved()) {
                        $data['message'] = "Такое сокращение уже используется в базе!";
                    }else{
                        $cutter->addLink();
                    }
                }

                if ($_POST['delete_item']) {
                    $cutter->deleteLink($_POST['delete_item']);
                }

                $data['links'] = $cutter->getAllUserLinks();

                $this->view('shortlink/s', $data);
            } else {
                $this->view('user/reg');
            }
        }
    }
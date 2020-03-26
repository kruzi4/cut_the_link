<?php

class S extends Controller {
    public function index($params) {
        header("Location: http://$params");
    }


}
<?php

class S extends Controller {
    public function index($params) {
        $cutter = $this->model(SModel);

        $links = $cutter->getLinkFromShortLink($params);
        $url = $links['link'];
        header("Location: https://$url");
    }


}
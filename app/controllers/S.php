<?php

class S extends Controller {
    public function index($params) {
        $cutter = $this->model(SModel);

        $links = $cutter->getLinkFromShortLink($params);
        $url = $links['link'];
        if($cutter->is_url($url))
            header("Location: $url");
        else
            header("Location: https://$url");
    }


}
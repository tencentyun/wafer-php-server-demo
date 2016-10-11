<?php

use \QCloud_WeApp_SDK\Tunnel\TunnelService as TunnelService;

require('/../business/TunnelHandler.php');

class Tunnel extends CI_Controller {
    public function index() {
        TunnelService::handle(new TunnelHandler(), array(
            'checkLogin' => TRUE,
        ));
    }
}

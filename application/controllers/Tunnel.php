<?php

use \QCloud_WeApp_SDK\Tunnel\TunnelService as TunnelService;

require('/../business/ChatTunnelHandler.php');

class Tunnel extends CI_Controller {
    public function index() {
        $handler = new ChatTunnelHandler();
        TunnelService::handle($handler, array('checkLogin' => TRUE));
    }
}

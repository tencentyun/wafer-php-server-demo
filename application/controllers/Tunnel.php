<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \QCloud_WeApp_SDK\Tunnel\TunnelService as TunnelService;

require APPPATH.'business/ChatTunnelHandler.php';

class Tunnel extends CI_Controller {
    public function index() {
        $handler = new ChatTunnelHandler();
        TunnelService::handle($handler, array('checkLogin' => TRUE));
    }
}

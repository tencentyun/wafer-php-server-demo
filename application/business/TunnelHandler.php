<?php

use \QCloud_WeApp_SDK\Tunnel\ITunnelHandler as ITunnelHandler;
use \QCloud_WeApp_SDK\Helper\Logger as Logger;

class TunnelHandler implements ITunnelHandler {
    public function onRequest($tunnelInfo, $userInfo) {
        Logger::debug('onRequest', compact('tunnelInfo', 'userInfo'));
    }

    public function onConnect($tunnelInfo) {
        Logger::debug('onConnect', compact('tunnelInfo'));
    }

    public function onMessage($tunnelInfo, $message) {
        Logger::debug('onMessage', compact('tunnelInfo', 'message'));
    }

    public function onClose($tunnelInfo) {
        Logger::debug('onClose', compact('tunnelInfo'));
    }
}

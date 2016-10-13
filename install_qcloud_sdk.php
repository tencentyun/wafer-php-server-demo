<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/QCloud_WeApp_SDK/AutoLoader.php';

use \QCloud_WeApp_SDK\Conf as Conf;

// 设置 SDK 环境变量（调试使用）
putenv('DEBUG_SDK=yes');

// Windows
if (PHP_OS === 'WINNT') {
    $sdkConfig = 'C:\qcloud\sdk.config';

// Linux
} else {
    $sdkConfig = '/etc/qcloud/sdk.config';
}

if (!file_exists($sdkConfig)) {
    echo "SDK 配置文件（{$sdkConfig}）不存在";
    die;
}

$config = json_decode(file_get_contents($sdkConfig), TRUE);

if (!is_array($config)) {
    echo "SDK 配置文件（{$sdkConfig}）内容不合法";
    die;
}

function get($field) {
    return isset($field) && is_string($field) ? $field : '';
}

Conf::setup(array(
    'ServerHost' => get($config['serverHost']),
    'AuthServerUrl' => get($config['authServerUrl']),
    'TunnelServerUrl' => get($config['tunnelServerUrl']),
    'TunnelSignatureKey' => get($config['tunnelSignatureKey']),
));
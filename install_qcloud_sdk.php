<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 加载 SDK
require_once './vendor/autoload.php';

use \QCloud_WeApp_SDK\Conf as Conf;

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

function take($field) {
    return isset($field) && is_string($field) ? $field : '';
}

/*
 * --------------------------------------------------------------------
 * 设置 SDK 基本配置
 * --------------------------------------------------------------------
 */
Conf::setup(array(
    'ServerHost' => take($config['serverHost']),
    'AuthServerUrl' => take($config['authServerUrl']),
    'TunnelServerUrl' => take($config['tunnelServerUrl']),
    'TunnelSignatureKey' => take($config['tunnelSignatureKey']),
));

/**
 * 也可以调用独立方法进行设置
 *
 * Conf::setServerHost(take($config['serverHost']));
 * Conf::setAuthServerUrl(take($config['authServerUrl']));
 * Conf::setTunnelServerUrl(take($config['tunnelServerUrl']));
 * Conf::setTunnelSignatureKey(take($config['tunnelSignatureKey']));
 */

/*
 * --------------------------------------------------------------------
 * 设置 SDK 日志输出配置（主要是方便调试）
 * --------------------------------------------------------------------
 */
Conf::setEnableOutputLog(TRUE);

// 指定 SDK 日志输出目录（注意尾斜杠不能省略）
Conf::setLogPath(APPPATH.'logs/');

// 默认是不打印 SDK 日志的
// 1 => ERROR, 2 => DEBUG, 3 => INFO, 4 => ALL
Conf::setLogThresholdArray(array(2)); // output debug log only

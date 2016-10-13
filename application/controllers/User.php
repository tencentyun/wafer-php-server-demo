<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \QCloud_WeApp_SDK\Auth\LoginService as LoginService;

class User extends CI_Controller {
    public function index() {
        $result = LoginService::check();

        // check failed
        if ($result['code'] !== 0) {
            return;
        }

        $response = array(
            'code' => 0,
            'message' => 'ok',
            'data' => array(
                'userInfo' => $result['data']['userInfo'],
            ),
        );

        echo json_encode($response, JSON_FORCE_OBJECT);
    }
}

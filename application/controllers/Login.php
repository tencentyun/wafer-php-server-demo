<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \QCloud_WeApp_SDK\Auth\LoginService as LoginService;

class Login extends CI_Controller {
    public function index() {
        $result = LoginService::login();
        // notes: do not echo anything
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Auth extends REST_Controller
{
    public function __construct()
    {
        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: Origin, Content-Type');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS"){
            die();
        }
        parent::__construct();
        $this->load->model('User_model');
    }

    public function token_post()
    {
        $dataPost = $this->post();
        // $param = json_decode(file_get_contents('php://input'),true);
        
        $user = $this->User_model->login($dataPost['username'], $dataPost['password']);
        // $user = $this->User_model->login($param['username'], $param['password']);
        if ($user != null) {
            $tokenData = array();
            $tokenData['id'] = $user->id;
            $response['token'] = Authorization::generateToken($tokenData);
            $response['level'] = $user->level;
            $this->set_response($response, REST_Controller::HTTP_OK);
            return;
        }
        else{
            $response = [
                'status' => REST_Controller::HTTP_UNAUTHORIZED,
                'message' => 'Unauthorized',
            ];
            $this->set_response($response, REST_Controller::HTTP_UNAUTHORIZED);
        }
    }
}

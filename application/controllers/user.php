<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class user extends REST_Controller {

    function __construct($config = 'rest') {

        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS"){
            die();
        }
        parent::__construct($config);

    }

    // show data siswa
    function index_get() {
        // $id = $this->get('id');
        $id = $this->uri->segment(2);
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        if ($id == '') {
            $this->db->order_by("level", "asc");
            $user = $this->db->get('user')->result();
        } else {
            $this->db->where('id', $id);
            $user = $this->db->get('user')->row();
        }
        $this->response($user, 200);
            }
            else {
                $response = [
                    'status' => REST_Controller::HTTP_UNAUTHORIZED,
                    'message' => 'Unauthorized',
                ];
                $this->set_response($response, REST_Controller::HTTP_UNAUTHORIZED);
                return;
            }
        }
        else{
            $response = [
                'status' => REST_Controller::HTTP_FORBIDDEN,
                'message' => 'Forbidden',
            ];
            $this->set_response($response, REST_Controller::HTTP_FORBIDDEN);
        }
    }

    // insert new data to siswa
    function index_post() {
        $data = array(
                    'id'        => $this->post('id'),
                    'username'  => $this->post('username'),
                    'password'  => $this->post('password'),
                    'level'     => $this->post('level')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
            }
            else {
                $response = [
                    'status' => REST_Controller::HTTP_UNAUTHORIZED,
                    'message' => 'Unauthorized',
                ];
                $this->set_response($response, REST_Controller::HTTP_UNAUTHORIZED);
                return;
            }
        }
        else{
            $response = [
                'status' => REST_Controller::HTTP_FORBIDDEN,
                'message' => 'Forbidden',
            ];
            $this->set_response($response, REST_Controller::HTTP_FORBIDDEN);
        }
    }

    // update data siswa
    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'        => $this->put('id'),
                    'username'  => $this->put('username'),
                    'password'  => $this->put('password'),
                    'level'     => $this->put('level')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('id', $id);
        $update = $this->db->update('user', $data);
        
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
            }
            else {
                $response = [
                    'status' => REST_Controller::HTTP_UNAUTHORIZED,
                    'message' => 'Unauthorized',
                ];
                $this->set_response($response, REST_Controller::HTTP_UNAUTHORIZED);
                return;
            }
        }
        else{
            $response = [
                'status' => REST_Controller::HTTP_FORBIDDEN,
                'message' => 'Forbidden',
            ];
            $this->set_response($response, REST_Controller::HTTP_FORBIDDEN);
        }
    }

    //  siswa
    function index_delete($id) {
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('id', $id);
        $delete = $this->db->delete('user');
        // ---
        // var_dump($this->db->last_query());
        // die();
        // ---
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
            }
            else {
                $response = [
                    'status' => REST_Controller::HTTP_UNAUTHORIZED,
                    'message' => 'Unauthorized',
                ];
                $this->set_response($response, REST_Controller::HTTP_UNAUTHORIZED);
                return;
            }
        }
        else{
            $response = [
                'status' => REST_Controller::HTTP_FORBIDDEN,
                'message' => 'Forbidden',
            ];
            $this->set_response($response, REST_Controller::HTTP_FORBIDDEN);
        }
    }

}
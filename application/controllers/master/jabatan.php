<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Jabatan extends REST_Controller {

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

    // show data jabatan
    function index_get() {
        $kd_jabatan = $this->uri->segment(3);
        $headers = $this->input->request_headers();
        
        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {    
        if ($kd_jabatan == '') {
            $m_jabatan = $this->db->get('m_jabatan')->result();
        } else {
            $this->db->where('kd_jabatan', $kd_jabatan);
            $m_jabatan = $this->db->get('m_jabatan')->row();
        }
        $this->response($m_jabatan, 200);
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

   // insert new data to jabatan
    function index_post() {
        $data = array(
                    'kd_jabatan'  => $this->post('kd_jabatan'),
                    'jabatan'     => $this->post('jabatan')
        );
        $headers = $this->input->request_headers();
        
        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {    
        $insert = $this->db->insert('m_jabatan', $data);
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

   // update data jabatan
    function index_put() {
        $kd_jabatan = $this->put('kd_jabatan');
        $data = array(
                    'kd_jabatan'  => $this->put('kd_jabatan'),
                    'jabatan'     => $this->put('jabatan')
        );
        $headers = $this->input->request_headers();
        
        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {    
        $this->db->where('kd_jabatan', $kd_jabatan);
        $update = $this->db->update('m_jabatan', $data);
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

    // Delete jabatan
    function index_delete($kd_jabatan) {
        $headers = $this->input->request_headers();
        
        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {    
        $this->db->where('kd_jabatan', $kd_jabatan);
        $delete = $this->db->delete('m_jabatan');
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
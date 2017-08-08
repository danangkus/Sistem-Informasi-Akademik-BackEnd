<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class tata_tertib extends REST_Controller {

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
        // $kd_tatib = $this->get('kd_tatib');
        $kd_tatib = $this->uri->segment(2);
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        if ($kd_tatib == '') {
            $this->db->order_by("jenis_pelanggaran", "asc");
            $tata_tertib = $this->db->get('tata_tertib')->result();
        } else {
            $this->db->where('kd_tatib', $kd_tatib);
            $tata_tertib = $this->db->get('tata_tertib')->row();
        }
        $this->response($tata_tertib, 200);
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
                    'kd_tatib'          => $this->post('kd_tatib'),
                    'jenis_pelanggaran' => $this->post('jenis_pelanggaran'),
                    'pelanggaran'       => $this->post('pelanggaran'),
                    'poin'              => $this->post('poin')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $insert = $this->db->insert('tata_tertib', $data);
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
        $kd_tatib = $this->put('kd_tatib');
        $data = array(
                    'jenis_pelanggaran' => $this->put('jenis_pelanggaran'),
                    'pelanggaran'       => $this->put('pelanggaran'),
                    'poin'              => $this->put('poin')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kd_tatib', $kd_tatib);
        $update = $this->db->update('tata_tertib', $data);
        
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
    function index_delete($kd_tatib) {
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kd_tatib', $kd_tatib);
        $delete = $this->db->delete('tata_tertib');
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
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class his_poin extends REST_Controller {

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

    // show data riwayat absen siswa
    function index_get() {
        // $kode = $this->get('kd_his_poin');
        $kd_his_poin = $this->uri->segment(2);
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        if ($kd_his_poin == '') {
            $this->db->select('*');
            $this->db->from('his_poin');
            $this->db->join('bio_siswa', 'his_poin.NIS = bio_siswa.nis');
            $this->db->join('tata_tertib', 'his_poin.kd_tatib = tata_tertib.kd_tatib');
            $history = $this->db->get()->result();
        } else {
            $this->db->where('kd_his_poin', $kd_his_poin);
            $history = $this->db->get('his_poin')->row();
        }
        $this->response($history, 200);
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

    // insert new data to riwayat absen siswa
    function index_post() {
        $data = array(
                    'kd_his_poin'       => $this->post('kd_his_poin'),
                    'NIS'               => $this->post('NIS'),
                    'kelas'             => $this->post('kelas'),
                    'th_ajaran'         => $this->post('thn_ajaran'),
                    'semester'          => $this->post('semester'),
                    'tanggal'           => $this->post('tanggal'),
                    'kd_tatib'          => $this->post('kd_tatib'),
                    'pencatat'          => $this->post('pencatat')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $insert = $this->db->insert('his_poin', $data);
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

    // update data riwayat absen siswa
    function index_put() {
        $kd_his_poin = $this->put('kd_his_poin');
        $data = array(
                    'NIS'               => $this->put('NIS'),
                    'kelas'             => $this->put('kelas'),
                    'th_ajaran'         => $this->put('thn_ajaran'),
                    'semester'          => $this->put('semester'),
                    'tanggal'           => $this->put('tanggal'),
                    'kd_tatib'          => $this->put('kd_tatib'),
                    'pencatat'          => $this->put('pencatat')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kd_his_poin', $kd_his_poin);
        $update = $this->db->update('his_poin', $data);
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

    // delete riwayat absen siswa
    function index_delete($kd_his_poin) {
        // $kode = $this->delete('kd_his_poin');
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kd_his_poin', $kd_his_poin);
        $delete = $this->db->delete('his_poin');
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
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class his_abs_guru extends REST_Controller {

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

    // show data riwayat absen guru
    function index_get() {
        // $kd_his_abs_guru = $this->get('kd_his_abs_guru');
        $kd_his_abs_guru = $this->uri->segment(2);
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        if ($kd_his_abs_guru == '') {
        	$this->db->select('*');
            $this->db->from('his_abs_guru');
            $this->db->join('bio_guru', 'his_abs_guru.kode_guru = bio_guru.kode_guru');
            $history = $this->db->get()->result();
        } else {
            $this->db->where('kd_his_abs_guru', $kd_his_abs_guru);
            $history = $this->db->get('his_abs_guru')->row();
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

    // insert new data to riwayat absen guru
    function index_post() {
        $data = array(
                    'kd_his_abs_guru'   => $this->post('kd_his_abs_guru'),
                    'kode_guru'               => $this->post('kode_guru'),
                    'thn_ajaran'        => $this->post('thn_ajaran'),
                    'semester'          => $this->post('semester'),
                    'kelas'             => $this->post('kelas'),
                    'tanggal'           => $this->post('tanggal'),
                    'sakit'             => $this->post('sakit'),
                    'izin'              => $this->post('izin'),
                    'alpa'              => $this->post('alpa')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $insert = $this->db->insert('his_abs_guru', $data);
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

    // update data riwayat absen guru
    function index_put() {
        $kd_his_abs_guru = $this->put('kd_his_abs_guru');
        $data = array(
                    'kode_guru'               => $this->put('kode_guru'),
                    'thn_ajaran'        => $this->put('thn_ajaran'),
                    'semester'          => $this->put('semester'),
                    'kelas'             => $this->put('kelas'),
                    'tanggal'           => $this->put('tanggal'),
                    'sakit'             => $this->put('sakit'),
                    'izin'              => $this->put('izin'),
                    'alpa'              => $this->put('alpa')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kd_his_abs_guru', $kd_his_abs_guru);
        $update = $this->db->update('his_abs_guru', $data);
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

    // delete riwayat absen guru
    function index_delete($kd_his_abs_guru) {
        // $kd_his_abs_guru = $this->delete('kd_his_abs_guru');
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kd_his_abs_guru', $kd_his_abs_guru);
        $delete = $this->db->delete('his_abs_guru');
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
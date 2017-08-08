<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class his_abs_sis extends REST_Controller {

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
        // $kd_his_absis = $this->get('kd_his_absis');
        $kd_his_absis = $this->uri->segment(2);
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        if ($kd_his_absis == '') {
            $this->db->select('*');
            $this->db->from('his_abs_sis');
            $this->db->join('bio_siswa', 'his_abs_sis.NIS = bio_siswa.nis');
            $his_abs_sis = $this->db->get()->result();
        } else {
            $this->db->where('kd_his_absis', $kd_his_absis);
            $his_abs_sis = $this->db->get('his_abs_sis')->row();
        }
        $this->response($his_abs_sis, 200);
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
                    'kd_his_absis'  => $this->post('kd_his_absis'),
                    'NIS'           => $this->post('NIS'),
                    'th_ajaran'     => $this->post('th_ajaran'),
                    'kelas'         => $this->post('kelas'),
                    'semester'      => $this->post('semester'),
                    'tanggal'       => $this->post('tanggal'),
                    'sakit'         => $this->post('sakit'),
                    'izin'          => $this->post('izin'),
                    'alpa'          => $this->post('alpa')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $insert = $this->db->insert('his_abs_sis', $data);
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
        $kd_his_absis = $this->put('kd_his_absis');
        $data = array(
                    'NIS'           => $this->put('NIS'),
                    'th_ajaran'     => $this->put('th_ajaran'),
                    'kelas'         => $this->put('kelas'),
                    'semester'      => $this->put('semester'),
                    'tanggal'       => $this->put('tanggal'),
                    'sakit'         => $this->put('sakit'),
                    'izin'          => $this->put('izin'),
                    'alpa'          => $this->put('alpa')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kd_his_absis', $kd_his_absis);
        $update = $this->db->update('his_abs_sis', $data);
        
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
    function index_delete($kd_his_absis) {
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kd_his_absis', $kd_his_absis);
        $delete = $this->db->delete('his_abs_sis');
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
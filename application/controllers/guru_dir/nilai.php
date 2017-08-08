<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class nilai extends REST_Controller {

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
        // $kd_nilai = $this->get('kd_nilai');
        $guru = $this->uri->segment(3);
        $kd_nilai = $this->uri->segment(3);
        $kelas = $this->uri->segment(4);
        $semester = $this->uri->segment(5);
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        if ($kd_nilai == '') {
            $nilai = $this->db->get('nilai')->result();
        } else if ($guru == 'guru') {
            $nilai = $this->db->query("SELECT * from nilai WHERE `guru` LIKE '%$guru%' ")->result();
            // $this->db->where('guru', $guru);
            // $nilai = $this->db->get('nilai')->result();
        } else if ($kelas == 'kelas') {
            $nilai = $this->db->query("SELECT * from nilai WHERE `guru` LIKE '%$guru%' AND `kelas` LIKE '%$kelas%' ")->result();
        } else {
            $nilai = $this->db->query("SELECT * from nilai WHERE `guru` LIKE '%$guru%' AND `kelas` LIKE '%$kelas%' AND `semester` LIKE '%$semester%' ")->result();
            
        }
        $this->response($nilai, 200);
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
                    'kd_nilai'      => $this->post('kd_nilai'),
                    'NIS'           => $this->post('NIS'),
                    'kelas'         => $this->post('kelas'),
                    'thn_ajaran'    => $this->post('thn_ajaran'),
                    'semester'      => $this->post('semester'),
                    'mapel'         => $this->post('mapel'),
                    'guru'          => $this->post('guru'),
                    'nh'            => $this->post('nh'),
                    'uts'           => $this->post('uts'),
                    'uas'           => $this->post('uas')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $insert = $this->db->insert('nilai', $data);
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
        $kd_nilai = $this->put('kd_nilai');
        $data = array(
                    'NIS'           => $this->put('NIS'),
                    'kelas'         => $this->put('kelas'),
                    'thn_ajaran'    => $this->put('thn_ajaran'),
                    'semester'      => $this->put('semester'),
                    'mapel'         => $this->put('mapel'),
                    'guru'          => $this->put('guru'),
                    'nh'            => $this->put('nh'),
                    'uts'           => $this->put('uts'),
                    'uas'           => $this->put('uas')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kd_nilai', $kd_nilai);
        $update = $this->db->update('nilai', $data);
        
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
    function index_delete($kd_nilai) {
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kd_nilai', $kd_nilai);
        $delete = $this->db->delete('nilai');
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
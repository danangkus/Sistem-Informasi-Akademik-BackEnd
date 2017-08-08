<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class siswa extends REST_Controller {

    function __construct() {

        header("Access-Control-Allow-Origin: *");
        header('Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS"){
            die();
        }
        parent::__construct();

    }

    // show data siswa
    function index_get() {
        $nis = $this->get('nis');
        $nis = $this->uri->segment(2);
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        if ($nis == '') {
            $bio_siswa = $this->db->get('bio_siswa')->result();
        } else {
            $this->db->where('nis', $nis);
            $bio_siswa = $this->db->get('bio_siswa')->row();
        }
        $this->response($bio_siswa, 200);
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
                    'nis'           => $this->post('nis'),
                    'NISN'          => $this->post('NISN'),
                    'nama'          => $this->post('nama'),
                    'jenis_kelamin' => $this->post('jenis_kelamin'),
                    'tmpt_lahir'    => $this->post('tmpt_lahir'),
                    'tgl_lahir'     => $this->post('tgl_lahir'),
                    'alamat'        => $this->post('alamat'),
                    'kecamatan'     => $this->post('kecamatan'),
                    'almt_kota'     => $this->post('almt_kota'),
                    'almt_prov'     => $this->post('almt_prov'),
                    'agama'         => $this->post('agama'),
                    'no_telp'       => $this->post('no_telp'),
                    'email'         => $this->post('email'),
                    'jurusan'       => $this->post('jurusan'),
                    'kelas_1'       => $this->post('kelas_1')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $insert = $this->db->insert('bio_siswa', $data);
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
        $nis = $this->put('nis');
        $data = array(
                    // 'nis'           => $this->put('nis'),
                    'NISN'          => $this->put('NISN'),
                    'nama'          => $this->put('nama'),
                    'jenis_kelamin' => $this->put('jenis_kelamin'),
                    'tmpt_lahir'    => $this->put('tmpt_lahir'),
                    'tgl_lahir'     => $this->put('tgl_lahir'),
                    'alamat'        => $this->put('alamat'),
                    'kecamatan'     => $this->put('kecamatan'),
                    'almt_kota'     => $this->put('almt_kota'),
                    'almt_prov'     => $this->put('almt_prov'),
                    'agama'         => $this->put('agama'),
                    'no_telp'       => $this->put('no_telp'),
                    'email'         => $this->put('email'),
                    'jurusan'       => $this->put('jurusan'),
                    'kelas_1'       => $this->put('kelas_1')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('nis', $nis);
        $update = $this->db->update('bio_siswa', $data);
        
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
    function index_delete($nis) {
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('nis', $nis);
        $delete = $this->db->delete('bio_siswa');
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
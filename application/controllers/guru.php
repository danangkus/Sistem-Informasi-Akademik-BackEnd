<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class guru extends REST_Controller {

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

    // show data guru
    function index_get() {
        // $nip = $this->get('nip');
        $kode = $this->uri->segment(2);
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        if ($kode == '') {
            $bio_guru = $this->db->get('bio_guru')->result();
        } else {
            $this->db->where('kode', $kode);
            $bio_guru = $this->db->get('bio_guru')->row();
        }
        $this->response($bio_guru, 200);
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

    // insert new data to guru
    function index_post() {
        $data = array(
                    'kode_guru'     => $this->post('kode_guru'),
                    'nip'           => $this->post('nip'),
                    'nama'          => $this->post('nama'),
                    'jenis_kelamin' => $this->post('jenis_kelamin'),
                    'tmpt_lahir'    => $this->post('tmpt_lahir'),
                    'tgl_lahir'     => $this->post('tgl_lahir'),
                    'alamat'        => $this->post('alamat'),
                    'kecamatan'     => $this->post('kecamatan'),
                    'alamat_kota'   => $this->post('alamat_kota'),
                    'alamat_prov'   => $this->post('alamat_prov'),
                    'agama'         => $this->post('agama'),
                    'no_telp'       => $this->post('no_telp'),
                    'email'         => $this->post('email'),
                    'mapel'         => $this->post('mapel')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $insert = $this->db->insert('bio_guru', $data);
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

    // update data guru
    function index_put() {
        $kode = $this->put('kode');
        $data = array(
                    'kode_guru'     => $this->put('kode_guru'),  
                    'nip'           => $this->put('nip'),                  
                    'nama'          => $this->put('nama'),
                    'jenis_kelamin' => $this->put('jenis_kelamin'),
                    'tmpt_lahir'    => $this->put('tmpt_lahir'),
                    'tgl_lahir'     => $this->put('tgl_lahir'),
                    'alamat'        => $this->put('alamat'),
                    'kecamatan'     => $this->put('kecamatan'),
                    'alamat_kota'   => $this->put('alamat_kota'),
                    'alamat_prov'   => $this->put('alamat_prov'),
                    'agama'         => $this->put('agama'),
                    'no_telp'       => $this->put('no_telp'),
                    'email'         => $this->put('email'),
                    'mapel'         => $this->put('mapel')
        );
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kode', $kode);
        $update = $this->db->update('bio_guru', $data);
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

    // delete guru
    function index_delete($kode) {
        // $nip = $this->delete('nip');
        $headers = $this->input->request_headers();

        if (Authorization::tokenIsExist($headers)) {
            $token = Authorization::validateToken($headers['Authorization']);
            if ($token != false) {
        $this->db->where('kode', $kode);
        $delete = $this->db->delete('bio_guru');
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
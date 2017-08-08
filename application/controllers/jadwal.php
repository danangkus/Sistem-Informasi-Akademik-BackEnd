<?php

require APPPATH . '/libraries/REST_Controller.php';

class jadwal extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    // show data jadwal
    function index_get() {
        $kode = $this->get('kd_jdwpel');
        if ($kode == '') {
            $jadwal = $this->db->get('jadwal_pelajaran')->result();
        } else {
            $this->db->where('kd_jdwpel', $kode);
            $jadwal = $this->db->get('jadwal_pelajaran')->result();
        }
        $this->response($jadwal, 200);
    }

    // insert new data to jadwal
    function index_post() {
        $data = array(
                    'kd_jdwpel'         => $this->post('kd_jdwpel'),
                    'jurusan'           => $this->post('jurusan'),
                    'kelas'             => $this->post('kelas'),
                    'thn_ajaran'        => $this->post('thn_ajaran'),
                    'semester'          => $this->post('semester'),
                    'mata_pelajaran'    => $this->post('mata_pelajaran'),
                    'guru'              => $this->post('guru'),
                    'hari'              => $this->post('hari'),
                    'jam_pelajaran'     => $this->post('jam_pelajaran'),
                    'ruangan'           => $this->post('ruangan')
        );
        $insert = $this->db->insert('jadwal_pelajaran', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // update data jadwal
    function index_put() {
        $kode = $this->put('kd_jdwpel');
        $data = array(
                    'kd_jdwpel'         => $this->put('kd_jdwpel'),
                    'jurusan'           => $this->put('jurusan'),
                    'kelas'             => $this->put('kelas'),
                    'thn_ajaran'        => $this->put('thn_ajaran'),
                    'semester'          => $this->put('semester'),
                    'mata_pelajaran'    => $this->put('mata_pelajaran'),
                    'guru'              => $this->put('guru'),
                    'hari'              => $this->put('hari'),
                    'jam_pelajaran'     => $this->put('jam_pelajaran'),
                    'ruangan'           => $this->put('ruangan')
        );
        $this->db->where('kd_jdwpel', $kode);
        $update = $this->db->update('jadwal_pelajaran', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // delete jadwal
    function index_delete() {
        $kode = $this->delete('kd_jdwpel');
        $this->db->where('kd_jdwpel', $kode);
        $delete = $this->db->delete('jadwal_pelajaran');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
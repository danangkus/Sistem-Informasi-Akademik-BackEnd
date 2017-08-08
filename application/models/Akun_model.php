<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_Model extends CI_Model
{
    public function edit($username, $password)
    {
        $condition = [
            'username' => $username,
            'password' => $password,
        ];

        $user = $this->db
            ->get_where('user', $condition)
            ->row();
        return $user;
    }
}

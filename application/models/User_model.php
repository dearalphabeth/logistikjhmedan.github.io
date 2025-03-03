<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register($data) {
        return $this->db->insert('user', $data);
    }

    public function login($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        return $query->row();
    }
}
?>

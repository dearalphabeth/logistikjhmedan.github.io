<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakMasuk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Brgmasuk_model'); 
        $this->load->model('Logistik_model'); // Model is loaded here
    }

    public function index() {
        $data['masuk'] = $this->Brgmasuk_model->get_all_barang_masuk();
        $data['stokbarang'] = $this->Brgmasuk_model->get_all_nama_brg(); // Fetch nama_brg
        $this->load->view('cetaklapmasuk_view', $data);
    }
    
}
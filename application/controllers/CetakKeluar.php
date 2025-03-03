<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakKeluar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Brgkeluar_model'); 
        $this->load->model('Logistik_model'); // Model is loaded here
    }

    public function index() {
        $data['keluar'] = $this->Brgkeluar_model->get_all_barang_keluar();
        $data['stokbarang'] = $this->Brgkeluar_model->get_all_nama_brg(); // Fetch nama_brg
        $this->load->view('cetaklapkeluar_view', $data);
    }
    
}
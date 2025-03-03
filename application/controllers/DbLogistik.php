<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DbLogistik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Logistik_model');
 // Model is loaded here
    }

    public function index() {
        // Load model
        $this->load->model('Logistik_model');

        // Fetch counts
        $data['stokbarang_count'] = $this->Logistik_model->count_added_this_week('stokbarang');
        $data['brg_masuk_count'] = $this->Logistik_model->count_added_this_week('brg_masuk');
        $data['brg_keluar_count'] = $this->Logistik_model->count_added_this_week('brg_keluar');

        // Load the view and pass the data
        $this->load->view('dblogistik_view', $data);
    }
}
?>


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logistik extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Logistik_model');
    }

    // Main page: List all stock items
    public function index() {
        $data['barang'] = $this->Logistik_model->get_all_barang();
        $this->load->view('logistik_view', $data);


    }

    // Add a new stock item
    public function add_barang() {
        if ($this->input->post()) {
            $data = array(
                'idbarang' => $this->input->post('idbarang'),
                'nama_brg' => $this->input->post('nama_brg'),
                'desk' => $this->input->post('desk'),
                'stok' => $this->input->post('stok')
            );
            
            if ($this->Logistik_model->insert_barang($data)) {
                redirect('logistik');
            } else {
                echo "Error inserting data.";
            }
        } else {
            echo "No data received.";
        }
    }

    // Edit an existing stock item
    public function edit_barang() {
        if ($this->input->post()) {
            $id = $this->input->post('idbarang');
            $data = array(
                'nama_brg' => $this->input->post('nama_brg'),
                'desk' => $this->input->post('desk'),
                'stok' => $this->input->post('stok')
            );
            
            if ($this->Logistik_model->update_barang($id, $data)) {
                redirect('logistik');
            } else {
                echo "Error updating data.";
            }
        } else {
            echo "No data received.";
        }
    }

    // Delete a stock item
    public function delete_barang($idbarang) {
        if ($this->Logistik_model->delete_barang($idbarang)) {
            redirect('logistik');
        } else {
            echo "Error deleting data.";
        }
    }

    public function get_weekly_totals() {
    $this->load->model('Logistik_model');

    $data['stokbarang_count'] = $this->Logistik_model->count_added_this_week('stokbarang');
    $data['brg_masuk_count'] = $this->Logistik_model->count_added_this_week('brg_masuk');
    $data['brg_keluar_count'] = $this->Logistik_model->count_added_this_week('brg_keluar');

    $this->load->view('dashboard_view', $data);
    }

}

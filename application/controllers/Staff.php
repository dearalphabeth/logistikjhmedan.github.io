<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Staff_model');
        $this->load->model('DbLog_model');
        $this->load->model('Logistik_model'); // Load the model for stokbarang
    }

    public function index() {
        // Fetch nama_brg from stokbarang
        $data['stokbarang'] = $this->Staff_model->get_all_nama_brg();
        $data['pengajuan'] = $this->Staff_model->get_all_pengajuan();
        $this->load->view('staff_view', $data);
    }


    public function pengajuan() {
        $data['pengajuan'] = $this->Staff_model->get_all_pengajuan();
        $this->load->view('staff_view', $data);
    }


    public function add_pengajuan() {
        $data = array(
            'nama_brg' => $this->input->post('nama_brg'),
            'jumlah' => $this->input->post('jumlah'),
            'tgl_aju' => $this->input->post('tgl_aju'),
            'penerima' => $this->input->post('penerima')
        );

        if ($this->Staff_model->insert_pengajuan($data)) {
            redirect('staff');
        } else {
            echo "Error inserting data.";
        }
    }

    public function edit_pengajuan() {
    // Debug output to check if the form data is received
    if($this->input->post()) {
        echo '<pre>'; print_r($this->input->post()); echo '</pre>';
    } else {
        echo "No data received.";
        return;
    }

    $id_peng = $this->input->post('id_peng');
    $data = array(
        'id_peng' => $this->input->post('id_peng'),
        'tgl_terima' => $this->input->post('tgl_terima'),
        'ket' => $this->input->post('ket'),
    );

        if ($this->Staff_model->update_pengajuan($id_peng, $data)) {
            redirect('staff');
        } else {
            echo "Error updating data.";
        }
    }


    public function delete_pengajuan($id_peng) {
        // Debug output to confirm deletion
        echo "Menghapus Pengajuan dengan id: $id_peng";

        if ($this->Staff_model->delete_pengajuan($id_peng)) {
            redirect('staff');
        } else {
            echo "Error deleting data.";
        }
    }
    

}
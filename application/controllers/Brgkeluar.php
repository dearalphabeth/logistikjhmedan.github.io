<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brgkeluar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Brgkeluar_model'); 
        $this->load->model('Logistik_model'); // Ensure this model is loaded
    }

    public function index() {
        $data['keluar'] = $this->Brgkeluar_model->get_all_barang_keluar();
        $data['stokbarang'] = $this->Brgkeluar_model->get_all_nama_brg(); // Fetch nama_brg
        $this->load->view('brgkeluar_view', $data);
    }
    
    public function add_keluar() {
    if ($this->input->post()) {
        $nama_brg = $this->input->post('nama_brg');
        $jumlah = $this->input->post('jumlah');

        // Get the idbarang based on the selected nama_brg
        $item = $this->Brgkeluar_model->get_all_nama_brg(); // Fetch all items to find the idbarang
        $idbarang = null;
        foreach ($item as $stok) {
            if ($stok->nama_brg === $nama_brg) {
                $idbarang = $stok->idbarang; // Get the idbarang for the selected nama_brg
                break;
            }
        }

        // Prepare data for insertion
        $data = array(
            // 'idkeluar' => $this->input->post('idkeluar'), // Remove this line if idkeluar is auto-incrementing
            'idbarang' => $idbarang, // Add the idbarang here
            'nama_brg' => $nama_brg,
            'tanggal' => $this->input->post('tanggal'),
            'jumlah' => $jumlah,
            'ambil' => $this->input->post('ambil') // Ensure this matches your field name
        );

        // Insert data into brg_keluar
        if ($this->Brgkeluar_model->insert_keluar($data)) {
            // Update stock in stokbarang
            $this->Logistik_model->update_stok($nama_brg, $jumlah); // Update stock for keluar
            redirect('brgkeluar');
        } else {
            // Handle insertion error
            $this->session->set_flashdata('error', 'Error inserting data.');
            redirect('brgkeluar');
        }
    } else {
        // Handle case where no data is received
        $this->session->set_flashdata('error', 'No data received.');
        redirect('brgkeluar');
    }
    }

    public function delete_keluar($idkeluar) {
        if ($this->Brgkeluar_model->delete_keluar($idkeluar)) {
            redirect('brgkeluar');
        } else {
            // Handle deletion error
            $this->session->set_flashdata('error', 'Error deleting data.');
            redirect('brgkeluar');
        }
    }
}
?>
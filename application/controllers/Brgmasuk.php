<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brgmasuk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Brgmasuk_model'); 
        $this->load->model('Logistik_model'); // Ensure this model is loaded
    }

    public function index() {
        $data['masuk'] = $this->Brgmasuk_model->get_all_barang_masuk();
        $data['stokbarang'] = $this->Brgmasuk_model->get_all_nama_brg(); // Fetch nama_brg
        $this->load->view('brgmasuk_view', $data);
    }
    
    public function add_masuk() {
        if ($this->input->post()) {
            $nama_brg = $this->input->post('nama_brg');
            $jumlah = $this->input->post('jumlah');

            // Get the idbarang based on the selected nama_brg
            $item = $this->Brgmasuk_model->get_all_nama_brg(); // Fetch all items to find the idbarang
            $idbarang = null;
            foreach ($item as $stok) {
                if ($stok->nama_brg === $nama_brg) {
                    $idbarang = $stok->idbarang; // Get the idbarang for the selected nama_brg
                    break;
                }
            }

            $data = array(
                'idmasuk' => $this->input->post('idmasuk'), // Ensure this is handled correctly
                'idbarang' => $idbarang, // Add the idbarang here
                'nama_brg' => $nama_brg,
                'tanggal' => $this->input->post('tanggal'),
                'jumlah' => $jumlah,
                'penerima' => $this->input->post('penerima')
            );

            // Insert data into brg_masuk
            if ($this->Brgmasuk_model->insert_masuk($data)) {
                // Update stock in stokbarang
                $this->Logistik_model->update_stok($nama_brg, $jumlah); // Update stock
                redirect('brgmasuk');
            } else {
                // Handle insertion error
                $this->session->set_flashdata('error', 'Error inserting data.');
                redirect('brgmasuk');
            }
        } else {
            // Handle case where no data is received
            $this->session->set_flashdata('error', 'No data received.');
            redirect('brgmasuk');
        }
    }

    public function edit_masuk() {
        if ($this->input->post()) {
            $id = $this->input->post('idmasuk');
            $data = array(
                'nama_brg' => $this->input->post('nama_brg'),
                'jumlah' => $this->input->post('jumlah'),
                'tanggal' => $this->input->post('tanggal'),
                'penerima' => $this->input->post('penerima')
            );

            if ($this->Brgmasuk_model->update_masuk($id, $data)) {
                redirect('brgmasuk');
            } else {
                // Handle update error
                $this->session->set_flashdata('error', 'Error updating data.');
                redirect('brgmasuk');
            }
        } else {
            // Handle case where no data is received
            $this->session->set_flashdata('error', 'No data received.');
            redirect('brgmasuk');
        }
    }

    public function delete_masuk($idmasuk) {
        if ($this->Brgmasuk_model->delete_masuk($idmasuk)) {
            redirect('brgmasuk');
        } else {
            // Handle deletion error
            $this->session->set_flashdata('error', 'Error deleting data.');
            redirect('brgmasuk');
        }
    }
    
    public function print_report() {
        $name = $this->input->get('name');
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $data['brg_masuk'] = $this->Brgmasuk_model->get_filtered_brg_masuk($name, $start_date, $end_date);
        $this->load->view('printmasuk_view', $data);
    }

    public function display_report() {
        $data['brg_masuk'] = $this->Brgmasuk_model->get_all_barang_masuk();  // Fetch all data if needed
        $this->load->view('cetaklapmasuk_view', $data);
    }
}
?>
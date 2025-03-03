<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brgmasuk_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Get all entries from brg_masuk with related data from stokbarang
    public function get_all_barang_masuk() {
        $this->db->select('bm.idmasuk, bm.idbarang, bm.nama_brg, bm.jumlah, bm.tanggal, bm.penerima, sb.desk');
        $this->db->from('brg_masuk bm');
        $this->db->join('stokbarang sb', 'bm.idbarang = sb.idbarang', 'left'); // Join with stokbarang
        $query = $this->db->get();
        return $query->result();
    }

    // Get all items from stokbarang
    public function get_all_nama_brg() {
        $this->db->select('idbarang, nama_brg, desk, stok');
        $query = $this->db->get('stokbarang');
        return $query->result();
    }

    // Insert a new entry into brg_masuk
    public function insert_masuk($data) {
        return $this->db->insert('brg_masuk', $data);
    }

    // Update an existing entry in brg_masuk
    public function update_masuk($id, $data) {
        $this->db->where('idmasuk', $id);
        return $this->db->update('brg_masuk', $data);
    }

    // Delete an entry from brg_masuk
    public function delete_masuk($idmasuk) {
        $this->db->where('idmasuk', $idmasuk);
        return $this->db->delete('brg_masuk');
    }

    // Get all entries for printing
    public function get_all_print_masuk() {
        $query = $this->db->get('brg_masuk');
        return $query->result();
    }

    // Get filtered entries based on penerima and date range
    public function get_filtered_brg_masuk($penerima, $start_date, $end_date) {
        if (!empty($penerima)) {
            $this->db->like('penerima', $penerima);
        }
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('tanggal >=', $start_date);
            $this->db->where('tanggal <=', $end_date);
        } elseif (!empty($start_date)) {
            $this->db->where('tanggal >=', $start_date);
        } elseif (!empty($end_date)) {
            $this->db->where('tanggal <=', $end_date);
        }
        $query = $this->db->get('brg_masuk');
        return $query->result();
    }

    // Update stock in stokbarang
    public function update_stok($nama_brg, $jumlah) {
        $this->db->set('stok', 'stok + ' . (int)$jumlah, FALSE); // Increment stock
        $this->db->where('nama_brg', $nama_brg);
        return $this->db->update('stokbarang');
    }

    // Get current stock for a specific item
    public function get_current_stock($nama_brg) {
        $this->db->select('stok');
        $this->db->where('nama_brg', $nama_brg);
        $query = $this->db->get('stokbarang');
        return $query->row(); // Return a single row
    }
}
?>
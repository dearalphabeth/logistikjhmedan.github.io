<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logistik_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Get all items in stock
    public function get_all_barang() {
        $query = $this->db->get('stokbarang'); 
        return $query->result();
    }

    // Insert new stock item
    public function insert_barang($data) {
        return $this->db->insert('stokbarang', $data);
    }

    // Update stock item
    public function update_barang($id, $data) {
        $this->db->where('idbarang', $id);
        return $this->db->update('stokbarang', $data);
    }

    // Delete stock item
    public function delete_barang($idbarang) {
        $this->db->where('idbarang', $idbarang);
        return $this->db->delete('stokbarang');
    }

    // Update stock quantity
    public function update_stok($nama_brg, $jumlah) {
        $this->db->select('stok');
        $this->db->where('nama_brg', $nama_brg);
        $query = $this->db->get('stokbarang');
        $result = $query->row();

        if ($result) {
            $new_stok = $result->stok + $jumlah;
            $this->db->where('nama_brg', $nama_brg);
            return $this->db->update('stokbarang', array('stok' => $new_stok));
        } else {
            return false;
        }
    }

    public function count_added_this_week($table) {
    $this->db->where('YEARWEEK(created_at, 1) = YEARWEEK(CURDATE(), 1)'); // Week-based query
    $this->db->from($table);
    return $this->db->count_all_results();
    }

    public function get_current_stock($nama_brg) {
        $this->db->select('stok');
        $this->db->where('nama_brg', $nama_brg);
        $query = $this->db->get('stokbarang');
        return $query->row() ? $query->row()->stok : 0; // Return stock or 0 if not found
    }
    

}

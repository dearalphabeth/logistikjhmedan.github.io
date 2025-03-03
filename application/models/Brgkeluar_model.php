<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brgkeluar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Get all entries from brg_keluar
    public function get_all_barang_keluar() {
        $this->db->select('bk.idkeluar, bk.idbarang, bk.nama_brg, bk.jumlah, bk.tanggal, bk.ambil, sb.desk');
        $this->db->from('brg_keluar bk');
        $this->db->join('stokbarang sb', 'bk.idbarang = sb.idbarang', 'left'); // Join with stokbarang
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_nama_brg() {
        $this->db->select('idbarang, nama_brg, desk, stok');
        $query = $this->db->get('stokbarang');
        return $query->result();
    }

    // Insert a new entry into brg_keluar
    public function insert_keluar($data) {
        return $this->db->insert('brg_keluar', $data);
    }

    // Update an existing entry in brg_keluar
    public function update_keluar($id, $data) {
        $this->db->where('idkeluar', $id);
        return $this->db->update('brg_keluar', $data);
    }

    // Delete an entry from brg_keluar
    public function delete_keluar($idkeluar) {
        $this->db->where('idkeluar', $idkeluar);
        return $this->db->delete('brg_keluar');
    }
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transaksi extends CI_Model {

    public function get_all_lokasi(){
        return $this->db->get('master_lokasi')->result_array();
    }
    public function get_all_item(){
        return $this->db->get('master_item')->result_array();
    }
    public function insert_transaksi($data){
        return $this->db->insert('transaksi_produksi',$data);
    }
    public function insert_user($data){
        return $this->db->insert('table_login',$data);
    }
    public function update_transaksi($data,$id){
        $this->db->where('id_transaksi', $id);
       $query =  $this->db->update('transaksi_produksi',$data);
        return $query;
    }
    public function delete_data($id){
        $this->db->where('id_transaksi', $id);
       $query =  $this->db->delete('transaksi_produksi');
        return $query;
    }

    public function get_all_transaction(){
        $db = $this->db;
        $db->select("
            transaksi.id_transaksi as id,
            DATE_FORMAT(transaksi.tanggal_transaksi, '%d %M %Y') as tanggal,
            item.kode_item as kode_item,
            item.nama_item as nama_item,
            lokasi.kode_lokasi as lokasi,
            lokasi.nama_lokasi as nama_lokasi,
            transaksi.qty_actual as qty,
            karyawan.NPK as kode_karyawan,
        ");
        $db->from('transaksi_produksi as transaksi');
        $db->join('master_item as item', 'transaksi.item = item.id_item', 'LEFT');
        $db->join('master_lokasi as lokasi', 'transaksi.lokasi = lokasi.id_lokasi', 'LEFT');
        $db->join('master_karyawan as karyawan', 'transaksi.NPK = karyawan.id_karyawan', 'LEFT');
         $result = $db->get()->result_array();
         return $result;
    }

    public function get_transaction_with_param($tanggal,$lokasi){
        $db = $this->db;
        $db->select("
            transaksi.id_transaksi as id,
            DATE_FORMAT(transaksi.tanggal_transaksi, '%d %M %Y') as tanggal,
            item.kode_item as kode_item,
            item.nama_item as nama_item,
            lokasi.kode_lokasi as lokasi,
            lokasi.nama_lokasi as nama_lokasi,
            transaksi.qty_actual as qty,
            karyawan.NPK as kode_karyawan,
        ");
        $db->from('transaksi_produksi as transaksi');
        $db->join('master_item as item', 'transaksi.item = item.id_item', 'LEFT');
        $db->join('master_lokasi as lokasi', 'transaksi.lokasi = lokasi.id_lokasi', 'LEFT');
        $db->join('master_karyawan as karyawan', 'transaksi.NPK = karyawan.id_karyawan', 'LEFT');
        if($tanggal != ''){
            $db->like('transaksi.tanggal_transaksi', $tanggal);
        }
        if($lokasi != ''){
            $db->where('transaksi.lokasi', $lokasi);
        }
         $result = $db->get()->result_array();
         return $result;
    }

    public function get_single_data($id){
      $db  = $this->db;
      $db->where('id_transaksi', $id);
      $result = $db->get('transaksi_produksi')->result_array();
      return $result;
    }

    public function get_total_karyawan()
    {
       return $this->db->count_all('master_karyawan');
    }
    public function get_total_item()
    {
       return $this->db->count_all('master_item');
    }
    public function get_total_lokasi()
    {
       return $this->db->count_all('master_lokasi');
    }
    public function get_total_transaksi()
    {
       return $this->db->count_all('transaksi_produksi');
    }
    public function get_achievement()
    {   $this->db->select('kode_acv');
       return $this->db->get('master_achievement')->result_array();
    }
    public function get_jumlah($id)
    {   $this->db->select('time_from');
        $this->db->where('id_acv', $id);
        $from = $this->db->get('master_achievement')->result_array();
        $fromnew = $from[0]['time_from'];

        $this->db->select('time_to');
        $this->db->where('id_acv', $id);
        $to = $this->db->get('master_achievement')->result_array();
        $tonew = $to[0]['time_to'];
        

        $this->db->select('SUM(qty_actual) as qty');
        $this->db->from('transaksi_produksi');
        $this->db->where("DATE_FORMAT(tanggal_transaksi,'%H:%i:%s') >=", $fromnew);
        $this->db->where("DATE_FORMAT(tanggal_transaksi,'%H:%i:%s') <=", $tonew);
        $result = $this->db->get()->result_array();
    return $result;
    }

    function cek_login($where){		
		return $this->db->get_where('table_login',$where);
	}	
    function get_npk($user){
        $where=array(
            'NPK'=>$user
        );		
		return $this->db->get_where('master_karyawan',$where);
	}	

}
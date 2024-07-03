<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sewing extends CI_Model {

    public function get_all_transaction(){
        $db = $this->db;
        $db->select("
            output.TrnDate as date,
            output.StyleCode as code,
            COUNT(DISTINCT output.SizeName) AS total_size,
            SUM(output.QtyOutput) AS total_output
        ");
        $db->from('LygSewingOutput AS output');
        $db->group_by('output.TrnDate');
        $db->group_by('output.StyleCode');
         $result = $db->get()->result_array();
         return $result;
    }

    public function get_table_header($code){
        $db = $this->db;
        $db->select('SizeName,SizeSort');
        $db->from('LygStyleSize');
        $db->where('StyleCode',$code);
        $result = $db->get()->result_array();
        return $result;
    }

    public function get_detail_transaction($date,$code){
        $db = $this->db;
        $data_table_header = $this->get_table_header($code);

        $select = "
        output.OperatorName AS operator,
       CONCAT(output.DestinationCode,' ( ',dest.DestinationName,' )') AS destination,
        SUM(output.QtyOutput) AS total_qty,
        ";
        foreach($data_table_header as $key){
            $select .= " SUM(CASE WHEN size.SizeName = '{$key["SizeName"]}' THEN output.QtyOutput ELSE 0 END) AS  '".$key["SizeName"] . "',";
        }
    $db->select($select);
    $db->from('LygSewingOutput AS output');
    $db->join('LygStyleSize AS size', 'output.StyleCode = size.StyleCode AND output.SizeName = size.SizeName');
    $db->join('LygDestination AS dest', 'output.DestinationCode = dest.DestinationCode');
    $db->group_by('output.OperatorName');
    $db->group_by('output.DestinationCode');
    $db->where('output.TrnDate', $date);
    $db->where('output.StyleCode', $code);
     $result = $db->get()->result_array();
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
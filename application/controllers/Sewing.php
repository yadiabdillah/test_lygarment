<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewing extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_sewing');
		
	}

	public function index() {
		
		redirect('transaksi/auth_login');
	}


	public function view_sewing() {
		if($this->session->userdata('status') != "login"){
			redirect(base_url("transaksi/auth_login"));
		}
		$data = array(
			'title' => "Sewing"
		);
		 	$data['transaksi'] = $this->Model_sewing->get_all_transaction();
		
		$this->load->view('dist/view_sewing', $data);
	}
	public function detail_data() {
		if($this->session->userdata('status') != "login"){
			redirect(base_url("transaksi/auth_login"));
		}
		$data = array(
			'title' => "Sewing"
		);
		$date = $this->input->get('date');
		$code = $this->input->get('code');
		$data['table_header'] = $this->Model_sewing->get_table_header($code);
		$data['transaksi'] = $this->Model_sewing->get_detail_transaction($date,$code);
		$data['code'] = $code;
		$data['date'] = $date;
		$this->load->view('dist/detail_sewing', $data);
	}

		
}

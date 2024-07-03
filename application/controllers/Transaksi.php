<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_transaksi');
		
	}

	public function index() {
		
		redirect('transaksi/auth_login');
	}

	public function auth_login() {
		$data = array(
			'title' => "Login"
		);
		$this->load->view('dist/auth-login', $data);
	}
	public function dashboard_transaksi() {
		if($this->session->userdata('status') != "login"){
			redirect(base_url("transaksi/auth_login"));
		}
		$data = array(
			'title' => "Dashboard"
		);
		$data['total_user'] 		= $this->Model_transaksi->get_total_karyawan();
		$data['total_item'] 		= $this->Model_transaksi->get_total_item();
		$data['total_lokasi'] 		= $this->Model_transaksi->get_total_lokasi();
		$data['total_transaksi'] 	= $this->Model_transaksi->get_total_transaksi();
		$data['avc'] = $this->Model_transaksi->get_achievement();
		$data['jumlah'] = array();
		$a = 1;
		foreach($data['avc'] as $key){
			$tempdata = $this->Model_transaksi->get_jumlah($a);
			if($tempdata[0]['qty'] == ''){
				$tempdata[0]['qty'] = 0;
			}
			array_push($data['jumlah'],$tempdata[0]['qty']);
			$a++;
		}
		$this->load->view('dist/dashboard_transaksi', $data);
	}


	public function view_input_data() {
		if($this->session->userdata('status') != "login"){
			redirect(base_url("transaksi/auth_login"));
		}
		date_default_timezone_set("Asia/Bangkok");
		$data = array(
			'title' => "Input Data"
		);
		$data['lokasi'] = $this->Model_transaksi->get_all_lokasi();
		$data['item'] = $this->Model_transaksi->get_all_item();
		$data['success'] = 0;
		$this->load->view('dist/input_data', $data);
	}

	public function input_data() {
		if($this->session->userdata('status') != "login"){
			redirect(base_url("transaksi/auth_login"));
		}
		date_default_timezone_set("Asia/Bangkok");
		$date 		= $this->input->post('tanggal');
		$date_new = date_create_from_format('Y-m-d\TH:i', $date);
		$datetime = date_format($date_new, 'Y-m-d H:i:s');
		$time 		= date("h:i:s");
		$date 		= $this->input->post('tanggal');
		$id 		= $this->input->post('id_transaksi');
		$user 		= $this->session->userdata('nama');
		$id_karyawan = $this->Model_transaksi->get_npk($user)->result_array();
		$data_insert = array(
			'NPK' 				=> $id_karyawan[0]['id_karyawan'],
			'lokasi' 			=> $this->input->post('lokasi'),
			'item' 				=> $this->input->post('item'),
			'qty_actual' 		=> $this->input->post('qty'),
			'tanggal_transaksi' => $datetime,
		);
		if($id == ''){
			$insert_data = $this->Model_transaksi->insert_transaksi($data_insert);
			$data = array(
				'title' => "Input Data"
			);
			$data['lokasi'] = $this->Model_transaksi->get_all_lokasi();
			$data['item'] = $this->Model_transaksi->get_all_item();
			if($insert_data){		
				$this->session->set_flashdata('sukses_transaksi', 1	);
				redirect('transaksi/view_input_data');		
			}else{
				$data['success'] = 0;
				
			}
			$this->load->view('dist/input_data', $data);
		}else{
			$update_data = $this->Model_transaksi->update_transaksi($data_insert,$id);
			if($update_data){	
				$this->session->set_flashdata('sukses_transaksi', 1	);
				redirect('transaksi/view_data');		
			}else{
				echo "gagal";
			}
			
		}

	}

	public function view_data() {
		if($this->session->userdata('status') != "login"){
			redirect(base_url("transaksi/auth_login"));
		}
		$data = array(
			'title' => "View Data"
		);
		$data['lokasi'] = $this->Model_transaksi->get_all_lokasi();
		$tanggal = $this->input->post('tanggal');
		$lokasi  = $this->input->post('lokasi');

		if($tanggal == '' && $lokasi == ''){
			$data['transaksi'] = $this->Model_transaksi->get_all_transaction();
		}else{
			$data['transaksi'] = $this->Model_transaksi->get_transaction_with_param($tanggal,$lokasi);
		}
		$this->load->view('dist/view_data', $data);
	}

	public function edit_data(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("transaksi/auth_login"));
		}
		$id = $this->input->get('id');
		$data = array(
			'title' => "Edit Data"
		);
		$data['lokasi'] = $this->Model_transaksi->get_all_lokasi();
		$data['item']   = $this->Model_transaksi->get_all_item();
		$data['single'] = $this->Model_transaksi->get_single_data($id);
		$this->load->view('dist/edit_data', $data);
	}
	public function hapus_data(){
		if($this->session->userdata('status') != "login"){
			redirect(base_url("transaksi/auth_login"));
		}
		$id = $this->input->get('id');
		$delete_data = $this->Model_transaksi->delete_data($id);
		if($delete_data){	
			$this->session->set_flashdata('sukses_transaksi', 2	);
			redirect('transaksi/view_data');		
		}else{
			echo "gagal";
		}
	}

	public function insert_user(){
		date_default_timezone_set("Asia/Bangkok");
		$password = 'admin';
		$time 		= date("Y-m-d h:i:s");
		
		$data = array(
			'username' => '10002',
			'password' => md5($password),
			'create_date' => $time,
			'create_by' => 'System'
			);

	$create = $this->Model_transaksi->insert_user($data);
	if($create){
		echo "berhasil";
		}else{
		echo "gagal";
		}
	}


	public function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);

		
		$cek = $this->Model_transaksi->cek_login($where)->num_rows();
		
		if($cek > 0){
			$data = $this->Model_transaksi->cek_login($where)->result_array();
			$data_session = array(
				'nama' => $username,
				'id_user' => $data[0]['id_login'],
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect('sewing/view_sewing');
 
		}else{
			$this->session->set_flashdata('hasil_login','gagal');
			redirect('transaksi/auth_login');
			echo "<script type='text/javascript'>
    alert('Username dan password salah !');
</script>";
		
		
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('transaksi/auth_login');
	}
	
}

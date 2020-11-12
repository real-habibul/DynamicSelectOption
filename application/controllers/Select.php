<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Select extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dynamic_model', '_dm');
	}

	public function index()
	{
		$data['provinsi'] = $this->_dm->getDataProv();
		$this->load->view('dynamicselect/index', $data);		
	}

	public function getKabupaten()
	{
		$idprov = $this->input->post('id');
		$data = $this->_dm->getDataKabupaten($idprov);
		$output = '<option value=""> --Pilih Kabupaten-- </option>';
		foreach($data as $row){
			$output .= '<option value="'.$row->id.'"> '.$row->nama.' </option>';
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function getKecamatan()
	{
		$idkabupaten = $this->input->post('id');
		$data = $this->_dm->getDataKecamatan($idkabupaten);
		$output = '<option value=""> --Pilih Kecamatan-- </option>';
		foreach($data as $row){
			$output .= '<option value="'.$row->id.'"> '.$row->nama.' </option>';
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function getDesa()
	{
		$iddesa = $this->input->post('id');
		$data = $this->_dm->getDataDesa($iddesa);
		$output = '<option value=""> --Pilih Desa-- </option>';
		foreach($data as $row){
			$output .= '<option value="'.$row->id.'"> '.$row->nama.' </option>';
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
}

/* End of file Select.php */
/* Location: ./application/controllers/Select.php */
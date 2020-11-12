<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dynamic_model extends CI_Model {

	public function getDataProv()
	{
		return $this->db->get('wilayah_provinsi')->result_array();
	}

	public function getDataKabupaten($idprov)
	{
		return $this->db->get_where('wilayah_kabupaten',['provinsi_id' => $idprov])->result();
	}

	public function getDataKecamatan($idkab)
	{
		return $this->db->get_where('wilayah_kecamatan',['kabupaten_id' => $idkab])->result();
	}

	public function getDataDesa($iddesa)
	{
		return $this->db->get_where('wilayah_desa',['kecamatan_id' => $iddesa])->result();
	}

}

/* End of file Dynamic_model.php */
/* Location: ./application/models/Dynamic_model.php */
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perjadin_model extends CI_Model
{
	// INPUT, LIST, MATRIX PERJADIN
	
	public function getAll()
	{
		// $this->db->select('perjadin.idPerjadin, perjadin.nip, perjadin.idKegiatan, perjadin.idAtribut, perjadin.tanggal, kegiatan.idKegiatan, kegiatan.namaKegiatan, atribut.idAtribut, pengguna.nip, pengguna.nama');
		$this->db->select('*')
			->from('perjadin')
			->join('activity', 'perjadin.activity_id = activity.activity_id')
			->join('attribute', 'perjadin.attribute_id = attribute.attribute_id')
			->join('user', 'perjadin.nip = user.nip');
		$query = $this->db->get();
		return $query->result();
	} //ambil semua data hasil join tabel perjadin, kegiatan, atribut, dan pengguna

	public function getByTime($time)
	{
		$this->db->select('*')
			->from('perjadin')
			->join('activity', 'perjadin.activity_id = activity.activity_id')
			->join('attribute', 'perjadin.attribute_id = attribute.attribute_id')
			->join('user', 'perjadin.nip = user.nip')
			->where('DATE_FORMAT(perjadin.date, "%Y-%m") =', $time);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	} //ambil data by month & year


	// LIST PERJADIN

	public function delete($idPerjadin)
	{
		return $this->db->delete($this->mytable, array('idPerjadin' => $idPerjadin));
	}


	// MATRIX PERJADIN

	public function perjadinMatrix()
	{
		$this->db->select('*')
			->from('user')
			->join('perjadin', 'user.nip = perjadin.nip', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}
}

?>
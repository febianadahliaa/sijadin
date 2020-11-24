<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perjadin_model extends CI_Model
{
	public function getAll()
	{
		// $this->db->select('perjadin.idPerjadin, perjadin.nip, perjadin.idKegiatan, perjadin.idAtribut, perjadin.tanggal, kegiatan.idKegiatan, kegiatan.namaKegiatan, atribut.idAtribut, pengguna.nip, pengguna.nama');
		$this->db->select('*')
			->from('perjadin')
			->join('kegiatan', 'perjadin.idKegiatan = kegiatan.idKegiatan')
			->join('atribut', 'perjadin.idAtribut = atribut.idAtribut')
			->join('pengguna', 'perjadin.nip = pengguna.nip');
		$query = $this->db->get();
		return $query->result();
	} //ambil semua data hasil join tabel perjadin, kegiatan, atribut, dan pengguna

	public function getUser()
	{
		return $this->db->get('pengguna');
	}

	public function getUserByNip($id)
	{
		$query = $this->db->get_where('pengguna', array('nip' => $id));
		return $query;
	}





	private $mytable = 'perjadin';

	public $idPerjadin;
	public $nip;
	public $idKegiatan;
	public $idAtribut;
	public $tanggal;

	public function rules()
	{
		return[
			['filed' => 'nip',
			'label' => 'Nip',
			'rules' => 'required'],

			['filed' => 'idKegiatan',
			'label' => 'IdKegiatan',
			'rules' => 'required'],

			['filed' => 'idAtribut',
			'label' => 'IdAtribut',
			'rules' => 'required'],

			['filed' => 'tanggal',
			'label' => 'Tanggal',
			'rules' => 'required']
		];
	} //mengembalikan sebuah array yg berisi rules (untuk validasi input)

	public function getAll_()
	{
		return $this->db->get($this->mytable)->result(); 
	} //mengambil semua data dari database (tabel perjadin)

	public function getById($idPerjadin)
	{
		return $this->db->get_where($this->mytable, ['idPerjadin' => $idPerjadin])->row();
	} //mengembalikan sebuah objek (yg sesuai dg id)

	public function save()
	{
		$post = $this->input->post(); //mengambil input yg dikirim dari form
		$this->idPerjadin = uniqid();
		$this->nip = $post['nip'];
		$this->idKegiatan = $post['idKegiatan'];
		$this->namaKegiatan = $post['namaKegiatan'];
		$this->tanggal = $post['tanggal'];
		return $this->db->insert($this->mytable, $this); //menyimpan data ke db
	}

	public function update()
	{
		$post = $this->input->post();
		$this->idPerjadin = $post['idPerjadin'];
		$this->nip = $post['nip'];
		$this->idKegiatan = $post['idKegiatan'];
		$this->namaKegiatan = $post['namaKegiatan'];
		$this->tanggal = $post['tanggal'];
		return $this->db->update($this->mytable, $this, array('idPerjadin' => $post['idPerjadin']));
	}

	public function delete($idPerjadin)
	{
		return $this->db->delete($this->mytable, array('idPerjadin' => $idPerjadin));
	}
}

?>
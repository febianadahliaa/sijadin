<?php defined('BASEPATH') or exit('No direct script access allowed');

class Perjadin_model extends CI_Model
{
	public function getAll()
	{
		// $this->db->select('perjadin.idPerjadin, perjadin.nip, perjadin.idKegiatan, perjadin.idAtribut, perjadin.tanggal, kegiatan.idKegiatan, kegiatan.namaKegiatan, atribut.idAtribut, pengguna.nip, pengguna.nama');
		$this->db->select('*')
			->from('perjadin')
			->join('activity', 'perjadin.activity_id = activity.id')
			->join('attribute', 'perjadin.attribute_id = attribute.id')
			->join('user', 'perjadin.nip = user.nip');
		$query = $this->db->get();
		return $query->result();
	} //ambil semua data hasil join tabel perjadin, kegiatan, atribut, dan pengguna

	public function getUser()
	{
		return $this->db->get('user');
	}

	public function getUserByNip($id)
	{
		$query = $this->db->get_where('user', array('nip' => $id));
		return $query;
	}





	private $mytable = 'perjadin';

	public $perjadin_id;
	public $nip;
	public $activity_id;
	public $attribute_id;
	public $date;

	public function rules()
	{
		return [
			[
				'filed' => 'nip',
				'label' => 'Nip',
				'rules' => 'required'
			],

			[
				'filed' => 'activity_id',
				'label' => 'ID Activity',
				'rules' => 'required'
			],

			[
				'filed' => 'attribute_id',
				'label' => 'ID Attribute',
				'rules' => 'required'
			],

			[
				'filed' => 'date',
				'label' => 'Date',
				'rules' => 'required'
			]
		];
	} //mengembalikan sebuah array yg berisi rules (untuk validasi input)

	public function getAll_()
	{
		return $this->db->get($this->mytable)->result();
	} //mengambil semua data dari database (tabel perjadin)

	public function getById($idPerjadin)
	{
		return $this->db->get_where($this->mytable, ['id' => $idPerjadin])->row();
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

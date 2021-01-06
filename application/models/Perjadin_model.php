<?php defined('BASEPATH') or exit('No direct script access allowed');

class Perjadin_model extends CI_Model
{
	public function getAll()
	{
		// $this->db->select('perjadin.idPerjadin, perjadin.nip, perjadin.idKegiatan, perjadin.idAtribut, perjadin.tanggal, kegiatan.idKegiatan, kegiatan.namaKegiatan, atribut.idAtribut, pengguna.nip, pengguna.nama');
		$this->db->from('perjadin')
			->join('activity_code', 'perjadin.activity_code = activity_code.activity_code')
			->join('activity', 'activity_code.activity_id = activity.activity_id')
			->join('attribute', 'activity_code.attribute_id = attribute.attribute_id')
			->join('user', 'perjadin.nip = user.nip');
		$query = $this->db->get();
		return $query->result();
	} //ambil semua data hasil join tabel perjadin, kegiatan, atribut, dan pengguna

	public function getMyPerjadinByMonth($nip, $month)
	{
		return $this->db->join('activity_code', 'perjadin.activity_code = activity_code.activity_code')
			->join('attribute', 'activity_code.attribute_id = attribute.attribute_id')
			->join('activity', 'activity_code.activity_id = activity.activity_id')
			->like('date', '-' . $month . '-')
			->get_where($this->mytable, ['nip' => $nip])->result();
	}

	// ???

	public function getUser()
	{
		return $this->db->get('user');
	}

	public function getAttr()
	{
		return $this->db->get('attribute');
	}

	public function getByNip($nip)
	{
		return $this->db->join('activity_code', 'perjadin.activity_code = activity_code.activity_code')
			->join('attribute', 'activity_code.attribute_id = attribute.attribute_id')
			->join('activity', 'activity_code.activity_id = activity.activity_id')
			->get_where($this->mytable, ['nip' => $nip])->result();
	}

	public function getActByAttr($attr_id)
	{
		// return $this->db->join('activity', 'activity_code.activity_id = activity.activity_id')
		// 	->get_where('activity_code', ['attribute_id' => $attr_id])->result();
		$query = $this->db->join('activity', 'activity_code.activity_id = activity.activity_id')
			->get_where('activity_code', ['attribute_id' => $attr_id]);
		$output = '<option value="">--Pilih Kegiatan--</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->activity_id . '">' . $row->activity_id . '-' . $row->activity . '</option>';
		}
		return $output;
	}

	public function getKode($attr_id, $act_id)
	{
		return $this->db->select('activity_code')
			->get_where('activity_code', ['attribute_id' => $attr_id, 'activity_id' => $act_id])->row();
	}

	public function getUserByNip($id)
	{
		return $this->db->get_where('user', array('nip' => $id));
	}




	private $mytable = 'perjadin';

	public $idPerjadin;
	public $nip;
	public $idKegiatan;
	public $idAtribut;
	public $tanggal;

	public function getAll_()
	{
		return $this->db->get($this->mytable)->result();
	} //mengambil semua data dari database (tabel perjadin)

	public function getById($idPerjadin)
	{
		return $this->db->get_where($this->mytable, ['idPerjadin' => $idPerjadin])->row();
	} //mengembalikan sebuah objek (yg sesuai dg id)

	public function insert()
	{
		$nip = $this->input->post('nip');
		$code = $this->input->post('code');
		$date = $this->input->post('date');

		$data = array(
			'perjadin_id' => uniqid(),
			'nip' => $nip,
			'activity_code' => $code,
			'date' => $date
		);

		return $this->db->insert($this->mytable, $data);
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
		return $this->db->delete($this->mytable, ['perjadin_id' => $idPerjadin]);
	}
}

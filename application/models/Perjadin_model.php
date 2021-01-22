<?php defined('BASEPATH') or exit('No direct script access allowed');

class Perjadin_model extends CI_Model
{
	private $mytable = 'perjadin';

	public function getAll()
	{
		$query = $this->db->join('activity_code', 'perjadin.activity_code = activity_code.activity_code')
			->join('activity', 'activity_code.activity_id = activity.activity_id')
			->join('attribute', 'activity_code.attribute_id = attribute.attribute_id')
			->join('user', 'perjadin.nip = user.nip')
			->get($this->mytable);
		return $query->result();
	} //ambil semua data hasil join tabel perjadin, kegiatan, atribut, dan pengguna

	public function getMaxMinYear()
	{
		return $this->db->query('SELECT MIN(date) as min,MAX(date) as max FROM ' . $this->mytable)
			->result();
	}

	public function getUser()
	{
		return $this->db->get('user')->result();
	}

	public function getAttr()
	{
		return $this->db->get('attribute')->result();
	}

	public function getAct()
	{
		return $this->db->get('activity')->result();
	}

	public function getMatrixByMonth($year, $month)
	{
		return $this->db->select('perjadin.nip, name, perjadin_id, activity_code, date')
			->join('user', 'perjadin.nip = user.nip', 'right')
			->like('date', $year . '-' . $month . '-')
			->get($this->mytable)->result();
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
		$query = $this->db->join('activity', 'activity_code.activity_id = activity.activity_id')
			->order_by('activity.activity_id', 'ASC')
			->get_where('activity_code', ['attribute_id' => $attr_id]);
		$output = '<option value="">--Pilih Kegiatan--</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->activity_id . '">' . $row->activity_id . '-' . $row->activity . '</option>';
		}
		return $output;
	}

	public function getOthersActByAttr($attr_id)
	{
		$queryMenu = "SELECT * 
						FROM activity
						WHERE activity_id 
						NOT IN (
							SELECT activity_id 
							FROM activity_code 
							WHERE attribute_id = '$attr_id'
						)
						ORDER BY activity_id ASC";
		$query = $this->db->query($queryMenu);
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

	public function getAll_()
	{
		return $this->db->get($this->mytable)->result();
	} //mengambil semua data dari database (tabel perjadin)

	public function getById($idPerjadin)
	{
		return $this->db->join('activity_code', 'perjadin.activity_code = activity_code.activity_code')
			->join('activity', 'activity_code.activity_id = activity.activity_id')
			->join('attribute', 'activity_code.attribute_id = attribute.attribute_id')
			->join('user', 'perjadin.nip = user.nip')
			->select('perjadin_id, user.nip, activity_code.activity_code, date, activity_code.attribute_id, activity_code.activity_id, activity, attribute')
			->get_where($this->mytable, ['perjadin_id' => $idPerjadin])->row();
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

	public function update($data, $perjadin_id)
	{
		return $this->db->update($this->mytable, $data, ['perjadin_id' => $perjadin_id]);
	}

	public function delete($idPerjadin)
	{
		return $this->db->delete($this->mytable, ['perjadin_id' => $idPerjadin]);
	}
}

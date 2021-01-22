<?php defined('BASEPATH') or exit('No direct script access allowed');

class Manajemen_model extends CI_Model
{
	// PEGAWAI

	public function getUser()
	{
		$query = $this->db->select('user.*, user_position.position')
			->from('user')
			->join('user_position', 'user.position_id = user_position.id', 'Left')
			->get();
		return $query->result();
	}

	public function insertUser()
	{
		$nip = $this->input->post('nip');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password_hash = password_hash($password, PASSWORD_DEFAULT);
		$role_id = $this->input->post('roleId');
		$gender = $this->input->post('gender');
		$position_id = $this->input->post('positionId');
		$phone = $this->input->post('phone');

		$data = [
			'nip' => $nip,
			'name' => $name,
			'email' => $email,
			'password' => $password_hash,
			'role_id' => $role_id,
			'gender' => $gender,
			'position_id' => $position_id,
			'phone' => $phone
		];

		return $this->db->insert('user', $data);
	}

	public function getRole()
	{
		return $this->db->get('user_role')->result();
	}

	public function getPosition()
	{
		return $this->db->get('user_position')->result();
	}

	public function deleteUser($userId)
	{
		return $this->db->delete('user', ['nip' => $userId]);
	}

	public function updatePassword($userId)
	{
		$password = $this->input->post('password');
		$password_hash = password_hash($password, PASSWORD_DEFAULT);

		$data = [
			'password' => $password_hash
		];
		return $this->db->update('user', $data, ['nip' => $userId]);
	}


	// KEGIATAN

	public function getAttr()
	{
		return $this->db->get('attribute')->result();
	}

	public function insertAttr($data)
	{
		return $this->db->insert('attribute', $data);
	}

	public function getOriAct()
	{
		return $this->db->get('activity')->result();
	}

	public function insertOriAct($data)
	{
		return $this->db->insert('activity', $data);
	}

	public function getAct()
	{
		$query = $this->db->select('activity_code.*, attribute.attribute, activity.activity')
			->from('activity_code')
			->join('attribute', 'activity_code.attribute_id = attribute.attribute_id', 'Left')
			->join('activity', 'activity_code.activity_id = activity.activity_id', 'Left')
			->get();
		return $query->result();
	}

	public function insertAct($data)
	{
		return $this->db->insert('activity_code', $data);
	}

	public function deleteAttr($attrId)
	{
		return $this->db->delete('attribute', ['attribute_id' => $attrId]);
	}

	public function deleteOriAct($oriActId)
	{
		return $this->db->delete('activity', ['activity_id' => $oriActId]);
	}

	public function deleteAct($actId)
	{
		return $this->db->delete('activity_code', ['activity_code' => $actId]);
	}
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function addMenu()
    {
        return $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
    }

    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function editMenu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
        return true; //BUAT APA?        
    }

    public function deleteMenu($id)
	{
        $this->db->where('id', $id);
		$this->db->delete('user_menu');
    }	
}

?>
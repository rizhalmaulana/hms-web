<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Globalmodel extends CI_Model 
{
	public function get_list($table, $where = FALSE )
	{
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get($table)->result();
	}	

	public function insert($table, $param)
	{
		$this->db->insert($table, $param);
		return $this->db->insert_id();
	}

	public function update($table, $set, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $set);
		return $this->db->affected_rows();
	}

	public function delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}

	public function join_table3($table,$table1,$table2,$on_join1,$on_join2,$select,$where)
	{
		$this->db->select($select); 
		$this->db->where($where);
		$this->db->from($table);
		$this->db->join($table1,$on_join1);
		$this->db->join($table2,$on_join2);
		$query = $this->db->get();
		return $query->result();
	}

	public function join_table2($table,$table1,$on_join1,$select,$where)
	{
		$this->db->select($select); 
		$this->db->where($where);
		$this->db->from($table);
		$this->db->join($table1,$on_join1);
		$query = $this->db->get();
		return $query->result();
	}


}
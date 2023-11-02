<?php

class User_model extends CI_Model
{

	function insertuser($data)
	{
		$this->db->insert('users', $data);
	}

	function checkPassword($password, $username)
	{
		// Updated the query to consider statusKaryawan as 'Aktif'
		$query = $this->db->query("SELECT * FROM users WHERE password='$password' AND username='$username' AND statusKaryawan='Active'");
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	public function getTotalActiveUsers()
	{
		$this->db->where('statusKaryawan', 'Active');
		return $this->db->count_all_results('users');
	}
	public function getEmployeeReport()
	{
		$this->db->select('NIP, Nama, JenisKelamin, jabatan, tanggalAktifJabatan, tanggalMasuk, statusKaryawan');
		$query = $this->db->get('users');
		return $query->result();
	}

	public function getUserByNIP($NIP)
	{
		$this->db->where('NIP', $NIP);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return null;
	}

	public function updateUser($NIP, $data)
	{
		$this->db->where('NIP', $NIP);
		$this->db->update('users', $data);
	}

	public function deleteUser($NIP)
	{
		$this->db->where('NIP', $NIP);
		$this->db->delete('users');
	}

	public function addUser($data)
	{
		$this->db->insert('users', $data);
	}

	public function getCurrentJabatan($nip)
	{
		$this->db->select('jabatan');
		$this->db->where('nip', $nip);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0) {
			return $query->row()->jabatan;
		}
		return null;
	}

	public function insertJobHistory($data)
	{
		return $this->db->insert('jobhistory', $data);
	}
	public function getEmployeeJobHistory($NIP)
	{
		$this->db->where('NIP', $NIP);
		$query = $this->db->get('jobhistory');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return [];
	}
}

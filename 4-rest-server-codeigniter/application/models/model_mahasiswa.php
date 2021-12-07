<?php

class Model_mahasiswa extends CI_Model
{

	public function getMahasiswa($id = null){
		if($id===null){
			$data = $this->db->get('mahasiswa');
		}else{
			$data = $this->db->get_where('mahasiswa', ['id' => $id]); 
		}
		
		return $data->result_array(); 
	}

	public function deleteMahasiswa($id){
		$this->db->delete('mahasiswa', ['id' => $id]);
		return $this->db->affected_rows();
	}

	public function tambah_mahasiswa($data){
		$this->db->insert('mahasiswa',$data);
		return $this->db->affected_rows();
	}

	public function update_mahasiswa($data, $id){
		$this->db->update('mahasiswa', $data, ['id' => $id]);
		return $this->db->affected_rows();
	}

}
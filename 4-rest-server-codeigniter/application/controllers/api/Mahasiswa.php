<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends CI_Controller
{

	use REST_Controller {
        REST_Controller::__construct as private __resTraitConstruct;
    }

	public function __construct(){
		parent::__construct();
		$this->__resTraitConstruct();
		$this->load->model('model_mahasiswa');
		$this->methods['index_get']['limit'] = 100; //limit key untuk get
	}

	public function index_get(){

		$id = $this->get('id'); //ambil id -> dari rest api

		if($id===null){
			$mahasiswa = $this->model_mahasiswa->getMahasiswa();  
		}else{
			$mahasiswa = $this->model_mahasiswa->getMahasiswa($id); 
		}

		if($mahasiswa){
			$this->response([
                'status' => true,
                'data' => $mahasiswa
            ], 200);  //200 = status ok
		}else{
			$this->response([
                'status' => false,
                'message' => 'id not found'
            ], 404); //404 = status not found
		}


	}

	public function index_delete(){
		$id = $this->delete('id'); //hapus berdasarkan id -> dari rest api
		if($id === null){
			$this->response([
                'status' => false,
                'message' => 'id tidak sesuai'
            ], 400); //400 = status bad request
		}else{
			if($this->model_mahasiswa->deleteMahasiswa($id) > 0){
				
				//ok
				$this->response([
	                'status' => true,
	                'id' => $id,
	                'message' => 'hapus berhasil.'
	            ], 200);  //200 = status ok
			
			}else{
				
				//id not found
				$this->response([
	                'status' => false,
	                'message' => 'id tidak sesuai'
	            ], 400); //400 = status bad request
			
			}
		}

	}

	public function index_post(){
		$data = [
			'nrp' => $this->post('nrp'),
			'nama' => $this->post('nama'),
			'email' => $this->post('email'),
			'jurusan' => $this->post('jurusan')
		];

		if($this->model_mahasiswa->tambah_mahasiswa($data) > 0){
			
			//ok
			$this->response([
                'status' => true,
                'message' => 'simpan berhasil.'
            ], 201);  //201 = created

		}else{
				
			//id not found
			$this->response([
                'status' => false,
                'message' => 'simpan gagal'
            ], 400); //400 = status bad request
			
		}
	}

	public function index_put(){
		$id = $this->put('id');
		$data = [
			'nrp' => $this->put('nrp'),
			'nama' => $this->put('nama'),
			'email' => $this->put('email'),
			'jurusan' => $this->put('jurusan')
		];

		if($this->model_mahasiswa->update_mahasiswa($data,$id) > 0){

			//ok
			$this->response([
                'status' => true,
                'message' => 'update berhasil.'
            ], 200);  //200 = ok

		}else{

			//bad request
			$this->response([
                'status' => false,
                'message' => 'update gagal'
            ], 400); //400 = status bad request

		}
	}

}
<?php 

use GuzzleHttp\Client;

class Mahasiswa_model extends CI_model {

    public function getAllMahasiswa()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/belajar_restAPI/4-rest-server-codeigniter/api/mahasiswa', [
                'query' => [
                    'X-API-KEY' => 'wpu123'
                ]
            ]
        );

        $result = json_decode($response->getBody()->getContents(),true);
        return $result['data']; //data dari nama parameter API (lihat di json)
    }


    public function getMahasiswaById($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/belajar_restAPI/4-rest-server-codeigniter/api/mahasiswa', [
                'query' => [
                    'X-API-KEY' => 'wpu123',
                    'id' => $id
                ]
            ]
        ); 

        $result = json_decode($response->getBody()->getContents(),true);
        return $result['data'][0]; //data dari nama parameter API (lihat di json) , [0] supaya data yang diambil 1 saja
    }

     public function hapusDataMahasiswa($id)
    {
        $client = new Client();
        $response = $client->request('DELETE', 'http://localhost/belajar_restAPI/4-rest-server-codeigniter/api/mahasiswa', [
                'form_params' => [
                    'X-API-KEY' => 'wpu123',
                    'id' => $id
                ]
            ]
        );

        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }


    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
            "X-API-KEY" => "wpu123"
        ];

        $client = new Client();
        $response = $client->request('POST', 'http://localhost/belajar_restAPI/4-rest-server-codeigniter/api/mahasiswa', [
                'form_params' => $data
            ]
        );

        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }


    public function ubahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true),
            "id" => $this->input->post('id', true),
            "X-API-KEY" => "wpu123"
        ];

        $client = new Client();
        $response = $client->request('PUT', 'http://localhost/belajar_restAPI/4-rest-server-codeigniter/api/mahasiswa', [
                'form_params' => $data
            ]
        );

        $result = json_decode($response->getBody()->getContents(),true);
        return $result;
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}
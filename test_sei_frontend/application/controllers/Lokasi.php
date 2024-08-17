<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('restclient');
    }
    
    public function create() {
        if ($this->input->post()) {
            $data = array(
                'namaLokasi' => $this->input->post('nama_lokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
            );
            $response = $this->restclient->post('http://localhost:8080/api/lokasi', $data);
            print_r($response); 
            redirect(site_url('dashboard'));
        }
        $this->load->view('lokasi_form');
    }
    
    public function edit($id) {
        if ($this->input->post()) {
            $data = array(
                'namaLokasi' => $this->input->post('nama_lokasi'),
                'negara' => $this->input->post('negara'),
                'provinsi' => $this->input->post('provinsi'),
                'kota' => $this->input->post('kota'),
            );
            $response = $this->restclient->put('http://localhost:8080/api/lokasi/'.$id, $data);
            print_r($response);
            redirect(site_url('dashboard'));
        }
        $data['lokasi'] = json_decode($this->restclient->get('http://localhost:8080/api/lokasi/'.$id), true);
        $this->load->view('lokasi_form', $data);
    }

    public function delete($id) {
        $this->restclient->delete('http://localhost:8080/api/lokasi/'.$id);
        redirect(site_url('dashboard'));
    }
}

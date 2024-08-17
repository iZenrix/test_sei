<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('restclient');
    }

    public function create() {
        if ($this->input->post()) {
            $lokasi_ids = $this->input->post('lokasi_id');
            $proyek_lokasi_data = array();
    
            if ($lokasi_ids) {
                foreach ($lokasi_ids as $id) {
                    $proyek_lokasi_data[] = array('id' => $id);
                }
            }
    
            $data = array(
                'namaProyek' => $this->input->post('nama_proyek'),
                'client' => $this->input->post('client'),
                'tglMulai' => $this->input->post('tgl_mulai') . 'T08:00:00',
                'tglSelesai' => $this->input->post('tgl_selesai') . 'T08:00:00',
                'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
                'keterangan' => $this->input->post('keterangan'),
                'lokasi' => $proyek_lokasi_data
            );
    
            $response = $this->restclient->post('http://localhost:8080/api/proyek', $data);
    
            redirect(site_url('dashboard'));
        }
    
        // Ambil data lokasi dari API untuk form
        $data['lokasi_data'] = json_decode($this->restclient->get('http://localhost:8080/api/lokasi'), true);
        $this->load->view('proyek_form', $data);
    }
    
    

    public function edit($id) {
        if ($this->input->post()) {
            $lokasi_ids = $this->input->post('lokasi_id');
            $proyek_lokasi_data = array();
    
            if ($lokasi_ids) {
                foreach ($lokasi_ids as $lokasi_id) {
                    $proyek_lokasi_data[] = array('id' => $lokasi_id);
                }
            }
            $data = array(
                'namaProyek' => $this->input->post('nama_proyek'),
                'client' => $this->input->post('client'),
                'tglMulai' => $this->input->post('tgl_mulai') . 'T08:00:00',
                'tglSelesai' => $this->input->post('tgl_selesai') . 'T08:00:00',
                'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
                'keterangan' => $this->input->post('keterangan'),
                'lokasi' => $proyek_lokasi_data
            );
            
            $json_data = json_encode($data);

            echo '<pre>';
            print_r($data);
            echo '</pre>';
    
            $response = $this->restclient->put('http://localhost:8080/api/proyek/'.$id, $data);

            echo '<pre>';
            print_r($response);
            echo '</pre>';
            redirect(site_url('dashboard'));
        }
    
        $response = $this->restclient->get('http://localhost:8080/api/proyek/'.$id);
        $data['proyek'] = json_decode($this->restclient->get('http://localhost:8080/api/proyek/'.$id), true);
        $data['lokasi_data'] = json_decode($this->restclient->get('http://localhost:8080/api/lokasi'), true);
        
        $this->load->view('proyek_form', $data);
    }
    

    public function delete($id) {
        $this->restclient->delete('http://localhost:8080/api/proyek/'.$id);
        redirect(site_url('dashboard'));
    }
}

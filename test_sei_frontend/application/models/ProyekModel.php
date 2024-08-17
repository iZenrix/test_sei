<?php
class Proyek_model extends CI_Model {

    private $api_url = 'URL_REST_API_ANDA';

    public function get_all_proyek()
    {
        $response = file_get_contents($this->api_url . '/proyek');
        return json_decode($response, true);
    }

    public function get_proyek_by_id($id)
    {
        $response = file_get_contents($this->api_url . '/proyek/' . $id);
        return json_decode($response, true);
    }

    public function add_proyek($data)
    {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context  = stream_context_create($options);
        return file_get_contents($this->api_url . '/proyek', false, $context);
    }

    public function update_proyek($id, $data)
    {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'PUT',
                'content' => http_build_query($data),
            ),
        );
        $context  = stream_context_create($options);
        return file_get_contents($this->api_url . '/proyek/' . $id, false, $context);
    }

    public function delete_proyek($id)
    {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'DELETE',
            ),
        );
        $context  = stream_context_create($options);
        return file_get_contents($this->api_url . '/proyek/' . $id, false, $context);
    }

    public function get_all_lokasi()
    {
        $response = file_get_contents($this->api_url . '/lokasi');
        return json_decode($response, true);
    }

    public function add_lokasi($data)
    {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ),
        );
        $context  = stream_context_create($options);
        return file_get_contents($this->api_url . '/lokasi', false, $context);
    }

    public function update_lokasi($id, $data)
    {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'PUT',
                'content' => http_build_query($data),
            ),
        );
        $context  = stream_context_create($options);
        return file_get_contents($this->api_url . '/lokasi/' . $id, false, $context);
    }

    public function delete_lokasi($id)
    {
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'DELETE',
            ),
        );
        $context  = stream_context_create($options);
        return file_get_contents($this->api_url . '/lokasi/' . $id, false, $context);
    }
}

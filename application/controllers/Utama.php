<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utama extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function  index()
    {
        $this->load->view('utama');
    }
    public function hitung()
    {
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $nilai = $this->input->post('nilai');
        $tanggal = $this->input->post('tanggal');
        date_default_timezone_set('Asia/Jakarta');
        $residu = $harga / $nilai;
        $penyusutan = ($harga - $residu) / $nilai;
        $tmp = $harga;
        echo "Harga Beli :" . $harga . "<br>";
        echo "Residu :" . $residu . "<br>";
        echo "Penyusutan/Tahun :" . $penyusutan . "<br>";
        for ($i = 1; $i <= $nilai; $i++) {
            $tambah = date('Y-m-d', strtotime('+' . $i . 'year', strtotime($tanggal)));
            $tmp = $tmp - $penyusutan;
            echo $tambah . " = " . $tmp . "<br>";
        }
    }
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Puskesmas extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Petugas_model");
        $this->load->model("Regisanak_model");
        $this->load->model("Pencatatan_model");
        $this->load->model('Mjadwal');
        $this->load->model('Wilayah_model');
        $this->load->model("Mpetugas");
        $this->load->model("Petugas_model");
        $this->load->model('pasienrujukan_model');
        $this->load->model('M_Admin');
        $this->load->model('ibuhamil_model');
        $this->load->model('pemeriksaan_model');
        $this->load->model("pasienrujukan_modelP");
        
        if($this->Petugas_model->isNotLogin()) redirect(site_url('posyandu/PetugasPosiandu'));

    }

    public function index()
    {
        // $this->Petugas_model->setWilayah();
        $data['ibu'] = $this->ibuhamil_model->countAllData();
		$data['pemeriksaan'] = $this->pemeriksaan_model->countAllData();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas',$data);
        $this->load->view('admin/template/footer');
    }

    public function kodeAkses()
    {
        $data = [
            'kodeAkses' => $this->M_Admin->getKodeAkses('Puskesmas')->result(),
        ];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_kodeAkses',$data);
        $this->load->view('admin/template/footer');
    }

    public function editKodeAkses($id)
    {
        $data = [
            'kodeAkses' => $this->M_Admin->getKode($id)->row(),
        ];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_editkodeAkses',$data);
        $this->load->view('admin/template/footer');
    }

    public function updateKode()
    {
        $id = $this->input->post('id_kode');
        $data = [
            'password' => $this->input->post('kode'),
        ];
        $this->M_Admin->update('password_akses', $id, $data);
        redirect('admin/puskesmas/kodeAkses');
    }

    public function ibuHamil()
    {
        $data['ibuhamil'] = $this->ibuhamil_model->getAll();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_ibuHamil',$data);
        $this->load->view('admin/template/footer');
    }

    public function pemeriksaanIbuHamil()
    {
        $pemeriksaan = $this->pemeriksaan_model;
        
        $data['pemeriksaans'] = $pemeriksaan->getAll();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_pemeriksaanIbuHamil',$data);
        $this->load->view('admin/template/footer');
    }

    public function pasienRujukan()
    {
        
        $data["pasienrujukans"] = $this->pasienrujukan_modelP->getAll();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_dataPasienRujukan',$data);
        $this->load->view('admin/template/footer');
    }

    public function dataPetugas()
    {
        
        $petugas = $this->Mpetugas;
        $data['daftarpetugas'] = $petugas->getAll();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_dataPetugas',$data);
        $this->load->view('admin/template/footer');
    }

    public function laporanPuskesmas()
    {
        
        $data['ibuhamils'] = $this->ibuhamil_model->getAll();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/puskesmas_laporan',$data);
        $this->load->view('admin/template/footer');
    }





}



?>
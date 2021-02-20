<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Posyandu extends CI_Controller {
    
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
        
        if($this->Petugas_model->isNotLogin()) redirect(site_url('posyandu/PetugasPosiandu'));

    }

    public function index()
    {
        // $this->Petugas_model->setWilayah();

        $tamp["jmlDaftar"] = $this->Regisanak_model->getCount();
        $tamp["jmlPencatatan"] = $this->Pencatatan_model->getCount();
        $tamp["jmlLaporan"] = $this->Pencatatan_model->getCountLaporan();
        $tamp["jmlHistory"] = $this->Pencatatan_model->getCountHistory();
        $tamp["cek"] = array();
        $bln = "";
        $tahun = gmdate("Y", time()+60*60*8);
        for ($i=0; $i <12 ; $i++) { 
            if ($i+1<=9) {
                $bln = "0".($i+1);                
            }else{
                $bln = ($i+1);
            }$cek = $this->Regisanak_model->getlike($tahun,$bln);
                $tamp["cek"][$i]=$cek[0]->jml;
                //echo $tamp["cek"][$i]."<br>";
        }

        $ubah = gmdate("Y-m-d", time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tahun = $pecah[0];

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu',$tamp);
        $this->load->view('admin/template/footer');
    }

    public function kodeAkses()
    {
        $data = [
            'kodeAkses' => $this->M_Admin->getKodeAkses('Posyandu')->result(),
        ];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_kodeAkses',$data);
        $this->load->view('admin/template/footer');
    }

    public function editKodeAkses($id)
    {
        $data = [
            'kodeAkses' => $this->M_Admin->getKode($id)->row(),
        ];
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_editkodeAkses',$data);
        $this->load->view('admin/template/footer');
    }

    public function updateKode()
    {
        $id = $this->input->post('id_kode');
        $data = [
            'password' => $this->input->post('kode'),
        ];
        $this->M_Admin->update('password_akses', $id, $data);
        redirect('admin/posyandu/kodeAkses');
    }

    public function jadwalPosyandu()
    {
        //fungsi default
        $jadwal = $this->Mjadwal->selectData();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $this->load->view('admin/posyandu_jadwal', [
            'data' => $jadwal, //model ke view
        ]);
        $this->load->view('admin/template/footer');
    }

    public function tambahJadwal()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data = [
            'data' => $this->Mjadwal->selectData(),
            'login' => $this->session->userdata(),
            'petugas' => $this->M_Admin->getAllPetugas()->result_array(),
            'wilayah' => $this->M_Admin->getAllWilayah(), //model ke view
        ];
        $this->load->view('admin/posyandu_tambahJadwal', $data);
        $this->load->view('admin/template/footer');
    }

    public function editJadwal($id)
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data = [
            'data' => $this->Mjadwal->selectData(),
            'current' => $this->M_Admin->getJadwal($id)->row(),
            'petugas' => $this->M_Admin->getAllPetugas()->result_array(),
            'wilayah' => $this->M_Admin->getAllWilayah(), //model ke view
        ];
        $this->load->view('admin/posyandu_ubahJadwal', $data);
        $this->load->view('admin/template/footer');
    }

    public function addJadwal()
    {
        $data = [
            'id_jadwal' => $this->input->post('id_jadwal'),
            'nama' => $this->input->post('nama_petugas'),
            'bln' => $this->input->post('bulan'),
            'thn' => $this->input->post('tahun'),
            'wilayah' => $this->input->post('wilayah'),
        ];
        $this->M_Admin->insert('jadwal', $data);
        redirect('admin/posyandu/jadwalPosyandu');
    }

    public function ubahJadwal()
    {
        $id = $this->input->post('id_jadwal');
        $data = [
            'nama' => $this->input->post('nama_petugas'),
            'bln' => $this->input->post('bulan'),
            'thn' => $this->input->post('tahun'),
            'wilayah' => $this->input->post('wilayah'),
        ];

        $this->M_Admin->update('jadwal', $id, $data);
        redirect('admin/posyandu/jadwalPosyandu');
    }

    public function deleteJadwal($id)
    {
        $this->M_Admin->delete('jadwal', ['id_jadwal' => $id]);
        redirect('admin/posyandu/jadwalPosyandu');
    }

    public function wilayahPosyandu()
    {
        //fungsi default
        $wilayah = $this->Wilayah_model->getAll();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $this->load->view('admin/posyandu_wilayah', [
            'data' => $wilayah, //model ke view
        ]);
        $this->load->view('admin/template/footer');
    }

    public function tambahWilayah()
    {
        $wilayah = $this->Wilayah_model->getAll();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $this->load->view('admin/posyandu_tambahWilayah', [
            'data' => $wilayah, //model ke view
        ]);
        $this->load->view('admin/template/footer');
    }

    public function addWilayah()
    {
        $data = [
            'nama_wilayah' => $this->input->post('nama_wilayah'),
            'kelurahan' => $this->input->post('kelurahan'),
            'rw' => $this->input->post('rw'),
            'rt' => $this->input->post('rt'),
            'nama_posyandu' => $this->input->post('nama_posyandu'),
        ];
        $this->M_Admin->insert('wilayah', $data);
        redirect('admin/posyandu/posyandu_wilayah');
    }

    public function editWilayah($id)
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $data = [
            'data' => $this->Mjadwal->selectData(),
            'current' => $this->M_Admin->getwilayah($id)->row(),
            'petugas' => $this->M_Admin->getAllPetugas()->result_array(),
            'wilayah' => $this->M_Admin->getAllWilayah(), //model ke view
        ];
        $this->load->view('admin/posyandu_ubahWilayah', $data);
        $this->load->view('admin/template/footer');
    }

    public function ubahWilayah()
    {
        $id = $this->input->post('id_wilayah');
        $data = [
            'nama_wilayah' => $this->input->post('nama_wilayah'),
            'kelurahan' => $this->input->post('kelurahan'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'nama_posyandu' => $this->input->post('nama_posyandu'),
        ];

        $this->M_Admin->update('wilayah', $id, $data);
        redirect('admin/posyandu/wilayahPosyandu');
    }
    
    public function dataPetugas()
    {
        $petugas = $this->Mpetugas;
        $data['daftarpetugas'] = $petugas->getAll();
        
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');

        $this->load->view('admin/posyandu_petugas', $data);
        $this->load->view('admin/template/footer');
    }

    public function daftarPasien()
    {
        $data["pendaftaran"] = $this->Regisanak_model->getAll();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_daftarPasien', $data);
        $this->load->view('admin/template/footer');
    }

    public function pencatatanMedis(){
    	$data["pencatatan"] = $this->Pencatatan_model->get_by_role();
    	$this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_pencatatanMedis',$data);
        $this->load->view('admin/template/footer');
    }

    public function laporan(){
    	$data["pendaftaran"] = $this->Pencatatan_model->getAllHistory2();
    	$this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_laporan',$data);
        $this->load->view('admin/template/footer');
    }

    public function historyLaporan(){
        $data["history"] = $this->Pencatatan_model->getAllHistory();
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/posyandu_historyLaporan',$data);
        $this->load->view('admin/template/footer');
    }

    public function pasienRujukan()
    {
        $data["pasienrujukans"] = $this->pasienrujukan_model->getAll();
    	$this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
		$this->load->view('admin/posyandu_pasienRujukan', $data);
		$this->load->view('admin/template/footer');
    }
    


}
    
?>
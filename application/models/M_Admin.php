<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{

    public function getAllPetugas()
    {
        return $this->db->get('petugas');
    }

    public function getAllWilayah()
    {
        return $this->db->get('wilayah')->result_array();
    }

    public function insert($table, $data)
    {
        if ($table == 'jadwal') {
            $this->db->insert($table, $data);
        }elseif ($table == 'wilayah') {
            $this->db->insert($table, $data);
        }
    }

    public function getJadwal($id)
    {
        return $this->db->get_where('jadwal', array('id_jadwal' => $id));
    }

    public function getwilayah($id)
    {
        return $this->db->get_where('wilayah', array('id_wilayah' => $id));
    }

    public function update($table, $id, $data)
    {
        if ($table == 'jadwal') {
            $this->db->where('id_jadwal', $id);
            $this->db->update($table, $data);
        }elseif ($table == 'wilayah') {
            $this->db->where('id_wilayah', $id);
            $this->db->update($table, $data);
        }elseif ($table == 'password_akses') {
            $this->db->where('id_password', $id);
            $this->db->update($table, $data);
        }
        
    }

    public function delete($table, $id )
    {
        if ($table == 'jadwal') {
            $this->db->delete($table, $id);
        }
    }

    public function cekKodeAdmin()
    {
        return $this->db->get_where('password_akses', [
            'role' => 'Admin',
        ])
        ->row_array();
    }

    public function getKodeAkses($role)
    {
        if ($role == 'Posyandu') {
            return $this->db->get_where('password_akses', ['role' => $role]);
        } elseif ($role == 'Puskesmas') {
            return $this->db->get_where('password_akses', ['role' => $role]);
        }
    }

    public function getKode($id)
    {
        return $this->db->get_where('password_akses', ['id_password' => $id]);
    }

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegistModel extends CI_Model
{
    function baru()
    {
        $this->db->from('tanggungan');
        $this->db->join('tb_santri', 'ON tb_santri.nis=tanggungan.nis');
        $this->db->where('tb_santri.ket', 'baru');
        return $this->db->get();
    }

    function lama()
    {
        $this->db->from('tanggungan');
        $this->db->join('tb_santri', 'ON tb_santri.nis=tanggungan.nis');
        $this->db->where('tb_santri.ket', 'lama');
        return $this->db->get();
    }

    function hapus($table, $where)
    {
        $this->db->where('id_regist', $where);
        $this->db->delete($table);
    }

    function getId($id)
    {
        $this->db->from('regist_sm');
        $this->db->join('tb_santri', 'ON tb_santri.nis=regist_sm.nis');
        $this->db->where('regist_sm.id_regist', $id);
        return $this->db->get();
    }

    function apikey()
    {
        $this->db->select('*');
        $this->db->from('api');
        return $this->db->get();
    }

    function noBp()
    {
        $this->db->from('tb_santri');
        $this->db->where('NOT EXISTS (SELECT * FROM tanggungan WHERE tanggungan.nis=tb_santri.nis)', '', false);
        $this->db->where('ket', 'baru');
        return $this->db->get();
    }

    function tambah($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function santriNis($data)
    {
        $this->db->from('tb_santri');
        $this->db->where('nis', $data);
        return $this->db->get();
    }

    function tgnNis($data)
    {
        $this->db->from('tanggungan');
        $this->db->where('nis', $data);
        return $this->db->get();
    }

    function byrSum($nis)
    {
        $this->db->select_sum('nominal');
        $this->db->from('regist_sm');
        $this->db->where('nis', $nis);
        return $this->db->get();
    }

    function byr($nis)
    {
        $this->db->from('regist_sm');
        $this->db->where('nis', $nis);
        return $this->db->get();
    }

    function edit($table, $data, $where)
    {
        $this->db->where('nis', $where);
        $this->db->update($table, $data);
    }

    function edit2($table, $data, $where)
    {
        $this->db->where('id_regist', $where);
        $this->db->update($table, $data);
    }

    function noBpLama()
    {
        $this->db->from('tb_santri');
        $this->db->where('NOT EXISTS (SELECT * FROM bp_daftar WHERE bp_daftar.nis=tb_santri.nis)', '', false);
        $this->db->where('ket', 'lama');
        return $this->db->get();
    }

    function getTgn($jkl, $ket)
    {
        $this->db->from('biaya');
        $this->db->where('jkl', $jkl);
        $this->db->where('ket', $ket);
        return $this->db->get();
    }

    function getby($tbl, $where, $dtwhere)
    {
        $this->db->from($tbl);
        $this->db->where($where, $dtwhere);
        return $this->db->get();
    }

    function getBySum($tbl, $where, $dtwhere, $sum)
    {
        $this->db->select_sum($sum);
        $this->db->from($tbl);
        $this->db->where($where, $dtwhere);
        return $this->db->get();
    }
}

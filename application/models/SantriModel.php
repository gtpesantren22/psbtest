<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SantriModel extends CI_Model
{
    function baru()
    {
        $this->db->where('ket', 'baru');
        $this->db->where('lembaga <>', 'MI');
        $this->db->where('lembaga <>', 'RA');
        $this->db->from('tb_santri');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get();
    }

    function lama()
    {
        $this->db->where('ket', 'lama');
        $this->db->from('tb_santri');
        return $this->db->get();
    }

    function santriNis($nis)
    {
        $this->db->where('nis', $nis);
        $this->db->from('tb_santri');
        return $this->db->get();
    }

    function agama()
    {
        $this->db->from('agama');
        return $this->db->get();
    }

    function edit($table, $data, $where)
    {
        $this->db->where('nis', $where);
        $this->db->update($table, $data);
    }

    function pend()
    {
        $this->db->select('*');
        $this->db->from('pend');
        return $this->db->get();
    }

    function pkj()
    {
        $this->db->select('*');
        $this->db->from('pkj');
        return $this->db->get();
    }

    function hasil()
    {
        $this->db->select('*');
        $this->db->from('hasil');
        return $this->db->get();
    }

    function getprov()
    {
        $this->db->order_by('nama', 'ASC');
        return $this->db->from('provinsi')->get()->result();
    }

    function getKab($id_provinsi)
    {
        $this->db->where('id_prov', $id_provinsi);
        $this->db->order_by('nama', 'ASC');
        return $this->db->from('kabupaten')->get()->result();
    }
    function getKec($id_kab)
    {
        $this->db->where('id_kab', $id_kab);
        $this->db->order_by('nama', 'ASC');
        return $this->db->from('kecamatan')->get()->result();
    }
    function getKel($id_kec)
    {
        $this->db->where('id_kec', $id_kec);
        $this->db->order_by('nama', 'ASC');
        return $this->db->from('kelurahan')->get()->result();
    }

    function getSkl($npsn)
    {
        $this->db->where('npsn', $npsn);
        $this->db->from('sekolah');
        return $this->db->get()->row();
    }

    function baruLmb($lmb)
    {
        $this->db->where('lembaga', $lmb);
        $this->db->where('ket', 'baru');
        $this->db->from('tb_santri');
        return $this->db->get();
    }

    function apikey()
    {
        $this->db->select('*');
        $this->db->from('api');
        return $this->db->get();
    }

    public function getBy($tbl, $wh, $dtwh)
    {
        $this->db->where($wh, $dtwh);
        $this->db->from($tbl);
        return $this->db->get();
    }

    public function getByGroup($tbl, $wh, $dtwh, $gr)
    {
        $this->db->from($tbl);
        $this->db->where($wh, $dtwh);
        $this->db->group_by($gr);
        return $this->db->get();
    }

    public function getByGroup2($tbl, $wh, $dtwh, $wh2, $dtwh2, $gr)
    {
        $this->db->from($tbl);
        $this->db->where($wh, $dtwh);
        $this->db->where($wh2, $dtwh2);
        $this->db->group_by($gr);
        return $this->db->get();
    }

    public function update($tbl, $data, $wh, $dtwh)
    {
        $this->db->where($wh, $dtwh);
        $this->db->update($tbl, $data);
    }

    function getBySum($tbl, $where, $dtwhere, $sum)
    {
        $this->db->select_sum($sum);
        $this->db->from($tbl);
        $this->db->where($where, $dtwhere);
        return $this->db->get();
    }

    function simpan($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function getTempat()
    {
        $this->db->select('tb_santri.nama, lemari_data.*');
        $this->db->from('lemari_data');
        $this->db->join('tb_santri', 'lemari_data.nis=tb_santri.nis');
        $this->db->where('tb_santri.lembaga !=', 'RA');
        $this->db->where('tb_santri.lembaga !=', 'MI');
        return $this->db->get();
    }

    function getBy2($table, $where1, $dtwhere1, $where2, $dtwhere2)
    {
        $this->db->where($where1, $dtwhere1);
        $this->db->where($where2, $dtwhere2);
        return $this->db->get($table);
    }

    function getBy2Ord($table, $where1, $dtwhere1, $where2, $dtwhere2, $ord)
    {
        $this->db->where($where1, $dtwhere1);
        $this->db->where($where2, $dtwhere2);
        $this->db->order_by($ord, 'ASC');
        return $this->db->get($table);
    }
}

<?php

class Penyewaan_model extends CI_model
{
    public function getPenyewaanUser($id)
    {

        $this->db->select('sewa1.*, alat.nama_alat AS nama_alat, sewa_status.status AS status_sewa');
        $this->db->from('sewa1');
        $this->db->join('alat', 'alat.id_alat = sewa1.id_alat');
        $this->db->join('user', 'user.id = sewa1.id_penyewa');
        $this->db->join('sewa_status', 'sewa_status.id_status = sewa1.status_sewa');
        $this->db->order_by('sewa1.id_sewa', "asc");
        if ($id) {
            $this->db->where('sewa1.id_penyewa', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getPemesanan($id = null)
    {
        $this->db->select('pemesanan.*, produk.nama_produk AS nama_produk, user.name as nama_pembeli, pemesanan_status.status as status_pemesanan');
        $this->db->from('pemesanan');
        $this->db->join('produk', 'produk.id_produk = pemesanan.id_produk');
        $this->db->join('user', 'user.id = pemesanan.id_pembeli');
        $this->db->join('pemesanan_status', 'pemesanan_status.id_status = pemesanan.status_pemesanan');
        $this->db->order_by('pemesanan.tanggal_pemesanan', "asc");
        if ($id != null) {
            $this->db->where('id_pemesanan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getSewa($id = null)
    {
        $this->db->select('sewa1.*, alat.nama_alat AS nama_alat, user.name as nama_penyewa, sewa_status.status as status_sewa');
        $this->db->from('sewa1');
        $this->db->join('alat', 'alat.id_alat = sewa1.id_alat');
        $this->db->join('user', 'user.id = sewa1.id_penyewa');
        $this->db->join('sewa_status', 'sewa_status.id_status = sewa1.status_sewa');
        $this->db->order_by('sewa1.tanggal_sewa', "asc");
        if ($id != null) {
            $this->db->where('id_sewa', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function input_data($data)
    {
        $this->db->insert('sewa1', $data);
    }

    public function delete_data($id_sewa)
    {
        $this->db->where('id_sewa', $id_sewa);
        return $this->db->delete('sewa1');
    }

    public function sewaEdit($id_sewa, $id_alat, $nama_penyewa, $jumlah, $totaljam_sewa, $total_harga, $tanggal_pakai, $tanggal_selesai, $alamat, $tanggal_sewa, $status_sewa)
    {
        $this->db->set('id_alat', $id_alat);
        $this->db->set('nama_penyewa', $nama_penyewa);
        $this->db->set('jumlah', $jumlah);
        $this->db->set('totaljam_sewa', $totaljam_sewa);
        $this->db->set('total_harga', $total_harga);
        $this->db->set('tanggal_pakai', $tanggal_pakai);
        $this->db->set('tanggal_selesai', $tanggal_selesai);
        $this->db->set('alamat', $alamat);
        $this->db->set('tanggal_sewa', $tanggal_sewa);
        $this->db->set('status_sewa', $status_sewa);
        $this->db->where('id_sewa', $id_sewa);
        return $this->db->update('sewa1');
    }

    public function getAlat()
    {
        $this->db->select('*');
        $this->db->from('alat');
        return $this->db->get()->result_array();
    }


    public function getOperator()
    {
        $this->db->select('id_alat, operator');
        $this->db->from('alat');
        return $this->db->get()->result_array();
    }

    public function getPenyewa()
    {
        $this->db->select('nama_penyewa');
        $this->db->from('sewa1');
        return $this->db->get()->result_array();
    }

    public function getSewaById($id_sewa)
    {
        return $this->db->get_where('sewa1', ['id_sewa' => $id_sewa])->row_array();
    }

    public function selesaiSewa($id_sewa)
    {

        $this->db->set('status_sewa', 2);
        $this->db->where('id_sewa', $id_sewa);
        return $this->db->update('sewa1');
    }
}
                                                                                                                              
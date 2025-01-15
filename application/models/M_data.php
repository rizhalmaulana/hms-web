<?php

class M_data extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function cek_login( $table, $where ) {
        return $this->db->get_where( $table, $where );
    }

    // FUNGSI CRUD
    // fungsi untuk mengambil data dari database

    function get_data($table) {
        return $this->db->get( $table );
    }

    function get_table($table, $where, $orderbyfield, $orderby)
    {
        $this->db->order_by($orderbyfield, $orderby);

        if($where!="") {
            $this->db->where($where);
        }

        $query = $this->db->get($table);
        return $query; 
    }

    // fungsi untuk menginput data ke database

    function insert_data($data, $table) {
        $result = $this->db->insert($table, $data);
        return $result;
    }

    function replace_data($data, $table) {
        $result = $this->db->replace($table, $data);
        return $result;
    }

    // fungsi untuk mengedit data

    function edit_data($where, $table) {
        return $this->db->get_where( $table, $where );
    }

    // fungsi untuk mengupdate atau mengubah data di database

    function update_data( $where, $data, $table ) {
        $query = $this->db->update($table, $data, $where);
        return $query;
    }

    // fungsi untuk menghapus data dari database

    function delete_data( $where, $table ) {
        $query = $this->db->delete( $table, $where );
        return $query;
    }
    // AKHIR FUNGSI CRUD

    //Fungsi Autocompleted mp
    function tampil_data() {
        return $this->db->get( 'mp' );
    }

    function cari( $id ) {
        $query = $this->db->get_where( 'mp', array( 'mp_id'=>$id ) );
        return $query;
    }

    function getAbsen( $table ) {
        return $this->db->get( $table );
    }

    //Fungsi Autocompleted absen

    function absen_data() {
        return $this->db->get('kodeabsen');
    }

    function absen( $id ) {
        $query = $this->db->get_where('kodeabsen', array( 'absen_id'=>$id ) );
        return $query;
    }

    //Fungsi Autocompleted jalur

    function tampil_pos() {
        return $this->db->get( 'pos' );
    }

    function cari_pos( $id ) {
        $query = $this->db->get_where( 'pos', array( 'pos_jalur'=>$id ) );
        return $query;
    }

    // model fungsi dependent dropdown
    function get_category() {
        $query = $this->db->get( 'jalur' );
        return $query;
    }

    function get_sub_category( $jalur_id ) {
        $query = $this->db->get_where( 'pos', array( 'pos_jalur' => $jalur_id ) );
        return $query;
    }

    function get_data_karyawan($id_kar) {
        $query = $this->db->get_where('karyawan', array('id_kar' => $id_kar));
        return $query;
    }

    function find_karyawan_pengganti($pos_absen, $jabatan, $skill) {
        $this->db->select('data_set.id_dataset, karyawan.id_kar, karyawan.nama, data_set.pos, data_set.jabatan, data_set.sts_skill');
        $this->db->from('data_set');
        $this->db->join('karyawan', 'data_set.id_kar = karyawan.id_kar');
        $this->db->where('data_set.pos', $pos_absen);
        $this->db->where('data_set.jabatan', $jabatan);
        $this->db->where('data_set.sts_skill', $skill);
        $query = $this->db->get();
        return $query->result();
    }
        
    function proses_algoritma($karyawanPengganti, $id_dataset, $id_kar, $id_absen, $pos_absen, $jabatan) {
        $resultForwardChaining = [];
    
        $queryGetAbsen = $this->db->get('absen')->result();
        $queryGetPengganti = $this->db->get('pengganti')->result();
    
        // Rule 1: Cek data calon pengganti agar tidak data double/ganda 
        // dan seleksi calon pengganti berdasarkan pos dan jabatan yang sesuai
        foreach ($karyawanPengganti as $item) {
            if ($item->id_dataset == $id_dataset && $item->id_kar == $id_kar && $item->pos == $pos_absen && $item->jabatan == $jabatan) {
                continue;
            }
    
            // Rule 2: Cek data calon pengganti agar terindikasi tidak sedang absen pada hari ini
            $isAbsent = false;
            if ($queryGetAbsen != null) {
                foreach ($queryGetAbsen as $dataAbsen) {
                    if ($dataAbsen->id_dataset == $item->id_dataset) {
                        $isAbsent = true;
                        break;
                    }
                }
            }
            if ($isAbsent) {
                continue;
            }
    
            // Rule 3: Cek data calon pengganti agar terindikasi tidak sedang menggantikan karyawan lain pada hari ini
            // dan cek karyawan yang akan izin agar tidak terdaftar pada data pengganti
            $isReplacing = false;
            if ($queryGetPengganti != null) {
                foreach ($queryGetPengganti as $dataPengganti) {
                    if ($dataPengganti->id_dataset == $item->id_dataset || $dataPengganti->id_data_set_pengganti == $item->id_dataset) {
                        $isReplacing = true;
                        break;
                    }
                }
            }
            if ($isReplacing) {
                continue;
            }
    
            // Add valid item to the result
            $resultForwardChaining[] = $item;
        }
    
        return $resultForwardChaining;
    }
    
}
?>
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

    function edit_data( $where, $table ) {
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
}
?>
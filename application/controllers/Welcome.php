<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Welcome extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set( 'Asia/Jakarta' );

        $this->load->model( 'm_data' );

    }

    public function index()
    {

        // 3 spot terbaru
        $data[ 'spot' ] = $this->db->query( 'SELECT * FROM spot,jalur,pengguna WHERE spot_jalur=jalur_id and spot_author=pengguna_id order by spot_id DESC LIMIT 3' )->result();

        // data pengaturan website
        $data[ 'pengaturan' ] = $this->m_data->get_data( 'pengaturan' )->row();

        // SEO META
        $data[ 'meta_keyword' ] = $data[ 'pengaturan' ]->nama;
        $data[ 'meta_description' ] = $data[ 'pengaturan' ]->deskripsi;

        $this->load->view( 'frontend/v_header', $data );
        $this->load->view( 'frontend/v_homepage', $data );
        $this->load->view( 'frontend/v_footer', $data );
    }

    public function single( $slug )
    {
        $data[ 'spot' ] = $this->db->query( "SELECT * FROM spot,pengguna,jalur WHERE spot_status='publish' AND spot_author=pengguna_id AND spot_jalur=jalur_id AND spot_slug='$slug'" )->result();

        // data pengaturan website
        $data[ 'pengaturan' ] = $this->m_data->get_data( 'pengaturan' )->row();

        // SEO META
        if ( count( $data[ 'spot' ] ) > 0 ) {
            $data[ 'meta_keyword' ] = $data[ 'spot' ][ 0 ]->spot_judul;
            $data[ 'meta_description' ] = substr( $data[ 'spot' ][ 0 ]->spot_konten, 0, 100 );
        } else {
            $data[ 'meta_keyword' ] = $data[ 'pengaturan' ]->nama;
            $data[ 'meta_description' ] = $data[ 'pengaturan' ]->deskripsi;
        }

        $this->load->view( 'frontend/v_header', $data );
        $this->load->view( 'frontend/v_single', $data );
        $this->load->view( 'frontend/v_footer', $data );
    }

    public function blog()
    {

        // data pengaturan website
        $data[ 'pengaturan' ] = $this->m_data->get_data( 'pengaturan' )->row();

        // SEO META
        $data[ 'meta_keyword' ] = $data[ 'pengaturan' ]->nama;
        $data[ 'meta_description' ] = $data[ 'pengaturan' ]->deskripsi;

        // $this->load->database();
        $jumlah_data = $this->m_data->get_data( 'spot' )->num_rows();
        $this->load->library( 'pagination' );
        $config[ 'base_url' ] = base_url().'blog/';
        $config[ 'total_rows' ] = $jumlah_data;
        $config[ 'per_page' ] = 2;

        $config[ 'first_link' ]       = 'First';
        $config[ 'last_link' ]        = 'Last';
        $config[ 'next_link' ]        = 'Next';
        $config[ 'prev_link' ]        = 'Prev';
        $config[ 'full_tag_open' ]    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config[ 'full_tag_close' ]   = '</ul></nav></div>';
        $config[ 'num_tag_open' ]     = '<li class="page-item"><span class="page-link">';
        $config[ 'num_tag_close' ]    = '</span></li>';
        $config[ 'cur_tag_open' ]     = '<li class="page-item active"><span class="page-link">';
        $config[ 'cur_tag_close' ]    = '<span class="sr-only">(current)</span></span></li>';
        $config[ 'next_tag_open' ]    = '<li class="page-item"><span class="page-link">';
        $config[ 'next_tagl_close' ]  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config[ 'prev_tag_open' ]    = '<li class="page-item"><span class="page-link">';
        $config[ 'prev_tagl_close' ]  = '</span>Next</li>';
        $config[ 'first_tag_open' ]   = '<li class="page-item"><span class="page-link">';
        $config[ 'first_tagl_close' ] = '</span></li>';
        $config[ 'last_tag_open' ]    = '<li class="page-item"><span class="page-link">';
        $config[ 'last_tagl_close' ]  = '</span></li>';

        $from = $this->uri->segment( 2 );
        if ( $from == '' ) {
            $from = 0;
        }
        $this->pagination->initialize( $config );

        $data[ 'spot' ] = $this->db->query( "SELECT * FROM spot,pengguna,jalur WHERE spot_status='publish' AND spot_author=pengguna_id AND spot_jalur=jalur_id ORDER BY spot_id DESC LIMIT $config[per_page] OFFSET $from" )->result();

        $this->load->view( 'frontend/v_header', $data );
        $this->load->view( 'frontend/v_blog', $data );
        $this->load->view( 'frontend/v_footer', $data );
    }

    public function page( $slug )
    {

        $where = array(
            'halaman_slug' => $slug
        );

        $data[ 'halaman' ] = $this->m_data->edit_data( $where, 'halaman' )->result();

        // data pengaturan website
        $data[ 'pengaturan' ] = $this->m_data->get_data( 'pengaturan' )->row();

        // SEO META
        $data[ 'meta_keyword' ] = $data[ 'pengaturan' ]->nama;
        $data[ 'meta_description' ] = $data[ 'pengaturan' ]->deskripsi;

        $this->load->view( 'frontend/v_header', $data );
        $this->load->view( 'frontend/v_page', $data );
        $this->load->view( 'frontend/v_footer', $data );
    }

    public function jalur( $slug )
    {

        // data pengaturan website
        $data[ 'pengaturan' ] = $this->m_data->get_data( 'pengaturan' )->row();

        $jumlah_spot = $this->db->query( "SELECT * FROM spot,pengguna,jalur WHERE spot_status='publish' AND spot_author=pengguna_id AND spot_jalur=jalur_id AND jalur_slug='$slug'" )->num_rows();

        $this->load->library( 'pagination' );
        $config[ 'base_url' ] = base_url().'jalur/'.$slug;
        $config[ 'total_rows' ] = $jumlah_spot;
        $config[ 'per_page' ] = 2;

        $config[ 'first_link' ]       = 'First';
        $config[ 'last_link' ]        = 'Last';
        $config[ 'next_link' ]        = 'Next';
        $config[ 'prev_link' ]        = 'Prev';
        $config[ 'full_tag_open' ]    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config[ 'full_tag_close' ]   = '</ul></nav></div>';
        $config[ 'num_tag_open' ]     = '<li class="page-item"><span class="page-link">';
        $config[ 'num_tag_close' ]    = '</span></li>';
        $config[ 'cur_tag_open' ]     = '<li class="page-item active"><span class="page-link">';
        $config[ 'cur_tag_close' ]    = '<span class="sr-only">(current)</span></span></li>';
        $config[ 'next_tag_open' ]    = '<li class="page-item"><span class="page-link">';
        $config[ 'next_tagl_close' ]  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config[ 'prev_tag_open' ]    = '<li class="page-item"><span class="page-link">';
        $config[ 'prev_tagl_close' ]  = '</span>Next</li>';
        $config[ 'first_tag_open' ]   = '<li class="page-item"><span class="page-link">';
        $config[ 'first_tagl_close' ] = '</span></li>';
        $config[ 'last_tag_open' ]    = '<li class="page-item"><span class="page-link">';
        $config[ 'last_tagl_close' ]  = '</span></li>';

        $from = $this->uri->segment( 3 );
        if ( $from == '' ) {
            $from = 0;
        }
        $this->pagination->initialize( $config );

        $data[ 'spot' ] = $this->db->query( "SELECT * FROM spot,pengguna,jalur WHERE spot_status='publish' AND spot_author=pengguna_id AND spot_jalur=jalur_id AND jalur_slug='$slug' ORDER BY spot_id DESC LIMIT $config[per_page] OFFSET $from" )->result();

        // SEO META
        $data[ 'meta_keyword' ] = $data[ 'pengaturan' ]->nama;
        $data[ 'meta_description' ] = $data[ 'pengaturan' ]->deskripsi;

        $this->load->view( 'frontend/v_header', $data );
        $this->load->view( 'frontend/v_jalur', $data );
        $this->load->view( 'frontend/v_footer', $data );
    }

    public function search()
    {

        //mengambil nilai keyword dari form pencarian
        $cari = htmlentities( ( trim( $this->input->spott( 'cari', true ) ) )? trim( $this->input->spott( 'cari', true ) ) : '' );

        //jika uri segmen 2 ada, maka nilai variabel $search akan diganti dengan nilai uri segmen 2
        $cari = ( $this->uri->segment( 2 ) ) ? $this->uri->segment( 2 ) : $cari;

        // data pengaturan website
        $data[ 'pengaturan' ] = $this->m_data->get_data( 'pengaturan' )->row();

        // SEO META
        $data[ 'meta_keyword' ] = $data[ 'pengaturan' ]->nama;
        $data[ 'meta_description' ] = $data[ 'pengaturan' ]->deskripsi;

        $jumlah_spot = $this->db->query( "SELECT * FROM spot,pengguna,jalur WHERE spot_status='publish' AND spot_author=pengguna_id AND spot_jalur=jalur_id AND (spot_judul LIKE '%$cari%' OR spot_konten LIKE '%$cari%')" )->num_rows();

        $this->load->library( 'pagination' );
        $config[ 'base_url' ] = base_url().'search/'.$cari;
        $config[ 'total_rows' ] = $jumlah_spot;
        $config[ 'per_page' ] = 2;

        $config[ 'first_link' ]       = 'First';
        $config[ 'last_link' ]        = 'Last';
        $config[ 'next_link' ]        = 'Next';
        $config[ 'prev_link' ]        = 'Prev';
        $config[ 'full_tag_open' ]    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config[ 'full_tag_close' ]   = '</ul></nav></div>';
        $config[ 'num_tag_open' ]     = '<li class="page-item"><span class="page-link">';
        $config[ 'num_tag_close' ]    = '</span></li>';
        $config[ 'cur_tag_open' ]     = '<li class="page-item active"><span class="page-link">';
        $config[ 'cur_tag_close' ]    = '<span class="sr-only">(current)</span></span></li>';
        $config[ 'next_tag_open' ]    = '<li class="page-item"><span class="page-link">';
        $config[ 'next_tagl_close' ]  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config[ 'prev_tag_open' ]    = '<li class="page-item"><span class="page-link">';
        $config[ 'prev_tagl_close' ]  = '</span>Next</li>';
        $config[ 'first_tag_open' ]   = '<li class="page-item"><span class="page-link">';
        $config[ 'first_tagl_close' ] = '</span></li>';
        $config[ 'last_tag_open' ]    = '<li class="page-item"><span class="page-link">';
        $config[ 'last_tagl_close' ]  = '</span></li>';

        $from = $this->uri->segment( 3 );
        if ( $from == '' ) {
            $from = 0;
        }
        $this->pagination->initialize( $config );

        $data[ 'spot' ] = $this->db->query( "SELECT * FROM spot,pengguna,jalur WHERE spot_status='publish' AND spot_author=pengguna_id AND spot_jalur=jalur_id AND (spot_judul LIKE '%$cari%' OR spot_konten LIKE '%$cari%') ORDER BY spot_id DESC LIMIT $config[per_page] OFFSET $from" )->result();
        $data[ 'cari' ] = $cari;
        $this->load->view( 'frontend/v_header', $data );
        $this->load->view( 'frontend/v_search', $data );
        $this->load->view( 'frontend/v_footer', $data );
    }

    public function notfound()
    {
        // data pengaturan website
        $data[ 'pengaturan' ] = $this->m_data->get_data( 'pengaturan' )->row();

        // SEO META
        $data[ 'meta_keyword' ] = $data[ 'pengaturan' ]->nama;
        $data[ 'meta_description' ] = $data[ 'pengaturan' ]->deskripsi;

        $this->load->view( 'frontend/v_header', $data );
        $this->load->view( 'frontend/v_notfound', $data );
        $this->load->view( 'frontend/v_footer', $data );
    }
}

<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();

        date_default_timezone_set( 'Asia/Jakarta' );

        $this->load->model( 'm_data' );
        $this->load->model( 'globalmodel' );
        $this->load->database();

        $this->load->library( 'form_validation' );
        $this->jalur = $this->session->userdata( 'jalur' );

        // cek session yang login,
        // jika session status tidak sama dengan session telah_login, berarti pengguna belum login
        // maka halaman akan di alihkan kembali ke halaman login.
        if ( $this->session->userdata( 'status' ) != 'telah_login' ) {
            redirect( base_url().'login?alert=belum_login' );
        }
    }

    public function index() {
        $data[ 'record' ] =  $this->m_data->tampil_data();

        // hitung jumlah spot
        $data[ 'jumlah_henkaten' ] = $this->m_data->get_data( 'henkaten' )->num_rows();

        // hitung jumlah jalur
        $data[ 'jumlah_jalur' ] = $this->m_data->get_data( 'jalur' )->num_rows();

        // hitung jumlah pengguna
        $data[ 'jumlah_total_absen' ] = $this->m_data->get_data( 'hadir' )->num_rows();

        $data[ 'year' ] = date( 'Y' );
        // hitung jumlah halaman
        $data[ 'jumlah_pos' ] = $this->m_data->get_data( 'pos' )->num_rows();
        $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();

        $data[ 'jumlah_absen_shift_a' ] = $this->m_data->get_table( 'hadir', array( 'hadir_shift' => 'A' ), '', '' )->num_rows();
        $data[ 'jumlah_absen_shift_b' ] = $this->m_data->get_table( 'hadir', array( 'hadir_shift' => 'B' ), '', '' )->num_rows();

        $data[ 'jumlah_henkaten_shift_a' ] = $this->m_data->get_table( 'henkaten', array( 'hen_shift' => 'A' ), '', '' )->num_rows();
        $data[ 'jumlah_henkaten_shift_b' ] = $this->m_data->get_table( 'henkaten', array( 'hen_shift' => 'B' ), '', '' )->num_rows();

        $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='A'" )->num_rows();
        $data[ 'jumlah_memberB' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='B'" )->num_rows();

        // $data[ 'kehadiran' ] = $this->db->query( 'SELECT * FROM mp,hadir WHERE pos_jalur=jalur_id order by pos_jalur desc' )->result();
        $data[ 'jalur' ] = $this->m_data->get_category()->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_index', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function keluar() {
        $this->session->sess_destroy();
        redirect( 'login?alert=logout' );
    }

    public function ganti_password() {
        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_ganti_password' );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function ganti_password_aksi() {
        // form validasi
        $this->form_validation->set_rules( 'password_lama', 'Password Lama', 'required' );
        $this->form_validation->set_rules( 'password_baru', 'Password Baru', 'required|min_length[8]' );
        $this->form_validation->set_rules( 'konfirmasi_password', 'Konfirmasi Password Baru', 'required|matches[password_baru]' );

        // cek validasi
        if ( $this->form_validation->run() != false ) {

            // menangkap data dari form
            $password_lama = $this->input->post( 'password_lama' );
            $password_baru = $this->input->post( 'password_baru' );
            $konfirmasi_password = $this->input->post( 'konfirmasi_password' );

            // cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
            $where = array(
                'pengguna_id' => $this->session->userdata( 'id' ),
                'pengguna_password' => md5( $password_lama )
            );

            $cek = $this->m_data->cek_login( 'pengguna', $where )->num_rows();

            // cek kesesuaikan password lama
            if ( $cek > 0 ) {
                // update data password pengguna
                $w = array(
                    'pengguna_id' => $this->session->userdata( 'id' )
                );
                $data = array(
                    'pengguna_password' => md5( $password_baru )
                );

                $this->m_data->update_data( $where, $data, 'pengguna' );

                // alihkan halaman kembali ke halaman ganti password
                redirect( 'dashboard/ganti_password?alert=sukses' );
            } else {
                // alihkan halaman kembali ke halaman ganti password
                redirect( 'dashboard/ganti_password?alert=gagal' );
            }

        } else {
            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_ganti_password' );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    //autocomplete mp

    public function cari() {
        $mp_id = $_GET[ 'mp_id' ];
        $cari = $this->m_data->cari( $mp_id )->result();
        echo json_encode( $cari );
    }

    //autocomplete absen

    // public function absen() {
    //     $absen_id = $_GET[ 'absen_id' ];
    //     $absen = $this->m_data->absen( $absen_id )->result();
    //     echo json_encode( $absen );
    // }

    //autocomplete pos

    public function pos_cari() {
        $pos_jalur = $_GET[ 'pos_id' ];
        $pos_cari = $this->m_data->pos_cari( $pos_jalur )->result();
        echo json_encode( $pos_cari );
    }

    // CRUD jalur

    public function jalur() {
        $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_jalur', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function jalur_tambah() {
        $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_jalur_tambah', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function jalur_aksi() {
        $this->form_validation->set_rules( 'jalur', 'jalur', 'required' );

        if ( $this->form_validation->run() != false ) {

            $jalur = $this->input->post( 'jalur' );

            $data = array(
                'jalur_nama' => $jalur,
                'jalur_slug' => strtolower( url_title( $jalur ) )
            );

            $this->m_data->insert_data( $data, 'jalur' );

            redirect( base_url().'dashboard/jalur' );

        } else {
            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_jalur_tambah' );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function jalur_edit( $id ) {
        $where = array(
            'jalur_id' => $id
        );

        $data[ 'jalur' ] = $this->m_data->edit_data( $where, 'jalur' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_jalur_edit', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function jalur_update() {
        $this->form_validation->set_rules( 'jalur', 'jalur', 'required' );

        if ( $this->form_validation->run() != false ) {

            $id = $this->input->post( 'id' );
            $jalur = $this->input->post( 'jalur' );

            $where = array(
                'jalur_id' => $id
            );

            $data = array(
                'jalur_nama' => $jalur,
                'jalur_slug' => strtolower( url_title( $jalur ) )
            );

            $this->m_data->update_data( $where, $data, 'jalur' );

            redirect( base_url().'dashboard/jalur' );

        } else {

            $id = $this->input->post( 'id' );
            $where = array(
                'jalur_id' => $id
            );

            $data[ 'jalur' ] = $this->m_data->edit_data( $where, 'jalur' )->result();

            $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();
            $data[ 'jumlah_hadir' ] = $this->m_data->get_data( 'hadir' )->num_rows();
            $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='A'" )->num_rows();

            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_jalur_edit', $data );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function jalur_hapus( $id ) {
        $where = array(
            'jalur_id' => $id
        );

        $query = $this->m_data->delete_data( $where, 'jalur' );

        redirect( base_url().'dashboard/jalur' );
    }
    // END CRUD jalur


// Start CRUD Karyawan
// view karyawan
public function karyawan() {
    $data[ 'karyawan' ] = $this->m_data->get_data( 'karyawan' )->result();

    $this->load->view( 'dashboard/v_header' );
    $this->load->view( 'dashboard/v_karyawan', $data );
    $this->load->view( 'dashboard/v_footer' );
}




// END CRUD Karyawan


// Start CRUD Absen
//view absen
public function absen() {
    $data['absen'] = $this->db->query('SELECT absen.id_absen, absen.id_dataset, absen.tgl_absen, karyawan.nama, data_set.pos, absen.ket FROM absen JOIN data_set ON absen.id_dataset = data_set.id_dataset JOIN karyawan ON data_set.id_kar = karyawan.id_kar')->result();
    $data['isKaryawanAbsent'] = $this->db->query('SELECT absen.id_absen, absen.id_dataset, pengganti.id_ganti , pengganti.id_data_set_pengganti FROM absen JOIN pengganti ON absen.id_absen = pengganti.id_absen')->result();

    $this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_absen', $data );
    $this->load->view('dashboard/v_footer');
}

//fungsi tambah absen
public function absen_tambah() {
    $data[ 'absen' ] = $this->m_data->get_data( 'absen' )->result();
    $data[ 'karyawan' ] = $this->db->query( 'SELECT id_kar, nama FROM karyawan' )->result();

    $this->load->view( 'dashboard/v_header');
    $this->load->view( 'dashboard/v_absen_tambah', $data );
    $this->load->view( 'dashboard/v_footer' );
}

public function absen_aksi() {
    $this->form_validation->set_rules( 'tgl_absen', 'tgl_absen', 'required' );
    $this->form_validation->set_rules( 'karyawan', 'karyawan', 'required' );
    $this->form_validation->set_rules( 'ket', 'ket', 'required' );
    
    if ( $this->form_validation->run() != false ) {
        
        $tgl_absen = $this->input->post( 'tgl_absen' );
        $id_karyawan = $this->input->post( 'karyawan' );
        $ket = $this->input->post( 'ket' );

        $data['data_karyawan_absen'] = $this->db->query( "SELECT data_set.id_dataset, data_set.pos FROM karyawan 
        JOIN data_set ON karyawan.id_kar = data_set.id_kar 
        WHERE karyawan.id_kar='". $id_karyawan ."'" )->row();

        if ($data['data_karyawan_absen'] != null) {
            $result_dataset = (array)$data['data_karyawan_absen'];
            
            $data = array(   
                'id_dataset' => $result_dataset['id_dataset'],
                'tgl_absen'=> $tgl_absen,    
                'pos_absen' => $result_dataset['pos'],
                'ket' => $ket,
            );

            $this->m_data->insert_data( $data, 'absen' );
            redirect( base_url().'dashboard/absen' );
        } else {
            redirect(base_url().'dashboard/absen_tambah');
        }

    } else {
        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_absen_tambah' );
        $this->load->view( 'dashboard/v_footer' );
    }
} // end fungsi tambah absen


// END CRUD Absen


// Start CRUD Dataset

public function dataset() {
    $this->load->view( 'dashboard/v_header' );
    $this->load->view( 'dashboard/v_dataset', $data );
    $this->load->view( 'dashboard/v_footer' );
}
// END CRUD Data set

// Start CRUD Pengganti
// view data pengganti
public function pengganti() {
    $data['pengganti'] = $this->db->query("
    SELECT pengganti.id_ganti as id_pengganti, pengganti.nama_ganti as nama_pengganti, 
    data_set.pos, data_set.jabatan as jabatan_pengganti, data_set.sts_skill as skill_pengganti, 
    karyawan.nama as karyawan_absen, absen.tgl_absen
    FROM pengganti 
    JOIN data_set ON pengganti.id_dataset = data_set.id_dataset
    JOIN absen ON pengganti.id_absen = absen.id_absen 
    JOIN karyawan ON karyawan.id_kar = data_set.id_kar")->result();

    $this->load->view( 'dashboard/v_header' );
    $this->load->view( 'dashboard/v_pengganti', $data);
    $this->load->view( 'dashboard/v_footer' );
}

public function pengganti_hapus($id) {
    $where = array(
        'id_ganti' => $id
    );

    $this->m_data->delete_data($where, 'pengganti');
    redirect( base_url().'dashboard/pengganti' );
}

public function pengganti_aksi() {
    $data[ 'absen' ] = $this->db->query('INSERT INTO absen (id_absen, id_dataset, ket');
    $this->form_validation->set_rules( 'karyawan', 'karyawan', 'required' );
    $this->form_validation->set_rules( 'pos', 'pos', 'required' );
    $this->form_validation->set_rules( 'ket', 'ket', 'required' );
    

    if ( $this->form_validation->run() != false ) {
        $id_kar = $this->input->post( 'karyawan' );
        $pos = $this->input->post( 'pos' );
        $ket = $this->input->post( 'ket' );
      

        $data = array(
            
            'karyawan' => $id_kar,
            'pos' => $pos,
            'ket' => $ket,
            
        );

        $this->m_data->insert_data( $data, 'absen' );

        redirect( base_url().'dashboard/absen' );

    } else {
        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_absen_tambah' );
        $this->load->view( 'dashboard/v_footer' );
    }
} // end fungsi tambah absen

//Start Fungsi edit Absen

public function absen_edit( $id ) { 
    $where = array(
        'id_absen' => $id
    );

    $result_data_set = $this->db->query( "SELECT absen.id_absen, absen.id_dataset, data_set.id_kar, 
    absen.pos_absen, absen.ket, data_set.jabatan, data_set.sts_skill FROM absen 
    JOIN data_set ON absen.id_dataset = data_set.id_dataset
    WHERE absen.id_absen='". $id ."'" )->row();

    if ($result_data_set != null) {
        $data['getDataset'] = $result_data_set;

        $result_data_karyawan = $this->m_data->get_data_karyawan($data['getDataset']->id_kar)->row();
        $data['getDataKaryawan'] = $result_data_karyawan;
    } else {
        $data['getDataKaryawan'] = null;
    }

    // Buatkan Query untuk mencari penganti karyawan yang cuti/sakit

    $this->load->view( 'dashboard/v_header' );
    $this->load->view( 'dashboard/v_absen_edit', $data );
    $this->load->view( 'dashboard/v_footer' );
}

public function proses_forward_chaining() {
    header('Content-Type: application/json');

    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        // Get the data sent from the AJAX request
        $id_absen = $this->input->post('id_absen');
        $id_dataset = $this->input->post('id_dataset');
        $id_kar = $this->input->post('id_kar');
        $pos_absen = $this->input->post('pos_absen');
        $jabatan = $this->input->post('jabatan');
        $skill = $this->input->post('sts_skill');

        $query = $this->m_data->find_karyawan_pengganti($pos_absen, $jabatan, $skill);
        
        if ($query != null && $id_dataset != "" && $id_kar != "") {
            $checkCalonPengganti = $this->m_data->proses_algoritma($query, $id_dataset, $id_kar, $id_absen, $pos_absen, $jabatan);

            if (count($checkCalonPengganti) > 0) {
                $response = [
                    'success' => true,
                    'message' => "Berhasil Proses Forward Chaining",
                    'data' => $checkCalonPengganti
                ];                
            } else {
                $response = [
                    'success' => true,
                    'message' => "Pengganti Tidak Tersedia.",
                    'data' => null
                ];
            }
        } else {
            $response = [
                'success' => false,
                'message' => "Gagal Proses Forward Chaining",
                'data' => null
            ];
        }
        
        // Return the response as JSON
        echo json_encode($response);
    } else {
        $response = [
            'success' => false,
            'message' => 'Invalid Request',
            'data' => null
        ];
        echo json_encode($response);
    }
}

public function absen_update() {
    $this->form_validation->set_rules( 'id_absen', 'id_absen', 'required' );
    $this->form_validation->set_rules( 'id_dataset', 'id_dataset', 'required' );

    if ( $this->form_validation->run() != false ) {
        $id_absen = $this->input->post('id_absen');
        $id_dataset = $this->input->post('id_dataset');
        $id_dataset_pengganti = $this->input->post('id_dataset_pengganti');
        $nama_karyawan = $this->input->post('nama_karyawan_ganti');

        $data = array(
            'id_dataset' => $id_dataset,
            'id_absen' => $id_absen,
            'id_data_set_pengganti' => $id_dataset_pengganti,
            'nama_ganti' => $nama_karyawan,
        );

        $this->m_data->insert_data($data, 'pengganti');
        redirect( base_url().'dashboard/pengganti');

    } else {

        $id = $this->input->post( 'id' );
        $where = array(
            'pos_id' => $id
        );
        $data[ 'pos' ] = $this->m_data->edit_data( $where, 'pos' )->result();
        $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();
        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_absen_edit', $data );
        $this->load->view( 'dashboard/v_footer' );
    }
}

//end proses edit


//start fungsi delete absen
public function absen_hapus( $id ) {
    $where = array(
        'id_absen' => $id
    );

    $where_pengganti = array(
        'id_absen' => $id
    );

    $this->m_data->delete_data($where, 'absen');
    $this->m_data->delete_data($where_pengganti, 'pengganti');

    redirect( base_url().'dashboard/absen' );
}




// END CRUD Data set









/// CRUD KARYAWAN MULAI

public function pos() {
        $jalur = $this->session->userdata( 'jalur' );
        $pos = $this->session->userdata( 'pos' );
        $username = $this->session->userdata( 'username' );
        $level = $this->session->userdata( 'level' );
        $status = $this->session->userdata( 'status' );

        if ( $level == 'admin' ) {
            $data[ 'pos' ] = $this->db->query( 'SELECT * FROM pos, jalur WHERE pos_jalur=jalur_id order by pos_jalur desc' )->result();
        } else {
            if ( $level == 'Foreman' ) {
                $data[ 'pos' ] = $this->db->query( "SELECT * FROM pos, jalur WHERE pos_jalur = '$jalur' and jalur_id = '$jalur' order by pos_id ASC" )->result();
            } else if ( $level == 'spv' ) {
                $data[ 'pos' ] = $this->db->query( "SELECT * FROM pos, jalur WHERE pos_jalur = '$jalur' and jalur_id = '$jalur' order by pos_id ASC" )->result();
            }
        }

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_pos', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function pos_tambah() {
        $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_pos_tambah', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function pos_aksi() {
        $this->form_validation->set_rules( 'pos', 'pos', 'required' );
        $this->form_validation->set_rules( 'jalur[]', 'Pilih Jalur', 'trim|required' );

        if ( $this->form_validation->run() != false ) {
            $jalur = count( $this->input->post( 'jalur' ) );
            $pos = $this->input->post( 'pos' );

            for ( $i = 0; $i < $jalur; $i++ ) {
                $datas[ $i ] = array(
                    'pos_jalur' => $this->input->post( 'jalur['.$i.']' ),
                    'pos_nama' => $pos,
                );

                $this->m_data->insert_data( $datas[ $i ], 'pos' );
            }

            redirect( base_url().'dashboard/pos' );
        } else {
            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_pos_tambah' );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function pos_edit( $id ) {
        $where = array(
            'pos_id' => $id
        );
        $data[ 'pos' ] = $this->m_data->edit_data( $where, 'pos' )->result();
        $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_pos_edit', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function pos_update() {
        $this->form_validation->set_rules( 'pos', 'pos', 'required' );
        if ( $this->form_validation->run() != false ) {

            $id = $this->input->post( 'id' );
            $jalur = $this->input->post( 'jalur' );
            $pos = $this->input->post( 'pos' );

            $where = array(
                'pos_id' => $id
            );

            $data = array(
                'pos_jalur' => $jalur,
                'pos_nama' => $pos,

            );

            $this->m_data->update_data( $where, $data, 'pos' );

            redirect( base_url().'dashboard/pos' );

        } else {

            $id = $this->input->post( 'id' );
            $where = array(
                'pos_id' => $id
            );
            $data[ 'pos' ] = $this->m_data->edit_data( $where, 'pos' )->result();
            $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();
            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_pos_edit', $data );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function pos_hapus( $id ) {
        $where = array(
            'pos_id' => $id
        );

        $this->m_data->delete_data( $where, 'pos' );

        redirect( base_url().'dashboard/pos' );
    }
    // END CRUD pos


    // CRUD MP

    public function mp() {
        $jalur = $this->session->userdata( 'jalur' );
        $pos = $this->session->userdata( 'pos' );
        $username = $this->session->userdata( 'username' );
        $level = $this->session->userdata( 'level' );
        $status = $this->session->userdata( 'status' );

        if ( $level == 'admin' ) {
            $data[ 'mp' ] = $this->db->query( 'SELECT * FROM mp,jalur,pos,pengguna WHERE mp_jalur=jalur_id and mp_pos=pos_id and mp_jalur=pengguna_jalur order by mp_jalur desc' )->result();
        } else {
            if ( $level == 'Foreman' ) {
                $data[ 'mp' ] = $this->globalmodel->join_table3( 'mp', 'jalur', 'pos', 'jalur_id = mp_jalur', 'pos_id = mp_pos', '*', "mp_jalur = '$jalur'" );
                // $data[ 'mp' ] = $this->db->query( "SELECT *,(SELECT jalur_nama FROM jalur WHERE jalur_id=mp_jalur) as jalur_nama,(SELECT jalur_nama FROM jalur WHERE jalur_id=mp_jalur) as jalur_nama FROM mp WHERE mp_jalur='$jalur' order by mp_jalur desc" )->result();
            } else if ( $level == 'spv' ) {
                $data[ 'mp' ] = $this->db->query( 'SELECT * FROM mp,jalur,pos WHERE mp_jalur=jalur_id and mp_pos=pos_id order by mp_jalur desc' )->result();
            }
        }

        // $data[ 'mp' ] = $this->db->query( 'SELECT * FROM mp,jalur,pos,pengguna WHERE mp_jalur=jalur_id and mp_pos=pos_id and mp_jalur=pengguna_jalur order by mp_jalur desc' )->result();
        $data[ 'jalur' ] = $this->m_data->get_category()->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_mp', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    // controller dropdown

    public function get_sub_category() {
        $jalur_id = $this->input->post( 'id', TRUE );
        $data = $this->m_data->get_sub_category( $jalur_id )->result();
        echo json_encode( $data );
    }

    public function mp_tambah() {
        // $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();
        $data[ 'data_pos' ] =  $this->m_data->tampil_pos();
        $data[ 'jalur' ] = $this->m_data->get_category()->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_mp_tambah', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function mp_aksi() {
        $this->form_validation->set_rules( 'npk', 'npk', 'required' );
        $this->form_validation->set_rules( 'nama', 'nama', 'required' );
        $this->form_validation->set_rules( 'jalur', 'jalur', 'required' );
        $this->form_validation->set_rules( 'pos', 'pos', 'required' );

        if ( $this->form_validation->run() != false ) {
            $npk = $this->input->post( 'npk' );
            $nama = $this->input->post( 'nama' );
            $jalur = $this->input->post( 'jalur' );
            $pos = $this->input->post( 'pos' );
            $sts = $this->input->post( 'sts' );
            $shift = $this->input->post( 'shift' );
            $atasan = $this->input->post( 'atasan' );

            $data = array(
                'mp_id' => $npk,
                'mp_nama' => $nama,
                'mp_jalur' => $jalur,
                'mp_pos' => $pos,
                'mp_status' => $sts,
                'mp_shift' => $shift,
                'mp_atasan' => $atasan,

            );

            $this->m_data->insert_data( $data, 'mp' );

            redirect( base_url().'dashboard/mp' );

        } else {
            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_mp_tambah' );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function mp_edit( $id ) {
        $where = array(
            'mp_id' => $id
        );

        $data[ 'mp' ] = $this->m_data->edit_data( $where, 'mp' )->result();
        $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();
        $data[ 'category' ] = $this->m_data->get_category()->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_mp_edit', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function mp_update() {
        $this->form_validation->set_rules( 'jalur', 'jalur', 'required' );
        $this->form_validation->set_rules( 'pos', 'pos', 'required' );
        $this->form_validation->set_rules( 'sts', 'sts', 'required' );
        $this->form_validation->set_rules( 'shift', 'shift', 'required' );
        $this->form_validation->set_rules( 'atasan', 'atasan', 'required' );

        if ( $this->form_validation->run() != false ) {
            $id = $this->input->post( 'id' );
            $jalur = $this->input->post( 'jalur' );
            $pos = $this->input->post( 'pos' );
            $sts = $this->input->post( 'sts' );
            $shift = $this->input->post( 'shift' );
            $atasan = $this->input->post( 'atasan' );

            $where = array(
                'mp_id' => $id
            );

            $data = array(
                'mp_jalur' => $jalur,
                'mp_pos' => $pos,
                'mp_status' => $sts,
                'mp_shift' => $shift,
                'mp_atasan' => $atasan,

            );

            $this->m_data->update_data( $where, $data, 'mp' );

            redirect( base_url().'dashboard/mp' );

        } else {

            $id = $this->input->post( 'id' );
            $where = array(
                'mp_id' => $id
            );

            $data[ 'mp' ] = $this->m_data->edit_data( $where, 'mp' )->result();
            $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

            $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();
            $data[ 'jumlah_hadir' ] = $this->m_data->get_data( 'hadir' )->num_rows();
            $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='A'" )->num_rows();

            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_mp_edit', $data );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function mp_hapus( $id ) {
        $where = array(
            'mp_id' => $id
        );

        $this->m_data->delete_data( $where, 'mp' );

        redirect( base_url().'dashboard/mp' );
    }
    // END CRUD mp

    // // CRUD hadir

    // public function hadir() {
    //     $data[ 'message' ] = $this->session->flashdata( 'message' );
        
    //     $jalur = $this->session->userdata( 'jalur' );
    //     $pos = $this->session->userdata( 'pos' );
    //     $username = $this->session->userdata( 'username' );
    //     $level = $this->session->userdata( 'level' );
    //     $status = $this->session->userdata( 'status' );

    //     if ( $level == 'admin' ) {
    //         $data[ 'hadir' ] = $this->db->query( 'SELECT * FROM hadir, jalur WHERE hadir_jalur=jalur_id order by hadir_tgl_in DESC' )->result();
    //     } else {
    //         if ( $level == 'Foreman' ) {
    //             $data[ 'hadir' ] = $this->db->query( "SELECT * FROM hadir, jalur WHERE hadir_jalur='$jalur' order by hadir_tgl_in DESC" )->result();
    //         } else if ( $level == 'spv' ) {
    //             $data[ 'hadir' ] = $this->db->query( "SELECT * FROM hadir, jalur WHERE hadir_jalur='$jalur' order by hadir_tgl_in DESC" )->result();
    //         }
    //     }

    //     $data[ 'record' ] =  $this->m_data->tampil_data();

    //     $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();
    //     $data[ 'jumlah_hadir' ] = $this->m_data->get_data( 'hadir' )->num_rows();
    //     $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE mp_shift='A'" )->num_rows();

    //     $this->load->view( 'dashboard/v_header' );
    //     $this->load->view( 'dashboard/v_hadir', $data );
    //     $this->load->view( 'dashboard/v_footer' );
    // }

    // public function hadir_tambah() {
    //     $data[ 'message' ] = $this->session->flashdata( 'message' );

    //     $data[ 'record' ] =  $this->m_data->tampil_data();
    //     $data[ 'data_absen' ] =  $this->m_data->absen_data();

    //     $this->load->view( 'dashboard/v_header' );
    //     $this->load->view( 'dashboard/v_hadir_tambah', $data );
    //     $this->load->view( 'dashboard/v_footer' );

    // }

    // public function hadir_aksi() {
    //     $this->form_validation->set_rules( 'mp_id', 'mp_id', 'required' );
    //     $this->form_validation->set_rules( 'mp_nama', 'mp_nama', 'required' );
    //     $this->form_validation->set_rules( 'mp_jalur', 'mp_jalur', 'required' );
    //     $this->form_validation->set_rules( 'mp_pos', 'mp_pos', 'required' );
    //     $this->form_validation->set_rules( 'mp_status', 'mp_status', 'required' );
    //     $this->form_validation->set_rules( 'mp_shift', 'mp_shift', 'required' );
    //     $this->form_validation->set_rules( 'absen_id', 'absen_id', 'required' );
    //     $this->form_validation->set_rules( 'absen_ket', 'absen_ket', 'required' );

    //     if ( $this->form_validation->run() != false ) {
    //         $tanggal = date( 'Y-m-d H:i:s' );
    //         $tgl_in = $this->input->post( 'tgl_in' );
    //         $mp_id = $this->input->post( 'mp_id' );
    //         $mp_nama = $this->input->post( 'mp_nama' );
    //         $mp_jalur = $this->input->post( 'mp_jalur' );
    //         $mp_pos = $this->input->post( 'mp_pos' );
    //         $mp_status = $this->input->post( 'mp_status' );
    //         $mp_shift = $this->input->post( 'mp_shift' );
    //         $absen_id = $this->input->post( 'absen_id' );
    //         $absen_ket = $this->input->post( 'absen_ket' );

    //         $data = array(
    //             'hadir_tgl' => $tanggal,
    //             'hadir_tgl_in' => $tgl_in,
    //             'hadir_npk' => $mp_id,
    //             'hadir_nama' => $mp_nama,
    //             'hadir_jalur' => $mp_jalur,
    //             'hadir_pos' => $mp_pos,
    //             'hadir_status' => $mp_status,
    //             'hadir_shift' => $mp_shift,
    //             'hadir_kode' => $absen_id,
    //             'hadir_ket' => $absen_ket,
    //             'hadir_gan_id' => 0,
    //             'hadir_gan_nama' => "",
    //             'hadir_gan_sts' => "",
    //         );

    //         $result = $this->m_data->insert_data( $data, 'hadir' );
    //         $data['id_hadir'] = $this->db->insert_id();

    //         if ( $result ) {
    //             $data[ 'insert_henkaten' ] = array(
    //                 'hadir_id' => $data['id_hadir'],
    //                 'hen_npk' => $mp_id,
    //                 'hen_nama' => $mp_nama,
    //                 'hen_jalur' => $mp_jalur,
    //                 'hen_status' => $mp_status,
    //                 'hen_shift' => $mp_shift,
    //                 'hen_ganti' => "",
    //                 'hen_gan_nama' => "",
    //                 'hen_gan_sts' => "",
    //                 'status_ganti' => "Menunggu Pengganti"
    //             );

    //             $replace = $this->m_data->insert_data( $data[ 'insert_henkaten' ], 'henkaten' );

    //             if ( $replace ) {
    //                 $data[ 'message' ] = '<div class="alert alert-success" role="alert">Berhasil ubah data pengganti</div>';
    //                 $this->session->set_flashdata( 'message', $data[ 'message' ] );

    //                 redirect( base_url().'dashboard/henkaten' );
    //             } else {
    //                 $data[ 'message' ] = '<div class="alert alert-warning" role="alert">Maaf, Anda gagal tambah data pengganti</div>';
    //                 $this->session->set_flashdata( 'message', $data[ 'message' ] );

    //                 redirect( base_url().'dashboard/hadir' );
    //             }
    //         }

    //         redirect( base_url().'dashboard/hadir' );

    //     } else {
    //         $this->load->view( 'dashboard/v_header' );
    //         $this->load->view( 'dashboard/v_hadir_tambah' );
    //         $this->load->view( 'dashboard/v_footer' );
    //     }
    // }

    // public function hadir_edit( $id ) {
    //     $data[ 'message' ] = $this->session->flashdata( 'message' );

    //     $this->form_validation->set_rules( 'mp_id', 'mp_id', 'required' );
    //     $this->form_validation->set_rules( 'mp_nama', 'mp_nama', 'required' );
    //     $this->form_validation->set_rules( 'mp_jalur', 'mp_jalur', 'required' );
    //     $this->form_validation->set_rules( 'mp_pos', 'mp_pos', 'required' );
    //     $this->form_validation->set_rules( 'mp_status', 'mp_status', 'required' );
    //     $this->form_validation->set_rules( 'mp_shift', 'mp_shift', 'required' );
    //     $this->form_validation->set_rules( 'absen_id', 'absen_id', 'required' );
    //     $this->form_validation->set_rules( 'absen_ket', 'absen_ket', 'required' );
    //     $this->form_validation->set_rules( 'mp_peng_id', 'id pengganti', 'required' );
    //     $this->form_validation->set_rules( 'mp_peng_nama', 'nama pengganti', 'required' );
    //     $this->form_validation->set_rules( 'mp_peng_sts', 'status pengganti', 'required' );

    //     $where = array(
    //         'hadir_id' => $id
    //     );

    //     $data[ 'record' ] =  $this->globalmodel->get_list( 'mp', "mp_jalur = '".$this->jalur."'" );

    //     $data[ 'hadir' ] = $this->m_data->edit_data( $where, 'hadir' )->result();
    //     $data[ 'henkaten' ] = $this->m_data->edit_data( $where, 'henkaten' )->result();

    //     $data[ 'kodeabsen' ] = $this->m_data->get_data( 'kodeabsen' )->result();

    //     $data[ 'record_tambah' ] =  $this->m_data->tampil_data();
    //     $data[ 'data_absen' ] =  $this->m_data->absen_data();

    //     $this->load->view( 'dashboard/v_header' );
    //     $this->load->view( 'dashboard/v_hadir_edit', $data );
    //     $this->load->view( 'dashboard/v_footer' );
    // }

    // public function hadir_update() {
    //     $data[ 'message' ] = $this->session->flashdata( 'message' );

    //     $this->form_validation->set_rules( 'mp_id', 'mp_id', 'required' );

    //     if ( $this->form_validation->run() != false ) {
    //         $id = $this->input->post( 'id' );
    //         $tanggal = date( 'Y-m-d H:i:s' );
    //         $tgl_in = $this->input->post( 'tgl_in' );
    //         $mp_id = $this->input->post( 'mp_id' );
    //         $mp_nama = $this->input->post( 'mp_nama' );
    //         $mp_jalur = $this->input->post( 'mp_jalur' );
    //         $mp_status = $this->input->post( 'mp_status' );
    //         $mp_shift = $this->input->post( 'mp_shift' );
    //         $absen_id = $this->input->post( 'absen_id' );
    //         $absen_ket = $this->input->post( 'absen_ket' );
    //         $mp_peng_id = $this->input->post( 'mp_peng_id' );
    //         $mp_peng_nama = $this->input->post( 'mp_peng_nama' );
    //         $mp_peng_sts = $this->input->post( 'mp_peng_sts' );

    //         $where_get_data = array(
    //             'hadir_id' => $id
    //         );

    //         $where_get_data_henkaten = array(
    //             'hen_npk' => $mp_id,
    //             'hadir_id' => $id
    //         );

    //         $get_data_hadir = $this->m_data->get_table( 'hadir', $where_get_data, '', '' );

    //         if ( $get_data_hadir->num_rows() > 0 ) {

    //             $get_data_henkaten = $this->m_data->get_table( 'henkaten', $where_get_data_henkaten, '', '' );
    //             if ( $get_data_henkaten->num_rows() > 0 ) {

    //                 $data[ 'update_henkaten' ] = array(
    //                     'hadir_id' => $id,
    //                     'hen_npk' => $mp_id,
    //                     'hen_nama' => $mp_nama,
    //                     'hen_jalur' => $mp_jalur,
    //                     'hen_status' => $mp_status,
    //                     'hen_shift' => $mp_shift,
    //                     'hen_ganti' => $mp_peng_id,
    //                     'hen_gan_nama' => $mp_peng_nama,
    //                     'hen_gan_sts' => $mp_peng_sts,
    //                     'status_ganti' => "Selesai"
    //                 );

    //                 $update_henkaten = $this->m_data->update_data( $where_get_data_henkaten, $data[ 'update_henkaten' ], 'henkaten' );

    //                 if ( $update_henkaten ) {
    //                     $data[ 'message' ] = '<div class="alert alert-success" role="alert">Berhasil ubah data pengganti</div>';
    //                     $this->session->set_flashdata( 'message', $data[ 'message' ] );

    //                     redirect( base_url().'dashboard/henkaten' );
    //                 } else {
    //                     $data[ 'message' ] = '<div class="alert alert-warning" role="alert">Maaf, Anda gagal tambah data pengganti</div>';
    //                     $this->session->set_flashdata( 'message', $data[ 'message' ] );

    //                     redirect( base_url().'dashboard/hadir' );
    //                 }
    //             } else {
    //                 $data[ 'insert_henkaten' ] = array(
    //                     'hadir_id' => $id,
    //                     'hen_npk' => $mp_id,
    //                     'hen_nama' => $mp_nama,
    //                     'hen_jalur' => $mp_jalur,
    //                     'hen_status' => $mp_status,
    //                     'hen_shift' => $mp_shift,
    //                     'hen_ganti' => $mp_peng_id,
    //                     'hen_gan_nama' => $mp_peng_nama,
    //                     'hen_gan_sts' => $mp_peng_sts,
    //                     'status_ganti' => "Menunggu Pengganti"
    //                 );

    //                 $replace = $this->m_data->insert_data( $data[ 'insert_henkaten' ], 'henkaten' );

    //                 if ( $replace ) {
    //                     $data[ 'message' ] = '<div class="alert alert-success" role="alert">Berhasil ubah data pengganti</div>';
    //                     $this->session->set_flashdata( 'message', $data[ 'message' ] );

    //                     redirect( base_url().'dashboard/henkaten' );
    //                 } else {
    //                     $data[ 'message' ] = '<div class="alert alert-warning" role="alert">Maaf, Anda gagal tambah data pengganti</div>';
    //                     $this->session->set_flashdata( 'message', $data[ 'message' ] );

    //                     redirect( base_url().'dashboard/hadir' );
    //                 }
    //             }
    //         } else {
    //             $data[ 'message' ] = '<div class="alert alert-warning" role="alert">Maaf, Anda gagal ubah data absen dan tambah data pengganti</div>';
    //             $this->session->set_flashdata( 'message', $data[ 'message' ] );

    //             redirect( base_url().'dashboard/hadir' );
    //         }
    //     } else {
    //         $id = $this->input->post( 'id' );
    //         $where = array(
    //             'hadir_id' => $id
    //         );

    //         $data[ 'record' ] =  $this->m_data->tampil_data();
    //         $data[ 'hadir' ] = $this->m_data->edit_data( $where, 'hadir' )->result();
    //         $data[ 'kodeabsen' ] = $this->m_data->get_data( 'kodeabsen' )->result();

    //         $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();
    //         $data[ 'jumlah_hadir' ] = $this->m_data->get_data( 'hadir' )->num_rows();
    //         $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='A'" )->num_rows();

    //         $this->load->view( 'dashboard/v_header' );
    //         $this->load->view( 'dashboard/v_henkaten', $data );
    //         $this->load->view( 'dashboard/v_footer' );
    //     }
    // }

    // public function hadir_hapus( $id ) {
    //     $where = array(
    //         'hadir_id' => $id
    //     );

    //     $isDeleteHenkaten = $this->m_data->delete_data( $where, 'henkaten' );

    //     if ($isDeleteHenkaten > 0) {
    //         $isDeleteHadir = $this->m_data->delete_data( $where, 'hadir' );

    //         if ($isDeleteHadir > 0) {

    //             $data[ 'message' ] = '<div class="alert alert-success" role="alert">Berhasil, Data berhasil dihapus</div>';
    //             $this->session->set_flashdata( 'message', $data[ 'message' ] );

    //             redirect( base_url().'dashboard/hadir' );
    //         }
    //     } else {
    //         $data[ 'message' ] = '<div class="alert alert-success" role="alert">Gagal, Data gagal dihapus</div>';
    //         $this->session->set_flashdata( 'message', $data[ 'message' ] );

    //         redirect( base_url().'dashboard/hadir' );
    //     }
    // }
    // // END CRUD hadir

    // CRUD Skill

    public function skil() {
        $jalur = $this->session->userdata( 'jalur' );
        $pos = $this->session->userdata( 'pos' );
        $username = $this->session->userdata( 'username' );
        $level = $this->session->userdata( 'level' );
        $status = $this->session->userdata( 'status' );

        if ( $level == 'admin' ) {
            $data[ 'skil' ] = null;
            $data[ 'hadir' ] = $this->db->query( 'SELECT * FROM hadir,jalur,pengguna WHERE hadir_jalur=jalur_id and hadir_jalur=pengguna_jalur order by hadir_jalur desc' )->result();
        } else {
            if ( $level == 'Foreman' ) {
                $data[ 'skil' ] = $this->globalmodel->join_table( 'skil', 'jalur', 'jalur_id =skiljalur_id', '*', "skiljalur_id = '$jalur'" );
                // $data[ 'hadir' ] = $this->globalmodel->join_table( 'hadir', 'jalur', 'pos', 'jalur_id =hadir_jalur', 'pos_id = hadir_pos', '*', "hadir_jalur = '$jalur'" );
                // $data[ 'mp' ] = $this->db->query( "SELECT *,(SELECT jalur_nama FROM jalur WHERE jalur_id=mp_jalur) as jalur_nama,(SELECT jalur_nama FROM jalur WHERE jalur_id=mp_jalur) as jalur_nama FROM mp WHERE mp_jalur='$jalur' order by mp_jalur desc" )->result();
            } else if ( $level == 'spv' ) {
                $data[ 'skil' ] = null;
                $data[ 'hadir' ] = $this->db->query( 'SELECT * FROM mp,jalur WHERE mp_jalur=jalur_id order by mp_jalur desc' )->result();
            }
        }

        // $data[ 'skil' ] = $this->db->query( 'SELECT * FROM skil,pos,pengguna WHERE pos_kode=pos_id AND jalur_id=pengguna_jalur order by pos_kode desc' )->result();
        $data[ 'record' ] =  $this->m_data->tampil_data();
        $data[ 'pos' ] = $this->m_data->get_data( 'pos' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_skil', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function skil_tambah() {
        $data[ 'record' ] =  $this->m_data->tampil_data();
        $data[ 'pos' ] = $this->m_data->get_data( 'pos' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_skil_tambah', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function skil_aksi() {
        $this->form_validation->set_rules( 'mp_id', 'mp_id', 'required' );
        $this->form_validation->set_rules( 'mp_nama', 'mp_nama', 'required' );
        $this->form_validation->set_rules( 'mp_jalur', 'mp_jalur', 'required' );
        $this->form_validation->set_rules( 'pos_kode', 'pos_kode', 'required' );
        $this->form_validation->set_rules( 'score', 'score', 'required' );
        $this->form_validation->set_rules( 'skil_sts', 'skil_sts', 'required' );

        if ( $this->form_validation->run() != false ) {
            // $tanggal = date( 'Y-m-d H:i:s' );
            $mp_id = $this->input->post( 'mp_id' );
            $mp_nama = $this->input->post( 'mp_nama' );
            $mp_jalur = $this->input->post( 'mp_jalur' );
            $pos_kode = $this->input->post( 'pos_kode' );
            $score = $this->input->post( 'score' );
            $skil_sts = $this->input->post( 'skil_sts' );

            $data = array(
                // 'skil_tgl' => $tanggal,
                'mp_id' => $mp_id,
                'mp_nama' => $mp_nama,
                'jalur_id' => $mp_jalur,
                'pos_kode' => $pos_kode,
                'skill_score' => $score,
                'skill_sts' => $skil_sts,

            );

            $this->m_data->insert_data( $data, 'skil' );

            redirect( base_url().'dashboard/skil' );

        } else {
            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_skil_tambah' );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function skil_edit( $id ) {
        $where = array(
            'skil_id' => $id
        );

        $data[ 'record' ] =  $this->m_data->tampil_data();
        $data[ 'skil' ] = $this->m_data->edit_data( $where, 'skil' )->result();
        $data[ 'pos' ] = $this->m_data->get_data( 'pos' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_skil_edit', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function skil_update() {
        $this->form_validation->set_rules( 'mp_id', 'mp_id', 'required' );

        if ( $this->form_validation->run() != false ) {
            $id = $this->input->post( 'id' );
            $mp_id = $this->input->post( 'mp_id' );
            $mp_nama = $this->input->post( 'mp_nama' );
            $mp_jalur = $this->input->post( 'mp_jalur' );
            $pos_kode = $this->input->post( 'pos_kode' );
            $score = $this->input->post( 'score' );
            $skil_sts = $this->input->post( 'skil_sts' );

            $where = array(
                'skil_id' => $id
            );

            $data = array(
                'mp_id' => $mp_id,
                'mp_nama' => $mp_nama,
                'jalur_id' => $mp_jalur,
                'pos_kode' => $pos_kode,
                'skill_score' => $score,
                'skill_sts' => $skil_sts,

            );

            $this->m_data->update_data( $where, $data, 'skil' );

            redirect( base_url().'dashboard/skil' );

        } else {

            $id = $this->input->post( 'id' );
            $where = array(
                'skil_id' => $id
            );

            $data[ 'record' ] =  $this->m_data->tampil_data();
            $data[ 'skil' ] = $this->m_data->edit_data( $where, 'skil' )->result();
            $data[ 'pos' ] = $this->m_data->get_data( 'pos' )->result();
            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_skil_edit', $data );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function skil_hapus( $id ) {
        $where = array(
            'skil_id' => $id
        );

        $this->m_data->delete_data( $where, 'skil' );

        redirect( base_url().'dashboard/skil' );
    }
    // END CRUD skil

    // CRUD HENKATEN

    public function henkaten() {
        $data[ 'message' ] = $this->session->flashdata( 'message' );

        // Session NPK Karyawan
        $jalur = $this->session->userdata( 'jalur' );
        $pos = $this->session->userdata( 'pos' );
        $username = $this->session->userdata( 'username' );
        $level = $this->session->userdata( 'level' );
        $status = $this->session->userdata( 'status' );

        if ( $level == 'admin' ) {
            $data[ 'hadir' ] = $this->db->query( 'SELECT * FROM henkaten, jalur WHERE hen_jalur = jalur_id order by hadir_id desc' )->result();
        } else {
            if ( $level == 'Foreman' ) {
                $data[ 'hadir' ] = $this->globalmodel->join_table3( 'hadir', 'jalur', 'kodeabsen', "jalur_id = '$jalur'", 'absen_id = hadir_kode', '*', "hadir_jalur = '$jalur'" );
            } else if ( $level == 'spv' ) {
                $data[ 'hadir' ] = $this->globalmodel->join_table3( 'hadir', 'jalur', 'kodeabsen', "jalur_id = '$jalur'", 'absen_id = hadir_kode', '*', "hadir_jalur = '$jalur'" );
            }
        }

        // $data[ 'hadir' ] = $this->db->query( 'SELECT * FROM hadir,kodeabsen,jalur,pengguna WHERE hadir_kode=absen_id and hadir_jalur=jalur_id and hadir_jalur=pengguna_jalur order by hadir_kode desc' )->result();
        $data[ 'record' ] =  $this->m_data->tampil_data();
        $data[ 'kodeabsen' ] = $this->m_data->get_data( 'kodeabsen' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_henkaten', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function henkaten_tambah() {
        $data[ 'record' ] =  $this->m_data->tampil_data();
        $data[ 'kodeabsen' ] = $this->m_data->get_data( 'kodeabsen' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_henkaten_tambah', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function henkaten_aksi() {
        $this->form_validation->set_rules( 'mp_id', 'mp_id', 'required' );
        $this->form_validation->set_rules( 'mp_nama', 'mp_nama', 'required' );
        $this->form_validation->set_rules( 'mp_jalur', 'mp_jalur', 'required' );
        $this->form_validation->set_rules( 'mp_status', 'mp_status', 'required' );
        $this->form_validation->set_rules( 'mp_shift', 'mp_shift', 'required' );
        $this->form_validation->set_rules( 'kode', 'kode', 'required' );
        $this->form_validation->set_rules( 'ket', 'ket', 'required' );

        if ( $this->form_validation->run() != false ) {
            $tanggal = date( 'Y-m-d H:i:s' );
            $mp_id = $this->input->post( 'mp_id' );
            $mp_nama = $this->input->post( 'mp_nama' );
            $mp_jalur = $this->input->post( 'mp_jalur' );
            $mp_status = $this->input->post( 'mp_status' );
            $mp_shift = $this->input->post( 'mp_shift' );
            $in = $this->input->post( 'in' );
            $out = $this->input->post( 'out' );
            $kode = $this->input->post( 'kode' );
            $ket = $this->input->post( 'ket' );

            $data = array(
                'hadir_tgl' => $tanggal,
                'hadir_npk' => $mp_id,
                'hadir_nama' => $mp_nama,
                'hadir_jalur' => $mp_jalur,
                'hadir_status' => $mp_status,
                'hadir_shift' => $mp_shift,
                'hadir_in' => $in,
                'hadir_out' => $out,
                'hadir_kode' => $kode,
                'hadir_ket' => $ket,

            );

            $result = $this->m_data->insert_data( $data, 'hadir' );

            redirect( base_url().'dashboard/hadir' );

        } else {
            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_henkaten_tambah' );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function henkaten_edit( $id ) {
        $where = array(
            'hadir_id' => $id
        );

        $data[ 'hadir' ] = $this->m_data->edit_data( $where, 'hadir' )->result();
        $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_henkaten_edit', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function henkaten_update() {
        $this->form_validation->set_rules( 'hadir', 'hadir', 'required' );
        if ( $this->form_validation->run() != false ) {

            $id = $this->input->hadirt( 'id' );
            $jalur = $this->input->hadirt( 'jalur' );
            $hadir = $this->input->hadirt( 'hadir' );

            $where = array(
                'hadir_id' => $id
            );

            $data = array(
                'hadir_jalur' => $jalur,
                'hadir_nama' => $hadir,

            );

            $this->m_data->update_data( $where, $data, 'hadir' );

            redirect( base_url().'dashboard/hadir' );

        } else {
            $id = $this->input->post( 'id' );
            $where = array(
                'hadir_id' => $id
            );

            $data[ 'hadir' ] = $this->m_data->edit_data( $where, 'hadir' )->result();
            $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

            $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();
            $data[ 'jumlah_hadir' ] = $this->m_data->get_data( 'hadir' )->num_rows();
            $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='A'" )->num_rows();

            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_henkaten_edit', $data );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function henkaten_hapus( $id ) {
        $where = array(
            'hadir_id' => $id
        );

        $this->m_data->delete_data( $where, 'hadir' );

        redirect( base_url().'dashboard/henkaten' );
    }
    // END CRUD hadir

    // CRUD spot

    public function spot() {
        $data[ 'spot' ] = $this->db->query( 'SELECT * FROM spot,jalur,pengguna WHERE spot_jalur=jalur_id and spot_author=pengguna_id order by spot_id desc' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_spot', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function spot_tambah() {
        $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_spot_tambah', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function spot_aksi() {
        // Wajib isi judul, konten dan jalur
        // $this->form_validation->set_rules( 'judul', 'Judul', 'required|is_unique[spot.spot_judul]' );

        $this->form_validation->set_rules( 'konten', 'Konten', 'required' );
        $this->form_validation->set_rules( 'jalur', 'jalur', 'required' );

        // Membuat gambar wajib di isi
        if ( empty( $_FILES[ 'sampul' ][ 'name' ] ) ) {
            $this->form_validation->set_rules( 'sampul', 'Gambar Sampul', 'required' );
        }

        if ( $this->form_validation->run() != false ) {

            $config[ 'upload_path' ]   = './gambar/spot/';
            $config[ 'allowed_types' ] = 'gif|jpg|png';

            $this->load->library( 'upload', $config );

            if ( $this->upload->do_upload( 'sampul' ) ) {

                // mengambil data tentang gambar
                $gambar = $this->upload->data();

                $tanggal = date( 'Y-m-d H:i:s' );
                $tt = $this->input->post( 'tt' );
                $pos = $this->input->post( 'pos' );
                $jig = $this->input->post( 'jig' );
                $gun = $this->input->post( 'gun' );
                $typegun = $this->input->post( 'typegun' );
                $jmlgnl = $this->input->post( 'jmlgnl' );
                $jmlsafe = $this->input->post( 'jmlsafe' );
                $judul = $this->input->post( 'judul' );
                $slug = strtolower( url_title( $judul ) );
                $konten = $this->input->post( 'konten' );
                $sampul = $gambar[ 'file_name' ];
                $author = $this->session->userdata( 'id' );
                $jalur = $this->input->post( 'jalur' );
                $status = $this->input->post( 'status' );

                $data = array(
                    'spot_tanggal' => $tanggal,
                    'spot_tt' => $tt,
                    'spot_pos' => $pos,
                    'spot_jig' => $jig,
                    'spot_gun' => $gun,
                    'spot_tipegun' => $typegun,
                    'spot_gnl' => $jmlgnl,
                    'spot_safe' => $jmlsafe,
                    'spot_judul' => $judul,
                    'spot_slug' => $slug,
                    'spot_konten' => $konten,
                    'spot_sampul' => $sampul,
                    'spot_author' => $author,
                    'spot_jalur' => $jalur,
                    'spot_status' => $status,
                );

                $this->m_data->insert_data( $data, 'spot' );

                redirect( base_url().'dashboard/spot' );

            } else {

                $this->form_validation->set_message( 'sampul', $data[ 'gambar_error' ] = $this->upload->display_errors() );

                $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();
                $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();
                $data[ 'jumlah_hadir' ] = $this->m_data->get_data( 'hadir' )->num_rows();
                $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='A'" )->num_rows();

                $this->load->view( 'dashboard/v_header' );
                $this->load->view( 'dashboard/v_spot_tambah', $data );
                $this->load->view( 'dashboard/v_footer' );
            }

        } else {
            $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

            $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();
            $data[ 'jumlah_hadir' ] = $this->m_data->get_data( 'hadir' )->num_rows();
            $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='A'" )->num_rows();

            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_spot_tambah', $data );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function spot_edit( $id ) {
        $where = array(
            'spot_id' => $id
        );

        $data[ 'spot' ] = $this->m_data->edit_data( $where, 'spot' )->result();
        $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_spot_edit', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function spot_update() {
        // Wajib isi judul, konten dan jalur
        $this->form_validation->set_rules( 'judul', 'Judul', 'required' );
        $this->form_validation->set_rules( 'konten', 'Konten', 'required' );
        $this->form_validation->set_rules( 'jalur', 'Kategori', 'required' );

        if ( $this->form_validation->run() != false ) {

            $id = $this->input->post( 'id' );
            $tanggal = date( 'Y-m-d H:i:s' );
            $tt = $this->input->post( 'tt' );
            $pos = $this->input->post( 'pos' );
            $jig = $this->input->post( 'jig' );
            $gun = $this->input->post( 'gun' );
            $typegun = $this->input->post( 'typegun' );
            $jmlgnl = $this->input->post( 'jmlgnl' );
            $jmlsafe = $this->input->post( 'jmlsafe' );
            $judul = $this->input->post( 'judul' );
            $slug = strtolower( url_title( $judul ) );
            $konten = $this->input->post( 'konten' );
            $author = $this->session->userdata( 'id' );
            $jalur = $this->input->post( 'jalur' );
            $quality = $this->input->post( 'quality' );
            $pe = $this->input->post( 'pe' );
            $project = $this->input->post( 'project' );
            $bqc = $this->input->post( 'bqc' );
            $spv = $this->input->post( 'spv' );
            $status = $this->input->post( 'status' );

            $where = array(
                'spot_id' => $id
            );

            $data = array(
                'spot_tanggal' => $tanggal,
                'spot_tt' => $tt,
                'spot_pos' => $pos,
                'spot_jig' => $jig,
                'spot_gun' => $gun,
                'spot_tipegun' => $typegun,
                'spot_gnl' => $jmlgnl,
                'spot_safe' => $jmlsafe,
                'spot_judul' => $judul,
                'spot_slug' => $slug,
                'spot_konten' => $konten,
                'spot_author' => $author,
                'spot_jalur' => $jalur,
                'spot_quality' => $quality,
                'spot_pe' => $pe,
                'spot_project' => $project,
                'spot_bqc' => $bqc,
                'spot_spv' => $spv,
                'spot_status' => $status,
            );

            $this->m_data->update_data( $where, $data, 'spot' );

            if ( !empty( $_FILES[ 'sampul' ][ 'name' ] ) ) {
                $config[ 'upload_path' ]   = './gambar/spot/';
                $config[ 'allowed_types' ] = 'gif|jpg|png';

                $this->load->library( 'upload', $config );

                if ( $this->upload->do_upload( 'sampul' ) ) {

                    // mengambil data tentang gambar
                    $gambar = $this->upload->data();

                    $data = array(
                        'spot_sampul' => $gambar[ 'file_name' ],
                    );

                    $this->m_data->update_data( $where, $data, 'spot' );

                    redirect( base_url().'dashboard/spot' );

                } else {
                    $this->form_validation->set_message( 'sampul', $data[ 'gambar_error' ] = $this->upload->display_errors() );

                    $where = array(
                        'spot_id' => $id
                    );
                    $data[ 'spot' ] = $this->m_data->edit_data( $where, 'spot' )->result();
                    $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();
                    $this->load->view( 'dashboard/v_header' );
                    $this->load->view( 'dashboard/v_spot_edit', $data );
                    $this->load->view( 'dashboard/v_footer' );
                }
            } else {
                redirect( base_url().'dashboard/spot' );

            }

        } else {
            $id = $this->input->post( 'id' );
            $where = array(
                'spot_id' => $id
            );

            $data[ 'spot' ] = $this->m_data->edit_data( $where, 'spot' )->result();
            $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

            $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();
            $data[ 'jumlah_hadir' ] = $this->m_data->get_data( 'hadir' )->num_rows();
            $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='A'" )->num_rows();

            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_spot_edit', $data );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function spot_hapus( $id ) {
        $where = array(
            'spot_id' => $id
        );

        $path = $_SERVER[ 'DOCUMENT_ROOT' ].'/bms/gambar/spot/';

        $query_files = $this->globalmodel->get_list( 'spot', $where );

        if ( count( $query_files ) > 0 ) {
            foreach ( $query_files as $item ) {
                $data[ 'spot_sampul' ] = $item->spot_sampul;
            }
        }

        $files = glob( $path . $data[ 'spot_sampul' ] );
        // get file names

        foreach ( $files as $file ) {
            if ( is_file( $file ) ) {
                unlink( $file );
            }
        }

        $this->m_data->delete_data( $where, 'spot' );
        redirect( base_url().'dashboard/spot' );
    }

    // end crud spot

    // CRUD PAGES

    public function pages() {
        $data[ 'halaman' ] = $this->m_data->get_data( 'halaman' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_pages', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function pages_tambah() {
        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_pages_tambah' );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function pages_aksi() {
        // Wajib isi judul, konten
        $this->form_validation->set_rules( 'judul', 'Judul', 'required|is_unique[halaman.halaman_judul]' );
        $this->form_validation->set_rules( 'konten', 'Konten', 'required' );

        if ( $this->form_validation->run() != false ) {

            $judul = $this->input->post( 'judul' );
            $slug = strtolower( url_title( $judul ) );
            $konten = $this->input->post( 'konten' );

            $data = array(
                'halaman_judul' => $judul,
                'halaman_slug' => $slug,
                'halaman_konten' => $konten
            );

            $this->m_data->insert_data( $data, 'halaman' );

            // alihkan kembali ke method pages
            redirect( base_url().'dashboard/pages' );

        } else {
            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_pages_tambah' );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function pages_edit( $id ) {
        $where = array(
            'halaman_id' => $id
        );

        $data[ 'halaman' ] = $this->m_data->edit_data( $where, 'halaman' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_pages_edit', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function pages_update() {
        // Wajib isi judul, konten
        $this->form_validation->set_rules( 'judul', 'Judul', 'required' );
        $this->form_validation->set_rules( 'konten', 'Konten', 'required' );

        if ( $this->form_validation->run() != false ) {

            $id = $this->input->post( 'id' );

            $judul = $this->input->post( 'judul' );
            $slug = strtolower( url_title( $judul ) );
            $konten = $this->input->post( 'konten' );

            $where = array(
                'halaman_id' => $id
            );

            $data = array(
                'halaman_judul' => $judul,
                'halaman_slug' => $slug,
                'halaman_konten' => $konten
            );

            $this->m_data->update_data( $where, $data, 'halaman' );

            redirect( base_url().'dashboard/pages' );
        } else {
            $id = $this->input->post( 'id' );
            $where = array(
                'halaman_id' => $id
            );

            $data[ 'halaman' ] = $this->m_data->edit_data( $where, 'halaman' )->result();
            $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();
            $data[ 'jumlah_hadir' ] = $this->m_data->get_data( 'hadir' )->num_rows();
            $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='A'" )->num_rows();

            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_pages_edit', $data );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function pages_hapus( $id ) {
        $where = array(
            'halaman_id' => $id
        );

        $this->m_data->delete_data( $where, 'halaman' );

        redirect( base_url().'dashboard/pages' );
    }
    // end crud pages

    public function profil() {
        // id pengguna yang sedang login
        $id_pengguna = $this->session->userdata( 'id' );

        $where = array(
            'pengguna_id' => $id_pengguna
        );

        $data[ 'profil' ] = $this->m_data->edit_data( $where, 'pengguna' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_profil', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function profil_update() {
        // Wajib isi nama dan email
        $this->form_validation->set_rules( 'nama', 'Nama', 'required' );
        $this->form_validation->set_rules( 'email', 'Email', 'required' );

        if ( $this->form_validation->run() != false ) {

            $id = $this->session->userdata( 'id' );

            $nama = $this->input->post( 'nama' );
            $email = $this->input->post( 'email' );

            $where = array(
                'pengguna_id' => $id
            );

            $data = array(
                'pengguna_nama' => $nama,
                'pengguna_email' => $email
            );

            $this->m_data->update_data( $where, $data, 'pengguna' );

            redirect( base_url().'dashboard/profil/?alert=sukses' );
        } else {
            // id pengguna yang sedang login
            $id_pengguna = $this->session->userdata( 'id' );

            $where = array(
                'pengguna_id' => $id_pengguna
            );

            $data[ 'profil' ] = $this->m_data->edit_data( $where, 'pengguna' )->result();

            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_profil', $data );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function pengaturan() {
        $data[ 'pengaturan' ] = $this->m_data->get_data( 'pengaturan' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_pengaturan', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function pengaturan_update() {
        // Wajib isi nama dan deskripsi website
        $this->form_validation->set_rules( 'nama', 'Nama Website', 'required' );
        $this->form_validation->set_rules( 'deskripsi', 'Deskripsi Website', 'required' );

        if ( $this->form_validation->run() != false ) {

            $nama = $this->input->post( 'nama' );
            $deskripsi = $this->input->post( 'deskripsi' );
            $link_facebook = $this->input->post( 'link_facebook' );
            $link_twitter = $this->input->post( 'link_twitter' );
            $link_instagram = $this->input->post( 'link_instagram' );
            $link_github = $this->input->post( 'link_github' );

            $where = array();

            $data = array(
                'nama' => $nama,
                'deskripsi' => $deskripsi,
                'link_facebook' => $link_facebook,
                'link_twitter' => $link_twitter,
                'link_instagram' => $link_instagram,
                'link_github' => $link_github
            );

            // update pengaturan
            $this->m_data->update_data( $where, $data, 'pengaturan' );

            // Periksa apakah ada gambar logo yang diupload
            if ( !empty( $_FILES[ 'logo' ][ 'name' ] ) ) {

                $config[ 'upload_path' ]   = './gambar/website/';
                $config[ 'allowed_types' ] = 'jpg|png';

                $this->load->library( 'upload', $config );

                if ( $this->upload->do_upload( 'logo' ) ) {
                    // mengambil data tentang gambar logo yang diupload
                    $gambar = $this->upload->data();

                    $logo = $gambar[ 'file_name' ];

                    $this->db->query( "UPDATE pengaturan SET logo='$logo'" );
                }
            }

            redirect( base_url().'dashboard/pengaturan/?alert=sukses' );

        } else {
            $data[ 'pengaturan' ] = $this->m_data->get_data( 'pengaturan' )->result();
            $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();
            $data[ 'jumlah_hadir' ] = $this->m_data->get_data( 'hadir' )->num_rows();
            $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='A'" )->num_rows();

            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_pengaturan', $data );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    // CRUD PENGGUNA

    public function pengguna() {
        $data[ 'pengguna' ] = $this->db->query( 'SELECT * FROM pengguna,jalur WHERE pengguna_jalur=jalur_id order by pengguna_id desc' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_pengguna', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function pengguna_tambah() {
        $data[ 'jalur' ] = $this->m_data->get_data( 'jalur' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_pengguna_tambah', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function pengguna_aksi() {
        // Wajib isi
        $this->form_validation->set_rules( 'nama', 'Nama Pengguna', 'required' );
        $this->form_validation->set_rules( 'npk', 'Npk Pengguna', 'required' );
        $this->form_validation->set_rules( 'email', 'Email Pengguna', 'required' );
        $this->form_validation->set_rules( 'phone', 'WA Pengguna', 'required' );
        $this->form_validation->set_rules( 'username', 'Username Pengguna', 'required' );
        $this->form_validation->set_rules( 'password', 'Password Pengguna', 'required|min_length[8]' );
        $this->form_validation->set_rules( 'level', 'Level Pengguna', 'required' );
        $this->form_validation->set_rules( 'status', 'Status Pengguna', 'required' );

        if ( $this->form_validation->run() != false ) {
            $nama = $this->input->post( 'nama' );
            $npk = $this->input->post( 'npk' );
            $shift = $this->input->post( 'shift' );
            $jalur = $this->input->post( 'jalur' );
            $email = $this->input->post( 'email' );
            $phone = $this->input->post( 'phone' );
            $username = $this->input->post( 'username' );
            $password = md5( $this->input->post( 'password' ) );
            $level = $this->input->post( 'level' );
            $status = $this->input->post( 'status' );

            $data = array(
                'pengguna_nama' => $nama,
                'pengguna_npk' => $npk,
                'pengguna_shift' => $shift,
                'pengguna_jalur' => $jalur,
                'pengguna_pos' => "",
                'pengguna_email' => $email,
                'pengguna_wa' => $phone,
                'pengguna_username' => $username,
                'pengguna_password' => $password,
                'pengguna_level' => $level,
                'pengguna_status' => $status
            );

            $result = $this->m_data->insert_data( $data, 'pengguna' );

            redirect( base_url().'dashboard/pengguna' );

        } else {

            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_pengguna_tambah' );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function pengguna_edit( $id ) {
        $where = array(
            'pengguna_id' => $id
        );

        $data[ 'pengguna' ] = $this->m_data->edit_data( $where, 'pengguna' )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_pengguna_edit', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function pengguna_update() {
        // Wajib isi
        $this->form_validation->set_rules( 'nama', 'Nama Pengguna', 'required' );
        $this->form_validation->set_rules( 'email', 'Email Pengguna', 'required' );
        $this->form_validation->set_rules( 'username', 'Username Pengguna', 'required' );
        $this->form_validation->set_rules( 'level', 'Level Pengguna', 'required' );
        $this->form_validation->set_rules( 'status', 'Status Pengguna', 'required' );

        if ( $this->form_validation->run() != false ) {

            $id = $this->input->post( 'id' );

            $nama = $this->input->post( 'nama' );
            $email = $this->input->post( 'email' );
            $username = $this->input->post( 'username' );
            $password = md5( $this->input->post( 'password' ) );
            $level = $this->input->post( 'level' );
            $status = $this->input->post( 'status' );

            if ( $this->input->post( 'password' ) == '' ) {
                $data = array(
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email,
                    'pengguna_username' => $username,
                    'pengguna_level' => $level,
                    'pengguna_status' => $status
                );
            } else {
                $data = array(
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email,
                    'pengguna_username' => $username,
                    'pengguna_password' => $password,
                    'pengguna_level' => $level,
                    'pengguna_status' => $status
                );
            }

            $where = array(
                'pengguna_id' => $id
            );

            $this->m_data->update_data( $where, $data, 'pengguna' );

            redirect( base_url().'dashboard/pengguna' );
        } else {
            $id = $this->input->post( 'id' );
            $where = array(
                'pengguna_id' => $id
            );

            $data[ 'pengguna' ] = $this->m_data->edit_data( $where, 'pengguna' )->result();

            $data[ 'jumlah_mp' ] = $this->m_data->get_data( 'mp' )->num_rows();
            $data[ 'jumlah_hadir' ] = $this->m_data->get_data( 'hadir' )->num_rows();
            $data[ 'jumlah_memberA' ] = $this->db->query( "SELECT * FROM mp WHERE  mp_shift='A'" )->num_rows();

            $this->load->view( 'dashboard/v_header' );
            $this->load->view( 'dashboard/v_pengguna_edit', $data );
            $this->load->view( 'dashboard/v_footer' );
        }
    }

    public function pengguna_hapus( $id ) {
        $where = array(
            'pengguna_id' => $id
        );

        $data[ 'pengguna_hapus' ] = $this->m_data->edit_data( $where, 'pengguna' )->row();
        $data[ 'pengguna_lain' ] = $this->db->query( "SELECT * FROM pengguna WHERE pengguna_id != $id" )->result();

        $this->load->view( 'dashboard/v_header' );
        $this->load->view( 'dashboard/v_pengguna_hapus', $data );
        $this->load->view( 'dashboard/v_footer' );
    }

    public function pengguna_hapus_aksi() {
        $pengguna_hapus = $this->input->post( 'pengguna_hapus' );
        $pengguna_tujuan = $this->input->post( 'pengguna_tujuan' );

        // hapus pengguna
        $where = array(
            'pengguna_id' => $pengguna_hapus
        );

        $this->m_data->delete_data( $where, 'pengguna' );

        // pindahkan semua spot pengguna yang dihapus ke pengguna yang dipilih
        $w = array(
            'spot_author' => $pengguna_hapus
        );

        $d = array(
            'spot_author' => $pengguna_tujuan
        );

        $this->m_data->update_data( $w, $d, 'spot' );

        redirect( base_url().'dashboard/pengguna' );
    }
    // end crud pengguna

}
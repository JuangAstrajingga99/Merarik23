<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_wisata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_wisata_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'jenis_wisata/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_wisata/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_wisata/index.html';
            $config['first_url'] = base_url() . 'jenis_wisata/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_wisata_model->total_rows($q);
        $jenis_wisata = $this->Jenis_wisata_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'title' => 'Jenis Wisata' , 
            'user' => $user,
            'jenis_wisata_data' => $jenis_wisata,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('jenis_wisata/jenis_wisata_list', $data);
        $this->load->view('admin/footer');
    }

    public function create() 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();

        $data = array(
            'title'             => 'Jenis Wisata' , 
            'user'              => $user,
            'button'            => 'Tambah',
            'action'            => site_url('jenis_wisata/create_action'),
            'id_jenis_wisata' => set_value('id_jenis_wisata'),
            'nama_wisata'     => set_value('nama_wisata'),
            'icon_marker'       => set_value('icon_marker'),
	    );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('jenis_wisata/jenis_wisata_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $config['upload_path'] = './gambar/marker/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 10;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('icon_marker')) {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata('error_gambar', $errors);
        } 

        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            $data = array(
        		'nama_wisata' => $this->input->post('nama_wisata',TRUE),
        		'icon_marker' => $gambar,
	        );

            $this->Jenis_wisata_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_wisata'));
        }
    }
    
    public function update($id) 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $row = $this->Jenis_wisata_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Jenis Wisata' , 
                'user' => $user,
                'button' => 'Update',
                'action' => site_url('jenis_wisata/update_action'),
        		'id_jenis_wisata' => set_value('id_jenis_wisata', $row->id_jenis_wisata),
        		'nama_wisata' => set_value('nama_wisata', $row->nama_wisata),
        		'icon_marker' => set_value('icon_marker', $row->icon_marker),
	        );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi');
            $this->load->view('jenis_wisata/jenis_wisata_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_wisata'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenis_wisata', TRUE));
        } else {
            $data = array(
        		'nama_wisata' => $this->input->post('nama_wisata',TRUE),
        		'icon_marker' => $this->input->post('icon_marker',TRUE),
	        );

            $this->Jenis_wisata_model->update($this->input->post('id_jenis_wisata', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_wisata'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_wisata_model->get_by_id($id);

        if ($row) {
            $this->Jenis_wisata_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_wisata'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_wisata'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('nama_wisata', 'nama wisata', 'trim|required');
    	$this->form_validation->set_rules('id_jenis_wisata', 'id_jenis_wisata', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jenis_wisata.xls";
        $judul = "jenis_wisata";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama Wisata");
    	xlsWriteLabel($tablehead, $kolomhead++, "Icon Marker");

    	foreach ($this->Jenis_bangunan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_wisata);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->icon_marker);

    	    $tablebody++;
                $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jenis_wisata.doc");

        $data = array(
            'jenis_wisata_data' => $this->Jenis_wisata_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('jenis_wisata/jenis_wisata_doc',$data);
    }

}

/* End of file Jenis_wisata.php */
/* Location: ./application/controllers/Jenis_wisata.php */
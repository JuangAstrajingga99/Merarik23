<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class wilayah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('wilayah_model');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $wilayah = $this->wilayah_model->get_all();
        $data = array(
            'wilayah_data' => $wilayah,
            'title' => 'Data Wilayah' , 
            'user' => $user,
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('wilayah/wilayah_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $row = $this->wilayah_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'Data Wilayah', 
                'user' => $user,
                'id_wilayah' => $row->id_wilayah,
                'no_wilayah'    => $row->no_wilayah,
                'nama wilayah'   => $row->nama_wilayah,
                'alamat'      => $row->alamat,
                'no_telepon_pengelola'  => $row->no_telepon_pengelola,
            );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi');
            $this->load->view('wilayah/wilayah_read', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah'));
        }
    }

    public function create() 
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $wilayah = $this->wilayah_model->get_all();
        $data = array(
            'wilayah_data' => $wilayah,
            'title'         => 'Data Wilayah' , 
            'user'          => $user,
            'button'        => 'Tambah',
            'action'        => site_url('wilayah/create_action'),
            'id_wilayah'   => set_value('id_wilayah'),
            'no_wilayah'      => set_value('no_wilayah'),
            'nama_wilayah'          => set_value('nama_wilayah'),
            'alamat'        => set_value('alamat'),
            'no_telepon_pengelola'    => set_value('no_telepon_pengelola'),
            'cek'           => 0,
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('wilayah/wilayah_form', $data);
        $this->load->view('admin/footer');
        
    }
    
    public function create_action() 
    {
        $no_wilayah = $this->input->post('no_wilayah',TRUE);
        $this->form_validation->set_rules('no_wilayah', 'no wilayah', 'trim|required|numeric|is_unique[wilayah.no_wilayah]',
            array('required' => 'harus di isi', 
                    'numeric' => 'harus angka',
                    'is_unique'=> 'no wilayah sudah terdaftar'
                ));
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'no_wilayah'   => $no_wilayah,
            'nama_wilayah'       => $this->input->post('nama_wilayah',TRUE),
            'alamat'     => $this->input->post('alamat',TRUE),
            'no_telepon_pengelola' => $this->input->post('no_telepon_pengelola',TRUE),
    	    );

            $this->wilayah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('wilayah'));
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
        $row = $this->wilayah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'title'       => 'Data Wilayah' , 
                'user'        => $user,
                'button'      => 'Update',
                'action'      => site_url('wilayah/update_action'),
                'id_wilayah' => set_value('id_wilayah', $row->id_wilayah),
                'no_wilayah'    => set_value('no_wilayah', $row->no_wilayah),
                'nama_wilayah'        => set_value('nama_wilayah', $row->nama_wilayah),
                'alamat'      => set_value('alamat', $row->alamat),
                'no_telepon_pengelola'  => set_value('no_telepon_pengelola', $row->no_telepon_pengelola),
                'cek'         => 1,
            );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi');
            $this->load->view('wilayah/wilayah_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_wilayah', TRUE));
        } else {
            $data = array(
                'no_wilayah'   => $this->input->post('no_wilayah',TRUE),
                'nama_wilayah'       => $this->input->post('nama_wilayah',TRUE),
                'alamat'     => $this->input->post('alamat',TRUE),
                'no_telepon_pengelola' => $this->input->post('no_telepon_pengelola',TRUE),
	        );

            $this->wilayah_model->update($this->input->post('id_wilayah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('wilayah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->wilayah_model->get_by_id($id);

        if ($row) {
            $this->wilayah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('wilayah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah'));
        }
    }

    public function _rules() 
    {
        
    	$this->form_validation->set_rules('nama_wilayah', 'nama_wilayah', 'trim|required',array('required' => 'harus di isi', ));
    	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required',array('required' => 'harus di isi', ));
    	$this->form_validation->set_rules('no_telepon_pengelola', 'no telepon_pengelola', 'trim|required|numeric',
            array('required' => 'harus di isi', 
                     'numeric'=> 'harus angka'
                ));
    	$this->form_validation->set_rules('id_wilayah', 'id_wilayah', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "wilayah.xls";
        $judul = "wilayah";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "No Wilayah");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama_Wilayah");
    	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
    	xlsWriteLabel($tablehead, $kolomhead++, "No Telepon_Pengelola");

	   foreach ($this->wilayah_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->no_wilayah);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_wilayah);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telepon_pengelola);

    	    $tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=wilayah.doc");

        $data = array(
            'wilayah_data' => $this->wilayah_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('wilayah/wilayah_doc',$data);
    }

}

/* End of file wilayah.php */
/* Location: ./application/controllers/wilayah.php */
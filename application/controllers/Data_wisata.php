<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_wisata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Data_wisata_model');
        $this->load->model('wilayah_model');
        $this->load->model('Jenis_wisata_model');
        $this->load->library('form_validation');
        $this->load->library('googlemaps');
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $data_wisata = $this->Data_wisata_model->get_all();
        $data = array(
            'title' => 'Data Wisata' , 
            'user' => $user,
            'data_wisata_data' => $data_wisata
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('data_wisata/data_wisata_list', $data);
        $this->load->view('admin/footer');
    }

    public function get_data_wisata()
    {
        $p = $this->tabel_wilayah_model->get_all();
        echo json_encode($p);

    }

    public function wilayah($id)
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $user = $user = $this->ion_auth->user()->row();
        $data_wisata = $this->Data_wisata_model->get_by_id_wilayah($id);
        $row = $this->wilayah_model->get_by_id($id);

        $config['center'] = '-8.529283394536302, 120.02785834149252';
        $config['zoom'] = 'auto';
        $config['map_type'] = 'HYBRID';
        $this->googlemaps->initialize($config);

        if ($data_wisata) {
            foreach ($data_wisata as $p) {
                $marker = array();
                $marker['position'] = $p->lat.','.$p->lng;
                $marker['infowindow_content'] = 'Wilayah : '.$p->nama_wilayah.'<p>Harga Tiket : '.$p->harga_tiket.'</p><p>Luas Wilayah :'.$p->luas_wisata.' m2</p><img src="'.base_url().'gambar/wisata/'.$p->gambar.'" width="200px" heigt="200px"><br><br><a href="'.site_url().'data_wisata/update/'.$p->id_wisata.'" class="btn btn-warning btn-sm"> <i class="fa fa-edit"> </i> Edit</a><a href="'.site_url().'data_wisata/delete/'.$p->id_wisata.'/'.$p->id_wilayah.'" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"><i class="fa fa-trash"> </i> Delete</a>';
                $marker['icon'] = base_url('gambar/marker/'.$p->icon_marker);
                $this->googlemaps->add_marker($marker);
            }
        }
        
        if ($row) {
            $data = array(
                'title' => 'Data Wilayah' , 
                'user' => $user,
                'id_wilayah' => $row->id_wilayah,
                'no_wilayah'    => $row->no_wilayah,
                'nama_wilayah'   => $row->nama_wilayah,
                'alamat'      => $row->alamat,
                'no_telepon_pengelola'  => $row->no_telepon_pengelola,
                'data_wisata_data' => $data_wisata,
                'map' => $this->googlemaps->create_map(),
            );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi');
            $this->load->view('data_wisata/data_wisata_wilayah', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('wilayah'));
        }
        
    }

    public function cetak_per_id($id_wilayah)
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=data_wisata.doc");

        $data = array(
            'data_wisata_data' => $this->Data_wisata_model->get_by_id_wilayah($id_wilayah),
            'start' => 0
        );
        
        $this->load->view('data_wisata/data_wisata_doc',$data);
    }

    public function create($id) 
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $wilayah = $this->wilayah_model->get_by_id($id);
        $user = $user = $this->ion_auth->user()->row();
        $jenis_wisata = $this->Jenis_wisata_model->get_all();

        $lat = "-8.529283394536302";
        $lng = '120.02785834149252';
        $center = $lat.",".$lng;    
        $cfg=array(
            'class'                       =>'map-canvas',
            'map_div_id'                  =>'map-canvas',
            'center'                      =>$center,
            'zoom'                        =>17,
            'map_type'                    => 'HYBRID',
            'places'                      =>TRUE, //Aktifkan pencarian alamat
            'placesAutocompleteInputID'   =>'cari', //set sumber pencarian input
            'placesAutocompleteBoundsMap' =>TRUE,
            'placesAutocompleteOnChange'  =>'showmap();' //Aksi ketika pencarian dipilih
        );
        $this->googlemaps->initialize($cfg);
        
        $marker=array(
            'position'      =>$center,
            'draggable'     =>TRUE,
            'title'         =>'Coba diDrag',
            'ondragend'     =>"document.getElementById('lat').value = event.latLng.lat();
                                document.getElementById('lng').value = event.latLng.lng();
                                showmap();",
        );      
        $this->googlemaps->add_marker($marker);

        $data = array(
            'title'             => 'Data Wilayah' , 
            'user'              => $user,
            'button'            => 'Tambah',
            'action'            => site_url('data_wisata/create_action'),
            'id_wisata'          => set_value('id_wisata'),
            'id_wilayah'       => set_value('id_wisata'),
            'id_jenis_wisata' => set_value('id_jenis_wisata'),
            'penginput'         => set_value('penginput'),
            'harga_tiket'        => set_value('harga_tiket'),
            'luas_wisata'        => set_value('luas_wisata'),
            'lat'               => set_value('lat'),
            'lng'               => set_value('lng'),
            'tanggal'           => set_value('tanggal'),
            'wilayah'          => $wilayah,
            'jenis_wisata'    => $jenis_wisata,
            'map'               => $this->googlemaps->create_map(),
            'latitude'          => $lat,
            'longitude'         => $lng,
	    );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/navigasi');
        $this->load->view('data_wisata/data_wisata_form', $data);
        $this->load->view('admin/footer'); 
    }
    
    public function create_action() 
    {
        $user = $this->ion_auth->user()->row();
        $tanggal = date('Y-m-d G:i:s');

        $config['upload_path'] = './gambar/tanah/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 10;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar')) {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata('error_gambar', $errors);
        } 
        
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('id_wilayah',TRUE));
        } else {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            $data = array(
                'id_wilayah'       => $this->input->post('id_wilayah',TRUE),
                'id_jenis_wisata' => $this->input->post('id_jenis_wisata',TRUE),
                'penginput'         => $user->id,
                'harga_tiket'       => $this->input->post('harga_tiket',TRUE),
                'luas_wisata'        => $this->input->post('luas_wisata',TRUE),
                'lat'               => $this->input->post('lat',TRUE),
                'lng'               => $this->input->post('lng',TRUE),
                'gambar'            => $gambar,
                'tanggal'           => $tanggal,
	        );

            $this->Data_wisata_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('data_wisata/wilayah/'. $this->input->post('id_wilayah',TRUE)));
        }
    }
    
    public function update($id) 
    {
        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $row = $this->Data_wisata_model->get_by_id($id);

        if ($row) {
            $user = $user = $this->ion_auth->user()->row();
            $jenis_wisata = $this->Jenis_wisata_model->get_all();
            $wilayah = $this->wilayah_model->get_by_id($row->id_wilayah);

            $lat = $row->lat;
            $lng = $row->lng;
            $center = $lat.",".$lng;    
            $cfg=array(
                'class'                       =>'map-canvas',
                'map_div_id'                  =>'map-canvas',
                'center'                      =>$center,
                'zoom'                        =>17,
                'map_type'                    => 'HYBRID',
                'places'                      =>TRUE, //Aktifkan pencarian alamat
                'placesAutocompleteInputID'   =>'cari', //set sumber pencarian input
                'placesAutocompleteBoundsMap' =>TRUE,
                'placesAutocompleteOnChange'  =>'showmap();' //Aksi ketika pencarian dipilih
            );
            $this->googlemaps->initialize($cfg);
            
            $marker=array(
                'position'      =>$center,
                'draggable'     =>TRUE,
                'title'         =>'Coba diDrag',
                'ondragend'     =>"document.getElementById('lat').value = event.latLng.lat();
                                    document.getElementById('lng').value = event.latLng.lng();
                                    showmap();",
            );      
            $this->googlemaps->add_marker($marker);

            $data = array(
                'button'            => 'Edit',
                'action'            => site_url('data_wisata/update_action'),
                'id_wisata'          => set_value('id_wisata', $row->id_wisata),
                'id_wilayah'       => set_value('id_wilayah', $row->id_wilayah),
                'id_jenis_wisata' => set_value('id_jenis_wisata', $row->id_jenis_wisata),
                'penginput'         => set_value('penginput', $row->penginput),
                'harga_tiket'        => set_value('harga_tiket', $row->harga_tiket),
                'luas_wisata'        => set_value('luas_wisata', $row->luas_wisata),
                'lat'               => set_value('lat', $row->lat),
                'lng'               => set_value('lng', $row->lng),
                'gambar'            => set_value('gambar', $row->gambar),
                'tanggal'           => set_value('tanggal', $row->tanggal),
                'title'             => 'Data Wisata' , 
                'user'              => $user,
                'wilayah'          => $wilayah,
                'jenis_wisata'    => $jenis_wisata,
                'map'               => $this->googlemaps->create_map(),
                'latitude'          => $lat,
                'longitude'         => $lng,
        	);
            $this->load->view('admin/head', $data);
            $this->load->view('admin/navigasi');
            $this->load->view('data_wisata/data_wisata_form', $data);
            $this->load->view('admin/footer'); 

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_wisata'));
        }
    }
    
    public function update_action() 
    {
        $user = $this->ion_auth->user()->row();
        $tanggal = date('Y-m-d G:i:s');

        $config['upload_path'] = './gambar/wisata/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024 * 10;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar')) {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata('error_gambar', $errors);
        } 

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_wisata', TRUE));
        } else {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name'];
            $data = array(
                'id_wilayah'       => $this->input->post('id_wilayah',TRUE),
                'id_jenis_wisata' => $this->input->post('id_jenis_wisata',TRUE),
                'penginput'         => $user->id,
                'harga_tiket'        => $this->input->post('harga_wisata',TRUE),
                'luas_wisata'        => $this->input->post('luas_wisata',TRUE),
                'lat'               => $this->input->post('lat',TRUE),
                'lng'               => $this->input->post('lng',TRUE),
                'gambar'            => $gambar,
                'tanggal'           => $this->input->post('tanggal',TRUE),
        	);

            $this->Data_wisata_model->update($this->input->post('id_wisata', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('data_wisata/wilayah/'.$this->input->post('id_wilayah',TRUE)));
        }
    }
    
    public function delete($id,$id_p) 
    {
        $row = $this->Data_wisata_model->get_by_id($id);

        if ($row) {
            $this->Data_wisata_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('data_wisata/wilayah/'.$id_p));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('data_wisata/wilayah/'.$id_p));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('id_wilayah', 'id wilayah', 'trim|required');
    	$this->form_validation->set_rules('id_jenis_wisata', 'id jenis wisata', 'trim|required|max_length[5]',array(
                'max_length' => 'jenis wisata' , 
            )
        );
    	$this->form_validation->set_rules('harga_tiket', 'harga_tiket', 'trim|required');
    	$this->form_validation->set_rules('luas_wisata', 'luas wisata', 'trim|required',
            array(
                'required' => 'harus diisi' , 
            ));
    	$this->form_validation->set_rules('lat', 'lat', 'trim|required');
    	$this->form_validation->set_rules('lng', 'lng', 'trim|required');

    	$this->form_validation->set_rules('id_wisata', 'id_wisata', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "data_wisata.xls";
        $judul = "data_wisata";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Id wilayah");
    	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenis wisata");
    	xlsWriteLabel($tablehead, $kolomhead++, "Penginput");
    	xlsWriteLabel($tablehead, $kolomhead++, "harga_tiket");
    	xlsWriteLabel($tablehead, $kolomhead++, "Luas wisata");
    	xlsWriteLabel($tablehead, $kolomhead++, "Lat");
    	xlsWriteLabel($tablehead, $kolomhead++, "Lng");
    	xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
    	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

    	foreach ($this->Data_wisata_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_wilayah);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jenis_wisata);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->penginput);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->harga_tiket);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->luas_wisata);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->lat);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->lng);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=data_wisata.doc");

        $data = array(
            'data_wisata_data' => $this->Data_wisata_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('data_wisata/data_wisata_doc',$data);
    }

}

/* End of file Data_wisata.php */
/* Location: ./application/controllers/Data_wisata.php */

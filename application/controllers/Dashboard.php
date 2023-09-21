<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_wisata_model');
        $this->load->model('wilayah_model');
        $this->load->model('Data_wisata_model');
        $this->load->model('Berita_model');
        $this->load->library('googlemaps');
    }

	public function index()
	{
		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();
		$total_jenis = $this->Jenis_wisata_model->get_total();
		$total_wilayah = $this->wilayah_model->get_total();
		$total_wisata = $this->Data_wisata_model->get_total();
		$total_berita = $this->Berita_model->get_total();
		$data_wisata = $this->Data_wisata_model->get_all_join();

		$config['center'] = '-8.529283394536302, 120.02785834149252';
		$config['zoom'] = 'auto';
		$config['map_type'] = 'HYBRID';
		$this->googlemaps->initialize($config);

		if ($data_wisata) {
            foreach ($data_wisata as $p) {
                $marker = array();
                $marker['position'] = $p->lat.','.$p->lng;
                $marker['infowindow_content'] = 'Wilayah : '.$p->nama_wilayah.'<p>Harga Tiket : '.$p->harga_tiket.'</p><p>Luas Wilayah :'.$p->luas_wisata.'</p><img src="'.base_url().'gambar/wisata/'.$p->gambar.'" width="200px" heigt="200px">';
                $marker['icon'] = base_url('gambar/marker/'.$p->icon_marker);
                $this->googlemaps->add_marker($marker);
            }
        }

		$data = array(
			'title' => 'Dashboard' , 
			'user' => $user,
			'total_jenis' => $total_jenis,
			'total_wilayah' => $total_wilayah,
			'total_wisata' => $total_wisata,
			'total_berita' => $total_berita,
			'map' => $this->googlemaps->create_map(),
		);

		$this->load->view('admin/head', $data);
		$this->load->view('admin/navigasi', $data);
		$this->load->view('admin/content',$data);
		$this->load->view('admin/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
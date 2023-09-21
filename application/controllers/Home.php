<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_wisata_model');
        $this->load->model('wilayah_model');
        $this->load->model('Data_wisata_model');
        $this->load->model('Berita_model');
        $this->load->model('Slider_model');
        $this->load->library('googlemaps');
    }

	public function index()
	{
		$slider = $this->Slider_model->get_all();
		$data = array(
			'title' => 'Home' ,
			'slider_data' => $slider, 
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi', $data);
		$this->load->view('home/slider', $data);
		$this->load->view('home/content', $data);
		$this->load->view('home/footer',$data);
	}

	public function berita()
	{
		$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'home/berita.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'home/berita.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'home/berita.html';
            $config['first_url'] = base_url() . 'home/berita.html';
        }

        $config['per_page'] = 2;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Berita_model->total_rows($q);
        $berita = $this->Berita_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

		$data = array(
			'title' => 'Berita' , 
			'berita' => $berita,
			'pagination' => $this->pagination->create_links(),
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi', $data);
		$this->load->view('home/v_berita', $data);
		$this->load->view('home/footer',$data);
	}

	public function berita_detail($id)
	{
		$berita = $this->Berita_model->get_by_id($id);
		$data = array(
			'title' => 'Berita' , 
			'berita' => $berita,
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi', $data);
		$this->load->view('home/v_berita_detail', $data);
		$this->load->view('home/footer',$data);
	}

	public function peta()
	{
		$data_wisata = $this->Data_wisata_model->get_all_join();
		$wilayah = $this->wilayah_model->get_all();
		$config['center'] = '-8.529283394536302, 120.02785834149252';
		$config['zoom'] = 'auto'; 
		$config['map_height'] = '650px';
		$config['map_type'] = 'HYBRID';
		$this->googlemaps->initialize($config);

		if ($data_wisata) {
            foreach ($data_wisata as $p) {
                $marker = array();
                $marker['position'] = $p->lat.','.$p->lng;
                $marker['infowindow_content'] = 'Wilayah : '.$p->nama_wilayah.'<p>Harga Tiket : '.$p->harga_tiket.'</p><p>Luas wisata:'.$p->luas_wisata.'</p><img src="'.base_url().'gambar/wisata/'.$p->gambar.'" width="200px" heigt="200px">';
                $marker['icon'] = base_url('gambar/marker/'.$p->icon_marker);
                $this->googlemaps->add_marker($marker);
            }
        }

		$data = array(
			'title' => 'Peta' , 
			'map' => $this->googlemaps->create_map(),
			'wilayah_data' => $wilayah,
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi',$data);
		$this->load->view('home/v_peta',$data);
		$this->load->view('home/footer',$data);
	}


	public function peta2()
	{
		$id = $this->input->post("id");
		$data_wisata = $this->Data_wisata_model->get_by_id_wilayah($id);
		$wilayah = $this->wilayah_model->get_all();
		$config['center'] = '-8.529283394536302, 120.02785834149252';
		$config['zoom'] = 'auto'; 
		$config['map_height'] = '650px';
		$config['map_type'] = 'HYBRID';
		$this->googlemaps->initialize($config);

		if ($data_wisata) {
            foreach ($data_wisata as $p) {
                $marker = array();
                $marker['position'] = $p->lat.','.$p->lng;
                $marker['infowindow_content'] = 'Wilayah : '.$p->nama.'<p>Harga Tiket : '.$p->harga_tiket.'</p><p>Luas wisata :'.$p->luas_wisata.'</p><img src="'.base_url().'gambar/wisata/'.$p->gambar.'" width="200px" heigt="200px">';
                $marker['icon'] = base_url('gambar/marker/'.$p->icon_marker);
                $this->googlemaps->add_marker($marker);
            }
        }

		$data = array(
			'title' => 'Peta' , 
			'map' => $this->googlemaps->create_map(),
			'wilayah_data' => $wilayah,
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi',$data);
		$this->load->view('home/v_peta',$data);
		$this->load->view('home/footer',$data);
	}

	public function contact()
	{
		$data = array(
			'title' => 'Contact' , 
		);

		$this->load->view('home/head', $data);
		$this->load->view('home/navigasi', $data);
		$this->load->view('home/v_contact', $data);
		$this->load->view('home/footer',$data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
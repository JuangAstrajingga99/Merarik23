<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_wisata_model extends CI_Model
{

    public $table = 'data_wisata';
    public $id = 'id_wisata';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->join('users', 'users.id = data_wisata.penginput', 'left');
        $this->db->join('wilayah', 'wilayah.id_wilayah = data_wisata.id_wilayah', 'left');
        $this->db->join('jenis_wisata', 'jenis_wisata.id_jenis_wisata = data_wisata.id_jenis_wisata', 'left');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_wisata', $q);
    	$this->db->or_like('id_wilayah', $q);
    	$this->db->or_like('id_jenis_wisata', $q);
    	$this->db->or_like('penginput', $q);
    	$this->db->or_like('harga_tiket', $q);
    	$this->db->or_like('luas_wisata', $q);
    	$this->db->or_like('lat', $q);
    	$this->db->or_like('lng', $q);
    	$this->db->or_like('gambar', $q);
    	$this->db->or_like('tanggal', $q);
    	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_wisata', $q);
    	$this->db->or_like('id_wilayah', $q);
    	$this->db->or_like('id_jenis_wisata', $q);
    	$this->db->or_like('penginput', $q);
    	$this->db->or_like('harga_tiket', $q);
    	$this->db->or_like('luas_wisata', $q);
    	$this->db->or_like('lat', $q);
    	$this->db->or_like('lng', $q);
    	$this->db->or_like('gambar', $q);
    	$this->db->or_like('tanggal', $q);
    	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_by_id_wilayah($id)
    {
        $query = $this->db->query(' SELECT *
                                    FROM data_wisata
                                    JOIN wilayah
                                    ON data_wisata.id_wilayah = wilayah.id_wilayah
                                    JOIN jenis_wisata
                                    ON jenis_wisata.id_jenis_wisata= data_wisata.id_jenis_wisata
                                    WHERE data_wisata.id_wilayah ='.$id
                                );
        return $query->result();
    }

    function get_total()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_all_join() 
    {
        $query = $this->db->query(' SELECT *
                                    FROM data_wisata
                                    JOIN wilayah
                                    ON data_wisata.id_wilayah = wilayah.id_wilayah
                                    JOIN jenis_wisata
                                    ON jenis_wisata.id_jenis_wisata = data_wisata.id_jenis_wisata'
                                );
        return $query->result();
    }

    function get_by_nama($nama)
    {
       $query = $this->db->query(' SELECT *
                                    FROM data_wisata
                                    JOIN wilayah
                                    ON data_wisata.id_wilayah = wilayah.id_wilayah
                                    JOIN jenis_wisata
                                    ON jenis_wisata.id_jenis_wisata = data_wisata.id_jenis_wisata
                                    WHERE wisata.nama = '.$nama

                                );
        return $query->result();
    }

}

/* End of file Data_wisata_model.php */
/* Location: ./application/models/Data_wisata_model.php */
<?php

class M_kohort extends CI_Model {

    var $table = 'register rh'; //nama tabel dari database
    var $select = array('rh.id_register','rh.tgl','rh.no_ktp', 'rh.usia_kehamilan', 'rh.bidan', 'p.nama', 'p.alamat','p.tgl_lahir', 'rh.jamkesmas','rh.trimester');
    var $column_order = array(null,'rh.id_register','rh.no_ktp', 'p.nama');
    var $column_search = array('rh.id_register','rh.no_ktp', 'p.nama','p.alamat');
    var $order = array('rh.id_register' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    private function _get_datatables_query() {
        $this->load->library('session');
        if($this->session->userdata("level")=="a") {
            $this->db->select($this->select);
            $this->db->from($this->table)->join('pasien p','p.no_ktp=rh.no_ktp');
        } 
        if($this->session->userdata("level")=="b") {
           $bidan=$this->session->userdata('id_admin');
           $this->db->select($this->select);
           $this->db->from($this->table)->join('pasien p','p.no_ktp=rh.no_ktp')->where('rh.bidan',$bidan);
       } 

       if($this->session->userdata("level")=="kp") {
           $this->db->select($this->select);
           $this->db->from($this->table)->join('pasien p','p.no_ktp=rh.no_ktp');
       } 

       if(empty($this->session->userdata("level"))) {
          $no_ktp=$this->session->userdata('no_ktp');
          $this->db->select($this->select);
          $this->db->from($this->table)->join('pasien p','p.no_ktp=rh.no_ktp')->where('rh.no_ktp',$no_ktp);
      } 

      $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if($i===0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
}

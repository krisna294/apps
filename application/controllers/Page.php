<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models', 'm');
		// $this->authenticated();
		if( $this->session->userdata('authenticated')!=true){
		$this->session->set_flashdata('alert', 'Silahkan login terlebih dahulu!!');
		redirect(base_url().'Logs/index');
		}

	}
    

	public function home()
	{
		$select = $this->db->select('*');
		$data['biodata']=$this->m->Get_All('biodata', $select);
		
		$select = $this->db->where('username', $this->session->userdata('username'));

		$data['bio'] = $this->db->get('biodata')->result();

		$this->load->view('page/home', $data);
	}


	public function act_ubah()
	{
		$table = 'biodata';
		$where=array(
			'username'		=>	$this->input->post('username')
		);
		$data=array(
      		'nama'    					=>  $this->input->post('nama'),
      		'tempat_lahir'    			=>  $this->input->post('tempat_lahir'),
      		'tgl_lahir'	    			=>  $this->input->post('tgl_lahir'),
      		'jenis_kelamin'    			=>  $this->input->post('jenis_kelamin'),
      		'agama'		    			=>  $this->input->post('agama'),
      		'status'	    			=>  $this->input->post('status'),
      		'alamat'	    			=>  $this->input->post('alamat')
    	);
		if(!empty($_FILES['foto']['name']))
		{
			$path = 'assets/profil/';
			$upload = $this->_do_upload($path,'foto',$_FILES['foto']['name']);
			$read = $this->m->Get_Where($where, $table);
			if(file_exists('assets/profil/'.$read[0]->foto) && ($read[0]->foto!= 'default.jpg'))
				unlink('assets/profil/'.$read[0]->foto);
			$data['foto'] = $upload;
		}
		$this->m->Update($where, $data, $table);
		$this->session->set_flashdata('pesan', 'Data has been changed!');
		redirect(base_url().'page/home');
	}

	private function _do_upload($path,$name,$name_file){  
    $config['upload_path']          = $path;
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 1048; //set max size allowed in Kilobyte
        $config['max_width']            = 5000; // set max width image allowed
        $config['max_height']           = 5000; // set max height allowed
        $config['file_name']            = $name_file;//round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if(!$this->upload->do_upload($name)) //upload and validate
        {
            $data['inputerror'][] = $name;
      $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
      $data['status'] = FALSE;
      echo json_encode($data);
      exit();
    }
    return $this->upload->data('file_name');
  }

  public function education()
	{
		
		$select = $this->db->select('*');
		$data['pdd']=$this->m->Get_All('riwayatpdd', $select);
		$data['bio']=$this->m->Get_All('biodata', $select);	
		$select = $this->db->where('username', $this->session->userdata('username'));

		$select = $this->db->order_by('riwayatpdd.thn_lulus', 'desc');
		$data['pdd'] = $this->m->Get_All('riwayatpdd',$select);

		

		$this->load->view('page/education', $data);
	}

  public function add_pdd()
	{
		$data=array(
			'username'				=>	$this->input->post('username'),
			'nama_sekolah'			=>	$this->input->post('nama_sekolah'),
			'jenjang'				=>	$this->input->post('jenjang'),
			'jurusan'				=>	$this->input->post('jurusan'),
			'thn_lulus'				=>	$this->input->post('thn_lulus'),
			'kota'					=>	$this->input->post('kota'),
			'nilai'					=>	$this->input->post('nilai')
			
		);
		
		$save = $this->m->Save($data, 'riwayatpdd');
		redirect('page/education');
	}

	public function edit_education()
	{
		$select = $this->db->select('*');
		$data['bio']=$this->m->Get_All('biodata', $select);
		$select = $this->db->where('username', $this->session->userdata('username'));

		$data['bio'] = $this->db->get('biodata')->result();

		$select = $this->db->select('*');
		$select = $this->db->where('id_riwayatpdd', $_GET['id_riwayatpdd']);
		$data['pdd']=$this->m->Get_All('riwayatpdd',$select);
		$this->load->view('page/edit_education',$data);
	}
	public function act_editpdd()
	{
		$table = 'riwayatpdd';
		$where=array(
			'id_riwayatpdd'		=>	$this->input->post('id_riwayatpdd')
		);		
		
		$data=array(
			'nama_sekolah'			=>	$this->input->post('nama_sekolah'),
			'jenjang'				=>	$this->input->post('jenjang'),
			'jurusan'				=>	$this->input->post('jurusan'),
			'thn_lulus'				=>	$this->input->post('thn_lulus'),
			'kota'					=>	$this->input->post('kota'),
			'nilai'					=>	$this->input->post('nilai')
			
		);
		
		$this->m->Update($where, $data, $table);
		$this->session->set_flashdata('pesan2', 'Data has been changed!');
		redirect('page/education');
	}

	public function delete_education()
	{
		$table = 'riwayatpdd';
		$where=array(
			'id_riwayatpdd'		=>	$_GET['id_riwayatpdd']
		);
		$read = $this->m->Get_Where($where, $table);
		
		$this->m->Delete($where, $table);
		redirect(base_url().'page/education');
	}

	public function workexperience()
	{
		$select = $this->db->select('*');
		$data['job']=$this->m->Get_All('riwayatkerja', $select);
		$data['bio']=$this->m->Get_All('biodata', $select);	
		$select = $this->db->where('username', $this->session->userdata('username'));

		$data['job'] = $this->m->Get_All('riwayatkerja',$select);

		$this->load->view('page/workexperience', $data);
	}

  public function add_job()
	{
		$data=array(
			'username'				=>	$this->input->post('username'),
			'nama_perusahaan'		=>	$this->input->post('nama_perusahaan'),
			'jabatan'				=>	$this->input->post('jabatan'),
			'durasi'				=>	$this->input->post('durasi'),
			'alasan'				=>	$this->input->post('alasan')
			
		);
		
		$save = $this->m->Save($data, 'riwayatkerja');
		redirect('page/workexperience');
	}

	public function edit_job()
	{
		$select = $this->db->select('*');
		$data['bio']=$this->m->Get_All('biodata', $select);
		$select = $this->db->where('username', $this->session->userdata('username'));

		$data['bio'] = $this->db->get('biodata')->result();

		$select = $this->db->select('*');
		$select = $this->db->where('id_riwayatkerja', $_GET['id_riwayatkerja']);
		$data['job']=$this->m->Get_All('riwayatkerja',$select);
		$this->load->view('page/edit_workexperience',$data);
	}
	public function act_editjob()
	{
		$table = 'riwayatkerja';
		$where=array(
			'id_riwayatkerja'		=>	$this->input->post('id_riwayatkerja')
		);		
		
		$data=array(
			'nama_perusahaan'		=>	$this->input->post('nama_perusahaan'),
			'jabatan'				=>	$this->input->post('jabatan'),
			'durasi'				=>	$this->input->post('durasi'),
			'alasan'				=>	$this->input->post('alasan')
			
		);
		
		$this->m->Update($where, $data, $table);
		$this->session->set_flashdata('pesan3', 'Data has been changed!');
		redirect('page/workexperience');
	}

	public function delete_job()
	{
		$table = 'riwayatkerja';
		$where=array(
			'id_riwayatkerja'		=>	$_GET['id_riwayatkerja']
		);
		$read = $this->m->Get_Where($where, $table);
		
		$this->m->Delete($where, $table);
		redirect(base_url().'page/workexperience');
	}

}
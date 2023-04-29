
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	Public	 function __construct()
	{
		parent::__construct();
		$this->load->model('Models','m');
    
	}
  
	public function index()
	{
    
		//if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
     //redirect('admin/index'); // Redirect ke page home
		$this->load->view('page/index');

	}
  public function login()
  {
    
    $this->load->view('page/login');

  }

	public function act_login(){
    $username = $this->input->post('username'); // Ambil isi dari inputan email pada form login
    $password = $this->input->post('password'); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
    $user = $this->m->get_user($username); // Panggil fungsi get yang ada di UserModel.php
    if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
      $this->session->set_flashdata('pesan1', 'Username tidak ditemukan');
       // Buat session flashdata
      redirect('Logs/login'); // Redirect ke halaman login
    }else{
      if(password_verify($password, $user->password)){ // Jika password yang diinput sama dengan password yang didatabase
        $session = array(
          'authenticated'=>true, // Buat session authenticated dengan value true
          'username'=>$user->username,  // Buat session email
          'nama'=>$user->nama, // Buat session nama
          'foto'=>$user->foto, // Buat session foto
        );
        $this->session->set_userdata($session); // Buat session sesuai $session
        redirect('page/home'); // Redirect ke halaman home
      }else {
        $this->session->set_flashdata('pesan2', 'Password salah'); // Buat session flashdata
        redirect('logs/login'); // Redirect ke halaman login
      }
    }
}
      public function logout(){
    $this->session->sess_destroy(); // Hapus semua session
    redirect('Logs/login'); // Redirect ke halaman login
  }


  public function proses()
  {
   
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $nama = $this->input->post('nama');
      $this->m->register($username,$password,$nama);
      $this->session->set_flashdata('pesan3','Account has been created, please login');
      redirect('logs/login');
    
   
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


}
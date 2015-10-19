<?php

class User extends CI_Controller{
    
    public function __construct() {  
        
        parent::__construct();
        
    }

    public function register() {
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('users/register.php');
        $this->load->view('templates/footer');

    }

    public function newuser(){
        require_once 'application/siteconfig/siteconfig.php';
    
        $errors[]='';
        $success[]='';
    $this->load->helper('url');
    
    //Check whether User Exists
    $uname = $this->input->post('username');
    
    $users = $this->db->get_where('users', array('username' => $uname));
    
    
    if($users->num_rows()== 0){
        
    $cpass = $this->input->post('cpassword');
    $pass = $this->input->post('password');
    

        if ($pass == $cpass){
            
            $token = sha1(mt_rand(10000, 99999).time().$uname);
            
            $password = sha1(md5($pass.$salt));
            
            $data = array(
                'username' => $uname,
                'password' => $password,
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'activation_token' => $token
               );
    
    
            $insert_user = $this->db->insert('users',$data);
            
            if(!$insert_user){
                //Return 069
                $errors[] = '#Error069: Something Went Wrong Adding You. Contact Sytsem Admin';
                $this->load->view('users/register',$errors);
            } else {
                $this->session->set_flashdata('success','You have Successfully Registered. <a href="user/login">Login</a>');
                redirect('user/register','refresh');
            }
            
             
        } 
        else 
        { 
            $error[] = 'Passwords Dont Match';
            $this->load->view('users/register',$errors);
        }
    
    }
    else{
        $errors[] = 'Username has already been taken';
        $this->load->view('users/register',$errors);
        
    }

} //End New User Function

    public function login() {
        
         $this->load->view('templates/header');
         $this->load->view('templates/menu');
         $this->load->view('users/login');
         $this->load->view('templates/footer');
         
     }
     
    public function authenticate() {
        require_once 'application/siteconfig/siteconfig.php';
         
         $uname = $this->input->post('username');
         $pass = $this->input->post('password');
         
         if($uname!=""){
             
             $getuser = $this->db->get_where('users',array('username'=>$uname));
     
             if($getuser->num_rows>0){
                 
               $password = sha1(md5($pass.Siteconfig::$salt));
               $row = $getuser->row();
               $rpass = $row->password;
               $name = $row->f_name." ".$row->l_name;
               $email = $row->email;
               
               
               
               if ( $password == $rpass ) {
                   
                   
                $sess_array = array(
                'username' => $uname,
                    'password' => $password,
                    'email'=>$email,
                    'name'=>$name   
                );
                
                
                $this->session->set_userdata($sess_array);
                require_once 'application/siteconfig/siteconfig.php';
                if ($this->session->userdata('username') != NULL) {
                    $data['sessioninfo'] = 'You are Logged in As : ' . $this->session->userdata('username');
                    }
                    else
                    {
                    $data['sessioninfo'] = 'Could not Initiate Session, Contact Your Administrator';
                    }
                    redirect('user/profile','refresh');
                    }else{
                    $this->session->set_flashdata('error','Wrong email, password combination.');
                    redirect('user/login','refresh');
                    }
                }
             
         }else{
            $this->session->set_flashdata('error','No Such User Exists');
            redirect('user/login','refresh');     
         }
     }
     
    public function index(){
            $this->load->view('templates/header');
            $this->load->view('templates/menu');
            $this->load->view('users/profile');
            $this->load->view('templates/footer');
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('user/','refresh');
    }
    
    public function profile(){
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('users/profile');
        $this->load->view('templates/footer');
    }
     
} //End User Controller

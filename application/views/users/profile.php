<?php


if($this->session->userdata('username')==NULL){
    redirect('user/login','refresh');
}
 // Read all session values 
echo 'You are Logged In as '.$this->session->userdata('username');
?>




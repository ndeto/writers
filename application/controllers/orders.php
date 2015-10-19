<?php

class Orders extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->model('orders_model');
    }

    public function index() {
        
        
        $data['orders'] = $this->orders_model->get_orders();
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('orders/home', $data);
        $this->load->view('templates/footer');
        
    }
    
    public function view($order_id){
        $data['order'] = $this->orders_model->get_orders($order_id);
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('orders/detailorder', $data);
        $this->load->view('templates/footer');
    }

    public function takeorder($order_id){

        $data = array(
            'assigned_writer'=>$this->session->userdata('username'),
            'assigned_status'=>'ASSIGNED'
        );
        $this->orders_model->model_take_order($data,$order_id);
        $this->session->set_flashdata('order_success',' Order Has been taken successfully');
        redirect("orders/view/$order_id",$data);
    }

    public function myorders(){

        $username = $this->session->userdata('username');
        $data['orders'] = $this->orders_model->myorders($username);
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('orders/myorders', $data);
        $this->load->view('templates/footer');
    }

    public function history(){
        $username = $this->session->userdata('username');
        $data['orders'] = $this->orders_model->history($username);
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('orders/myorders', $data);
        $this->load->view('templates/footer');
    }
}

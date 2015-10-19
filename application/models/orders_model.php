<?php

class Orders_model extends CI_Model{
    
    public function __construct()
	{
		$this->load->database();
	}
        
    public function get_orders($order_id = FALSE)
{
	if ($order_id === FALSE)
	{
		$query = $this->db->get_where('orders',array('assigned_status'=>'UNASSIGNED'));
		return $query->result_array();
	}

	$query = $this->db->get_where('orders', array('order_id' => $order_id));
	return $query->row_array();
}

	public function get_all(){

        $query = $this->db->get('orders');
		return $query->result_array();
                
}

    public function model_take_order($data,$oid){
        $this->db->update('orders', $data, "order_id = $oid");
    }

    public function myorders($username){

        $query = $this->db->get_where('orders', array('assigned_writer' => $username));
        return $query->result_array();
    }

	public function history($username){

		$query = $this->db->get_where('orders', array('assigned_writer' => $username,'assigned_status'=>'COMPLETE'));
		return $query->result_array();
	}

}


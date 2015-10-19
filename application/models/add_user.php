<?php

class Add_user extends CI_Model{
    
      function __construct()
    {
        parent::__construct();
    }
    
     function insert_entry()
    {
        $this->title   = $_POST['user']; // please read the below note
        $this->content = $_POST['email'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }
    
}


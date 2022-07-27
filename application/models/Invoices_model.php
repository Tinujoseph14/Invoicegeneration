<?php
class Invoices_model extends CI_Model 
{
	
	function saverecords($data)
	{
        $this->db->insert('invoices',$data);
        return true;
	}
	
}
<?php 
class Invoices extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Invoices_model');
		
	}
    
	public function savedata()
	{
		$this->load->view('invoice_create');
	
		if($this->input->post('save'))
		{
			$invoice_items_data = array();
			$invoices_data = array();
			// invoices total data
		    $invoices_data['invoice_subtotal']=$this->input->post('invoice_subtotal');
			$invoices_data['invoice_discount']=$this->input->post('invoice_discount');
			$invoices_data['invoice_vat']=$this->input->post('invoice_vat');
			$invoices_data['invoice_total']=$this->input->post('invoice_total');

			var_dump($invoice_items_data);
			// invoice product items
			foreach($_POST['invoice_product'] as $key => $value) {
				$invoice_items_data['item_product'] = $value;
				$invoice_items_data['item_qty'] = $this->input->post['invoice_product_qty'][$key];
				$invoice_items_data['item_price'] = $this->input->post['invoice_product_price'][$key];
				$invoice_items_data['item_discount'] = $this->input->post['invoice_product_discount'][$key];
				$invoice_items_data['item_subtotal'] = $this->input->post['invoice_product_sub'][$key];


				
			}
		
	

			$response=$this->Crud_model->saverecords($data);
			if($response==true){
			        echo "Records Saved Successfully";
			}
			else{
					echo "Insert error !";
			}
		}
	}

	public function displaydata()
    {
        $result['data']=$this->Invoices_model->display_invoices();
        $this->load->view('invoice-list',$result);
    }
	
}
?>
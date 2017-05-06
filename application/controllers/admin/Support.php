<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		// Tai cac file thanh phan
		$this->load->model('support_model');
		$this->lang->load('admin/support');
	}

	/**
	 * Danh sach
	 */
	function index()
	{
		//lay danh sach ho tro
		$list = array();
		$list = $this->support_model->get_list();
		$this->data['list'] = $list;
		
		// Message
		$message = $this->session->flashdata('flash_message');
		if ($message)
		{
			$this->data['message'] = $message;
		}
		
		// Hien thi view
		$this->data['temp'] = 'admin/support/index';
		$this->load->view('admin/main', $this->data);
	}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angular extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		    
		// Load language
		$this->lang->load("validation_lang","english");
		$this->load->helper('ng');
	}

	public function index()
	{
		$this->load->view('validation_form');
	}

	public function modal($value='')
	{
		$this->load->view('modalpopup_form');
	}

	public function ajax_form()
	{
		$this->load->view('modal_validation_form');
	}

	public function angularGrid()
	{
		$this->load->view('gridview');
	}	

	public function takeRecords($value='')
	{
		$this->db->select('u.username, CONCAT(up.first_name, " ", up.last_name)as fullName, email, uph.phone_number, ar.role_name, u.user_id, u.banned');
		$this->db->from('users as u');
		$this->db->join('user_profile as up', 'up.user_id = u.user_id', 'left');
		$this->db->join('user_phone as uph', 'uph.user_id = u.user_id', 'left');
		$this->db->join('app_roles as ar', 'ar.role_id = u.auth_level', 'left');

		$results = $this->db->get()->result_array();
		
		$data = array();
		foreach ($results as $row) {
			$data[] = $row;
		}

		echo json_encode($data);
	}

	public function takeRecords1($value='')
	{
		$this->db->select('u.id, u.timestamp as design_no, u.ip_address as particulars');
		$this->db->from('ci_sessions as u');

		$results = $this->db->get()->result_array();
		
		$data = array();
		foreach ($results as $row) {
			$data[] = $row;
		}

		echo json_encode($data);
	}
}

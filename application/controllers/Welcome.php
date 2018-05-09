<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Constructor of this class
	 */
	public function __construct()
	{
		parent::__construct();

		// load model class
		$this->load->model('member_m');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index($member_id = NULL)
	{
		// get member name from database
		$member = $this->member_m->get_member($member_id);

		// compose greeting message
		// if fetched exact one member, compose "Hello, [name]!"
		// else if fetched many members, compose "Hello, world!"
		// otherwise, compose "Hello, anyone?"
		if(count($member) > 1){
			$greeting = "Hello, world!";
		}elseif(count($member) == 1){
			$greeting = 'Hello, ' . $member[0]->name . "!";
		}else{
			$greeting = "Hello, anyone?";
		}

		// display view
		$data = array();
		$data['greeting'] = $greeting;
		$this->load->view('welcome_message', $data);
	}
}

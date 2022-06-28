<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MY_Controller {
	private $MSG;
	public function __construct() {
		parent::__construct();
		$this->load->model('Util_model');

		$this->MSG = get_cookie('MSG');
		if ($this->MSG != NULL) {
			delete_cookie('MSG');
		}		
	}

	public function index()
	{
		$this->list;
	}

	public function new()	{
		$this->load->helper('form');
		$dd['next'] = 'Customer/create';
		$dd['prev'] = 'Customer/new';
		$dd['guid'] = gen_uuid();

		$this->load->view('_head');
		$dd['pathd'] = $this->Util_model->getLookupTable('path_dists', 'district');
		$dd['tmxns'] = $this->Util_model->getLookupTable('transtypes', 'transmission');
		$dd['marsta'] = $this->Util_model->getLookupTable('maritalstatus', 'ms');
		$dd['bodystyles'] = $this->Util_model->getLookupTable('bodystyles', 'style');
		$this->load->model('Customer_model');
		$dd = array_merge($dd, $this->Customer_model->new());
		$this->load->view('newcustomer', $dd);
		$this->load->view('_foot');
	}

	public function list($pop = FALSE)	{
		$dd['title'] = 'Customer List';
		if ($pop) {
			$this->load->view('_bare', $dd);
		} else {
			$this->load->view('_head', $dd);
		}
		
		$this->load->model('Customer_model');
		$dd['list'] = $this->Customer_model->list();
		$this->load->view('custlist', $dd);

		$this->load->view('_foot');
	}

	public function create() {
		$zzz = $this->input->post();
		$zzz['state'] = substr($zzz['state'], 0, 2);
		/* echo '<pre>';
		var_dump($zzz);
		echo '</pre>'; */
		$this->load->model('Customer_model');
		$this->Customer_model->create($zzz);
		//die('saving!');
		$dd['title'] = 'creating customer record';
		//redirect(base_url('Customer/list'));
		$dd['next'] = base_url('Customer/list');
		$this->load->view('_head', $dd);
		$this->load->view('doingit', $dd);
		$this->load->view('_foot', $dd);
	}

	public function view($guid='') {
		$guid = trim($guid);
		if (strlen($guid) < 16) {
			die('<h1>Err</h1><p>Catastrophic error. Unable to find that record.</p>');
		}

		$this->load->model('Customer_model');
		$cust = $this->Customer_model->fetchByGUID($guid);
		/* echo '<pre>'. PHP_EOL;
		var_dump($cust);
		echo PHP_EOL .'</pre>';
		// die(); */
		
		$dd['title'] = 'Record '. $cust['ix'] .':: '. $cust['lastname'];
		$this->load->view('_head', $dd);

		$ddz = array_merge($cust, $dd);
		$this->load->helper('form');
		// $ddz['guid'] = $cust['guid'];
		$ddz['pathd'] = $this->Util_model->getLookupTable('path_dists', 'district', $cust['path_district']);
		$ddz['tmxns'] = $this->Util_model->getLookupTable('transtypes', 'transmission', $cust['txID']);
		$ddz['marsta'] = $this->Util_model->getLookupTable('maritalstatus', 'ms', $cust['marstatus']);
		$ddz['bodystyles'] = $this->Util_model->getLookupTable('bodystyles', 'style', $cust['reqbodystyle']);
		$ddz['next'] = base_url('Customer/update');
		$ddz['prev'] = base_url('Customer/list');
		$ddz['blnShowDocu'] = TRUE;
		
		$this->load->view('newcustomer', $ddz);
		$this->load->view('_foot', $dd);

	}
}
?>
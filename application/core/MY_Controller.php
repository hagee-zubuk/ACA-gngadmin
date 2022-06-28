<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
protected $seed;
protected $sess;
protected $uname;

	public function __construct() {
		parent::__construct();
		date_default_timezone_set($this->config->item('time_reference'));
		// Your own constructor code
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 2016 05:00:00 GMT");
		// ob_start('mb_output_handler');

		$this->seed = get_cookie('usr_sess');
		$this->uname = get_cookie('usr_name');
		
		if (strlen($this->seed) > 10) {
			$this->load->model('Webstate_model');
			$tmp_eee = $this->Webstate_model->getbyid($this->seed);
			$this->sess = $tmp_eee;
/*			echo '<pre>'. PHP_EOL;
			echo current_url();
			echo PHP_EOL;
			var_dump($tmp_eee);
			echo PHP_EOL .'/<pre>'. PHP_EOL;
			die();
*/		} else {
			$this->seed = '';
			$this->sess = FALSE;
		}
		set_cookie('usr_sess', $this->seed,  1800);
		set_cookie('usr_name', $this->uname, 3600);
	}

	public function amiloggedin() {
		if (strlen($this->seed) < 5) {
			if (get_cookie('usr_sess') == null) {
				$this->seed = get_cookie('usr_sess');
			}
			if (strlen($this->seed) < 5) {
				return FALSE;
			}
		}
		/*
		$this->urec = $this->Users_model->fetchbyguid($this->seed);
		if ($this->urec === FALSE) {
			return FALSE;
		}
		*/
		return TRUE;
	}

	public function log($aryData) {
		/*
		if (!isset($aryData['user'])) return FALSE;
		if (!isset($aryData['table'])) return FALSE;

		$this->Log_model->LogEvent($aryData);
		*/
	}

	public function savestate() {
		/*
		if(!is_array($this->state)) {
			return FALSE;
		}
		$aryData = $this->state;
		if (!isset($aryData['user'])) return FALSE;
		if (!isset($aryData['key'])) {
			$aryData['key'] = $urec['guid'];
		}
		if (!isset($aryData['page'])) {
			$aryData['page'] = current_url();
		}

		$this->Log_model->SaveUserstate($aryData);
		*/
	}

	public function mkguid() {
		$this->load->library('uuid');
		return $this->uuid->v4(TRUE);
	}
}
?>
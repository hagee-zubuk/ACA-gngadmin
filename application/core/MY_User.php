<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_User extends CI_Controller {
protected $seed;
protected $urec;

	public function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 2016 05:00:00 GMT");
		// ob_start('mb_output_handler');

		$this->load->helper(array('form', 'url'));
		$this->load->library('session');


		if (isset($_SESSION['usr_sess'])) {
			$this->seed = $_SESSION['usr_sess'];
			$this->urec = $this->Clients_model->fetchbyguid($this->seed);
		} else {
			$this->seed = '';
			$this->urec = FALSE;
		}
	}

	public function amiloggedin() {
		if (strlen($this->seed) < 5) {
			if (isset($_SESSION['usr_sess'])) {
				$this->seed = $_SESSION['usr_sess'];
			}
			if (strlen($this->seed) < 5) {
				return FALSE;
			}
		}
/*		$this->urec = $this->Clients_model->fetchbyguid($this->seed);
		if ($this->urec === FALSE) {
			return FALSE;
		}
*/		return TRUE;
	}

	public function mkguid() {
		$this->load->library('uuid');
		return $this->uuid->v4(TRUE);
	}
}
?>
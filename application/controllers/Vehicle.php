<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends MY_Controller {
	private $MSG;
	public function __construct() {
		parent::__construct();
		$MSG = '';
		$this->load->helper('cookie');

		$this->MSG = get_cookie('MSG');
		if ($this->MSG != NULL) {
			delete_cookie('MSG');
		}
	}

	public function index()
	{
		$this->list();
	}

	public function fetchRefDetail() {
		$ref = $this->input->get_post('ref');
		$ref = intval($ref);
		$aRet = array('err' => -1, 'opt' => '<option>(select a referrer above)</option>', 'lbl' => 'HDYH detail');
		if ($ref > 0) {
			$this->load->model('Vehicle_model');
			$deets = $this->Vehicle_model->fetchRefDetail($ref);
			if ($deets === FALSE) {
				$aRet['err'] = 0;
			} else {
				$opts = '';
				$labl = '';
				$labl = 'Name of '. $deets[0]->howheard;
				$cunt = 0;
				foreach($deets as $op) {
					$opts .= sprintf("<option value=\"%d\">%s</option>". PHP_EOL, $op->ix, $op->detail);
					$cunt++;
				}
				$aRet['opt'] = '<option value="0"> </option>'. $opts . '<option value="1">Other/Unlisted</option>';
				$aRet['lbl'] = $labl;
				$aRet['err'] = $cunt;
			}
		} 
		header("Content-Type: application/json; charset=UTF-8");
		echo json_encode($aRet);
	}

	public function new()	{
		$this->load->helper('form');
		$dd['next'] = 'Vehicle/create';
		$dd['prev'] = 'Vehicle/new';
		$dd['guid'] = gen_uuid();
		$dd['sess'] = $this->sess;
		
		$this->load->view('_head');
		$this->load->model('Util_model');
		$dd['rfr'] = $this->Util_model->getLookupTable('referers', 'media');
		$dd['sal1'] = $this->Util_model->getLookupTable('salutations', 'abbrv');
		$dd['state'] = $this->Util_model->getStates();
		$dd['sal2'] = $dd['sal1'];
		$dd['locs'] = $this->Util_model->getLookupTable('gnglocations', 'location');
		$dd['makes'] = $this->Util_model->getLookupTable('carmakes', 'make');
		$dd['fuels'] = $this->Util_model->getLookupTable('fuels', 'fueltype');
		$dd['tmxns'] = $this->Util_model->getLookupTable('transtypes', 'transmission');
		$dd['ctypes'] = $this->Util_model->getLookupTable('cartypes', 'car_type');		
		$dd['numcyls'] = $this->Util_model->getLookupTable('numcyls', 'numberofcylinders');
		$dd['bodystyles'] = $this->Util_model->getLookupTable('bodystyles', 'style');
		$dd['drive_trains'] = $this->Util_model->getLookupTable('drive_trains', 'drvtrain');
		$dd['vehicle'] = new VehData;

		$this->load->view('newvehicle', $dd);
		$this->load->view('_foot');
	}

	public function list($pop = FALSE)	{
		$dd['MSG'] = $this->MSG;
		$dd['title'] = 'Vehicle List';
		if ($pop) {
			$this->load->view('_bare', $dd);
		} else {
			$this->load->view('_head', $dd);
		}

		$this->load->model('Vehicle_model');
		$dd['list'] = $this->Vehicle_model->list();
		$this->load->view('vehilist', $dd);

		$this->load->view('_foot');
	}

	public function candylist($pop = FALSE)	{
		$dd['title'] = 'CANDY List';
		if ($pop) {
			$this->load->view('_bare', $dd);
		} else {
			$this->load->view('_head', $dd);
		}
		$this->load->view('candylist', $dd);
		$this->load->view('_foot');
	}

	public function warrantyclaims($pop = FALSE)	{
		$dd['title'] = 'Warranty Claims List';
		if ($pop) {
			$this->load->view('_bare', $dd);
		} else {
			$this->load->view('_head', $dd);
		}
		$this->load->view('warrantyclaims', $dd);
		$this->load->view('_foot');
	}

	public function create() {
		$zzz = $this->input->post();
		if (in_array('hhdetail', $zzz)) {
			$zzz['hhdetail'] = intval($zzz['hhdetail']);
		}
		if (in_array('state', $zzz)) {
			$zzz['state'] = substr($zzz['state'], 0, 2);
		}
		$zzz['user'] = $this->sess->user;
		$dd['user'] = $zzz['user'];
/*		echo '<pre>';
		var_dump($zzz);
		echo '</pre>'; 			*/		
		$ddd = array('guid' => $this->mkguid() 
					, 'ssn' => $zzz['ssn']
					, 'salutation' => $zzz['salutation']
					, 'first' => $zzz['first']
					, 'middle' => $zzz['middle']
					, 'last' => $zzz['last']
					, 'psalutation' => $zzz['psalutation']
					, 'pfirst' => $zzz['pfirst']
					, 'pmiddle' => $zzz['pmiddle']
					, 'plast' => $zzz['plast']
					, 'pssn' => $zzz['pssn']
					, 'homephone' => $zzz['homephone']
					, 'workphone' => $zzz['workphone']
					, 'workext' => $zzz['workext']
					, 'cellphone' => $zzz['cellphone']
					, 'street' => $zzz['street']
					, 'city' => $zzz['city']
					, 'state' => $zzz['state']
					, 'zip' => $zzz['zip']
					, 'vipreason' => $zzz['vipreason']
					, 'nlemail' => $zzz['nlemail']
					, 'email' => $zzz['nlemail']
					, 'user' => $zzz['user']
				);
		$lll = array('v_guid' => $zzz['guid']
					, 'd_guid' => $ddd['guid']
				);

		$dd['title'] = 'creating vehicle record';
		
		$this->load->model('Vehicle_model');
		$ret = $this->Vehicle_model->create($zzz);
		$rt2 = $this->Vehicle_model->newDonor($ddd);
		// $rt3 = $this->Vehicle_model->linkDonor($lll);
		// die('saving!');
		$dd['next'] = base_url('Vehicle/list');
		
		$this->load->view('_head', $dd);
		$this->load->view('doingit', $dd);
		$this->load->view('_foot', $dd);
	}

	public function update() {
		// TODO
		$zzz = $this->input->post();
		if (in_array('hhdetail', $zzz)) {
			$zzz['hhdetail'] = intval($zzz['hhdetail']);
		}
		if (in_array('state', $zzz)) {
			$zzz['state'] = substr($zzz['state'], 0, 2);
		}
		$guid = $zzz['guid'];
/*		echo '<pre>';
		var_dump($zzz);
		echo '</pre>';
*/		$this->load->model('Vehicle_model');
		$this->Vehicle_model->update($guid, $zzz);
		//die('saving!');	

		set_cookie('MSG', 'record saved');
		redirect(base_url('Vehicle/list'));
	}

	public function view($guid='') {
		$guid = trim($guid);
		if (strlen($guid) < 16) {
			die('<h1>Err</h1><p>Catastrophic error. Unable to find that record.</p>');
		}

		$this->load->model('Vehicle_model');
		$vehicle = $this->Vehicle_model->fetchVehicleByGUID($guid);
		$dd['title'] = 'Record '. $vehicle->ix .':: '. $vehicle->year .' '. $vehicle->make_text .' '. $vehicle->model;
		$this->load->view('_head', $dd);

		if ($vehicle->hhdetail > 0) {
			$hhdetl = $this->Vehicle_model->fetchRefDetail($vehicle->hhdetail);
		} else {
			$hhdetl = FALSE;
		}
		$this->load->model('Util_model');
		$dd['rfr'] = $this->Util_model->getLookupTable('referers', 'media', $vehicle->hhdetail);
		$dd['sal1'] = $this->Util_model->getLookupTable('salutations', 'abbrv', $vehicle->salutation);
		$dd['sal2'] = $this->Util_model->getLookupTable('salutations', 'abbrv', $vehicle->psalutation);
		$dd['locs'] = $this->Util_model->getLookupTable('gnglocations', 'location', $vehicle->location);
		$dd['makes'] = $this->Util_model->getLookupTable('carmakes', 'make', $vehicle->make);
		$dd['fuels'] = $this->Util_model->getLookupTable('fuels', 'fueltype', $vehicle->fueltype);
		$dd['tmxns'] = $this->Util_model->getLookupTable('transtypes', 'transmission', $vehicle->transmission );
		$dd['ctypes'] = $this->Util_model->getLookupTable('cartypes', 'car_type', $vehicle->ctype);		
		$dd['numcyls'] = $this->Util_model->getLookupTable('numcyls', 'numberofcylinders', $vehicle->numcyls);
		$dd['bodystyles'] = $this->Util_model->getLookupTable('bodystyles', 'style', $vehicle->bodystyle);
		$dd['drive_trains'] = $this->Util_model->getLookupTable('drive_trains', 'drvtrain', $vehicle->drivetrain);
		$dd['state'] = $this->Util_model->getStates($vehicle->state);
		$dd['hhdetl'] = $hhdetl;
		$dd['vehicle'] = $vehicle;
		
		$this->load->helper('form');
		$dd['next'] = 'Vehicle/update';
		$dd['prev'] = 'Vehicle/list';
		$dd['guid'] = $vehicle->guid;
		$dd['tab'] = "vehicleinfo";
		$dd['subtitle'] = "Vehicle Record [". $vehicle->ix .']';
		$dd['blnShowDocu'] = TRUE;

		$this->load->view('newvehicle', $dd);
		$this->load->view('_foot');

		/* echo '<pre>'. PHP_EOL;
		print_r($hhdetl);
		print_r($vehicle);
		echo PHP_EOL .'</pre>'. PHP_EOL;
		*/
	}
}

class VehData {
	public $ix, $guid, $year, $make, $model, $location;
	public $ctype, $salutation, $first, $middle, $last;
	public $ssn, $psalutation, $pfirst, $pmiddle, $plast;
    public $pssn, $homephone, $workphone, $workext, $cellphone;
    public $street, $city, $state, $zip, $howheard, $hhdetail;
    public $organization, $cpfirst, $cplast, $nlemail, $vipreason;
    public $vin, $transmission, $mileage, $numcyls, $drivetrain;
    public $bodystyle, $doors, $color, $fueltype, $titletype;
    public $isregistered, $isinspected, $isdriven, $howlongnotdriven;
    public $whynotdriven, $driveable, $chklienreleased, $chknewsletter;
    public $chkremove, $chkvip, $chkpickup, $chk1098_over500, $chk1098_program;
    public $chknameinclude, $pickupdirections, $have_aaa, $towing_contrib;
    public $tires_driveable, $accepted, $dategiventogng, $datedonorinformed;
	public $sentto_nhmact, $thankyou_postcard, $datesurveysent;
	public $date_tax_letter, $issue_tax_letter, $date_sds, $customer_sds;
	public $initials, $tradein_value, $retail_value, $purch_price;
	public $bodycondition, $repairneeds, $generalcomments;
	public $ts, $salutation_text, $psalutation_text;
	public $make_text, $bodystyle_text, $transmission_text;
}
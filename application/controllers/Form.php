<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Util_model');
	}

	public function index()	{
		die('meh');
	}

	public function donor($guid='') {
		$guid = trim($guid);
		if (strlen($guid) < 16) {
			die('<h1>Err</h1><p>Catastrophic error. Unable to find that record.</p>');
		}

		$this->load->model('Vehicle_model');
		$vehicle = $this->Vehicle_model->fetchVehicleByGUID($guid);
		$dd['title'] = 'Donor Form :: '. $vehicle->year .' '. $vehicle->make_text .' '. $vehicle->model;
		$dd['form'] = 'Donor Form';
		$dd['carid'] = $vehicle->ix;
		$this->load->view('_phead', $dd);
		$dd['vehicle'] = $vehicle;
		$dd['glocn'] = $this->Util_model->getLookupTextByIx('gnglocations', 'location', $vehicle->location);
		$dd['bdyst'] = $this->Util_model->getLookupTextByIx('bodystyles', 'style', $vehicle->bodystyle);
		$dd['tmxns'] = $this->Util_model->getLookupTextByIx('transtypes', 'transmission', $vehicle->transmission );
		$dd['futyp'] = $this->Util_model->getLookupTextByIx('fuels', 'fueltype', $vehicle->fueltype);
		$dd['drvtr'] = $this->Util_model->getLookupTextByIx('drive_trains', 'drvtrain', $vehicle->drivetrain);
		$dd['refer'] = $this->Util_model->getLookupTextByIx('referers', 'media', $vehicle->hhdetail);
		$this->load->view('forms'. DIRECTORY_SEPARATOR .'donor', $dd);
		$this->load->view('_brft', $dd);
	}

	public function state($guid='') {
		$guid = trim($guid);
		if (strlen($guid) < 16) {
			die('<h1>Err</h1><p>Catastrophic error. Unable to find that record.</p>');
		}

		$this->load->model('Vehicle_model');
		$vehicle = $this->Vehicle_model->fetchVehicleByGUID($guid);
		$dd['title'] = 'Donor Form :: '. $vehicle->year .' '. $vehicle->make_text .' '. $vehicle->model;
		$dd['form'] = 'Donor Form';
		$dd['carid'] = $vehicle->ix;
		$this->load->view('_phead', $dd);
		$dd['vehicle'] = $vehicle;
		$dd['bdyst'] = $this->Util_model->getLookupTextByIx('bodystyles', 'style', $vehicle->bodystyle);
		$dd['tmxns'] = $this->Util_model->getLookupTextByIx('transtypes', 'transmission', $vehicle->transmission );
		$dd['futyp'] = $this->Util_model->getLookupTextByIx('fuels', 'fueltype', $vehicle->fueltype);
		$dd['drvtr'] = $this->Util_model->getLookupTextByIx('drive_trains', 'drvtrain', $vehicle->drivetrain);
		$dd['refer'] = $this->Util_model->getLookupTextByIx('referers', 'media', $vehicle->hhdetail);
		$this->load->view('forms'. DIRECTORY_SEPARATOR .'state', $dd);
		$this->load->view('_brft', $dd);
	}

	public function tow($guid='') {
		$guid = trim($guid);
		if (strlen($guid) < 16) {
			die('<h1>Err</h1><p>Catastrophic error. Unable to find that record.</p>');
		}
		$this->load->model('Vehicle_model');
		$vehicle = $this->Vehicle_model->fetchVehicleByGUID($guid);
		$dd['title'] = 'Tow Order :: '. $vehicle->year .' '. $vehicle->make_text .' '. $vehicle->model .' :: CarID '. $vehicle->ix;
		$dd['form'] = 'Tow Order/Check-in Form';
		$dd['carid'] = $vehicle->ix;
		$this->load->view('_phead', $dd);
		$dd['vehicle'] = $vehicle;
		$dd['bdyst'] = $this->Util_model->getLookupTextByIx('bodystyles', 'style', $vehicle->bodystyle);
		$dd['tmxns'] = $this->Util_model->getLookupTextByIx('transtypes', 'transmission', $vehicle->transmission );
		$dd['futyp'] = $this->Util_model->getLookupTextByIx('fuels', 'fueltype', $vehicle->fueltype);
		$dd['drvtr'] = $this->Util_model->getLookupTextByIx('drive_trains', 'drvtrain', $vehicle->drivetrain);
		$dd['refer'] = $this->Util_model->getLookupTextByIx('referers', 'media', $vehicle->hhdetail);
		$this->load->view('forms'. DIRECTORY_SEPARATOR .'tow', $dd);
		$this->load->view('_brft', $dd);		
	}

}
?>
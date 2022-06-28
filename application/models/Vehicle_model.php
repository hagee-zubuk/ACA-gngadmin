<?php
class Vehicle_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
		date_default_timezone_set($this->config->item('time_reference'));
	}

	public function create($ary) {
		if (!is_array($ary)) {
			return FALSE;
		}
		if (strlen(trim($ary['guid'])) < 10) {
			return FALSE;
		}
		$ret = $this->db->insert('gng_vehicles', $ary);
		return ($ret);
	}

	public function newDonor($ary) {
		if (!is_array($ary)) {
			return FALSE;
		}
		if (strlen(trim($ary['guid'])) < 10) {
			return FALSE;
		}
		$ret = $this->db->insert('gng_donors', $ary);
		return ($ret);
	}	

	public function list($flt = '') {
		$sql = <<<LISTSQLSTATEMENT
SELECT veh.[year]
		, veh.[model], veh.[city]
		, veh.[state] 
		, veh.[bodystyle] AS [bsID]
		, veh.[make] AS [mkID]
		, veh.[transmission] AS [txID]
		, veh.[ts], veh.[guid]
		, COALESCE(cmk.[make], '-') AS [make]
		, COALESCE(tms.[transmission], '-') AS [transmission]
		, COALESCE(bds.[style], '-') AS [bodystyle] 
		, COALESCE(loc.[location], '-') AS [locationstr]
		, COALESCE(typ.[car_type], '-') AS [car_type]
FROM [gng_vehicles] AS veh 
	LEFT JOIN [gnglocations] AS loc ON veh.[location]=loc.[ix]
	LEFT JOIN [cartypes] AS typ ON veh.[ctype]=typ.[ix]
	LEFT JOIN [carmakes] AS cmk ON veh.[make]=cmk.[ix] 
	LEFT JOIN [transtypes] AS tms ON veh.[transmission]=tms.[ix] 
	LEFT JOIN [bodystyles] AS bds ON veh.[bodystyle]=bds.[ix] 
LISTSQLSTATEMENT;
		$qry = $this->db->query($sql);
		if ($qry->num_rows() > 0 ) {
			return $qry->result();
		} else {
			return FALSE;
		}
	}

	public function fetchVehicleByGUID($guid = '') {
		$guid = $this->db->escape($guid);
		$sql = <<<FETCHVEHICLEBYGUIDSQL
SELECT veh.*
		, sl1.[sal] AS [salutation_text]
		, sl2.[sal] AS [psalutation_text]
		, COALESCE(cmk.[make], '') AS [make_text]
		, COALESCE(bds.[style], '') AS [bodystyle_text]
		, COALESCE(tms.[transmission], '') AS [transmission_text]
FROM [gng_vehicles] AS veh 
	LEFT JOIN [salutations] AS sl1 ON veh.[salutation]=sl1.[ix] 
	LEFT JOIN [salutations] AS sl2 ON veh.[psalutation]=sl2.[ix] 
	LEFT JOIN [carmakes] AS cmk ON veh.[make]=cmk.[ix] 
	LEFT JOIN [transtypes] AS tms ON veh.[transmission]=tms.[ix] 
	LEFT JOIN [bodystyles] AS bds ON veh.[bodystyle]=bds.[ix] 
WHERE veh.[guid]=$guid 
ORDER BY veh.[ts] DESC
FETCHVEHICLEBYGUIDSQL;
		$qry = $this->db->query($sql);
		if ($qry->num_rows() > 0 ) {
			return $qry->result()[0];
		} else {
			return FALSE;
		}
	}

	public function update($guid='', $ary) {
		$carid = $this->db->escape($guid);
		if (in_array('guid', $ary)) unset($ary['guid']);

		$sql = "SELECT * FROM [gng_vehicles] WHERE [guid]=$carid";
		$qry = $this->db->query($sql);
		if ($qry->num_rows() > 0 ) {
			$this->db->where('guid', $guid);
			return ( $this->db->update('gng_vehicles', $ary) );
		} else {
			return FALSE;
		}	
	}

	public function fetchRefDetail($ref) {
		$ref = intval($ref);
		$sql = "SELECT * FROM [ref_detail] WHERE [referer]=$ref";
		$qry = $this->db->query($sql);
		if ($qry->num_rows() > 0 ) {
			return $qry->result();
		} else {
			return FALSE;
		}
	}
}
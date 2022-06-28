<?php
class Customer_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function create($ary) {
		if (!is_array($ary)) {
			return FALSE;
		}
		if (strlen(trim($ary['guid'])) < 10) {
			return FALSE;
		}
		$ret = $this->db->insert('gng_customers', $ary);
		return ($ret);
	}
	
	public function list($flt = '') {
		$sql = "SELECT cus.[guid]".
				", cus.[firstname]".
				", cus.[lastname]".
				", cus.[city]".
				", cus.[state]".
				", COALESCE(bds.[style], '-') AS [bodystyle]".
				", COALESCE(tms.[transmission], '-') AS [transmission]".
				", cus.[reqxmissn] AS [txID]".
				", cus.[reqbodystyle] AS [bsID] ".
				"FROM [gng_customers] AS cus ".
				"LEFT JOIN [transtypes] AS tms ON cus.[reqxmissn]=tms.[ix] ".
				"LEFT JOIN [bodystyles] AS bds ON cus.[reqbodystyle]=bds.[ix]";
		$qry = $this->db->query($sql);
		if ($qry->num_rows() > 0 ) {
			return $qry->result();
		} else {
			return FALSE;
		}
	}

	public function fetchByGUID($guid = '', $as_array = TRUE) {
		$guid = $this->db->escape($guid);
		$sql = <<<FETCHCUSTBYGUIDSQL
SELECT cus.*
		, COALESCE(bds.[style], '-') AS [bodystyle]
		, COALESCE(tms.[transmission], '-') AS [transmission]
		, cus.[reqxmissn] AS [txID]
		, cus.[reqbodystyle] AS [bsID] 
FROM [gng_customers] AS cus 
	LEFT JOIN [transtypes] AS tms ON cus.[reqxmissn]=tms.[ix] 
	LEFT JOIN [bodystyles] AS bds ON cus.[reqbodystyle]=bds.[ix]
WHERE cus.[guid]=$guid
FETCHCUSTBYGUIDSQL;
		$qry = $this->db->query($sql);
		if ($qry->num_rows() > 0 ) {
			if ($as_array) {
				return $qry->result_array[0];
			} else {
				return( $qry->result()[0] );
			}
		} else {
			return FALSE;
		}
	}

	public function new($guid = '') {
		$zz = array('firstname' => ''
					, 'lastname' => ''
					, 'address' => ''
					, 'zip' => ''
					, 'city' => ''
					, 'state' => ''
					, 'chk_ineligible' => ''
				);
		return ($zz);
	}

}

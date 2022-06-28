<?php
class Webstate_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		date_default_timezone_set($this->config->item('time_reference'));
	}
	
	public function create($ary) {
		if (!is_array($ary)) {
			return FALSE;
		}
		if (strlen(trim($ary['id'])) < 10) {
			return FALSE;
		}
		if (strlen(trim($ary['user'])) < 2) {
			return FALSE;
		}

		$ary['timestamp']	= date('Y-m-d H:i:s');
		$ary['updated']  	= date('Y-m-d H:i:s');

		$ret = $this->db->insert('gng_webstate', $ary);
		return ($ret);
	}

	public function getbyid($id) {
		if (strlen($id) < 10) {
			return FALSE;
		}
		$guid = $this->db->escape($id);
		$sql = <<<FETCHGUIDFORWEBSTATE
SELECT TOP 1 [id] AS [guid], [ip_address], [updated], [user], [fullname], [groups], [data], [mesg]
FROM [gng_webstate] AS sta
WHERE sta.[id]=$guid 
ORDER BY [updated] DESC
FETCHGUIDFORWEBSTATE;
		$qry = $this->db->query($sql);
		if ($qry->num_rows() > 0 ) {
			$now = date('Y-m-d H:i:s');
			$sql = <<<UPDATETHEUPDATE
UPDATE [gng_webstate]
	SET [updated] = '$now'
WHERE [id]=$guid 
UPDATETHEUPDATE;
			$udd = $this->db->simple_query($sql);
			return $qry->result()[0];
		} else {
			return FALSE;
		}
	}
}

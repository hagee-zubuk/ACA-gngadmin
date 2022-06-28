<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utils extends CI_Controller {
	/*public function __construct() {
		parent::__construct();
	}
	*/

	function Zipcode($sta = '') {
		echo "['AL','AK','AZ','AR','CA','CO','CT','DE','FL','GA','HI','ID','IL','IN','IA','KS','KY','LA',".
				"'ME','MD','MA','MI','MN','MS','MO','MT','NE','NV','NH','NJ','NM','NY','NC','ND','OH',".
				"'OK','OR','PA','RI','SC','SD','TN','TX','UT','VT','VA','WA','WV','WI','WY']";
	}
}
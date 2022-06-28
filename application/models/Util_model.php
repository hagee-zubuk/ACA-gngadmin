<?php
class Util_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function getLookupTable($tabl, $field='', $valSel='') {
		$sqlV = "SELECT * FROM [$tabl]";
		if ($field !== '') {
			$sqlV .= " ORDER BY [$field]";
		}
		$qry = $this->db->query($sqlV);
		
		if ($qry->num_rows() > 0 ) {
			$resutls = $qry->result_array();
/*		
		echo '<pre>'. PHP_EOL;
		echo $sqlV . PHP_EOL . PHP_EOL;

		var_dump($resutls);

		echo PHP_EOL. '</pre>'. PHP_EOL;
		die();
*/			
			$sr = '';
			foreach( $resutls as $rw) {
				if ($field !== '') {
					$lbl = $rw[$field];
				} else  {
					$lbl = $rw[1];
					var_dump($results);
					die();
				}
				$sr .= sprintf('<option value="%d" %s>%s</option>'. PHP_EOL
							, $rw['ix']
							, ($valSel == $rw['ix'])? 'selected' : ''
							, $lbl
						);
			}
			return($sr);
		} else {
			return FALSE;
		}
	}

  public function getLookupTextByIx($tabl, $field, $valSel ) {
    $val = intval($valSel);
    $sqlV = "SELECT * FROM [$tabl] WHERE [ix]=$val";
    $qry = $this->db->query($sqlV);
    
    if ($qry->num_rows() > 0 ) {
      $resutls = $qry->result_array()[0];  
      return ( $resutls[$field] );
    } else {
      return($valSel);
    }
  }

	public function getStates($valSel = '') {
		$tmpSta = <<<EOTSTRINGSOFSTATES
  <option value="">. .</option>				
  <option value="AL">Alabama</option>
  <option value="AK">Alaska</option>
  <option value="AZ">Arizona</option>
  <option value="AR">Arkansas</option>
  <option value="CA">California</option>
  <option value="CO">Colorado</option>
  <option value="CT">Connecticut</option>
  <option value="DE">Delaware</option>
  <option value="DC">District Of Columbia</option>
  <option value="FL">Florida</option>
  <option value="GA">Georgia</option>
  <option value="HI">Hawaii</option>
  <option value="ID">Idaho</option>
  <option value="IL">Illinois</option>
  <option value="IN">Indiana</option>
  <option value="IA">Iowa</option>
  <option value="KS">Kansas</option>
  <option value="KY">Kentucky</option>
  <option value="LA">Louisiana</option>
  <option value="ME">Maine</option>
  <option value="MD">Maryland</option>
  <option value="MA">Massachusetts</option>
  <option value="MI">Michigan</option>
  <option value="MN">Minnesota</option>
  <option value="MS">Mississippi</option>
  <option value="MO">Missouri</option>
  <option value="MT">Montana</option>
  <option value="NE">Nebraska</option>
  <option value="NV">Nevada</option>
  <option value="NH">New Hampshire</option>
  <option value="NJ">New Jersey</option>
  <option value="NM">New Mexico</option>
  <option value="NY">New York</option>
  <option value="NC">North Carolina</option>
  <option value="ND">North Dakota</option>
  <option value="OH">Ohio</option>
  <option value="OK">Oklahoma</option>
  <option value="OR">Oregon</option>
  <option value="PA">Pennsylvania</option>
  <option value="RI">Rhode Island</option>
  <option value="SC">South Carolina</option>
  <option value="SD">South Dakota</option>
  <option value="TN">Tennessee</option>
  <option value="TX">Texas</option>
  <option value="UT">Utah</option>
  <option value="VT">Vermont</option>
  <option value="VA">Virginia</option>
  <option value="WA">Washington</option>
  <option value="WV">West Virginia</option>
  <option value="WI">Wisconsin</option>
  <option value="WY">Wyoming</option>
EOTSTRINGSOFSTATES;
		$valSel = strtoupper( trim($valSel) );
		if (strlen($valSel) > 1) {
			$tmpSta = str_replace('"'. $valSel .'"', '"'. $valSel .'" selected', $tmpSta);
		}
		return($tmpSta);
	}

}
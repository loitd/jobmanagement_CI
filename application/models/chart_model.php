<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * send mail via gmail
 * */
class chart_model extends CI_Model
{
	//public $fromdate;
	//public $todate;

	function __construct()
    {
        parent::__construct();
        //$this->load->library(array('database'));
        $this->load->database();
    }
	
	public function testOracleDB()
    {
		$query = "
			select ID, to_char(MOC,'HH:MI:SS') as DATETIME, TIME_MAX, TIME_MIN from SOLIEU";

		$result = $this->db->query($query);
		$result = $result->result_array();
		//print_r($result);
		return $result;
    }
	
	public function getNumSample($min)
	{
		$query = "
			select ID, to_char(MOC,'HH:MI:SS') as MOC, TIME_MAX, TIME_MIN from SOLIEU where 
			24*(SYSDATE - MOC) <= '" . $min/60 . "'
			order by ID asc
			";

		$result = $this->db->query($query);
		$result = $result->result_array();
		//print_r($result);
		return $result;
		
	}
	
	public function getSamplePeriod()
	{
		$query = "
			select VALUE from TOPUP_ORDER.WEBTK_CONFIG
			where PARAMS = 'SAMPLE_PERIOD'";

		$result = $this->db->query($query);
		$result = $result->result_array();
		//print_r($result);
		return $result[0]['VALUE'];
		
	}
	
	public function setSamplePeriod($min)
	{
		$query = "
			update TOPUP_ORDER.WEBTK_CONFIG
			set VALUE = '" . $min . "'
			where PARAMS = 'SAMPLE_PERIOD'";
		$this->db->trans_start();
		$result = $this->db->query($query);
		//$result = $result->result_array();
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
		}
		else
		{
			$this->db->trans_commit();
		}
		
		//print_r($result);
		//return $result[0]['VALUE'];
		
	}
	
	
	
	
}
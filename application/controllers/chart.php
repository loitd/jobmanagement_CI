<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chart extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','email'));
		$this->clientip = $_SERVER['REMOTE_ADDR'];
	}
	
	public function index()
	{
		$this->load->Model('chart_model');
		
		if ( isset( $_POST['search'] ) ){
			$period = $this->input->post('period');
			$this->chart_model->setSamplePeriod($period);
		}
		$this->load->view('chart_view');
	}
	
	public function chartjson()
	{
		$this->load->Model('chart_model');
		$this->chart_model->testOracleDB();
		
		$head =	array
		(
			'cols'=>array
				(
					'0'=>array('id'=>'','label'=>'MOC','pattern'=>'','type'=>'string'),
					'1'=>array('id'=>'','label'=>'MAX','pattern'=>'','type'=>'number'),
					'2'=>array('id'=>'','label'=>'MIN','pattern'=>'','type'=>'number')
				)
		);
		
		$getrows = $this->testDB();
		$rows = array(
			'rows'=>$getrows,
		
		);
		
		$arr = array_merge($head, $rows);
		
		
		echo json_encode($arr);
	}
	
	public function testDB()
	{
		$this->load->Model('chart_model');
		$alldata = $this->chart_model->getNumSample($this->chart_model->getSamplePeriod());
		
		$beginnum = array(
				'0'=>array(
					'c'=>array
						(
							'0'=>array('v'=>$alldata[0]['MOC'], 'f'=>null),
							'1'=>array('v'=>$alldata[0]['TIME_MAX'], 'f'=>null),
							'2'=>array('v'=>$alldata[0]['TIME_MIN'], 'f'=>null)
						)
				)
			);
		
		for ($i = 1; $i < count($alldata); $i++)
		{
			$numinrow = array(
				$i=>array(
					'c'=>array
						(
							'0'=>array('v'=>$alldata[$i]['MOC'], 'f'=>null),
							'1'=>array('v'=>$alldata[$i]['TIME_MAX'], 'f'=>null),
							'2'=>array('v'=>$alldata[$i]['TIME_MIN'], 'f'=>null)
						)
				)
			);
			
			$beginnum = array_merge($beginnum, $numinrow);
		}
		
		print_r($beginnum);
		
		//print_r($PayCouponError);
		return $beginnum;
	}
}
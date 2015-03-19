<?php 

class Questions_model extends MY_Model {
	
	// variables
	
	//constructor
	function __construct(){
		parent::__construct();
		$this->table_name = 'questions';
		$this->primary_key = 'question_id';
		$this->order_by = 'question_id ASC';
		$this->foreign_key = 'quiz_id';
	}
	
}












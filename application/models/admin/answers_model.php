<?php 

class Answers_model extends MY_Model {
	
	// variables
	
	//constructor
	function __construct(){
		parent::__construct();
		$this->table_name = 'answers';
		$this->primary_key = 'answer_id';
		$this->order_by = 'answer_id ASC';
		$this->foreign_key = 'question_id';
	}
	
}












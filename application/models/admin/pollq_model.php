<?php 

class Pollq_model extends MY_Model {
	
	//constructor
	function __construct(){
		parent::__construct();
		$this->table_name = 'poll_question';//Gets all from table
		$this->primary_key = 'question_id';//defines primary key
		$this->order_by = 'question_id ASC';//Orders by question id
	}
}
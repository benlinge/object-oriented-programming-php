<?php

class Polla_model extends MY_Model {

	//constructor
	function __construct(){
		parent::__construct();
		$this->table_name = 'poll_answers';//gets table and content
		$this->primary_key = 'answer_id';//defines primary key
		$this->order_by = 'answer_id ASC';//orders by the answer id
		$this->foreign_key = 'question_id';//defines foreign key
	}
}

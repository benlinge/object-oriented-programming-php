<?php

class Topics_model extends CI_Model {
	
	// variables
		private $topics;
		private $topic_id; 
		private $topic;
	
	// contructor	
	function __construct(){
		parent::__construct();	
	}
	
	//methods 
	
	function getAllTopics(){
		$topics = $this->db->get('topic');
		return $topics;
		
	}
	
	function getTopic($topic_id) {
		$this->db->where('topic_id', $topic_id);
		$topic = $this->db->get('topic');
		return $topic;
	}
}




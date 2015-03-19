<?php 

class Topic_model extends CI_Model {
	
	// variables
		public $data = '';
		public $topics = '';
	
	//constructor
	function __construct(){
		parent ::__construct();	
	}
	
	
	//methods
	
	function getAll() {
		$topics = $this->db->get('topic');
		return	$topics;
	}
	
	function addTopic($data) {
		//data passed in via $data array from topic controller
		$this->db->insert('topic', $data);
	}
	/*
	* added to check if a topic exisits before adding a quiz to a none existant topic
	*/
	
	function topicExist($topic_id = NULL) {
		
		//query the database to check the topic id exists
		$topicquery = $this->db->query('SELECT * FROM topic WHERE topic_id = ?;', $topic_id);
		if ($topicquery->num_rows()>0) {
			return TRUE;
		} else {
			return FALSE;	
		}
		
	}
 		
}






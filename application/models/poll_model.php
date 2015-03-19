<?php

class Poll_model extends CI_Model {
	//variables
	public $data = '';
	public $pollAnswers = '';
	
	//constructor
	function __construct(){
		parent::__construct();
	}
	
	//methods	
		//Get data to be shown on the poll functions
		public function getQuestion() {//Gets all data from the poll_question table
			$pollQuestion = $this->db->get('poll_question');
        	return	$pollQuestion;
        }
        public function getAnswers() {//Gets all data from the poll_answers table
			$pollAnswers = $this->db->get('poll_answers');
        	return	$pollAnswers;
        }
		
		//Poll vote functions
        public function vote($data) {//inserts the vote data to the poll_results table
			$this->db->insert('poll_results', $data);
        }
		
		//Results functions
        public function yesResults() {//Gets all data from the poll_results table where the answer_id is 3 for yes answers
			$yesResults = $this->db->query('SELECT answer_id, COUNT(*) AS number FROM poll_results WHERE answer_id = 3');
			return $yesResults;
        }
		public function noResults() {//Gets all data from the poll_results table where the answer_id is 4 for no answers
			$noResults = $this->db->query('SELECT answer_id, COUNT(*) AS number FROM poll_results WHERE answer_id = 4');
			return $noResults;
        }
}
?>
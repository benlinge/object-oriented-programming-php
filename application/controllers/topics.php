<?php

class Topics extends CI_Controller {
	
	var $data = array(); // stops errors when nothing in array being passed to the view.
	
	function __construct(){
		parent::__construct();	
		$this->load->model('topics_model');
		$this->load->model('quizzes_model');
	}
	
	function index(){

        $this->session->unset_userdata('quiz');
		
		$data['topics'] = $this->topics_model->getAllTopics()->result_array();
			
		$this->load->view('indexTopics', $data);
	}
	
	function topic($topic_id) {

        $this->session->unset_userdata('quiz');

		// check if topic id has been set
		if($topic_id != false) {
			// get topic data from db
			$data['topic'] = $this->topics_model->getTopic($topic_id)->row();
			
			// if topic is not found in db show error
			if(empty($data['topic'])) {
				show_error('This topic does not exsist');
			} else {
				// added in to show a list of quizzes if topic is loaded
				$data['quizzes'] = $this->quizzes_model->get_complete_quizes($topic_id);
				
				$this->load->view('viewTopic', $data);
                $this->load->view('footer');
			}
		} else {
			// if no topic id is listed redirect to topics route to choose topic
			redirect(base_url().'topics', 'location');
		}
		
	}
}
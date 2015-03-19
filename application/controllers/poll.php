<?php

class Poll extends CI_Controller {
	
	//constructor
	function __construct(){
		parent::__construct();	
		$this->load->model('poll_model');
	}
	
	//methods
	public function vote(){
		
		//Unsets quiz data for the poll information to be processed freely.
		$this->session->unset_userdata('quiz');	
		//Gets the data from the poll_model get functions from both the question and answers tables
		$data['poll_question'] = $this->poll_model->getQuestion()->result_array();
		$data['poll_answers'] = $this->poll_model->getAnswers()->result_array();				
		
		//Validation rules
		$this->form_validation->set_rules('choice', 'choice name', 'required|xss_clean');
		//Check to see if the button of the form has been pressed and the form validates
		if($this->form_validation->run() == TRUE){
			//Array containing data to be updated
			$choice = array(
				'answer_id' => $this->input->post('choice', TRUE)//Adds choice by its answer_id
			);
			//Updates the database with the data by calling the vote function in the model
			$this->poll_model->vote($choice);
			//Redirects to the poll results (pollR function) when the submit button is clicked. 
			redirect(base_url('poll/pollR'), 'location');
		}
		//Display Views with data
		$this->load->view('viewPoll', $data);
		$this->load->view('footer');			
	}
	
	public function pollR() {
		//Gets the data from the poll_model get functions from the question, answers and results tables
		$data['poll_question'] = $this->poll_model->getQuestion()->result_array();
		$data['poll_answers'] = $this->poll_model->getAnswers()->result_array();			
		$data['yesResults'] = $this->poll_model->yesResults()->result_array();
		$data['noResults'] = $this->poll_model->noResults()->result_array();

		//Display Views with data
		$this->load->view('pollResults', $data);
        $this->load->view('footer');
	}
}


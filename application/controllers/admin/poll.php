<?php 

class Poll extends CI_Controller {
	
	//variables
	
	//constructor
	function __construct(){
		parent ::__construct();	
		$this->load->model('admin/pollq_model');//Question Model
		$this->load->model('admin/polla_model');//Answers Model
	}
	/**
	*
	* update question to the poll
	* @param 		int | $question_id used to add a single record to poll_question table
	* @questions	array | capture all form data on POST and pass to MY_Model via pollq_model
	*
	*/
	
	// passing 1 to $question_id so the get method in the MY_Model updates record 1.
	function updateQuestion($question_id = 1) {		
		
			// set validation rules
			$this->form_validation->set_rules('question','question','required|xss_clean');

			// check to see if the button of the form has been pressed and the form validates
			if($this->form_validation->run() == TRUE){
				// array containing data to be updated
				$questions = array(
					'question' => $this->input->post('question'),//Data to update
					'question_id' => $question_id//Will update record 1 as stated in function defined
				);
				// pass the data to the model for use
				$this->db->where('question_id', $question_id);
				$this->db->update('poll_question', $questions); 
				//set flash data success message to inform the user that data has been updated.
				$this->session->set_flashdata('success', 'Your Poll Question has successfully been update to the Poll.');
				// redirect to index to show successful update
				redirect(base_url('admin/topics/'), 'location');
			}
			//Display views
			$data['title'] = 'Edit Question';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/pollQuestion', $data);
			$this->load->view('admin/footer');
	}
	/**
	*
	* update answers to the poll
	* @param 	int | $answer_id used to add a single record to poll_answers table
	* @answers	array | capture all form data on POST and pass to MY_Model via polla_model
	*
	*/
	
	// passing 3 to $question_id so the get method in the MY_Model updates the correct answer.
	function updateAnswerOne($answer_id = 3) {		
		
			// set validation rules
			$this->form_validation->set_rules('choice','choice','required|xss_clean');

			// check to see if the button of the form has been pressed and the form validates
			if($this->form_validation->run() == TRUE){
				// array containing data to be updated
				$answers = array(
					'choice' => $this->input->post('choice'),//Data to update
					'answer_id' => $answer_id//Will update record 3 as stated in function defined
				);
				// pass the data to the model for use
				$this->db->where('answer_id', $answer_id);
				$this->db->update('poll_answers', $answers); 
				//set flash data success message to inform the user that data has been updated.
				$this->session->set_flashdata('success', 'Answer 1 has successfully been updated');
				// redirect to index to show successful update
				redirect(base_url('admin/topics/'), 'location');
			}
			//Display views
			$data['title'] = 'Edit Answer';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/pollAnswerOne', $data);
			$this->load->view('admin/footer');
	}
	// passing 4 to $question_id so the get method in the MY_Model updates the correct answer.
	function updateAnswerTwo($answer_id = 4) {		
		
			// set validation rules
			$this->form_validation->set_rules('choice','choice','required|xss_clean');

			// check to see if the button of the form has been pressed and the form validates
			if($this->form_validation->run() == TRUE){
				// array containing data to be updated
				$answers = array(
					'choice' => $this->input->post('choice'),//Data to update
					'answer_id' => $answer_id//Will update record 4 as stated in function defined
				);
				// pass the data to the model for use
				$this->db->where('answer_id', $answer_id);
				$this->db->update('poll_answers', $answers); 
				//set flash data success message to inform the user that data has been updated.
				$this->session->set_flashdata('success', 'Answer 2 has successfully been updated');
				// redirect to index to show successful update
				redirect(base_url('admin/topics/'), 'location');
			}
			//Display views
			$data['title'] = 'Edit Answer';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/pollAnswerTwo', $data);
			$this->load->view('admin/footer');
	}
}
<?php 

class Questions extends CI_Controller {
	
	// variables
	
	//constructor
	function __construct(){
		parent ::__construct();	
		// make the questions_model available to all methods of this class
		$this->load->model('admin/questions_model');
		// load the quiz model in for linking the tables data
		$this->load->model('admin/quiz_model');

        $this->load->library('auth');
        $this->auth->checkLogin();
	}
	
	/**
	*
	* show all questions for a quiz
	* @param 	int | $quiz_id used to retreive single record from quiz table
	* @var	array | $data passed from the view to the model
	*
	*/
	function home($quiz_id = 0) {
		// check if there is a quiz id and that quiz exists in the db
		if($this->quiz_model->get($quiz_id)){
			// get all questions related to quiz using quiz id as forign key.
			$data['questions']=$this->questions_model->get_by_FK($quiz_id);
			$data['quiz_id']= $quiz_id;
			
			$data['title'] = 'Quiz Questions';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/indexQuestions', $data);
			$this->load->view('admin/footer');
			
		} else {
			// set flash data error massage due to quiz id not being selected
			$this->session->set_flashdata('error', 'You have not selected a valid quiz.');
			// redirect to index to show successful add
			redirect(base_url('admin/topic'), 'location');
		}
	}
	
	
	/**
	*
	* add a question to a quiz or show error message
	* @param 	int | $quiz_id used to add a single record to questions table
	* @quiz		array | capture all form data on POST and pass to MY_Model via Questions_Model
	*
	*/
	
	// passing 0 in instead of NULL to $quiz_id so the get method in the MY_Model does not return all quizzes.
	function addQuestion($quiz_id = 0) {		
		// check if there is a quiz id and that quiz exists in the db
		if($this->quiz_model->get($quiz_id)){

			// set validation rules
			$this->form_validation->set_rules('question','question','required|xss_clean');

			// check to see if the button of the form has been pressed and the form validates
			if($this->form_validation->run() == TRUE){
				// array containing data to be inserted
				$questions = array(
					'question' => $this->input->post('question'),
					'quiz_id' => $quiz_id
				);
				// pass the data to the model for use
				$this->questions_model->save($questions);
				//set flash data success message to inform the user that data has been added.
				$this->session->set_flashdata('success', 'Your question has successfully been added to the database.');
				// redirect to index to show successful add
				redirect(base_url('admin/questions/home/'.$quiz_id), 'location');
			}
			
			$data['title'] = 'Add Question';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/addQuestion_view');
			$this->load->view('admin/footer');
			
			
			
		} else {
			//set flash data error massage due to topic id not being selected
			$this->session->set_flashdata('error', 'You have not selected a suitable topic.');
			// redirect to index to show successful add
			redirect(base_url('admin/quizzes'), 'location');
		}
	}
	
}



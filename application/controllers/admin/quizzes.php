<?php 

class Quizzes extends CI_Controller {
	
	// variables
	
	//constructor
	function __construct(){
		parent ::__construct();	
		// make the topic_model available to all methods of this class
		$this->load->model('admin/topic_model');
		// make the quizs_model available to all methods of this class
		$this->load->model('admin/quiz_model');

        $this->load->library('auth');
        $this->auth->checkLogin();
	}
	
	/**
	*
	* show all quizzes for a topic
	* @param 	int | $topic_id used to retreive single record from topics table
	* @var	array | $data passed from the view to the model
	*
	*/
	function home($topic_id = NULL) {
		// check if there is a topic id and that topic exists in the db
		if($this->topic_model->topicExist($topic_id)){
			// get all quizzes related to topic using topic id as forign key.
			$data['quizzes']=$this->quiz_model->get_by_FK($topic_id);
			// can check data is returning correctly using the following line
			// print_r ($data['quizzes']);
			$data['topic_id']= $topic_id;
			$data['title'] = 'All Quizzes';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/indexQuizzes', $data);
			$this->load->view('admin/footer');
		} else {
			// set flash data error massage due to topic id not being selected
			$this->session->set_flashdata('error', 'You have not selected a valid topic.');
			// redirect to index to show successful add
			redirect(base_url('admin/topics'), 'location');
		}
	}
	
	
	/**
	*
	* add a quiz to a tpic or show error message
	* @param 	int | $topic_id used to add a single record to topics table
	* @quiz		array | capture all form data on POST and pass to MY_Model via Quiz_Model
	*
	*/
	function addQuiz($topic_id = NULL) {		
		// check if there is a topic id and that topic exists in the db
		if($this->topic_model->topicExist($topic_id)){

			// set validation rules
			$this->form_validation->set_rules('quiz_name','quiz name','required|xss_clean');
			$this->form_validation->set_rules('short_desc','short description','required|xss_clean');


			// check to see if the button of the form has been pressed and the form validates
			if($this->form_validation->run() == TRUE){
				// array containing data to be inserted
				$quiz = array(
					'quiz_name' => $this->input->post('quiz_name'),
					'shortdesc' => $this->input->post('short_desc'),
					'topic_id' => $topic_id
				);
				// pass the data to the model for use
				$this->quiz_model->save($quiz);
				//set flash data success message to inform the user that data has been added.
				$this->session->set_flashdata('success', 'Your quiz has successfully been added to the database.');
				// redirect to index to show successful add
				redirect(base_url('admin/quizzes/home/'.$topic_id), 'location');
			}
			
			$data['title'] = 'Add Quiz';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/addQuiz_view');
			$this->load->view('admin/footer');
			
			
		} else {
			//set flash data error massage due to topic id not being selected
			$this->session->set_flashdata('error', 'You have not selected a suitable topic.');
			// redirect to index to show successful add
			redirect(base_url('admin/topics'), 'location');
		}
	}
}
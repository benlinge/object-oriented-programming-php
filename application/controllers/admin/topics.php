<?php 

class Topics extends CI_Controller {
	
	// variables
	
	
	
	//constructor
	function __construct(){
		parent ::__construct();	
		// make the topic_model available to all methods of this class
		$this->load->model('admin/topic_model');

        $this->load->library('auth');
        $this->auth->checkLogin();
	}
	
	//methods
	function index() {
		// get all topics from db via model
        $data['title'] = 'All Topics';
		$data['topics'] = $this->topic_model->getAll()->result_array();

        $this->load->view('admin/header', $data);
		$this->load->view('admin/indexTopics', $data);
        $this->load->view('admin/footer');
	}
	
		
	function addTopic() {
		
		// validation rules
		$this->form_validation->set_rules('topic_name', 'topic name', 'required|xss_clean');

		// check to see if the button of the form has been pressed and all fields validate to rules
		if($this->form_validation->run() == TRUE){
		
			$topics = array(
				'topic_name' => $this->input->post('topic_name')
			); // topicname will be the name of the field from the topic_view file.
			
			//pass the data to the model for use
			$this->topic_model->addTopic($topics);
			
			//set flash data success message to inform the user that data has been added.
			$this->session->set_flashdata('success', 'Your topic has successfully been added to the database.');
			
			// redirect to index to show successful add
			redirect(base_url('admin/topics'), 'location');
		}
		$data['title'] = 'Add Topics';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/addTopic_view');
		$this->load->view('admin/footer');
	}
			
}

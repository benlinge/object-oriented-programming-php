<?php

class Login extends CI_Controller {

    // variables

    //constructor
    function __construct(){
        parent ::__construct();
        $this->load->library('auth');
    }

    /**
     *
     * show all answers for a question
     * @param 	int | $question_id used to retreive single record from questions table
     * @var	array | $data passed from the view to the model
     *
     */
    function index() {
        $data['name'] = 'Login';
        $this->form_validation->set_rules('uname','username','required|xss_clean');
        $this->form_validation->set_rules('pword','password','required|xss_clean');
        if($this->form_validation->run() == true){
            $username = $this->input->post('uname');
            $password = $this->input->post('pword');
            if(!$this->auth->login($username, $password)) {
                $data['error'] = 'Incorrect username and password, try again.';
            }
        }
        $this->load->view('admin/login', $data);
    }

    function logout() {
        $this->auth->logout();
    }

}
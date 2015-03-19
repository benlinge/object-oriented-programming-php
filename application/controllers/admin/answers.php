<?php

class Answers extends CI_Controller {

    // variables

    //constructor
    function __construct(){
        parent ::__construct();
        // make the answers_model available to all methods of this class
        $this->load->model('admin/answers_model');
        // load the questions_model in for linking the tables data
        $this->load->model('admin/questions_model');

        $this->load->library('auth');
        $this->auth->checkLogin();
    }

    /**
     *
     * show all answers for a question
     * @param 	int | $question_id used to retreive single record from questions table
     * @var	array | $data passed from the view to the model
     *
     */
    function home($question_id = 0) {
        // check if there is a question id and that question exists in the db
        if($this->questions_model->get($question_id)){
            // get all questions related to quiz using quiz id as forign key.
            $data['answers']=$this->answers_model->get_by_FK($question_id);
            $data['question_id']= $question_id;
			
			$data['title'] = 'Answers';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/indexAnswers', $data);
			$this->load->view('admin/footer');
			
            
        } else {
            // set flash data error massage due to question id not being selected or valid
            $this->session->set_flashdata('error', 'You have not selected a valid question.');
            // redirect to index if an error occurs
            redirect(base_url('admin/topics'), 'location');
        }
    }


    /**
     *
     * add a answer to a quiz or show error message
     * @param 	int | $question_id used to add a single record to answers table
     * @param 	int | $questions used to add a single record to answers table
     * @param 	int | $question_id used to add a single record to answers table
     * @quiz		array | capture all form data on POST and pass to MY_Model via Questions_Model
     *
     */

    // passing 0 in instead of NULL to $question_id so the get method in the MY_Model does not return all quizzes.
    function addAnswer($question_id = 0) {
        // check if there is a question id and that question exists in the db and if so get question
        if($question = $this->questions_model->get($question_id)){
            // set validation rules
            $this->form_validation->set_rules('answer','answer','required|xss_clean');

            // get all current answers for question
            $answers = $this->answers_model->get_by_FK($question_id);
            if($answers) {
                // chain variable to equal to set both variables at the same time
                $first_question = $data['first_question'] = false;
            } else {
                $first_question = $data['first_question'] = true;
            }

            // set question in the data array
            $data['question'] = $question[0]['question'];

            // check to see if the button of the form has been pressed and the form validates
            if($this->form_validation->run() == TRUE){
                // array containing data to be inserted
                $answer = array(
                    'answer' => $this->input->post('answer'),
                    'question_id' => $question_id
                );
                // check if first answer, if so set as correct answer in db
                if($first_question == true) {
                    $answer['correct'] = 1;
                } else {
                    $answer['correct'] = 0;
                }

                // pass the data to the model for use
                $this->answers_model->save($answer);
                //set flash data success message to inform the user that data has been added.
                $this->session->set_flashdata('success', 'Your answer has successfully been added to the database.');
                // redirect to index to show successful add
                redirect(base_url('admin/answers/home/'.$question_id), 'location');
            }
			
			$data['title'] = 'Add Answer';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/addAnswer_view', $data);
			$this->load->view('admin/footer');
            
        } else {
            //set flash data error massage due to question id not being selected
            $this->session->set_flashdata('error', 'You have not selected a valid question.');
            // redirect to index if an error occurs
            redirect(base_url('admin/topics'), 'location');
        }
    }

}



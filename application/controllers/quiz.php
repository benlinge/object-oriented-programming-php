<?php

class Quiz extends CI_Controller {
	
	var $data = array(); // stops errors when nothing in array being passed to the view.
	
	function __construct(){
		parent::__construct();
		$this->load->model('quizzes_model');
        //$this->output->enable_profiler(TRUE);
	}

    /**
     * Take a quiz and see results
     * @param $quiz_id
     */
    function take($quiz_id) {
        // check quiz exists and has at least one question and each question has at least 2 answers
        $quiz = $this->quizzes_model->get_quiz($quiz_id);
        if($quiz) {
            $data['quiz'] = $quiz[0];
            // get current quiz from session
            $current_quiz = $this->session->userdata('quiz');
            // get quiz id from current quiz
            $current_quiz_id = $current_quiz['quiz_id'];

            if($this->input->post()) {
                $this->session->unset_userdata('quiz');
                $current_quiz['questions'][$this->input->post('question_id')] = $this->input->post('answer');
                $this->session->set_userdata(array('quiz' => $current_quiz));
            }

            if($current_quiz && $current_quiz_id == $quiz_id) {

                // get answered questions from session
                $questions_answers = $current_quiz['questions'];

                // check if questions have already been answered
                $answered_questions = array();
                if(!empty($questions_answers)) {
                    foreach($questions_answers as $question_id => $answer) {
                        array_push($answered_questions, $question_id);
                    }
                }

                $remaining_questions = $this->quizzes_model->quiz_reminaing_questions($quiz_id, $answered_questions);
                if($remaining_questions) {
                    $question_id = $remaining_questions[0]['question_id'];
                    $data['question'] = $remaining_questions[0]['question'];
                    $answers = $this->quizzes_model->next_question($question_id);
                    shuffle($answers);//Shuffles the answers so that they have a different order every time a user starts a quiz.
                    $data['answers'] = $answers;
                    $this->load->view('quizNextQuestion', $data);
                    $this->load->view('footer');
                } else {
                    $data['user_answers'] = $current_quiz['questions'];
                    $data['answers'] = $this->quizzes_model->quiz_answers($quiz_id);
					$data['diamond'] = $this->quizzes_model->diamond()->result_array();//call diamond badge function from model
					$data['plat'] = $this->quizzes_model->plat()->result_array();//call platinum badge function from model
					$data['gold'] = $this->quizzes_model->gold()->result_array();//call gold badge function from model
					$data['silver'] = $this->quizzes_model->silver()->result_array();//call silver badge function from model
					$data['bronze'] = $this->quizzes_model->bronze()->result_array();//call bronze badge function from model
                    $this->load->view('quizResults', $data);
                    $this->load->view('footer');
                }

            }
            // check if quiz has already been started and is current quiz, if delete session data and start again
            else {
                $data['title'] = 'Start Quiz';
                $this->session->unset_userdata('quiz');
                $quiz = array(
                    'quiz_id' => $quiz_id,
                    'questions' => array()
                );
                $this->session->set_userdata(array('quiz' => $quiz));
                $this->load->view('quizStart', $data);
                $this->load->view('footer');
            }
        // else quiz does not exist or meet the questions/answers criteria
        } else {
            redirect(base_url(), 'location');
        }
	}
}
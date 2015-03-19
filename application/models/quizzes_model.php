<?php 

class Quizzes_model extends MY_Model {
	
	// variables
	
	//constructor
	function __construct(){
		parent::__construct();
		$this->table_name = 'quiz';
		$this->primary_key = 'quiz_id';
		$this->order_by = 'quiz_id ASC';
		$this->foreign_key = 'topic_id';
	}

    function get_complete_quizes($topic_id) {
        $sql = '
          SELECT *
          FROM quiz
          JOIN (
            SELECT COUNT(answers.answer_id) AS total_answers, questions.quiz_id
            FROM answers
            JOIN questions ON questions.question_id = answers.question_id
            GROUP BY answers.question_id
          ) questions_answers ON questions_answers.quiz_id = quiz.quiz_id AND questions_answers.total_answers > 1
          WHERE quiz.topic_id = ?
		  GROUP BY quiz.quiz_id
        ';
        return $this->db->query($sql, array($topic_id))->result_array();
    }

    function get_quiz($quiz_id) {
        $sql = '
          SELECT *
          FROM quiz
          JOIN (
            SELECT COUNT(answers.answer_id) AS total_answers, questions.quiz_id
            FROM answers
            JOIN questions ON questions.question_id = answers.question_id
            GROUP BY answers.question_id
          ) questions_answers ON questions_answers.quiz_id = quiz.quiz_id AND questions_answers.total_answers > 1
          WHERE quiz.quiz_id = ?
        ';
        return $this->db->query($sql, array($quiz_id))->result_array();
    }

    function quiz_reminaing_questions($quiz_id, $answered_questions) {
        $this->db->select('*');
        $this->db->from('questions');
        $this->db->join('(
            SELECT COUNT(answers.answer_id) AS total_answers, questions.quiz_id, answers.question_id
            FROM answers
            JOIN questions ON questions.question_id = answers.question_id
            GROUP BY answers.question_id
          ) questions_answers', 'questions_answers.quiz_id = questions.quiz_id AND questions.question_id = questions_answers.question_id AND questions_answers.total_answers > 1');
        $this->db->where('questions.quiz_id ', $quiz_id);
        if(!empty($answered_questions)) {
            $this->db->where_not_in('questions.question_id ', $answered_questions);
        }
        return $this->db->get()->result_array();
    }

    function next_question($question_id) {
        $this->db->select('*');
        $this->db->from('answers');
        $this->db->where('answers.question_id', $question_id);
        return $this->db->get()->result_array();
    }

    function quiz_answers($quiz_id) {
        $this->db->select('*');
        $this->db->from('questions');
        $this->db->join('answers', 'answers.question_id = questions.question_id');
        $this->db->where('questions.quiz_id', $quiz_id);
        return $this->db->get()->result_array();
    }
	
	//Badge functions
	function diamond() {//diamond badge
        $diamond = $this->db->query('SELECT image FROM badges WHERE badge_id = 1');//select where id is 1
        return $diamond;
    }
	function plat() {//platinum badge
        $plat = $this->db->query('SELECT image FROM badges WHERE badge_id = 2');//select where id is 2
        return $plat;
    }
	function gold() {//gold badge
        $gold = $this->db->query('SELECT image FROM badges WHERE badge_id = 3');//select where id is 3
        return $gold;
    }
	function silver() {//silver badge
        $silver = $this->db->query('SELECT image FROM badges WHERE badge_id = 4');//select where id is 4
        return $silver;
    }
	function bronze() {//bronze badge
        $bronze = $this->db->query('SELECT image FROM badges WHERE badge_id = 5');//select where id is 5
        return $bronze;
    }
}



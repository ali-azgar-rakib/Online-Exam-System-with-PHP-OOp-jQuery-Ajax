<?php

class Exam
{

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getQuesData()
    {
        $query = "SELECT * FROM questions ORDER BY qno ASC";
        $result = $this->db->select($query);
        return $result;
    }

    public function deleteQuestion($delId)
    {
        $query = "DELETE FROM questions WHERE id=$delId";
        $result = $this->db->delete($query);
        if ($result) {
            $msg = "<span class='success'>Delete successfully!</span>";
            Session::set('delQ', $msg);
        }
    }

    public function getTotal()
    {
        $query = "SELECT * FROM questions";
        $result = $this->db->select($query);
        if ($result) {
            $total = $result->num_rows;
            return $total;
        }
    }

    public function insertQuestion($data)
    {
        $qNo = $this->db->link->real_escape_string($data['qid']);
        $qTitle = $this->db->link->real_escape_string($data['qtitle']);
        $ans = [];
        $ans[1] = $this->db->link->real_escape_string($data['qone']);
        $ans[2] = $this->db->link->real_escape_string($data['qtwo']);
        $ans[3] = $this->db->link->real_escape_string($data['qthree']);
        $ans[4] = $this->db->link->real_escape_string($data['qfour']);
        $rightAns = $this->db->link->real_escape_string($data['rans']);
        $query = "INSERT INTO questions(qno,title) VALUES($qNo,'$qTitle')";
        $qResponse = $this->db->insert($query);
        if ($qResponse) {
            $error = 0;
            foreach ($ans as $key => $value) {
                if ($rightAns == $key) {
                    $cans = 1;
                } else {
                    $cans = 0;
                }
                $ansQuery = "INSERT INTO answers(qno,rightans,answer) VALUES($qNo,$cans,'$value')";
                $ansResponse = $this->db->insert($ansQuery);

                if ($ansResponse) {
                    continue;
                } else {
                    $error++;
                }
            }
            if ($error == 0) {
                $msg = "<span class='success'>Successfully added</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Something went wrong</span>";
                return $msg;
            }
        } else {
            $msg = "<span class='error'>Something went wrong</span>";
            return $msg;
        }
    }

    public function getQuestionByNum($number)
    {
        $query  = "SELECT * FROM questions WHERE qno=$number";
        $result = $this->db->select($query)->fetch_assoc();
        return $result;
    }

    public function getAnswerByQ($number)
    {
        $query  = "SELECT * FROM answers WHERE qno=$number";
        $result = $this->db->select($query);
        return $result;
    }
}
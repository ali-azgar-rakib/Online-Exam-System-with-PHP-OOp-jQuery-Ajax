<?php

class Process
{

    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function nextPage($data)
    {
        if (!empty($data['answer'])) {
            $answer = $this->db->link->real_escape_string($data['answer']);
            $number = $this->db->link->real_escape_string($data['number']);
            $total  = $this->db->link->real_escape_string($data['total']);
            $next   = $number + 1;

            if (!isset($_SESSION['result'])) {
            }

            if ($answer == $this->rightAns($number)) {
                $_SESSION['result']++;
            }
            if ($number == $total) {
                header('location: final.php');
            } else {
                header('location: test.php?q=' . $next);
            }
        } else {
            return "Answer this for going to next one...";
        }
    }

    private function rightAns($number)
    {
        $query  = "SELECT * FROM answers WHERE qno=$number AND rightans=1";
        $result = $this->db->select($query)->fetch_assoc();
        $ansid  = $result['id'];
        return $ansid;
    }
}
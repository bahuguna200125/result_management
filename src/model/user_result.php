<?php 
require "/var/www/html/result-management/src/model/user.php";
require "/var/www/html/result-management/src/model/subjects.php";

class UserResult {
    private $id;
    private User $user;
    private array $subjects=[];
   

function __construct( $id,$user){
    $this->id= $id;
    $this->user = $user;
}
function get_id(){
    return $this -> id;
}

function set_id($id){
    $this -> id = $id;
}
function get_user(){
    return $this -> user;
}  

public function addSubject(Subject $subject) {
    $this->subjects[$subject->get_subject_name()] = $subject;
}
public function getSubjectMark(string $subjectName): float {
    return $this->subjects[$subjectName]->get_subject_marks();
}

public function resultStatus(){
    $fail = false;
    $fail_sub_marks = 0;
    $total_fail_sub = 0;
    
    $subjects = ['hindi', 'english', 'maths', 'physics', 'chemistry'];
    
    foreach ($subjects as $subject) {
        if ($this->getSubjectMark($subject) < 33) {
            $fail = true;
            $total_fail_sub++;
            $fail_sub_marks = $this->getSubjectMark($subject);
        }
    }
    $result_status = ""; 
    
    if ($fail) {
        if ($total_fail_sub == 1 && $fail_sub_marks >= 25) {
            $result_status = "PASS WITH GRACE";
          
        } else {
            $result_status = "FAIL";
            
        }
    } else {
        $result_status = "PASS";
     
    }
    return $result_status;
}
public function getTotalMarks(){
  
        return $this ->getSubjectMark("hindi")+  $this->getSubjectMark("english")+  $this->getSubjectMark("maths") +  $this->getSubjectMark("physics")+ $this->getSubjectMark("chemistry");
       
    } 
    
    public function getPercentage(){
        return ($this->getTotalMarks() / 500) * 100;
    }
}


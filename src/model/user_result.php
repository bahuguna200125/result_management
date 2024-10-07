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






// function set_user_id($userid){
//      $this -> user_id= $userid;
// }
// function get_hindi(){
//     return $this ->hindi;

// } 
// function set_hindi($hin){
//     $this ->hindi=$hin;

// } 
// function get_english(){
//     return $this ->english;

// }
// function set_english($eng){
//     $this ->english=$eng;
// }
// function get_maths(){
//     return $this->maths;
// }
// function set_maths($math){
//     $this->maths=$math;
// }
// function get_physics(){
//     return $this-> physics;

// }
// function set_physics($phy){
//    $this ->physics = $phy;

// }
// function get_chemistry(){
//     return $this ->chemistry;
// }
// function set_chemistry($che){
//      $this ->chemistry=$che;
// }
}


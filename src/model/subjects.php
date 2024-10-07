<?php 

class Subject{
    private $subject_name;
    private $subject_marks;

    function __construct($subject_name,$subject_marks){
        $this->subject_name = $subject_name;
        $this->subject_marks = $subject_marks;
      
    }
        function get_subject_name(){
            return $this-> subject_name;
        }
        function set_subject_name(){
            return $this-> subject_name;
        }
        
        function get_subject_marks(){
            return $this-> subject_marks;
        }
  
        function set_subject_marks(){
            return $this-> subject_marks;
        }
}
?>
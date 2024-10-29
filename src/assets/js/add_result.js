function validateResultForm() { 
    var validfrom=true;
    alert("THE RESULT WAS ADDED"+document.getElementById("hin").value+ document.getElementById("eng").value+document.getElementById("math").value+document.getElementById("phy").value+document.getElementById("che").value) ;   
       
    var hindi=document.getElementById("hin").value;
    if (hindi=="") {
       validfrom=false;
       document.getElementById("hindi_info").innerHTML="<h6> PLEASE ENTER MARKS IN HINDI</h6>";
    }
    else{
       document.getElementById("hindi_info").innerHTML="<h6> MARKS ADDED</h6>";
    }
   
   
   
    var english=document.getElementById("eng").value;
    if (english=="") {
       validfrom=false;
       document.getElementById("english_info").innerHTML="<h6> PLEASE ENTER MARKS IN ENGLISH</h6>";
    }
    else{
       document.getElementById("english_info").innerHTML="<h6> MARKS ADDED</h6>";
    }
   
   
    var maths=document.getElementById("math").value;
    if (maths=="") {
       validfrom=false;
       document.getElementById("maths_info").innerHTML="<h6> PLEASE ENTER MARKS IN MATHS</h6>";
    }
    else{
       document.getElementById("maths_info").innerHTML="<h6> MARKS ADDED</h6>";
    }
    var physics=document.getElementById("phy").value;
    if (physics=="") {
       validfrom=false;
       document.getElementById("physics_info").innerHTML="<h6> PLEASE ENTER MARKS IN PHYSICS</h6>";
    }
    else{
       document.getElementById("physics_info").innerHTML="<h6> MARKS ADDED</h6>";
    }
   
   
   
    var chemistry=document.getElementById("che").value;
    if (chemistry=="") {
       validfrom=false;
       document.getElementById("chemistry_info").innerHTML="<h6> PLEASE ENTER MARKS IN CHEMISTRY</h6>";
    }
    else{
       document.getElementById("chemistry_info").innerHTML="<h6> VALID MARKS</h6>";
    }
   
    if (validfrom){
       document.getElementById("addresult").submit();
       
    }
   
   return validfrom;
    
}
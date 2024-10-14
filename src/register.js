function registerValidation(event) { 
    var validfrom=true;
    var pass_error=false;
    alert("THE FORM WAS SUBMITTED"+document.getElementById("fname").value+ document.getElementById("lname").value+document.getElementById("mail").value+document.getElementById("cpass").value+document.getElementById("conpass").value) ;   
       
    var fname=document.getElementById("fname").value;
    if (fname=="") {
       validfrom=false;
       document.getElementById("fname_info").innerHTML="<h6> PLEASE ENTER FIRST NAME</h6>";
    }
    else{
       document.getElementById("fname_info").innerHTML="<h6> VALID FIRST NAME</h6>";
    }
    var lname=document.getElementById("lname").value;
    if (lname=="") {
       validfrom=false;
       document.getElementById("lname_info").innerHTML="<h6> PLEASE ENTER LAST NAME</h6>";
    }
    else{
       document.getElementById("lname_info").innerHTML="<h6> VALID LAST NAME</h6>";
    }
   
   
    var mail=document.getElementById("mail").value;
    if (mail=="") {
       validfrom=false;
       document.getElementById("mail_info").innerHTML="<h6> PLEASE ENTER MAIL ID</h6>";
    }
    else{
       document.getElementById("mail_info").innerHTML="<h6> VALID MAIL ID</h6>";
    }
    var phone=document.getElementById("phone").value;
    if (phone=="") {
       validfrom=false;
       document.getElementById("phone_info").innerHTML="<h6> PLEASE ENTER PHONE NUMBER</h6>";
    }
    else{
       document.getElementById("phone_info").innerHTML="<h6> VALID PHONE NUMBER</h6>";
    }
   
   
   
    var cpass=document.getElementById("cpass").value;
    if (cpass=="") {
       validfrom=false;
       document.getElementById("cpass_info").innerHTML="<h6> PLEASE ENTER PASSWORD</h6>";
    }
   
   
   
    var conpass =document.getElementById("conpass").value;
    if (conpass=="") {
       validfrom=false;
       pass_error=true;
       document.getElementById("conpass_info").innerHTML="<h6> PLEASE ENTER CONFRIM PASSWORD</h6>";
    }
    
   
    if (cpass!=conpass) {
       validfrom=false;
       pass_error=true;
       document.getElementById("samepass_info").innerHTML="<h5>ENTER SAME PASSWORD</h5>";
       
    }
   
   
    if (pass_error==false) {
       
       document.getElementById("samepass_info").innerHTML="<h5>VALID PASSWORD</h5>";  
    }
   
    if (validfrom){
       document.getElementById("register_form").submit();
       
    }
   
   return false;
    
   }
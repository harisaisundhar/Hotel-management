 function validate()
 {
	 var name=document.getElementById("name").value;
	 var r_id=document.getElementById("r_id").value;
	 
	 var email=document.getElementById("email").value;
	 
	 
	 var pattern_name=/[^A-z.]/g;
	 var pattern_r_id=/^[0-9]{4}$/i;
	 
	 var pattern_email=/^[A-z0-9.]@[A-z0-9.]$/;
	 
	 if((name.search(patter_name)+1))
	 {
		 alert("Student name Invalid");
	 }
	 else if(!pattern_r_id.test(r_id))
	 {
		 alert("Student roll.no Invalid");
	 }
	 else if(!(email.search(pattern_email)+1))
	 {
		 alert("Email ID Invalid");
	 }
 }
	 
	 
	 
 
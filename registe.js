$(document).ready(fucntion(){
	$("#create").click(function(){
		var email =$("email").val();
		var pw =$("password").val();
		var sex =$("sex").val();
		var city =$("City").val();
		var skill =$("Skill").val();
		var img =$("image").val();
		
		var data_string = 'email='+ email + '&password='+ pw + '&sex='+ sex + '&City=' + city + '&Skil=' + skill + '&image=' + img;
		if(email==''||pw==''||sex==''||city==''||skill=='')
		{
			alert("Please Fill All Fields");
		}
		else
		{
			// AJAX Code.
			$.ajax({
			type: "POST",
			url: "form.php",
			data: data_string,
			//cache: false,
			success: function(data_string){
				$("#form_output").html(data);
			}
			error : function(result2){
				alert(result2) ;
			}
			});
		}
});
});
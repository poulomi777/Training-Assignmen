$document.ready(function(){
	("#login").click(function(){
		var email =$("email").val();
		var pw =$("password").val();
		
		var data_string = "email =" +email+ "&password=" + pw;
		$.ajax({
			type: "POST",
			url: "login.php",
			data: data_string, 
			cache: false,
			success: function(data_string){
				$("#login_output").html(data);
			}
			error : function(result){
				alert(result) ;
			}
			});
			
	});
	
});
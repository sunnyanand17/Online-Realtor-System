$(document).ready(function() {
	var errorJS="";
	$("#username").after("<span >The username field must contain only letters</span>");
	
	$("#password").after("<span >The password field should be at least 8 characters long</span>");
	$("#email").after("<span>The email address field should contain a @ character</span>");
	
	$("span").hide();

	$('#username').focus('input', function() {
	$( this ).next( "span" ).text("The username field must contain only letters").show().addClass("info");
});

  	$('#password').focus('input', function() {
	$( this ).next( "span" ).text("The password field should be at least 8 characters long").show().addClass("info");
});

  $('#email').focus('input', function() {
	$( this ).next( "span" ).text("The email address field should contain a @ character").show().addClass("info");
});


    $('#username').blur('input', function() {
    $( this ).next( "span" ).hide();
    $( this ).next( "span" ).removeClass("info");
    $( this ).next( "span" ).removeClass("ok");
    $( this ).next( "span" ).removeClass("error");

	var input=$(this);
	var u_name=input.val();
	var str=/^[a-zA-Z]+$/;
	if(u_name.match(str)){
		$( this ).next( "span" ).text("ok");
		$( this ).next( "span" ).show().addClass("ok");
		
	}
	else if(!u_name){
		    $( this ).next( "span" ).hide();
	}
	else{
		$( this ).next( "span" ).text("Error!");
		$( this ).next( "span" ).show().addClass("error");
		errorJS="Error1";
		alert(errorJS);
		
	}
});

    $('#password').blur('input', function() {    	
    $( this ).next( "span" ).hide();
    $( this ).next( "span" ).removeClass("info");    
    $( this ).next( "span" ).removeClass("ok");
    $( this ).next( "span" ).removeClass("error");
	var input=$(this);
	var u_name=input.val();
	if(u_name.length > 7){
		$( this ).next( "span" ).text("ok");
		$( this ).next( "span" ).show().addClass("ok");
	}
	else if(!u_name){
		    $( this ).next( "span" ).hide();
	}
	else{
		$( this ).next( "span" ).text("Error!");
		$( this ).next( "span" ).show().addClass("error");
		errorJS="Password must be 8 characters long";
		alert(errorJS);
	}
});

    $('#email').blur('input', function() {    	
    $( this ).next( "span" ).hide();
    $( this ).next( "span" ).removeClass("info");    
    $( this ).next( "span" ).removeClass("ok");
    $( this ).next( "span" ).removeClass("error");
	var input=$(this);
	var u_name=input.val();

	if(u_name.indexOf("@")!= -1){
		$( this ).next( "span" ).text("ok");
		$( this ).next( "span" ).show().addClass("ok");
	}
	else if(!u_name){
		    $( this ).next( "span" ).hide();
	}
	else{
		$( this ).next( "span" ).text("Error!");
		$( this ).next( "span" ).show().addClass("error")
		errorJS="Enter correct email";
		alert(errorJS);
	}
});

// set a event handler to the button
  $("#btn-signup").click(function() {
    // retrieve form data   $name = trim($_POST['txt_name']);

   var name = $("#name").val();
   var dob = $("#dob").val();
   var gender = $("#gender").val();
   var city = $("#city").val();
   var zip = $("#zip").val();
   var country = $("#country").val();
   var email = $("#email").val();
   var password = $("#password").val();

   //var errorJS = $("errorJS").val();

    // send form data to the server side php script.
    $.ajax({
        type: "post",
        url: "new.php",
        dataType: "html",
        data :  {name:name, dob:dob, gender:gender, city:city, zip:zip, country:country, email:email, password:password, errorJS:errorJS},
        success: function(data)
        {
           alert(data); // Alert the results
           window.location.href='register.php';
        }

    });

});

   
});

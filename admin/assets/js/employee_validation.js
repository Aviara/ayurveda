function Submit_form(){
 var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
 var formemail = $("#femail").val();
 var formreemail = $("#reemail").val();
 var name = $("#name").val();
 var lname = $("#lname").val();
 var femail = $("#femail").val();
 var reemail = $("#reemail").val();
 var pass = $("#pass").val();
 var month = $("#month").val();
 var day = $("#day").val();
 var year = $("#year").val();
  
  if($("#firstname").val() == "" ){
   $("#firstname").focus();
   $("#errorFirstName").html("enter the First Name");
   return false;
  }else if($("#lastname").val() == "" ){
    $("#lastname").focus();
    $("#errorLastName").html("enter the Last Name");
    return false;
  }else if($("#middlename").val() == "" ){
    $("#middlename").focus();
    $("#errorMiddleName").html("enter the middle Name");
    return false;
  }else if($("#email_id").val() == "" ){
    $("#email_id").focus();
    $("#errorEmail").html("enter the email");
    return false;
  }else if(!emailRegex.test(formemail)){
    $("#femail").focus();
    $("#errorBox").html("enter the valid email");
    return false;
  }else if($('#reemail').val() == ""){
    $("#reemail").focus();
    $("#errorBox").html("re enter the  email");
    return false;
  }else if(!emailRegex.test(formreemail)){
    $("#reemail").focus();
    $("#errorBox").html("re enter the valid email");
    return false;
  }else if(reemail != femail){
    $("#reemail").focus();
    $("#errorBox").html("emails are not matching, re-enter again");
    return false;
  }else if($('#pass').val() == ""){
    $("#pass").focus();
    $("#errorBox").html("Enter the password");
    return false;
  }else if($('#month').val() == ""){
    $("#month").focus();
    $("#errorBox").html("Select Month");
    return false;
  }else if($('#day').val() == ""){
    $("#day").focus();
    $("#errorBox").html("Select day");
    return false;
  }else if($('#year').val() == ""){
    $("#year").focus();
    $("#errorBox").html("Select Year");
    return false;
  }else if($('input[name=radiobutton]:checked').length<=0){
    $("#errorBox").html("Select gender");
    return false;
   }else if($(name != '' && lname != '' && femail != '' && reemail != '' && pass != '' && month != '' && day != '' && year != '')){
   $("#errorBox").html("form submitted successfully")
   }
   
 }

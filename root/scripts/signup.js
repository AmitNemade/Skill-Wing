$("#user1radio").click(function(){
    $(".upload-group").hide("slow","swing");

});

$("#user2radio").click(function(){
    $(".upload-group").show("slow","swing");

});

$(function() {
  $.fn.bootstrapPasswordMeter = function(options) {
    var settings = $.extend({
      minPasswordLength: 6,
      level0ClassName: 'progress-bar-danger',
      level0Description: 'Weak',
      level1ClassName: 'progress-bar-danger',
      level1Description: 'Not great',
      level2ClassName: 'progress-bar-warning',
      level2Description: 'Better',
      level3ClassName: 'progress-bar-success',
      level3Description: 'Strong',
      level4ClassName: 'progress-bar-success',
      level4Description: 'Very strong',
      parentContainerClass: '.password'
    }, options || {});

    $(this).on("keyup", function() {
      var progressBar = $(this).closest(settings.parentContainerClass).find('.progress-bar');
      var progressBarWidth = 0;
      var progressBarDescription = '';
      if ($(this).val().length >= settings.minPasswordLength) {
        var zxcvbnObj = zxcvbn($(this).val());
        progressBar.removeClass(settings.level0ClassName)
          .removeClass(settings.level1ClassName)
          .removeClass(settings.level2ClassName)
          .removeClass(settings.level3ClassName)
          .removeClass(settings.level4ClassName);
        switch (zxcvbnObj.score) {
          case 0:
            progressBarWidth = 25;
            progressBar.addClass(settings.level0ClassName);
            progressBarDescription = settings.level0Description;
            break;
          case 1:
            progressBarWidth = 25;
            progressBar.addClass(settings.level1ClassName);
            progressBarDescription = settings.level1Description;
            break;
          case 2:
            progressBarWidth = 50;
            progressBar.addClass(settings.level2ClassName);
            progressBarDescription = settings.level2Description;
            break;
          case 3:
            progressBarWidth = 75;
            progressBar.addClass(settings.level3ClassName);
            progressBarDescription = settings.level3Description;
            break;
          case 4:
            progressBarWidth = 100;
            progressBar.addClass(settings.level4ClassName);
            progressBarDescription = settings.level4Description;
            break;
        }
      } else {
        progressBarWidth = 0;
        progressBarDescription = '';
      }
      progressBar.css('width', progressBarWidth + '%');
      progressBar.text(progressBarDescription);
    });
  };
  $('#exampleInputPassword1').bootstrapPasswordMeter({minPasswordLength:3});
});

function validate()
{
  var error="";
  var fname = document.getElementById( "fname" );   //fname
  var lname = document.getElementById( "lname" );     //lname
  var email = document.getElementById( "email" );     //email
  var password = document.getElementById( "password" );     //passsword
  if(!(ValidateName(fname) || ValidateName(lname) || ValidateEmail(email) || ValidatePassword(password)) )
  {
    return false;
  }
  else{
    return true;
  }
}

function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.emailAddr.value))
  {
    return (true);
  }
    alert("You have entered an invalid email address!");
    return (false);
}

function ValidateName(inputtxt)
{
 var letters = /^[A-Za-z]+$/;
  if(inputtxt.value.match(letters))
  {
    return true;
  }
  else
  {
    alert("Name Cannot contain numbers or specail character or cannot be empty");
    return false;
  }
}

function ValidatePassword() { 
  var res; 
  var str = document.getElementById("t1").value; 
  if (str.match(/[a-z]/g) && str.match(/[A-Z]/g) && str.match(/[0-9]/g) && str.match(/[^a-zA-Z\d]/g) && str.length >= 8) 
    return true
  else 
  {
    alert("Password should contain atleast 1 uppercase character, 1 lowercase character, 1 digit, 1 special character, minimum 8 characters");
    return false;
  }
} 
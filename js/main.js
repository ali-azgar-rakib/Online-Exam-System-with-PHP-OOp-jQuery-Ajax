$(document).ready(function () {

  // code for regestration 
  $("#name").focusout(function () {
    var name = $(this).val();
    if (name == "") {
      $("#name_error").html("field shoudn't be empty");
    } else {
      $("#name_error").html("");
    }
  });

  $("#email").focusout(function () {
    var email = $(this).val();
    if (email == "") {
      $("#email_error").html("field shoudn't be empty");
    } else if (!validateEmail(email)) {
      $("#email_error").html("Your email address isn't valid");
    } else {
      $("#email_error").html("");
    }
  });

  $("#password").focusout(function () {
    var password = $(this).val();
    if (password == "") {
      $("#password_error").html("field shoudn't be empty");
    } else if (password.length < 4) {
      $("#password_error").html("Password should be atleast 4 char");
    } else {
      $("#password_error").html("");
    }
  });

  function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

  $('#submit').click(function () {
    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    $.ajax({
      type: "POST",
      url: "check/register_check.php",
      data: { name: name, email: email, password: password },
      success: function (response) {
        $('#errors').html(response);
      }

    });
    return false;

  });


  // code for logiin 
  $('#login').click(function () {
    var email = $('#email').val();
    var password = $('#password').val();
    $.ajax({
      type: "post",
      url: "check/login_check.php",
      data: { email: email, password: password },
      success: function (response) {
        if ($.trim(response) == 'empty') {
          $('#empty').show();
          $('#not_matched').hide();
          $('#deactive').hide();
        } else if ($.trim(response) == 'not_matched') {
          $('#empty').hide();
          $('#not_matched').show();
          $('#deactive').hide();
        } else if ($.trim(response) == 'deactive') {
          $('#deactive').show();
          $('#empty').hide();
          $('#not_matched').hide();
        } else if ($.trim(response) == 'success') {
          window.location = 'exam.php';

        }
      }
    });
    return false;
  });

});

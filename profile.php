<head>
  <?php
  	include("mysql_connect.php");
  ?>
<style>
body {
  padding-top: 90px;
}
.panel-login {
  border-color: #ccc;
  -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
  -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
  box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
  color: #00415d;
  background-color: #fff;
  border-color: #fff;
  text-align:center;
}
.panel-login>.panel-heading a{
  text-decoration: none;
  color: #666;
  font-weight: bold;
  font-size: 15px;
  -webkit-transition: all 0.1s linear;
  -moz-transition: all 0.1s linear;
  transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
  color: #029f5b;
  font-size: 18px;
}
.panel-login>.panel-heading hr{
  margin-top: 10px;
  margin-bottom: 0px;
  clear: both;
  border: 0;
  height: 1px;
  background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
  background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
  background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
  background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
  height: 45px;
  border: 1px solid #ddd;
  font-size: 16px;
  -webkit-transition: all 0.1s linear;
  -moz-transition: all 0.1s linear;
  transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
  outline:none;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  border-color: #ccc;
}
.btn-login {
  background-color: #59B2E0;
  outline: none;
  color: #fff;
  font-size: 14px;
  height: auto;
  font-weight: normal;
  padding: 14px 0;
  text-transform: uppercase;
  border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
  color: #fff;
  background-color: #53A3CD;
  border-color: #53A3CD;
}
.forgot-password {
  text-decoration: underline;
  color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
  text-decoration: underline;
  color: #666;
}

.btn-register {
  background-color: #1CB94E;
  outline: none;
  color: #fff;
  font-size: 14px;
  height: auto;
  font-weight: normal;
  padding: 14px 0;
  text-transform: uppercase;
  border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
  color: #fff;
  background-color: #1CA347;
  border-color: #1CA347;
}

</style>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script>
$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

</script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-0">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-12">
                <a href="#" class="active" id="login-form-link">Create Profile</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="formRegister" action="createprofile.php" method="post" role="form" style="display: block;">
                  <div class="form-group">
                    <input type="text" name="profilename" id="profilename" tabindex="1" class="form-control" placeholder="Profile Name" value="">
                  </div>
                  <div class="formMessage0">
                    <div class="alert alert-danger">
                      <strong>Please give a profile name</strong>
                    </div>
                  </div>
                  <div class="formMessage1">
                    <div class="alert alert-danger">
                      <strong>Profile Name has been registered!</strong>
                    </div>
                  </div>
                  <div class="formMessage2">
                    <div class="alert alert-success">
                      <strong>Register Success!</strong>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="button" name="btnRegister" id="btnRegister" tabindex="4" class="form-control btn btn-login" value="Create Profile">
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</body>
<style type="text/css">
.formMessage0{
  display: none;
}
.formMessage1{
  display: none;
}
.formMessage2{
  display: none;
}
</style>
<script>
$(document).ready(function(){
  $formRegister = $("#formRegister");
  $(document).ready(function() {
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });
  });
  $("#btnRegister").click(function(){
    jQuery.ajax({
      type: "POST",
      url: "createprofile.php",
      dataType: "JSON",
      data: {
        profilename: $formRegister.find("[name='profilename']").val()
      },
      success: function(data){
        console.log(data);
        if ( data.result == "Please give a profile name" ){
          $('.formMessage0').show();
        }
        else if ( data.result == "Registered Profile Name" ){
          $('.formMessage1').show();
          $('.formMessage2').hide();
          $('.formMessage0').hide();
        }
        else if (data.result == "OK") {
          $('.formMessage2').show();
          $('.formMessage1').hide();
          $('.formMessage0').hide();
          setTimeout(function() {
            window.location.href = "index.php"
          }, 1000);
        }
        else {
          // go to success page
          alert(data.reason);
        }
      }
    });
  });
});
</script>

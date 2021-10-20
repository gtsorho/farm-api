<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello Bulma!</title>

  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  <script type="text/javascript"> 
    window.history.forward(); 
    function noBack(e) { 
      e.preventDefault();
        window.history.forward(); 
    } 
  </script>

  <link rel="stylesheet" href="{{asset('css/bulma-0.8.0/css/bulma.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <script defer src="{{asset('fontawesome-free-5.12.1-web/js/all.js')}}"></script>


</head>

<body>
  <div class="container">
    <nav class="navbar " role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a href="index.html">
          <img src="{{asset('media/crops-clipart-agriculture-product-17.png')}}" width="50px">
          <h1 id="lgtxt"> <b> PreFarm</b></h1>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
    </nav>
  </div>

  <div class="columns" style="width: 100%;">
    <div class="column is-three-fifths">
  <section class="hero">
    <div class="hero-body" style="width:183%;padding-bottom: 7%;padding-top: 17%;">
      <div class="container">
        <h1 class="title" id="herotit" style="color: #e8e8e8;">
          PRECISE AGRICULTURE
        </h1>
        <h6 class="subtitle" id="herosub" style="color: #e8e8e8;">
          We provide you with level of accuracy on data, and the ability to control anywhere across the internet
        </h6>
      </div>
    </div>
  </section>
  </div>
  <div class="column">
  <div class="tile is-parent is-3.5 is-pulled-right " id="signIn">
    <article class="tile is-child notification " id="signinArt">
      <div class="content" id="signincont">
        <!-- signIn form -->
        <form action="">
          <div class="field">
            <p class="control has-icons-left has-icons-right">
              <input class="input" id="sign_email" type="email" placeholder="Email">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
              <span class="icon is-small is-right">
                <i class="fas fa-check"></i>
              </span>
            </p>
          </div>
          <div class="field">
            <p class="control has-icons-left">
              <input class="input" id="sign_password" type="password" placeholder="Password">
              <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
              </span>
            </p>
          </div>
          <div class="container is-fluid" id="signin_msg" ></div>
          <div class="field">
            <p class="control">
              <button class="button is-success" id="login_btn">
                Login
              </button>
            </p>
          </div>

        </form>
        <button id="sgnbtn" class="button is-success" onclick="toggleSignUp()">
          signUp
        </button>

        <!-- end of signIn form -->



      </div>
    </article>
  </div>



  <div class="tile is-parent is-3.5 is-pulled-right " id="signUp">
    <article class="tile is-child notification " id="signupArt">
      <div class="content">
        <!-- signup form -->
        <form id="signup_form">
          <div class="field">
            <label class="label">First Name</label>
            <div class="control">
              <input class="input" id="signup_fnamme" type="text" placeholder="John">
            </div>
            <p class="help is-danger"  id="reg_fname_msg"></p>
          </div>

          <div class="field">
            <label class="label">Last Name</label>
            <div class="control">
              <input class="input" id="signup_sname" type="text" placeholder="Koomson">
            </div>
            <p class="help is-danger" id="reg_sname_msg" ></p>
          </div>

          <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-danger" id="signup_email" type="email" placeholder="Email input" value="hello@">
              <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
              </span>
              <span class="icon is-small is-right is">
                <i class="fas fa-exclamation-triangle is-danger"></i>
              </span>
            </div>
            <p class="help is-danger" id="reg_email_msg"></p>
          </div>
          <div class="field">
            <label class="label">City/Town</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-danger" id="signup_town" type="text" placeholder="Tepa">
              <span class="icon is-small is-left">
                <i class="fas fa-globe"></i>
              </span>
            </div>
            <p class="help is-danger" id="reg_town_msg"></p>
          </div>
          <div class="field">
            <label class="label">Phone</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-danger" id="signup_phone" type="text" placeholder="024 xxx xxxx">
              <span class="icon is-small is-left">
                <i class="fas fa-phone"></i>
              </span>
            </div>
            <p class="help is-danger" id="reg_phone_msg"></p>
          </div>

          <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-danger" id="signup_password" type="password" placeholder="000000000">
              <span class="icon is-small is-left">
                <i class="fas fa-key"></i>
              </span>
            </div>
            <p class="help is-danger" id="reg_pass_msg"></p>
          </div>

          <div class="field">
            <label class="label">Confirm Password</label>
            <div class="control has-icons-left has-icons-right">
              <input class="input is-danger" id="signup_pass_confirmation" type="password" placeholder="000000000">
              <span class="icon is-small is-left">
                <i class="fas fa-key"></i>
              </span>
            </div>
            <p class="help is-danger" id="reg_pass_conf_msg"></p>
          </div>

          <div class="container is-fluid" id="signup_msg" ></div>


          <div class="field is-grouped">
            <div class="control">
              <button class="button is-link" id="signup_submit">Submit</button>
            </div>

          </div>
        </form>
        <button class="button is-link is-success" onclick="togglelogIn()" id="lgnbtn">LogIn</button>
        <!-- end of signup -->
    </article>
  </div>
  </div>
</div>


  <!-- footer -->
  <footer class="footer is-fixed-bottom">
    <div class="content has-text-centered">
      <p>
        <strong>PreFarm</strong> by <a href="">George Turkson </a>,<a href=""> Kenneth Kumi</a> and <a href="">Seidu Bertha</a>
        A final year project
      </p>
    </div>
  </footer>
  <!-- footer end -->

</body>

<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script>


$(document).ready(function(){
  var client_id;
  var client_secret;
  $.ajax({
          url: "api/login",
          method: 'GET',
          dataType: "json",
          success: function(response) {
            client_id = response.client_id
            client_secret = response.client_secret
            }
    })
    $('#login_btn').on( 'click', function(e){
        e.preventDefault();
        var email = $('#sign_email').val();
        var password = $('#sign_password').val();
        $.ajax({
          url: "oauth/token",
          method: 'POST',   
          dataType: 'json',
          data:{
            "grant_type":"password",
            "client_id":client_id,
            "client_secret":client_secret,
            "username": email,
            "password": password,
            "scope":"",
          },
          success: function (response) {
            var token = response.access_token;
              $.ajax({
              url: "api/espdata/user",
              method: "get",
              headers: {
                "Authorization": `Bearer ${token}`
              },
              dataType: "json",
              success: function (response) {
                id = response[0].id
                window.localStorage.setItem('user_id',id)
                // console.log(id)
                window.location ="dash"
              }
            })
            
            window.localStorage.setItem('access_token',token)
            
          },
          error:function(response){
            $('#signin_msg').fadeIn()
            $('#signin_msg').text("Invalid Credentials")
            $('#signin_msg').fadeOut(5000)

          }
        })
    })


    $('#signup_submit').click(function(e){
      e.preventDefault();
      $.ajax({
        url:"api/espdata/user_registration",
        method:'post',
        data: {
          "firstName": $('#signup_fnamme').val(),
          "surname": $('#signup_sname').val(),
          "email": $('#signup_email').val(),
          "phone": $('#signup_phone').val(),
          "town": $('#signup_town').val(),
          "password": $('#signup_password').val(),
          "password_confirmation": $('#signup_pass_confirmation').val(),
        },
        dataType:'json',
        success:function(response){
          

            if(response.data.status == "error"){
              $.each(response.data.errors, function(i, item){
                switch (response.data.errors[i]){
                  case "The first name field is required.":
                      $('#reg_fname_msg').fadeIn();
                    $('#reg_fname_msg').text(response.data.errors[i]);
                    $('#reg_fname_msg').fadeOut(5000);
                    break;
                    case "The surname field is required.":
                    $('#reg_sname_msg').fadeIn();
                    $('#reg_sname_msg').text(response.data.errors[i]);
                    $('#reg_sname_msg').fadeOut(5000)
                    break;
                    case "The email must be a valid email address.":
                    $('#reg_email_msg').fadeIn();
                    $('#reg_email_msg').text(response.data.errors[i]);
                    $('#reg_email_msg').fadeOut(5000);
                    break;
                    case "The phone field is required.":
                    $('#reg_phone_msg').fadeIn();
                    $('#reg_phone_msg').text(response.data.errors[i]);
                    $('#reg_phone_msg').fadeOut(5000);
                    break;
                    case "The town field is required.":
                    $('#reg_town_msg').fadeIn();
                    $('#reg_town_msg').text(response.data.errors[i]);
                    $('#reg_town_msg').fadeOut(5000);
                    break;
                    case "The password field is required.":
                    $('#reg_pass_msg').fadeIn();
                    $('#reg_pass_msg').text(response.data.errors[i]);
                    $('#reg_pass_msg').fadeOut(5000);
                    break;
                    case "The email has already been taken.":
                    $('#reg_email_msg').fadeIn();
                    $('#reg_email_msg').text(response.data.errors[i]);
                    $('#reg_email_msg').fadeOut(5000)
                    break;
                    case "The password confirmation does not match.":
                    $('#reg_pass_conf_msg').fadeIn()
                    $('#reg_pass_conf_msg').text(response.data.errors[i]);
                    $('#reg_pass_conf_msg').fadeOut(5000)
                    break;        
                }
          
            //  $('#reg_sname_msg').fadeOut(5000)
            //  $('#reg_email_msg').fadeOut(5000)
            //  $('#reg_phone_msg').fadeOut(5000)
            //  $('#reg_town_msg').fadeOut(5000)
            //  $('#reg_pass_msg').fadeOut(5000)
              });


              console.log(response.data)
            }else{
                var email = response.data.email
                var password = $('#signup_password').val();
              $.ajax({
                url: "oauth/token",
                method: 'POST',
                dataType: 'json',
                data:{
                  "grant_type":"password",
                  "client_id":client_id,
                  "client_secret":client_secret,
                  "username": email,
                  "password": password,
                  "scope":"",
                },
                success: function (response) {
                  var token = response.access_token;
                  window.localStorage.setItem('access_token',token)
                  console.log(response)
                  window.location ="dash"
                }
              })
            }
        },
        error:function(response){
          console.log(response)
        }
      })
    })
});
</script>

</html>
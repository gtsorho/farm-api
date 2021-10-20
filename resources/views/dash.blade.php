<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello Bulma!</title>
  <link rel="stylesheet" href="{{asset('css/bulma-0.8.0/css/bulma.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/dash.css')}}">
  <script defer src="{{asset('fontawesome-free-5.12.1-web/js/all.js')}}"></script>
  <script src="https://js.pusher.com/5.1/pusher.min.js"></script>


  <!-- image processing dep -->
  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/webgl-utils.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/infragram.js')}}"></script>

  <script type="x-shader/x-vertex" id="shader-vs"></script>
  <script type="x-shader/x-fragment" id="shader-fs-template"></script>
  <script type="x-shader/x-fragment" id="shader-fs"></script>
  <!-- end image processing dep -->

  <script type="text/javascript"> 
    window.history.forward(); 
    function noBack(e) { 
      e.preventDefault();
        window.history.forward(); 
    } 
</script>

</head>

  
  

<body >
  <div class="container" id="app">
    <div id="image-modal" class="modal">
      <div class="modal-background"></div>
      <div class="modal-content">
       <div class="modal-card">
      <header class="modal-card-head " style="background-color: rgb(250, 89, 77);" >
        <p class="modal-card-title"> <i class="fas fa-exclamation-triangle"></i> Minimum Screen hit</p>
      </header>
      <section class="modal-card-body" style="background-color: rgb(247, 149, 142);">
        Hint: Switch to Larger Device <br> 
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          or Rotate Screen 
      </section>
    </div>
      </div>
    </div>    
  </div>
  
  <div class="columns">
     <!-- column to the left -->
    <div class="column is-two-thirds" id="datacol">
      <div class="container">
        <nav class="navbar " role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a href="index.html">
              <img src="media/crops-clipart-agriculture-product-17.png" width="50px">
              <h1 id="lgtxt"> <b> PreFarm</b></h1>
            </a>
          </div>

          <div class="buttons has-addons navbar-brand" id="toggle" style="margin-top: 4%;margin-left: 23%;">
            <button class="button is-success " id="chartbtn" onclick="chartbtn()">Chart</button>
            <button class="button" id="avgbtn" onclick="avgbtn()">M. Average</button>
            <button class="button" id="ndvibtn" onclick="ndvibtn()">NDVI</button>
          </div>
        </nav>
      </div>

      <hr style="background-color: #686666; height: 1px; margin-top: 0px; width: 60%; margin-left: 15%;">
      <!-- live chart section -->
      <div class="container" id="chartSec">
        <canvas id="myChart"></canvas>

        <div class="box">
          <nav class="level">
            <div class="level-item has-text-centered">
              <div>
                <p class="heading">Temprature</p>
                <p class="title" id="temp_val"></p>
              </div>
            </div>
            <div class="level-item has-text-centered">
              <div>
                <p class="heading">Humidity</p>
                <p class="title" id="humidity_val"></p>
              </div>
            </div>
            <div class="level-item has-text-centered">
              <div>
                <p class="heading">Rain</p>
                <p class="title" id="rain_val"></p>
              </div>
            </div>
            <div class="level-item has-text-centered">
              <div>
                <p class="heading">Moisture</p>
                <p class="title" id="moisture_val"></p>
              </div>
            </div>
            <div class="level-item has-text-centered">
              <div>
                <p class="heading">Light</p>
                <p class="title" id="light_val"></p>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <!-- end of chart section -->

      <!-- ndvi section -->
        <div class="container page" id="ndviSec" style="padding-top:10px;">
          <div class="content">
            <div class="well">
              <div class="container">
                <form name="file-form" style="width: 50%;">

                  <div class="file is-info">
                    <label class="file-label">
                      <input class="file-input" id="file-sel" type="file" name="resume">
                      <span class="file-cta">
                        <span class="file-icon">
                          <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                          Choose a file
                        </span>
                      </span>
                    </label>
                  </div>
                </form>

                <br>
                <br>

                <span class="group" style="float: right;margin-top: -118px;">
                  <b>Presets:</b>

                  <div class="btn-group" data-toggle="buttons-radio">

                    <button id="raw" class="button is-info">Raw</button>
                    <button id="ndvi" class="button is-warning">NDVI</button>
                    <button id="nir" class="button is-dark">NIR</button>
                  </div>

                </span>

                <span id="colormaps-group" class="group" style="float:right;margin-top:-48px;display:none;">
                  <span class="btn-toolbar">
                    <div class="btn-group" data-toggle="buttons-radio">
                      <button id="grey" class="button is-dark">Greyscale</button>
                      <button id="color" class="button is-success">Color</button>
                    </div>
                  </span>
                </span>
              </div>
            </div>
            <div id="image-container" class="container" width="800" height="600">
              <canvas id="canvas-image" width="600" height="400"></canvas>

              <div id="colorbar-container" style="display:none;">
                <span id="colorbar-min">-1.00</span>
                <canvas id="colorbar"></canvas>
                <span id="colorbar-max">1.00</span>
              </div>
            </div>
            <br>
            <button style="display:none;margin-left:30px;" id="download" class="button is-info"><i
                class="icon-white icon-download"></i> Download</button>
          </div>


        </div>
        <!-- end of ndvi section -->
      
              <!-- average section -->
      <div class="container" id="averageSec">
        <canvas id="avgChart"></canvas>

        <div class="box">
          <div><center><b>Total Month Values</b></center></div> 
          <hr style="margin: 0.5rem 0;">
          <nav class="level">
            <div class="level-item has-text-centered">
              <div>
                <p class="heading">Temprature</p>
                <p class="title" id="avg_temp_val"></p>
              </div>
            </div>
            <div class="level-item has-text-centered">
              <div>
                <p class="heading">Humidity</p>
                <p class="title" id="avg_humidity_val"></p>
              </div>
            </div>
            <div class="level-item has-text-centered">
              <div>
                <p class="heading">Rain</p>
                <p class="title" id="avg_rain_val"></p>
              </div>
            </div>
            <div class="level-item has-text-centered">
              <div>
                <p class="heading">Moisture</p>
                <p class="title" id="avg_moisture_val"></p>
              </div>
            </div>
            <div class="level-item has-text-centered">
              <div>
                <p class="heading">Light</p>
                <p class="title" id="avg_light_val"></p>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <!-- end of average section -->

    </div>
    <!-- end of column to the left -->


    <!-- column to the right -->
    <div class="column">
      <nav class="panel" id="dashpan">
        <div class="container">
          <p class="panel-heading" id="user_intro"></p>
          <button class="button is-danger" id="logout_btn"
            style="float: right; margin-top: -47px;margin-right: 3%;">Logout</button>
        </div>
        <a class="panel-block" id="profile" onclick="userpro()">
          <span class="panel-icon">
            <i class="fas fa-user" aria-hidden="true"></i>
          </span>
          User Profile
        </a>
        <a class="panel-block" id="settings" onclick="userset()">
          <span class="panel-icon">
            <i class="fas fa-cog" aria-hidden="true"></i>
          </span>
          User Settings
        </a>
        <a class="panel-block" id="notes" onclick="notification()">
          <span class="fa-layers fa-fw">
            <i class="fas fa-bell fa-2x" aria-hidden="true"></i>
          </span>
          &nbsp;&nbsp;Notifications
        </a>
        <a class="panel-block" id="center" onclick="controlcenter()">
          <span class="panel-icon">
            <i class="fas fa-gamepad" aria-hidden="true"></i>
          </span>
          Control Center
        </a>
        <!-- user Profile -->
        <div class="box" id="userpro">
          <article class="message is-warning">
            <div class="message-body userpro">
              <h3 id="profile_name"> <i class="fas fa-user uf" aria-hidden="true"></i> </h3>
              <hr>
              <p id="profile_email"> <i class="fas fa-envelope uf" aria-hidden="true"></i></p>
              <hr>
              <p id="profile_phone"><i class="fas fa-phone uf" aria-hidden="true"></i></p>
              <hr>
              <p id="profile_town"> <i class="fas fa-globe uf" aria-hidden="true"></i></p>
            </div>
          </article>
        </div>
        <!-- end of user Profile -->

        <!-- user Settings -->
        <div class="box" id="userset">
          <form action="">
            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input class="input" type="text" id="set_fname">
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
              </p>
            </div>
            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input class="input" type="text" id="set_sname">
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
                <span class="icon is-small is-right">

                </span>
              </p>
            </div>
            <div class="field">
              <p class="control has-icons-left has-icons-right">
                <input class="input" type="email" id="set_email">
                <span class="icon is-small is-left">
                  <i class="fas fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">

                </span>
              </p>
            </div>
            <div class="field">
              <p class="control has-icons-left">
                <input class="input" type="password" placeholder="password" id="set_password">
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control has-icons-left">
                <input class="input" type="password" placeholder="confirm password" id="set_pass_confirmation">
                <span class="icon is-small is-left">
                  <i class="fas fa-lock"></i>
                </span>
              </p>
            </div>
            <div class="field">
              <p class="control">
                <button class="button is-success" id="save_set">
                  Save Changes
                </button>
              </p>
            </div>
          </form>
        </div>
        <!-- end of usersettings -->
        <div class="box" id="notification">

          <div class="notification is-danger" id="notify" style="display: none;">
            <button class="delete"></button>
           <p id="notify_txt"></p>
          </div>

        </div>
        <div class="box" id="controlcenter">
          <h3>Irrigation Pump</h3>
          <hr>
          <form action="">
            <div class="field">
              <div class="control">
                <div class="select  is-primary">
                  <select id="pumpTime">
                    <option value="30">30min</option>
                    <option value="60">1hour</option>
                    <option value="90">1hr30min</option>
                    <option value="120">2hrs</option>
                    <option value="150">2hrs30min</option>
                    <option value="180">3hrs</option>
                  </select>
                </div>
              </div>
            </div>
          </form>
          <br>
          <div class="buttons has-addons">
            <button class="button" id="onbtn" onclick="onbtn()">On</button>
            <button class="button is-dark" id="offbtn" onclick="offbtn()">Off</button>
          </div>
        </div>


      </nav>

    </div>
  </div>
  <!-- end of column to the right -->


  <!-- footer -->
  <footer class="footer is-fixed-bottom">
    <div class="content has-text-centered">
      <p>
        <strong>PreFarm</strong> by <a href="">George Turkson</a>,<a href=""> Kenneth Kumi</a> and <a href="">Seidu Bertha</a>
        A final year project
      </p>
    </div>
  </footer>
  <!-- footer end -->

</body>
<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
<script src="{{asset('js/socket.js')}}"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/Chart.bundle.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/average.js')}}"></script>

<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'Temprature',
        data: [],
        fill: false,


        borderColor: "#90018b",
        backgroundColor: "#90018b",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "#ffffff",
        pointBackgroundColor: "#90018b",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(75,192,192,1)",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointHoverBorderWidth: 2,
        pointRadius: 5,
        pointHitRadius: 10,
        borderWidth: 2
      }, {
        label: 'Humidity',
        data: [],

        fill: false,


        borderColor: "#710101",
        backgroundColor: "#710101",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "#ffffff",
        pointBackgroundColor: "#710101",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(75,192,192,1)",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointHoverBorderWidth: 2,
        pointRadius: 5,
        pointHitRadius: 10,
        borderWidth: 2

      }, {
        label: 'Rain',
        data: [],

        fill: false,


        borderColor: "#50aa5c",
        backgroundColor: "#50aa5c",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "#ffffff",
        pointBackgroundColor: "#50aa5c",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(75,192,192,1)",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointHoverBorderWidth: 2,
        pointRadius: 5,
        pointHitRadius: 10,
        borderWidth: 2

      },
      {
        label: 'Moisture',
        data: [],

        fill: false,
        borderColor: "#0a6196",
        backgroundColor: "#0a6196",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "#ffffff",
        pointBackgroundColor: "#0a6196",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(75,192,192,1)",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointHoverBorderWidth: 2,
        pointRadius: 5,
        pointHitRadius: 10,
        borderWidth: 2

      }, {
        label: 'light',
        data: [],
        fill: false,

        borderColor: "#bf8a0e",
        backgroundColor: "#bf8a0e",
        borderCapStyle: 'butt',
        borderDash: [],
        borderDashOffset: 0.0,
        borderJoinStyle: 'miter',
        pointBorderColor: "#ffffff",
        pointBackgroundColor: "#bf8a0e",
        pointBorderWidth: 1,
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(75,192,192,1)",
        pointHoverBorderColor: "rgba(220,220,220,1)",
        pointHoverBorderWidth: 2,
        pointRadius: 5,
        pointHitRadius: 10,
        borderWidth: 2

      }]
    },
    // options: {
    //     scales: {
    //         yAxes: [{
    //             ticks: {
    //                 beginAtZero: true
    //             }
    //         }]
    //     }
    // }
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Sensor Readings per Time'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Date and Time'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }]
      }
    }
  });






  

  $(document).ready(function () {
    
    var token = localStorage.getItem('access_token')
    var id
    $.ajax({
      url: "api/espdata/user",
      method: "get",
      headers: {
        "Authorization": `Bearer ${token}`
      },
      dataType: "json",
      success: function (response) {
        $('#user_intro').html('Hi ' + response[0].firstName + ',')
        $('#profile_name').html(response[0].firstName + ' ' + response[0].surname)
        $('#profile_email').html(response[0].email)
        $('#profile_phone').html(response[0].phone)
        $('#profile_town').html(response[0].town)

        $("#set_fname").val(response[0].firstName);
        $("#set_sname").val(response[0].surname);
        $("#set_email").val(response[0].email);

        id = response[0].id

      },

      error: function (response) {
        console.log(response)
      }
    })

      $.ajax({
      url: "api/espdata",
      method: "get",
      headers: {
        "Authorization": `Bearer ${token}`,
      },
      success: function (response) {
    console.log(response)
      }
    })

    $('#save_set').click(function (e) {
      e.preventDefault();
      $.ajax({
        url: 'api/espdata/profile_update/' + id,
        method: 'patch',
        headers: {
          "Authorization": `Bearer ${token}`
        },
        data: {
          "firstName": $('#set_fname').val(),
          "surname": $('#set_sname').val(),
          "email": $('#set_email').val(),
          "password": $('#set_password').val(),
          "password_confirmation": $('#set_pass_confirmation').val(),
        },
        dataType: 'json',
        success: function (response) {
          if (response.data.status == "error") {
            $.each(response.data.errors, function (i, item) {
              console.log(response.data.errors[i])
              switch (response.data.errors[i]) {
                case "The first name field is required.":
                  $("#set_fname").val(response.data.errors[i]); 
                  break;
                case "The surname field is required.":
                  $("#set_sname").val(response.data.errors[i]);
                  break;
                case "The first name must be at least 3 characters.":
                  $("#set_fname").val(response.data.errors[i]);
                  break;
                case "The surname must be at least 3 characters.":
                  $("#set_sname").val(response.data.errors[i]);
                  break;
                case "The email must be a valid email address.":
                  $("#set_email").val(response.data.errors[i]);
                  break;
                case "The password field is required.":
                  $('#set_password').val(response.data.errors[i]);
                  break;
                case "The password confirmation does not match.":
                  $('#set_pass_confirmation').val(response.data.errors[i]);
                  break;
              }
            })
          } else {
            $('#user_intro').html('Hi ' + response.data.firstName + ',')
            $('#profile_name').html(response.data.firstName + ' ' + response.data.surname)
            $('#profile_email').html(response.data.email)
            $('#profile_phone').html(response.data.phone)
            $('#profile_town').html(response.data.town)

            $("#set_fname").val(response.data.firstName);
            $("#set_sname").val(response.data.surname);
            $("#set_email").val(response.data.email);

            $('#set_password').val("");
            $('#set_pass_confirmation').val("");
          }
        },
        error: function (response) {
          console.log(response)
        }
      })
    })

    $('#logout_btn').click(function (e) {
      e.preventDefault();
      $.ajax({
        url: "api/espdata/logout",
        method: 'post',
        headers: {
          "Authorization": `Bearer ${token}`
        },
        dataType: 'json',
        success: function (response) {
          window.location = "/"
          window.localStorage.setItem('access_token',null)
          window.localStorage.setItem('user_id',null)
        }
      })
    })

    $('#avgbtn').one ('click', function (e) {
      e.preventDefault();
      $.ajax({
        url: "api/avg",
        method: 'get',
        headers: {
          "Authorization": `Bearer ${token}`
        },
        dataType: 'json',
        success: function (response) {
          console.log(response)
          $.each(response.averageData, function (i) {
            $.each(response.averageData[i], function (j) {
              avgChart.data.datasets[0].data.push(response.averageData[i][j].temperatureAvg);
              avgChart.data.datasets[1].data.push(response.averageData[i][j].humidityAgv);
              avgChart.data.datasets[2].data.push(response.averageData[i][j].rainAvg);
              avgChart.data.datasets[3].data.push(response.averageData[i][j].moistureAvg);
              avgChart.data.datasets[4].data.push(response.averageData[i][j].lightAvg);
              avgChart.update();

            })
          })
          $.each(response.dateData, function(k){
            avgChart.data.labels.push(response.dateData[k]);
            avgChart.update();
          })
              console.log(response.monthlyMessage[0].humidityAgv)
              $('#avg_temp_val').html(parseFloat(response.monthlyMessage[0].temperatureAvg).toFixed(2))
              $('#avg_humidity_val').html(parseFloat(response.monthlyMessage[0].humidityAgv).toFixed(2))
              $('#avg_light_val').html(parseFloat(response.monthlyMessage[0].lightAvg).toFixed(2))
              $('#avg_rain_val').html(parseFloat(response.monthlyMessage[0].rainAvg).toFixed(2))
              $('#avg_moisture_val').html(parseFloat(response.monthlyMessage[0].moistureAvg).toFixed(2))

        }
      })
    })

    $('#onbtn').click(function(e){
      e.preventDefault()
      var pumpTime = $("#pumpTime").children("option:selected").val()
      $.ajax({
        url: 'https://api.thingspeak.com/update?api_key=X3FRBGU7L46F8DZS&field1=1&field3='+ pumpTime,
        method: 'get',
        dataType: 'json',
        success:function(response) {
          console.log(response)
        }
      })
       
    })
    $('#offbtn').click(function(e){
      e.preventDefault()
      $.ajax({
        url: "https://api.thingspeak.com/update?api_key=X3FRBGU7L46F8DZS&field1=0&field3=0",
        method: 'get',
        dataType: 'json',
        success:function(response) {
          console.log(response)
        }
      })

    })


    
     if(data.message.message.moisture < response.monthlyMessage[0].moistureavg){

      $("#notify").show()
        $("#notify_txt").text("Moisture level below Average" + response.monthlyMessage[0].moistureavg)
    }

  });

</script>

</html>
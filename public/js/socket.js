

  var token = localStorage.getItem('access_token')
  var user_id = localStorage.getItem('user_id')
  console.log(user_id)
  console.log(token)

var x
var pusher = new Pusher('b498ff736977877837d3');
var channel = pusher.subscribe('my-channel'+ user_id);
channel.bind('my-event', function(data) {

  console.log(data)
  if(data.message.status == 'plural'){
  $.each(data.message.message, function (i) {
    myChart.data.labels.push(data.message.message[i].created_at);
    myChart.data.datasets[0].data.push(parseFloat(data.message.message[i].temperature));
    myChart.data.datasets[1].data.push(parseFloat(data.message.message[i].humidity));
    myChart.data.datasets[2].data.push(parseFloat(data.message.message[i].rain));
    myChart.data.datasets[3].data.push(parseFloat(data.message.message[i].moisture));
    myChart.data.datasets[4].data.push(parseFloat(data.message.message[i].light));
    myChart.update();
  })

  x = data.message.message.length
 for(i=20; i < x; i++){
  myChart.data.labels.shift();
  myChart.data.datasets[0].data.shift();
  myChart.data.datasets[1].data.shift();
  myChart.data.datasets[2].data.shift();
  myChart.data.datasets[3].data.shift();
  myChart.data.datasets[4].data.shift();
  myChart.update();
 }

  $('#temp_val').html(data.message.singleData.temperature)
  $('#humidity_val').html(data.message.singleData.humidity)
  $('#light_val').html(data.message.singleData.light)
  $('#rain_val').html(data.message.singleData.rain)
  $('#moisture_val').html(data.message.singleData.moisture)

}else if(data.message.status == 'single'){

  x=x+1
  console.log(x)

  myChart.data.labels.push(data.message.message.created_at);
  myChart.data.datasets[0].data.push(parseFloat(data.message.message.temperature));
  myChart.data.datasets[1].data.push(parseFloat(data.message.message.humidity));
  myChart.data.datasets[2].data.push(parseFloat(data.message.message.rain));
  myChart.data.datasets[3].data.push(parseFloat(data.message.message.moisture));
  myChart.data.datasets[4].data.push(parseFloat(data.message.message.light));
  myChart.update();

  if(x>20){
    myChart.data.labels.shift();
    myChart.data.datasets[0].data.shift();
    myChart.data.datasets[1].data.shift();
    myChart.data.datasets[2].data.shift();
    myChart.data.datasets[3].data.shift();
    myChart.data.datasets[4].data.shift();
    myChart.update();
   }
   


  $('#temp_val').html(data.message.message.temperature)
  $('#humidity_val').html(data.message.message.humidity)
  $('#light_val').html(data.message.message.light)
  $('#rain_val').html(data.message.message.rain)
  $('#moisture_val').html(data.message.message.moisture)

}    
  
});

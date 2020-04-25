<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Covid-Z | Part of the change</title>

    <script src="static/js/jquery.min.js" type="text/javascript"></script>
    <script src="static/js/popper.min.js" type="text/javascript"></script>
    <script src="static/js/tether.min.js" type="text/javascript"></script>
    <script src="static/js/mdb.min.js" type="text/javascript"></script>
    <script src="static/js/mdb.min.js" type="text/javascript"></script>
	 <script src="static/js/anim.js" type="text/javascript"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="static/css/bootstrap.css">
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/css/mdb.min.css">

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.0.0/dist/tf.min.js"></script>

  <script>

  async function start() {

  tf.loadLayersModel('model_xray/model.json').then(function(model) {
   window.model = model;
  });

  window.model.predict([tf.tensor(input).reshape([1, 28, 28, 1])]).array().then(function(scores){
  scores = scores[0];
  predicted = scores.indexOf(Math.max(...scores));
  $('#myCanvas').html(predicted);
  });

  const model2 = await tf.loadLayersModel('model_covid/model.json');

   const canvas = document.getElementById("myCanvas");
   var ctx = canvas.getContext("2d");
   var tmpImage = new Image();
   tmpImage.src = 'imagini_random2.jpg';
   tmpImage.onload = async function(){
   ctx.drawImage(tmpImage,0,0,224,224);
   imageData = ctx.getImageData(null, 0, 64, 64);
   const tensor = tf.browser.fromPixels(imageData);
   const eTensor = tensor.expandDims(0);
   var prediction = model2.predict(eTensor);
   const value = await prediction.data();
   console.log(prediction.dataSync());
   console.log(value);
   //console.log(imageData);
   //console.log(tensor);
   //console.log(eTensor);
}

}

start();

  </script>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light deep-orange fixed-top">

      <div class="container">

        <a class="navbar-brand" href="#"><img src="static/assets/transparentcovid.png" height="60" alt="mdb logo"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse fixed" id="basicExampleNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#global_stats">Statistics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#prevention">Prevention</a>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect" href="#scan">X-Ray Scanner</a>
            </li>
          </ul>

          <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
              <a href="https://github.com/ChirilaLaura/" class="nav-link waves-effect"
                 target="_blank">
                <i class="fab fa-github"></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/darius-luca-tech/" class="nav-link waves-effect"
                  target="_blank">
              <i class="fab fa-github"></i>
            </a>
          </li>
		  <li class="nav-item">
              <a href="https://github.com/vladsarca" class="nav-link waves-effect"
                  target="_blank">
              <i class="fab fa-github"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
</nav>

<div id="canvasContainer">
    <canvas id="myCanvas" height="450" width="650"></canvas>
    </div>

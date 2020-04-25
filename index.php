<?php include('header.php'); $url = "https://coronavirus-19-api.herokuapp.com/all"; 
	$json = file_get_contents($url);
	$json = json_decode($json); 
	$recovered = $json->recovered;
	$deaths = $json->deaths;
	$infected = $json->cases; ?>
    <section class="p-5 z-depth-1 global-stats" id="global_stats">
        <br>
        <br>
        <h3 class="text-center font-weight-bold mb-5">Global statistics</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-lg-3 mb-4 text-center">
                <h4 class="h1 font-weight-normal mb-3">
              <i class="far fa-check-circle orange-text"></i>
              <p class="font-weight-normal text-muted"></p>
              <span class="d-inline-block count-up" id="total_infected" data-from="0" data-to="<?=$infected;?>" data-time="2500">123213</span>
            </h4>
                <p class="font-weight-normal">Confirmed cases</p>
            </div>

            <div class="col-md-6 col-lg-3 mb-4 text-center">
                <h4 class="h1 font-weight-normal mb-3">
              <i class="fas fa-first-aid orange-text"></i>
              <p class="font-weight-normal text-muted"></p>
              <span class="d-inline-block count1" id="vindecati" data-from="0" data-to="<?=$recovered;?>" data-time="2500"></span>
            </h4>
                <p class="font-weight-normal">Recovered</p>
            </div>

            <div class="col-md-6 col-lg-3 mb-4 text-center">
                <h4 class="h1 font-weight-normal mb-3">
              <i class="fas fa-skull-crossbones orange-text"></i>
              <p class="font-weight-normal text-muted"></p>
              <span class="d-inline-block count3" id="decese" data-from="0" data-to="<?=$deaths;?>" data-time="2500"></span>
            </h4>
                <p class="font-weight-normal">Deaths</p>
            </div>
        </div>
    </section>
    <div class="container my-5">
        <!-- Section: Block Content -->
        <section class="dark-grey-text text-center" id="prevention">

            <h3 class="font-weight-bold mb-4 pb-2">3 things you can do to protect yourself and your community</h3>

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-lg-4 col-md-12 mb-4">

                    <div class="view overlay rounded z-depth-1">
                        <img src="https://www.cdc.gov/handwashing/images/GettyImages-514363103-medium.jpg" class="img-fluid" alt="Sample project image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <div class="px-3 pt-3 mx-1 mt-1 pb-0">
                        <h4 class="font-weight-bold mt-1 mb-3">Wash your hands frequently and catch coughs and sneezes in a tissue</h4>
                        <p class="text-muted">One of the ways we become infected, or pass on viruses to others, is through the droplets in coughs and sneezes – for instance through someone who has a virus, coughing onto their hand, then touching a door handle.</p>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="view overlay rounded z-depth-1">
                        <img src="https://www.rd.com/wp-content/uploads/2018/06/callng-911-760x506.jpg" class="img-fluid" alt="Sample project image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <div class="px-3 pt-3 mx-1 mt-1 pb-0">
                        <h4 class="font-weight-bold mt-1 mb-3">Use health services wisely</h4>
                        <p class="text-muted">Now that COVID-19 is considered to be spreading in the community this could mean the NHS is busier than usual so it’s important to think carefully about the NHS services you use.Services like 999 or Accident and Emergency should only be used for genuine emergencies.</p>
                    </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="view overlay rounded z-depth-1">
                        <img src="https://res-3.cloudinary.com/the-university-of-melbourne/image/upload/s--T3zbPNr6--/c_limit,f_auto,q_75,w_892/v1/pursuit-uploads/cba/d4e/f26/cbad4ef26637b37ac6f17280a43d673228776ae5b18d8cb33bf0500c5e47.jpg" class="img-fluid" alt="Sample project image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <div class="px-3 pt-3 mx-1 mt-1 pb-0">
                        <h4 class="font-weight-bold mt-1 mb-3">Stay up to date using trusted sources of information</h4>
                        <p class="text-muted">Since COVID-19 began to spread quickly in China, it has been a major global news story and with this level of media and public interest it’s inevitable that myths, misinformation and rumours will be shared online.</p>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </section>    </div>
        <!-- Section: Block Content -->
  <section class="radiogr" id="scan">
    
    <div class="mask rgba-black-strong py-5">


        <h3 class="font-weight-bold text-center white-text pb-2">Let the AI scan your X-RAY</h3>
        <p class="lead text-center white-text pt-2 mb-5">Upload your X-Ray and find out if you have COVID-19</p>

        <form class="input-grey mb-5" action="" method="post" target="_blank">
          <div class="form-row">
            <div class="col-md-4 ml-auto">
              <div class="input-group input-group-lg z-depth-1">
                <div class="input-group-prepend">
                  <span class="input-group-text rgba-white-light border-0"><i class="fa fa-photo white-text"></i></span>
                </div>
                  <div class="custom-file">
					<input type="file" class="custom-file-input" id="inputGroupFile01"
					  aria-describedby="inputGroupFileAddon01" accept="image/*">
					<label class="custom-file-label inputf" for="inputGroupFile01" >Choose file</label>
				  </div>
				
              </div>
            </div>

            <div class="col-md-2 mr-auto">
              <button class="btn btn-block btn-primary btn-md">Scan</button>
            </div>
          </div>
        </form>

    </div>

  </section>

    <?php include('footer.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url(); ?>/photos/cardioguardian.png" />
        <link rel="stylesheet" href="/css/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
       
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/pocetna.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/stil.css">
        <style>h1,h2,h3,h4,h5,h6 {font-family: "Oswald"} body {font-family: "Open Sans"}</style>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script src = "<?php echo base_url(); ?>/js/script.js"></script>
        <title>Prikaz merenja</title> 
    </head>

    <body class="sivaPozadina ">

        <!-- Header -->
        <?php
        require 'resources/header.php';
        ?>


        <div class="w3-content w3-center" style="max-width:85%; padding-top: 0; ">
        <br><br> <br><br>
            <!-- POZADINA -->
            <div class="w3-row w3-center w3-padding w3-border sky crvenaPozadina"> 

                <!-- UNOSI -->
                <div class="w3-col l12 s12 w3-center" style="padding-left: 5%; padding-right: 5%;">
                 
                    <!-- UNOS -->
                    <br>
                    <hr>
                    <div class="w3-container w3-center sivaPozadina w3-margin w3-padding-large w3-card-4">
                        <div class="w3-center letters_dark_blue" style="font-size: 30px;">  
                            <?php
                            //dohvatanje controllera
                            $controller=session()->get('controller');
                            ?>
                            <div>
                              <h2 class="slovaJakoCrvena">Prikaz poslednjih 10 očitavanja parametara</h2>
                              
                            </div>
                           
                        </div>
                        </div>
      <div class="w3-container w3-center sivaPozadina w3-margin w3-padding-large w3-card-4">
      <div>
        <br>
      <canvas class="w3-center graf" id="myChart" style="width:100%;"></canvas>

      <script>
        var xValues = [1,2,3,4,5,6,7,8,9,10];

        new Chart("myChart", {
        type: "line",
        data: {
        labels: xValues,
        datasets: [{ 
        data: [185,190,187,201,232,210,195,201,205,211],
        borderColor: "red",
        fill: false,
        // od 150 do 350 su vrednosti
        label: "cholesterol"
        }, { 
        data: [98,106,100,90,95,130,147,160,143,130],
        borderColor: "orange",
        fill: false,
        // vrednosti od 83.5 do 295
        label: "systolic blood pressure"
        },
        { 
        data: [89,90,65,71,88,92,76,80,60,65],
        borderColor: "#fb9300",
        fill: false,
        // vrednosti od 48 do 142.5
        label: "diastolic blood pressure"
        }, 
        { 
        data: [160,162,150,145,130,120,112,105,97,98],
        borderColor: "#343f56",
        fill: false,
        // vrednosti od 50 do 180
        label: "heart rate"
        },{ 
        data: [367,340,316,324,307,249,210,215,170,150],
        borderColor: "purple",
        fill: false,
        // vrednosti od 40 do 394
        label: "glucose level"
        },{ 
        data: [107,116,118,97,154,149,158,162,180,174],
        borderColor: "lightblue",
        fill: false,
        // od 94 do 200
        label: "resting blood pressure"
        },{ 
        data: [109,112,121,125,140,119,115,107,98,114],
        borderColor: "gray",
        fill: false,
        // preko 120 je povisen, ispod je dobar, znaci neka bude od 80 do 140
        label: "fasting blood sugar"
        }]
        },
        options: {
        legend: {display: true}
        }
        });
      </script>
      </div>
      <br> <br>
      </div>

      <div class="w3-container w3-center sivaPozadina w3-margin w3-padding-large w3-card-4">
        <div>
        <br>
        <canvas class="w3-center graf" id="myChart2" style="width:60%;"></canvas>
<br>
        <script>
          var xValues = [1,2,3,4,5,6,7,8,9,10];

          new Chart("myChart2", {
          type: "line",
          data: {
          labels: xValues,
          datasets: [
        { 
          data: [0,0,0,1,2,2,1,0,1,1],
          borderColor: "red",
          fill: false,
          // 0 je dobro, 1 je lose, 2 je bas lose
          label: "resting electrocardiogram results"
          },{ 
          data: [0,0,1,1.5,2,1.5,3.5,2.5,1,1.5],
          borderColor: "#F8A488",
          fill: false,
          // 0, 0.5, 1, 1.5, 2, 2.5, 3
          label: "oldpeak"
          },
          { 
          data: [2,2,2,3,3,2,3,2,2,2],
          borderColor: "darkgray",
          fill: false,
          // 1 je uzlazno,2 je ravno,3 silazno
          label: "ST slope"
          }]
          },
          options: {
          legend: {display: true}
          }
          });
        </script>
        </div>


                     
    </div>
    <hr>
    <br>   <br>    <br>
    <!-- KRAJ UNOSI -->
    </div>
    
    <br>
    <!-- KRAJ POZADINA -->
    </div>
    <br>
    <!-- KRAJ SADRZAJ -->
    </div>
    <br><br>

    <?php
    require 'resources/footer.php';
    ?>
    </body>

    </html>
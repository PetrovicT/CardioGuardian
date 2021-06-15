<!DOCTYPE html>
<html lang="en">
      
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url(); ?>/photos/cardioguardian.png" />
    <link rel="stylesheet" href="/css/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/pocetna.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/stil.css">
    <style>h1,h2,h3,h4,h5,h6 {font-family: "Oswald"} body {font-family: "Open Sans"}</style>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src = "<?php echo base_url(); ?>/js/script.js"></script>
    <title>Analiza parametara</title>
</head>

<body class="sivaPozadina">

<!-- Header -->
<?php
require 'resources/header.php';
?>


<div class="w3-content" style="max-width:85%; padding-top: 0; ">
<br><br> <br><br>
    <!-- POZADINA -->
    <div class="w3-row w3-padding w3-border sky crvenaPozadina"> 

        <!-- UNOSI -->
        <div class="w3-col l12 s12" style="padding-left: 5%; padding-right: 5%;">
         
            <!-- UNOS -->
            <br>
            <hr>
            <div class="w3-container sivaPozadina w3-margin w3-padding-large w3-card-4">
                <div class="w3-center letters_dark_blue" style="font-size: 30px;">  
                    <?php
                    //dohvatanje controllera

                    $controller=session()->get('controller');
                    ?>
                   
                    <img src="<?php echo base_url(); ?>/photos/cardioguardian.png" alt="">
                </div>

                <div class=" w3-center">
                    <div class="overlay slovaJakoCrvena" style="font-size: 28px;"> Pogledajte istoriju vrednosti merenih parametara: </div>
                    <a href="<?= site_url("$controller/prikazMerenja") ?>" class="w3-bar-item w3-button w3-red letters dugme">Prikaz istorije merenja</a>
                </div>

                <hr>

                <div class=" w3-center">
                <div class="overlay slovaJakoCrvena" style="font-size: 28px;"> Pogledajte Vaše trenutno stanje organizma: </div>
                    <a href="<?= site_url("$controller/trenutnoStanje") ?>" class="w3-bar-item w3-button w3-red letters dugme">Prikaz trenutnog stanja</a>
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
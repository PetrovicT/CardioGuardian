
<!DOCTYPE html>
<html>
    <head>
        <title>Unos podataka</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url(); ?>/photos/cardioguardian.png" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/stil.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/logovanje.css">
        <style>h1,h2,h3,h4,h5,h6 {font-family: "Oswald"} body {font-family: "Open Sans"}</style>
        <script src = "<?php echo base_url(); ?>/js/script.js"></script>
        <script src = "<?php echo base_url(); ?>/js/modul1.js"></script>
        <style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 5px;
  background: #EBEBEB;
  outline: none;

  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 15px;
  height: 15px;
  background: #EBEBEB;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #EBEBEB;
  cursor: pointer;
}
</style>
    </head>

    <body class="w3-light-grey">

        <!-- Header -->
        <?php
        require 'resources/header.php';
        ?>

        <!-- Registracija -->
        <div class="logovanje padding">
            <br> 
            <div class="wrapper SlaboCrvenaPozadina regBox">
                <div class="Naslov"><b>Unos podataka</b></div>
<br>
                <div class="belaSlova  w3-center bela_velika_slova">Uspešno ste uneli sve podatke!</div>
                <br>
                <div class="belaSlova  w3-center bela_velika_slova">Za povratak na početnu stranu kliknite <a href="<?= site_url() ?>" class="belaSlova">ovde</a></div>
                
           

                <div class="form-container">
                    <div class="form-inner">
                  
                    </div>
                </div>
            </div>


        </div>
        <!-- Registracija -->


        <!-- Footer -->
        <?php
        require 'resources/footer.php';
        ?>

    </body>
</html>

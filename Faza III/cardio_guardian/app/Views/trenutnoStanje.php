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
       
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/pocetna.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/stil.css">
        <style>h1,h2,h3,h4,h5,h6 {font-family: "Oswald"} body {font-family: "Open Sans"}</style>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script src = "<?php echo base_url(); ?>/js/script.js"></script>
        <script src = "<?php echo base_url(); ?>/js/modul1.js"></script>
        <title>Trenutno stanje</title> 
    </head>

    <body class="sivaPozadina">

        <!-- Header -->
        <?php
        require 'resources/header.php';
        ?>


        <div class="w3-content" style="max-width:85%; padding-top: 0; ">
        <br><br> <br><br>
            <!-- POZADINA -->
            <div class="w3-row w3-padding w3-border  crvenaPozadina"> 

                <!-- UNOSI -->
                <div class="w3-col l12 s12" style="padding-left: 5%; padding-right: 5%;">
                 
                    <!-- UNOS -->
                    <br>
                    <hr>
                    <div class="w3-container sivaPozadina w3-margin w3-padding-large w3-card-4">
                        <div class="w3-center" style="font-size: 30px;">  
                            <?php
                            //dohvatanje controllera
                            $controller=session()->get('controller');
                            ?>
                            <img src="<?php echo base_url(); ?>/photos/cardioguardian.png" alt="">

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-striped w3-border" style="width:100%">
                    <tr>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">&nbsp</td>
                        <td id="1" class="w3-border podatakUTabeli slovaJakoCrvenaMala">Izmerena vrednost:</td>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">Referentna vrednost:</td>
                    </tr>
                    <tr>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">Nivo holesterola:</td>
                        <td id="2" class="w3-border podatakUTabeli slovaSlaboCrvenaMala">212</td>
                        <td class="w3-border podatakUTabeli slovaSlaboCrvenaMala">200-250</td>
                    </tr>
                    <tr>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">Gornji pritisak:</td>
                        <td id="3" class="w3-border podatakUTabeli slovaSlaboCrvenaMala">147</td>
                        <td class="w3-border podatakUTabeli slovaSlaboCrvenaMala">120-240</td>
                    </tr>  <tr>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">Donji pritisak:</td>
                        <td id="4" class="w3-border podatakUTabeli slovaSlaboCrvenaMala">86</td>
                        <td class="w3-border podatakUTabeli slovaSlaboCrvenaMala">60-120</td>
                    </tr>
                    <tr>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">Otkucaji srca:</td>
                        <td id="5" class="w3-border podatakUTabeli slovaSlaboCrvenaMala">139</td>
                        <td class="w3-border podatakUTabeli slovaSlaboCrvenaMala">70-135</td>
                    </tr>
                    <tr>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">Nivo glukoze:</td>
                        <td id="6" class="w3-border podatakUTabeli slovaSlaboCrvenaMala">381</td>
                        <td class="w3-border podatakUTabeli slovaSlaboCrvenaMala">110-320</td>
                    </tr>
                    <tr>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">Krvni pritisak pri mirovanju:</td>
                        <td id="7" class="w3-border podatakUTabeli slovaSlaboCrvenaMala">96</td>
                        <td class="w3-border podatakUTabeli slovaSlaboCrvenaMala">120-180</td>
                    </tr>
                    <tr>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">Nivo šećera tokom spavanja:</td>
                        <td id="8" class="w3-border podatakUTabeli slovaSlaboCrvenaMala">110</td>
                        <td class="w3-border podatakUTabeli slovaSlaboCrvenaMala">60-120</td>
                    </tr>
                    <tr>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">Rezultati elektrokardiograma:</td>
                        <td id="9" class="w3-border podatakUTabeli slovaSlaboCrvenaMala">1</td>
                        <td class="w3-border podatakUTabeli slovaSlaboCrvenaMala">0</td>
                    </tr>
                    <tr>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">Oldpeak:</td>
                        <td id="10" class="w3-border podatakUTabeli slovaSlaboCrvenaMala">3</td>
                        <td class="w3-border podatakUTabeli slovaSlaboCrvenaMala">2-3</td>
                    </tr>
                    <tr>
                        <td class="w3-border podatakUTabeli slovaJakoCrvenaMala">ST slope:</td>
                        <td id="11" class="w3-border podatakUTabeli slovaSlaboCrvenaMala">2</td>
                        <td class="w3-border podatakUTabeli slovaSlaboCrvenaMala">1-2</td>
                    </tr>
            </table>
        </div>
    </div>
</div>


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
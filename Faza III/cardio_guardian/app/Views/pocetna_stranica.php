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
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/pitanja.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/pocetna.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/stil.css">
        <style>h1,h2,h3,h4,h5,h6 {font-family: "Oswald"} body {font-family: "Open Sans"}</style>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <script src = "<?php echo base_url(); ?>/js/script.js"></script>
        <title>CardioGuardian</title> 
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
                            <div class="overlay slovaJakoCrvena" style="font-size: 28px;"> Čuvar Vašeg zdravlja! Sa Vama uvek i svuda!</div>
                           <br> <br>
                        </div>
                       

                        <!-- LINK LOGIN/REGISTRACIJA -->
                        <?php
                        // samo ako je kontroler gost onda prikazi opcije da se registrujes i login
                        if ($controller=='Gost'){
                        $referencaLogin=site_url("$controller/login");
                        $referencaRegister=site_url("$controller/register");
                        echo '
                        <div class=" w3-center">
                            <div class="overlay slovaJakoCrvena" style="font-size: 28px;"><i class="fa fa-heartbeat"></i> Već imate nalog?
                            <a href=' . "$referencaLogin" . '>LOGIN</a></div>
                            <div class="overlay slovaJakoCrvena" style="font-size: 28px;"><i class="fa fa-heartbeat"></i>
                                Nemate nalog?  <a href=' . "$referencaRegister" . '>REGISTRUJ SE</a></div>
                            <br>
                        </div>
                        ';
                        }
                        // ako je korisnik ulogovan onda on ima opciju da se logoutuje
                        else {
                            $referencaLogout=site_url("$controller/logout");
                            echo '
                            <div class=" w3-center">
                                <div class="overlay slovaJakoCrvena" style="font-size: 28px;"><i class="fa fa-heartbeat"></i> Želite da se izlogujete?
                                <a href=' . "$referencaLogout" . '>LOGOUT</a></div>
                                <br>
                            </div>
                            ';
                        }
                        ?>
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
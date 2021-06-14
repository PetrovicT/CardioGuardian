
<!-- Katzenberger Viktor -->
<!-- Urosevic Vera -->

<!DOCTYPE html>
<html>
    <head>
        <title>Registruj se</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url(); ?>/photos/logo.png" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/stil.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/logovanje.css">
        <style>h1,h2,h3,h4,h5,h6 {font-family: "Oswald"} body {font-family: "Open Sans"}</style>
        <script src = "<?php echo base_url(); ?>/js/script.js"></script>
    </head>

    <body class="w3-light-grey">

        <!-- Header -->
        <?php
        require 'resources/header.php';
        ?>

        <!-- Registracija -->
        <div class="logovanje">
            <br> 
            <div class="wrapper SlaboCrvenaPozadina regBox">
                <div class="Naslov"><b>Formular za registrovanje</b></div>
<br>
                <div class="belaSlova ">Sledeca polja su obavezna, molimo Vas da ih popunite. Obratite paznju da Vasa sifra mora sadrzati minimum 6 karaktera.</div>

                <font color='white'>
                <?php
                if (!empty($registrationErrorMessages)) {
                    foreach ($registrationErrorMessages as $msg) {
                        echo $msg, '<br/>';
                    };
                }
                ?>
                </font>

                <div class="form-container">
                    <div class="form-inner">
                        <form action="<?= site_url("Gost/registerSubmit") ?>" class="login" method="post">
                            <div class="field">
                                <input class="sivaPozadina" name="username" type="text" placeholder="Korisnicko ime" >
                            </div> 
                            <div class="field">
                                <input class="sivaPozadina"  name="password" type="password" placeholder="Sifra">
                            </div> 
                            <br>
                            <div class="field">
                                <div class="belaSlova">Sledeca polja nisu obavezna, tako da ih mozete ostaviti praznim. </div>
                                <input class="sivaPozadina" name="licnoIme" type="text" placeholder="Licno ime" >
                            </div> 
                            <div class="field nopadding ">
                         
                                <select class="select-input sivaPozadina sivaSlova nopadding" name="grad" id="grad">
                                    <option class="sivaPozadina nopadding" value="">Grad:</option>
                                    <?php
                                    // Dodati sve gradove kao opcije u alfabetnom poretku
                                    $gradModel = new \App\Models\GradModel();
                                    $sviGradovi = $gradModel->findAllAlphabetical();
                                    foreach ($sviGradovi as $grad) {
                                        echo '<option value="' . $grad->idGrad . '">' . $grad->naziv . '</option>';
                                    }

                        
                                    ?>
                                </select>



                            </div> 
                            <div class="field">
                                <input class="sivaPozadina" name = "email" type="email" placeholder="Email adresa" >
                            </div> 

                            <br>
                            <div class="belaSlova ">Pol:</div>
                            <?php
                            $polModel = new \App\Models\PolModel();
                            $sviPolovi = $polModel->findAll();
                            foreach ($sviPolovi as $pol) {
                                echo '<input class="belaSlova" type="radio" id="' . $pol->pol . '" name="gender" value="' . $pol->idPol . '">';
                                echo '<label class="belaSlova" for="' . $pol->pol . '"> ' . $pol->pol . '</label><br>';
                            }
                            ?>
                            <input type="radio" id="Drugo" name="gender" value="" checked>
                            <label class="belaSlova " for="Drugo">Drugo/Neizjašnjen</label>
                            <div class="field">
                                <input type="submit" value="Registrujte se">
                            </div>
                            <div class="singup-link belaSlova">
                                
                                Vec imate korisnicki nalog? <a href="<?php echo base_url(); ?>/Gost/login"><b>Ulogujte se</b></a>
                            </div>
                        </form>
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

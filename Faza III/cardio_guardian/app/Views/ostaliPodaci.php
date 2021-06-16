
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

        <!-- Unos podataka -->
        <div class="logovanje">
            <br> 
            <div class="wrapper SlaboCrvenaPozadina regBox">
                <div class="Naslov"><b>Unos podataka</b></div><br>
                <div class="belaSlova w3-center bela_velika_slova">Molimo Vas da popunite sva polja ako želite da imate mogućnost predikcije i detekcije kardiovaskularnih bolesti.</div>

                <div class="form-container">
                    <div class="form-inner">
                        <form action="<?= site_url("Standard/dataSubmit") ?>" class="login" method="post">
                            <div class="field w3-center">
                                <input class="sivaPozadina w3-center" name="age" type="text" placeholder="Godina rodjenja" required>
                            </div> 
                            <div class="w3-center">
                            <br>
                            <div class="belaSlova  w3-center bela_velika_slova">Unesite jačinu bola u grudima koji osećate dok trenirate.</div>
                            <input type="range" min="1" max="4" value="1" class="slider" id="myRange" oninput="this.nextElementSibling.value = this.value">
                            <output class="belaSlova w3-center">1</output>
                  
                            </div> 
                            <br>
                            <div class="field">
                                <div class="belaSlova w3-center bela_velika_slova">Unesite informaciju koliko cigareta dnevno popušite. </div>
                                <input class="sivaPozadina w3-center" name="smoker" type="text" placeholder="Broj cigareta" required>
                            </div> 
                           
                           <div class="w3-center">
                           <br>
                           <div class="belaSlova w3-center bela_velika_slova">Unesite informaciju da li pijete lekove za krvni pritisak. </div>
                           <input type="radio" id="Ne" name="pritisak" value="0" checked>
                            <label class="belaSlova" for="Ne">Ne pijem</label>
                           <input type="radio" id="Da" name="pritisak" value="1">
                            <label class="belaSlova" for="Da">Pijem</label>
                           </div>
                         

                           <div class="w3-center">
                           <br>
                           <div class="belaSlova w3-center bela_velika_slova">Unesite informaciju da li ste nekada već imali srčani udar. </div>
                           <input type="radio" id="Nisam" name="udar" value="0" checked>
                            <label class="belaSlova" for="Nisam">Nisam</label>
                           <input type="radio" id="Jesam" name="udar" value="1">
                            <label class="belaSlova" for="Jesam">Jesam</label>
                           </div>
                           <br>

                           <div class="w3-center">
                        
                           <div class="belaSlova w3-center bela_velika_slova">Unesite informaciju da li imate dijabetes. </div>
                           <input type="radio" id="Nemam" name="dijabetes" value="0" checked>
                            <label class="belaSlova" for="Nemam">Nemam</label>
                           <input type="radio" id="Imam" name="dijabetes" value="1">
                            <label class="belaSlova" for="Imam">Imam</label>
                           </div>

<br>
                            <div class="field">
                            <div class="belaSlova  w3-center ">Unesite vrednost BMI (Body Mass Index). Ako ne znate Vaš BMI, molimo Vas da odete na Modul 3 i tamo dobijete tu informaciju.</div>
                                <input class="sivaPozadina w3-center" name = "email" type="text" placeholder="BMI" required>
                            </div> 

                            <br>
                            <div class="paddingLevo">
                            <div class="belaSlova bela_velika_slova">Vaš nivo obrazovanja:</div>
                            <input type="radio" id="Srednja" name="obrazovanje" value="1" checked>
                            <label class="belaSlova " for="Srednja">Završena srednja škola</label> <br>
                            <input type="radio" id="Fakultet" name="obrazovanje" value="2">
                            <label class="belaSlova " for="Fakultet">Završene osnovne studije</label><br>
                            <input type="radio" id="Master" name="obrazovanje" value="3">
                            <label class="belaSlova " for="Master">Završene master studije</label><br>
                            <input type="radio" id="Doktorat" name="obrazovanje" value="4">
                            <label class="belaSlova " for="Doktorat">Završene doktorske studije</label><br>
                            </div>

                            <br>
                            <div class="field">
                                <input type="submit" value="Unesi podatke">
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

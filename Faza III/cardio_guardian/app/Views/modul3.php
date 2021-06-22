<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/photos/cardioguardian.png">
    <link rel='stylesheet' href='/css/proba.css'>
    <link rel='stylesheet' href='/css/w3.css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/pocetna.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/stil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.1/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="/js/skripta.js"></script>
    <title>Modul za ishranu</title>
</head>


<body class="body">

<!-- Header -->
<?php
require 'resources/header.php';
?>

<div class="w3-content" style="max-width:85%; padding-top: 0; ">
    <div class="w3-row w3-padding w3-border crvenaPozadina"> 
    <div class="w3-col l12 s12" style="padding-left: 5%; padding-right: 5%;">
    <div class="w3-container sivaPozadina w3-margin w3-padding-large w3-card-4">
    <div class="w3-center" style="font-size: 30px;">  
                <?php
                //dohvatanje controllera
                $controller=session()->get('controller');
                ?>
                <img src="<?php echo base_url(); ?>/photos/cardioguardian.png" alt="">
        </div>
       <div class="pocetni slovca">
       Dobrošli na stranicu koja se bavi ishranom! Milioni ljudi jedu više nego što je telu potrebno. 
       Ako se u stomak unese više hrane no što organizam zahteva, makar ona bila jednostavnog sastava, 
       tada taj višak postaje teret. Telo čini beznadežne pokušaje da hranu preradi i ovaj dodatni posao
       izaziva osećaj umora. Danas je, više nego ikada, neophodno da naša hrana bude što jednostavnija.
       Učimo se da budemo zadovoljni čistom, jednostavnom hranom, pripremljenom na jednostavan način.
       To treba da postane naš način ishrane. Obilna hrana uništava zdrave organe tela, a najviše um.
       Moramo voditi brigu o organima za varenje kako ih ne bismo mučili preteranom raznovrsnošću hrane.
       Oni imaju veliku ulogu u izgradnji srećnog života.<br></br>
     
       Ovaj deo aplikacije osmišljen je tako da Vam pokaže u kom stanju se trenutno nalazi Vaše
       telo i na koje načine možete poboljšati Vaše zdravlje. Uz pomoć naših preciznih kalkulatora
       možete u potpunosti isplanirati savršenu ishranu i na taj način učiniti sebi veliku uslugu.<b> Pa da počnemo!</b><br></br>
       </div>
</div>

       <div class="w3-container sivaPozadina w3-margin w3-padding-large w3-card-4">
       <div class="potparagraf slovca">
       <b class="podnaslovi">1. Kalkulator kalorija BMR</b> - Bazalni metabolizam (BMR) je količina energije koja je potrebna čoveku za "redovno" 
       življenje (održavanje osnovnih telesnih funkcija bez dodatnog napora). Pod osnovnim telesnim funkcijama podrazumevamo sedenje,
       spavanje, bez nekih napora čak i kretanja. Ovaj broj biće nam neophodan, kako bismo uspešno odredili TDEE <i>(u nastavku teksta)</i>.<br></br>
       <b class="podnaslovi">2. BMI kalkulator</b> - Indeks telesne mase (engl. Body Mass Index, BMI) je metoda računanja uhranjenosti. BMI se izračunava vrlo jednostavno, 
       a temelji se na odnosu telesne težine i visine osobe. Što je indeks više izvan okvira urednih vrednosti, to je veći rizik od obolevanja
       od raznih srčanih bolesti, dijabetesa i povišenog krvnog pritiska. Na osnovu ovog kalkulatora možete utvrditi da li je neophodno da smanjite
       telesnu masu, održavate je na istom nivou ili da je povećate.<br></br>
       <b class="podnaslovi"> 3. TDEE kalkulator</b> - Ovaj kalkulator računa broj kalorija koje treba da unesete na dnevnom nivou u odnosu na Vaš BMR i trenutnu aktivnost. Na ovaj
       način možete znati koliko energije Vaš organizam zahteva za pravilno funkcionisanje.<br></br>
       <b class="podnaslovi">4. Makronutrijenti</b> - Na osnovu Vašeg cilja (bilo to mršavljenje, održavanje kilaže ili gojenja) ova funkcionalnost Vam omogućava da na jednostavan način 
       izračunate koliko proteina, masti i ugljenih hidrata treba da unosite na dnevnom nivou.
       Masti – pomažu razvoj mozga, celokupnom funkcionisanju ćelija, zaštiti organa I apsorbovanju vitamina.
       Proteini – od značaja za popravku i regeneraciju tkiva i ćelija, važni za zdravlje imunog sistema i proizvodnju hormona.
       Ugljeni hidrati – sastoje se od malih lanaca šećera koji se koriste kao izvor energije.
       <br></br>
       <b class="podnaslovi">5.Primeri zdravih recepata</b>  - U ovom odeljku možete na dnevnom nivou videti interesantne i zdrave recepte za svaki od obroka, doručak, ručak i večeru.
    </div>

    </div>
</div>
</div>
</div>

    <div class='body-kartice'>
    <div class="wrapper">
        <div class="card">
            <input type="checkbox" id="card1" class="more" aria-hidden="true">
            <div class="content">
                <div class="front" style="background-color: #EBEBEB;">
                    <div class="inner">
                        <h2>Kalkulator kalorija(BMR)</h2>
                        <label for="card1" class="button" aria-hidden="true">
                            Više informacija
                        </label>
                    </div>
                </div>
                <div class="back pocetniParagraf podnaslovi">
                    <div>Kalkulator za kalorije omogućava ti da brzo i lako izračunaš dnevni unos kalorija koji je potreban za ostvarenje tvog cilja.
                        Za precizno računanje kalorija potrebno je da u obavezna polja uneseš lične podatke u koje spadaju: težina, visina, godine starosti i pol.
                        Ova vrednost je količina kalorija koju biste potrošili ako samo ležite i odmarate. Ako želite izračunati koliko vam ukupno treba kalorija dnevno 
                        pri određenoj aktivnosti, onda možete iskoristiti kalkulator za izračunavanje ukupne dnevne potrošnje energije koji se još i naziva TDEE.</div>
                        <br>
                        <form name="KALORIJEforma">
                        <table>
    
                            <tr>
                                <td>Težina (kg):</td>
                                <td><input type='text' name="tezinaK"></td>
                            </tr>
                            <tr>
                                <td>Visina u centimetrima:</td>
                                <td><input type='text' name="visinaK"></td>
                            </tr>
                            <tr>
                                <td>Godine</td>
                                <td><input type='text' name="godine"></td>
                            </tr>
                            <tr>
                                <td>Pol</td>
                                <td><input type="radio" name="pol" id="muski">Muški <input type="radio" name="pol" id="zenski">Ženski</td>
                            </tr>
                            <tr>
                                <td><br><input type="button" class="dugme_crveno" value="Izračunaj kalorije" onClick="izracunajKalorije()"></td>
                                <td><br><input type="text" name="kalorijeIspis" class="" placeholder="Vaš broj preporučenih kalorija" size="20"></td>
                            </tr>          
                        </table>
                        <br>
                    </form>
                        <label for="card1" class="button return" aria-hidden="true">
                            <i class="fas fa-arrow-left">Klikni za povratak</i>
                        </label>
                </div>
            </div>
        </div>

        <div class="card">
            <input type="checkbox" id="card2" class="more">
            <div class="content">
                <div class="front">
                    <div class="inner">
                        <h2>BMI kalkulator</h2>
                        <label for="card2" class="button" aria-hidden="true">
                            Više informacija
                        </label>
                    </div>
                </div>
                <div class="back pocetniParagraf podnaslovi">
                    <div>
                        Indeks telesne mase (BMI) nam pokazuje odnos između težine i visine našeg tela. BMI tabela pokazuje različite kategorije telesne težine prema 
                        godinama života.Na osnovu Vaše trenutne telesne kondicije ili zdravstvenog stanja može se desiti da je neophodno da smanjite ili povećate težinu.
                         Ako su Vaše vrednosti daleko ispod ili iznad proseka, svakako morate otići kod svog lekara.
                    </div>
                    <table class="table-striped thead-light">
                        <tr class='header-deo'>
                            <td>
                                Starost
                            </td>
                            <td>
                                Smanjena telesna težina
                            </td>
                            <td>
                                Normalna težina
                            </td>
                            <td>
                                Gojaznost
                            </td>
                            <td>
                                Gojaznost (adipositas)
                            </td>
                            <td>
                                Jaka gojaznost
                            </td>
                        </tr>
                        <tr>
                            <td>
                                18-24
                            </td>
                            <td>
                                &lt19
                            </td>
                            <td>
                                19-24
                            </td>
                            <td>
                                24-29
                            </td>
                            <td>
                                29-39
                            </td>
                            <td>
                                &gt39
                            </td>
                        </tr>
                        <tr>
                            <td>
                                25-34
                            </td>
                            <td>
                                &lt20
                            </td>
                            <td>
                                20-25
                            </td>
                            <td>
                                25-30
                            </td>
                            <td>
                                30-40
                            </td>
                            <td>
                                &gt40
                            </td>
                        </tr>
                        <tr>
                            <td>
                                35-44
                            </td>
                            <td>
                                &lt21
                            </td>
                            <td>
                                21-26
                            </td>
                            <td>
                                26-31
                            </td>
                            <td>
                                31-41
                            </td>
                            <td>
                               &gt41
                            </td>
                        </tr>
                        <tr>
                            <td>
                                45-54
                            </td>
                            <td>
                               &lt22
                            </td>
                            <td>
                                22-27
                            </td>
                            <td>
                                27-32
                            </td>
                            <td>
                                32-42
                            </td>
                            <td>
                                &42
                            </td>
                        </tr>
                        <tr>
                            <td>
                                55-64
                            </td>
                            <td>
                               &lt23
                            </td>
                            <td>
                                23-28
                            </td>
                            <td>
                                28-33
                            </td>
                            <td>
                                33-43
                            </td>
                            <td>
                                &gt43
                            </td>
                        </tr>
                        <tr>
                            <td>
                               65+
                            </td>
                            <td>
                               &lt24
                            </td>
                            <td>
                                24-29
                            </td>
                            <td>
                                29-34
                            </td>
                            <td>
                                34-44
                            </td>
                            <td>
                                &gt44
                            </td>
                        </tr>
                    </table>
                    <div>
                        <br>
                        <form name="BMIforma">
                    <table>
                       <tr><input type="text" name="tezina" placeholder="Unesi težinu (kg)" size="20"></tr>
                       <tr><input type="text" name="visina" placeholder="Unesi visinu (cm)" size="20"></tr>  <br>
                       <tr> <br>&nbsp</tr> 
                        <tr> <input type="button" class="dugme_crveno" value="Izračunaj BMI" onClick="izracunajBmi()"></tr>  
                        <tr> <input type="text" name="bmi" placeholder="Vaš BMI" size="20"></tr>
                    </table>
                        </form>
                        </div>
                        <br>
                        <label for="card2" class="button return" aria-hidden="true">
                            <i class="fas fa-arrow-left">Klikni za povratak</i>
                        </label>
                </div>
            </div>
        </div>
        <div class="card">
            <input type="checkbox" id="card3" class="more">
            <div class="content">
                <div class="front">
                    <div class="inner">
                        <h2>TDEE kalkulator</h2>
                        <label for="card3" class="button" aria-hidden="true">
                            Više informacija
                        </label>
                    </div>
                </div>
                <div class="back">
                    <div class="pocetniParagraf podnaslovi">
                    
                       TDEE kalkulator je kalkulator ukupne dnevne potrošnje energije. Za izračun ukupne dnevne potrošnje energije
                        Vam je potrebna BMR vrednost iz prvog kalkulatora i informacija o količini Vaše aktivnosti. 
                        <br>
                       
                        <form name="TDEEforma">
                            <table>
                                <tr><td><b>Unesite Vaš BMR</b></td>
                                    <td><input type="text" name="BMR"></td>
                                 </tr>
                               
                                <tr><td colspan="2"><b>Izaberite jednu od sledećih opcija:</b></td></tr>
                                <tr><td colspan="2"><input type="radio" name="aktivnost" id="1"> neaktivan</td></tr> 
                                <tr><td colspan="2"><input type="radio" name="aktivnost" id="2"> mala aktivnost, 1-3 puta nedeljno</td></tr> 
                                <tr><td colspan="2"><input type="radio" name="aktivnost" id="3"> srednja aktivnost, 3-5 puta nedeljno</td></tr> 
                                <tr><td colspan="2"><input type="radio" name="aktivnost" id="4"> velika aktivnost, 6-7 puta nedeljno</td></tr> 
                                <tr><td colspan="2"><input type="radio" name="aktivnost" id="5"> ogromna aktivnost, dva puta dnevno</td></tr> <br>
                                <tr>
                                    <td><br><input type="button" class="dugme_crveno" value="Izračunaj TDEE" onClick="izracunajTDEE()"></td>
                                    <td><br><input type="text" name="TDEEIspis" placeholder="Vaš TDEE" size="20"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                        <label for="card3" style="margin:10px" class="button return" aria-hidden="true">
                            <i style="padding:10px" class="fas fa-arrow-left">Klikni za povratak</i>
                        </label>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class='body-kartice'>
        <div class="wrapper">
            <div class="card">
                <input type="checkbox" id="card4" class="more" aria-hidden="true">
                <div class="content">
                    <div class="front" style="background-color: #EBEBEB;">
                        <div class="inner">
                            <h2>Makronutrijenti</h2>
                            <label for="card4" class="button" aria-hidden="true">
                                Više informacija
                            </label>
                        </div>
                    </div>
                    <div class="back pocetniParagraf podnaslovi">
                        <div> 
                            Makronutrijenti imaju svoje specifične uloge i snabdevaju nas kalorijama i energijom. Ovde možete uz pomoć kalorija koje su Vam neophodne
                            i Vaših ciljeva izračunati koliko kog makronutrijenata Vam je potrebno za  funkcionisanje.
                            Primeri zdravih masti: bademi, orasi, seme bundeve, masline, avokado.
                            Dobri izvori proteina: pasulj, mahunarke, avokado...
                            </div> 
                            <form name="MAKRONUTRIJENTIforma">       
                            <table>
                                <br>
                                <tr><td><b>Unesite broj kalorija</b></td>
                                    <td><input type="text" name="kalorijeM"></td>
                                 </tr>
                                <tr><td colspan="2"><b>Izaberite cilj:</b></td></tr>
                                <tr><td colspan="2"><input type="radio" name="masa" id="11"> Maintenance (održavanje trenutne težine)</td></tr> 
                                <tr><td colspan="2"><input type="radio" name="masa" id="12"> Cutting (smanjivanje trenutne težine)</td></tr> 
                                <tr><td colspan="2"><input type="radio" name="masa" id="13"> Bulking (povećanje trenutne težine)</td></tr> 
                                <tr><td colspan="2"><b>Izaberite jednu od sledećih opcija:</b></td></tr>
                                <tr><td ><input type="radio" name="opcija" id="14">Moderate Carb (30/35/35)</td></tr> 
                                <tr><td><input type="radio" name="opcija" id="15">Lower Carb (40/40/20)</td></tr> 
                                <tr><td><input type="radio" name="opcija" id="16">Higher Carb (30/20/50)</td></tr> 
                               <tr><td><input type="button"  class="dugme_crveno" value="Izračunaj makronutrijente" onClick="izracunajMakronutrijnte()"></td></tr>
                                <tr><td><input type="text" name="proteiniIspis" placeholder="Preporučeni broj proteina" size="20"></td><td>g proteina</td></tr>
                                <tr><td><input type="text" name="mastiIspis" placeholder="Preporučeni broj masti" size="20"></td><td>g masti</td></tr>
                                <tr><td><input type="text" name="ugljeniHidratiIspis" placeholder="Preporučeni broj ugljenih hidrata" size="20"></td><td>g ugljenih hidrata</td></tr>
                            </table>
                        </form>
                            <label for="card4" class="button return" aria-hidden="true">
                                <i class="fas fa-arrow-left">Klikni za povratak</i>
                            </label>
                    </div>
                </div>
            </div>
            <div class="card">
                <input type="checkbox" id="card5" class="more">
                <div class="content">
                    <div class="front">
                        <div class="inner">
                            <h2>Primeri zdravih recepata</h2>
                            <label for="card5" class="button" aria-hidden="true">
                                Više informacija
                            </label>
                        </div>
                    </div>
                    <div class="back pocetniParagraf podnaslovi">
                        <div>U ovom delu možete videti neke od zanimljviih zdravih recepata koji se ažuriraju na dnevnom nivou,
                             tako da svaki dan možete spremati neku zanimljivu, ali i zdravu hranu, sve što je potrebno jeste da izaberete željeni obrok.
                            <form name="RECEPTIforma">   
                                <table>
                                    <br>
                            <tr><td colspan="2"><b>Izaberite koji obrok želite:</b></td></tr>
                            <tr><td ><input type="radio" name="opcija" id="111">doručak</td>
                            <td><input type="radio" name="opcija" id="112">ručak</td> 
                            <td><input type="radio" name="opcija" id="113">večera</td></tr>  
                            <tr><td><br><input type="button"  class="dugme_crveno" value="Ispiši recept" onClick="ispisiRecept()"></td></tr>
                        </table>
                        <textarea id="dorucak"  rows="3" cols="48"></textarea>
                        <textarea id="rucak"  rows="3" cols="48"></textarea>
                        <textarea id="vecera"  rows="3" cols="48"></textarea>
                            </form>
                            <br>
                            <label for="card5" class="button return" aria-hidden="true">
                                <i class="fas fa-arrow-left">Klikni za povratak</i>
                            </label>
                    </div>
                </div>
            </div>
            </div>
            </div>

          
</body>
</html>
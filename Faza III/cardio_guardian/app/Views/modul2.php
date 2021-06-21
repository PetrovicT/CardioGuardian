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
    <title>Modul za trening</title>
</head>
<body class="body">

<!-- Header -->
<?php
require 'resources/header.php';
?>
<br> <br> 
<div class="w3-content" style="max-width:85%; padding-top: 0; ">
<br> 
    <div class="w3-row w3-padding w3-border crvenaPozadina"> 
        <div class="w3-col l12 s12" style="padding-left: 5%; padding-right: 5%;">
        <br> 
            <div class="w3-container sivaPozadina w3-margin w3-padding-large w3-card-4">

        <div class="w3-center" style="font-size: 30px;">  
                <?php
                //dohvatanje controllera
                $controller=session()->get('controller');
                ?>
                <img src="<?php echo base_url(); ?>/photos/cardioguardian.png" alt="">
        </div>
       <div class="pocetni slovca">
       Dobrošli na stranicu koja se bavi vežbanjem! Redovnim vežbanjem smanjujete rizik od srčanog udara, imate niži nivo holesterola u krvi i niži krvni pritisak, bolje kontrolišete/održavate težinu. Pored toga, vežbanjem se bolje oporavljate od perioda hospitalizacije ili nakon  odmora, osećate se bolje – sa više energije, boljim raspoloćenje i kvalitetnije spavate. Uz to, brojna istraživanja su pokazala da vežbanje pomaže u borbi protiv depresije jer: blokira negativne misli/odvraća od svakodnevnih briga, 
       pruža priliku za društvenu interakciju, 
       poboljšava raspoloženje i obrasce spavanja, 
       menja nivo hemikalija u mozgu, kao što su serotonin, endorfini i hormoni stresa. 
       <b> <br>Ono što je važno istaći jeste da je bolje raditi bilo kakvu fizičku aktivnost, nego ne raditi ništa.</b><br></br>
       Ovaj deo aplikacije osmišljen je tako da Vam pomogne u formiranju treninga. Na jednostavan način možete izabrati neke od treninga koji se menjaju na dnevnom nivou i počnete sa vežbama. Takođe, možete beležiti obavljene treninge i na taj način da pratite trenutno stanje.<b> <br> Pa da počnemo!</b></br>
    </div>
    </div>
    <div class="w3-container sivaPozadina w3-margin w3-padding-large w3-card-4">
        <div class="potparagraf slovca ">
       <b class="podnaslovi">1. Trčanje</b> -Trčanje može imati i blagotvorne psihološke učinke, mnogi trkači imaju neku povećani, euforični osećaj, za koji se smatra da ga izazivaju endorfini – hormoni sreće, koje telo proizvodi kao odgovor na dugotrajno bavljenje sportom. Trčanje je odlična terapija za osobe koje pate od stresa, depresije, kao i osoba koji se bore protiv raznih oblika zavisnosti.
       Za osobe koje tek ulaze u svet trčanja, važno je znati da je potrebno vreme da se dođe u formu i osete blagodeti efekata trčanja, a za uspeh je najvažnija stvar da se prati kako se organizam oseća i da se prema tome određuje tempo i dužina staze. Naša aplikacija Vam nudi 4 različite vrste programa, trčanje 5km, trčanje 10km ili polumaratona i maratona. Na Vama je da izaberete.<br></br>
       <b class="podnaslovi">2. Joga</b> - Veliki je broj istraživanja i studija koje dokazuju da Joga pomaže kod mnogih fizičkih i psihičkih nelagodnosti i poremećaja. Ukratko, joga je odlična preventivna aktivnost, koja može sprečiti ili ublažiti razna oboljenja i mnogi lekari je iskreno preporučuju. Od redovnog vežbanja Joge koristi imaju i zdrave osobe, kao i one koje već osećaju posledice nekih oboljenja<br></br>
       <b class="podnaslovi"> 3. Vežbe snage</b> - Mnogi izbegavaju trening snage uvereni da je kardio efikasniji i bolji. Međutim, vežbe snage mogu dovesti do potpune transformacije tela i oni koji ga praktikuju kažu da se osećaju zdravije nego ikad. Vežbe sa sopstvenom težinom i tegovima, vežbe na mašinama, pilates i vežbe pomoću elastičnih traki – sve to spada u trening snage. Blagodeti takvog treninga se ne završavaju sa mišićavim telom, već idu mnogo dalje (jačanje zglobova, bolje kardiovaskularno zdravlje, bolje raspoloženje i mentalno zdravlje, produžava život...). <br></br>
       <b class="podnaslovi">4. HIIT</b> -Suština ovog treninga je njegov intenzitet. Skraćenica HIIT zapravo znači High Intensity Interval Training, odnosno, trening  intervala visokog intenziteta i odmora.Suština kod HIIT treninga je da on pokreće što više mišića, da se radi ekstremno visokim intenzitetom i da se za to vreme preznojite do maksimuma, a znači i da ste sagoreli mnogo masti. U isto vreme, ovaj trening će pomoći u povećavanju mišićne izdržljivosti ali i kondicije za veoma kratko vreme. Postoji niz drugih koristi koje su vidljive tek nakon nekog vremena, ali zahvaljujući HIIT treningu, to vreme je daleko kraće nego kod ostalih vrsta vežbanja.
       <br></br>
       <b class="podnaslovi">5.Kalendar aktivnosti</b>  - Jednostavan kalendar aktivnosti gde na mesečnom nivou možete beležiti treninge koje ste odradili. Na ovaj način možete pratiti svoj napredak, ali i sebe motivisati da kalendar bude što više išaran.
    </div>
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
                        
                        <h2>Trčanje</h2>
                        <label for="card1" class="button" aria-hidden="true">
                            Više informacija
                        </label>
                    </div>
                </div>
                <div class="back pocetniParagraf podnaslovi">
                    <div>Ukoliko želite da počnete da trčite ili da se pripremate za neku ozbiljniju trku 
                        onda je ova opcija baš za Vas. Klikom na ponuđene programe otvoriće Vam se nov prozor sa našim preporučenim treninzima.
                    </div>
                        <form name="TRCANJEforma">
                        <table>
                            <tr>
                                <td colspan="2"> <br> <b>Izaberite željeni program:</b></td>
                            </tr>
                            <tr><td>Trka zadovoljstva (5km): </td>
                                <td ><input type="button" class="dugme_crveno" value="5km" onClick="window.location.href='https://i0.wp.com/www.trcanje.rs/wp-content/uploads/2013/08/OD-NULE-DO-5K.jpg?w=634&ssl=1'"></td>
                            </tr>    
                            <tr><td>10km: </td>
                                <td><input type="button" class="dugme_crveno" value="10km" onClick="window.location.href='https://i0.wp.com/www.trcanje.rs/wp-content/uploads/2009/06/trening-za-10k-optimalan-plan.png?w=790&ssl=1'"></td>
                            </tr>  
                            <tr><td>Polumaraton (21km): </td>
                                <td><input type="button" class="dugme_crveno" value="21km" onClick="window.location.href='https://i1.wp.com/www.trcanje.rs/wp-content/uploads/2014/01/16-NEDELJA-TABELA.jpg?w=790&ssl=1'"></td>
                            </tr>  
                            <tr><td>Maraton(42km): </td>
                                <td><input type="button" class="dugme_crveno" value="42km" onClick="window.location.href='https://daneenc.files.wordpress.com/2012/01/ottawa-marathon-training-schedule1.jpg'"></td>
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
                        <h2>Joga</h2>
                        <label for="card2" class="button" aria-hidden="true">
                            Više informacija
                        </label>
                    </div>
                </div>
                <div class="back pocetniParagraf podnaslovi">
                    <div>
                        Pritiskom na dugme "Započni trening" krenuće da se pojavljuju
                        sličice sa određenim vežbama, nakon 1 minuta sličica će se sama promeniti.
                        U svakoj pozi neophodno je ostati 1 minut da bi se trening smatrao uspešnim.<br></br>
                    </div>
                    
                    <input type="button"class="dugme_crveno" value="Započni trening" onClick="zapocniJogu()">
                    <br> 
                    <div id="vreme" class="w3-center"></div>
                    <div id="joga" class="w3-center"></div>
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
                        <h2>Vežbe snage</h2>
                        <label for="card3" class="button"  aria-hidden="true">
                            Više informacija
                        </label>
                    </div>
                </div>
                <div class="back">
                    <div class="pocetniParagraf podnaslovi">
                       Vežbe snage služe sa povećanje mišićne mase, ali i povećavanje izdržljivosti. Pritiskom na dugme "Započni trening" pokreću se sličice određenih vežbi koje treba da uradite. Sličice će se smenjivati na 45 sekundi, a neophodno je da uradite od 10 do 12 ponavljanja kako bi se trening smatrao uspešnim. Nakon svakog seta napravite pauzu 1 min. <br></br>
                        <input type="button" class="dugme_crveno" value="Započni trening" onClick="zapocniVezbeSnage()">
                        <div id="vreme2" class="w3-center"></div>
                        <div id="vezbeSnage" class="w3-center"></div> 
                    </div> 
                        <label style="margin:10px" for="card3" class="button return" aria-hidden="true">
                            <i class="fas fa-arrow-left">Klikni za povratak</i>
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
                            <h2>HIIT (High Intensity Interval Training)</h2>
                            <label for="card4" class="button" aria-hidden="true">
                                Više informacija
                            </label>
                        </div>
                    </div>
                    <div class="back pocetniParagraf podnaslovi">
                        <div> 
                            HIIT (High Intensity Interval Training) treninzi se sastoje od kratkih ali jakih intervala fizičke aktivnosti koji su praćeni adekvatnim odmorom između njih.  Pritiskom na dugme "Započni trening" pokreću se sličice određenih vežbi koje treba da uradite. Sličice će se smenjivati na 30 sekundi.<b> <br>Ovaj odeljak je za one koji su u malo većoj kondiciji!
                            </b></div> <br>
                            <input type="button" class="dugme_crveno" value="Započni trening" onClick="zapocniHIIT()">
                        <div id="vreme3" class="w3-center"></div>
                     
                        <div id="HIIT" class="w3-center"></div> 
                        <br>
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
                            <h2>Kalendar aktivnosti</h2>
                            <label for="card5" class="button" aria-hidden="true">
                                Više informacija
                            </label>
                        </div>
                    </div>
                    <div class="back pocetniParagraf podnaslovi">
                        <div>U ovom delu možete videti svoj kalendar aktivnosti i na taj način da imate
                            brz i jednistavan uvid u svoje treninge! Prelaskom miša na zaokruženi datum možete videti koji trening je tada bio odrađen.
                             <div class="box prazno cal">

                                <div class="kalendar">Jun 2021</div>
                                
                                <span>Pon</span>
                                <span>Uto</span>
                                <span>Sre</span>
                                <span>Cet</span>
                                <span>Pet</span>
                                <span>Sub</span>
                                <span>Ned</span>
                                
                                <span>1</span>
                                <span class="circle" data-title="HIIT">2</span>
                                <span>3</span>
                                <span class="circle" data-title="Vezbe snage">4</span>
                                <span>5</span>
                                <span>6</span>
                                <span class="circle" data-title="HIIT">7</span>
                                <span>8</span>
                                <span class="circle" data-title="Joga">9</span>
                                <span>10</span>
                                <span>11</span>
                                <span class="circle" data-title="Vezbe snage">12</span>
                                <span>13</span>
                                <span>14</span>
                                <span>15</span>
                                <span class="circle" data-title="Trcanje">16</span>
                                <span>17</span>
                                <span>18</span>
                                <span>19</span>
                                <span class="circle" data-title="Vezbe snage">20</span>
                                <span>21</span>
                                <span class="circle" data-title="Joga">22</span>
                                <span>23</span>
                                <span>24</span>
                                <span>25</span>
                                <span>26</span>
                                <span>27</span>
                                <span>28</span>
                                <span>29</span>
                                <span>30</span>
                                <span class="prazno"><!--BLANK--></span>
                                <span class="prazno"><!--BLANK--></span>
                                <span class="prazno"><!--BLANK--></span>
                                <span class="prazno"><!--BLANK--></span>
                                <span class="prazno"><!--BLANK--></span>
                                <span class="prazno"><!--BLANK--></span>
                                </div>
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
function izracunajBmi() {
    var tezina = document.BMIforma.tezina.value
    var visina = document.BMIforma.visina.value
    if(tezina > 0 && visina > 0){	
    var finalBmi = tezina/(visina*visina)
    document.BMIforma.bmi.value = Math.round((finalBmi*10000).toFixed(0));
        }
    }

function izracunajKalorije(){
    var tezina=document.KALORIJEforma.tezinaK.value;
    var visina=document.KALORIJEforma.visinaK.value;
    var godine=document.KALORIJEforma.godine.value;
    var kalorije=0;
    if(tezina > 0 && visina > 0 && godine >0){
    if(document.getElementById('muski')){
        if(godine<=18){
            kalorije = 88.5 - (61.9 * godine) + ( (26.7 * tezina) + (903 * visina) ) + 25;
        }
        else
            kalorije = 662 - (9.53 * godine) + ( (15.91 * tezina) + (539.6 * visina));
    }
    if(document.getElementById("zenski")){
        if(godine<=18){
            kalorije = 135.3 - (30.8 * godine) + ( (10.0 * tezina) + (934 * visina )) + 25;
        }
        else 
            kalorije = 354 - (6.91 * godine) + ( (9.36 * tezina) + (726 * visina));
    }
    kalorije=kalorije/100;
    document.KALORIJEforma.kalorijeIspis.value = Math.round(kalorije);
    }
}

function izracunajTDEE(){
    var BMR=document.TDEEforma.BMR.value;
    var TDEE=0;
    if(document.getElementById('1').checked){
        TDEE=1.2*BMR;
    }
    else if(document.getElementById('2').checked){
        TDEE=1.375*BMR;
    }
    else if(document.getElementById('3').checked){
        TDEE=1.55*BMR;
    }
    else if(document.getElementById('4').checked){
        TDEE=1.725*BMR;
    }
    else if(document.getElementById('5').checked){
        TDEE=1.9*BMR;
    }
    document.TDEEforma.TDEEIspis.value=Math.round(TDEE);
}

function izracunajMakronutrijnte(){
    var kalorije=document.MAKRONUTRIJENTIforma.kalorijeM.value;
    var proteini = 0;
    var masti = 0;
    var ugljeniHidrati = 0;
    if(document.getElementById("11").checked){
        if(document.getElementById("14").checked){
            proteini = kalorije*0.3/4;
            masti = kalorije*0.35/9;
            ugljeniHidrati = kalorije*0.35/4;
        }
        if(document.getElementById("15").checked){
            proteini = kalorije*0.4/4;
            masti = kalorije*0.4/9;
            ugljeniHidrati = kalorije*0.2/4;
        }
        if(document.getElementById("16").checked){
            proteini = kalorije*0.3/4;
            masti = kalorije*0.2/9;
            ugljeniHidrati = kalorije*0.5/4;
        }
    }
    if(document.getElementById("12").checked){
        kalorije = kalorije - 500;
        if(document.getElementById("14").checked){
            proteini = kalorije*0.3/4;
            masti = kalorije*0.35/9;
            ugljeniHidrati = kalorije*0.35/4;
        }
        if(document.getElementById("15").checked){
            proteini = kalorije*0.4/4;
            masti = kalorije*0.4/9;
            ugljeniHidrati = kalorije*0.2/4;
        }
        if(document.getElementById("16").checked){
            proteini = kalorije*0.3/4;
            masti = kalorije*0.2/9;
            ugljeniHidrati = kalorije*0.5/4;
        }
    }
    if(document.getElementById("13").checked){
        if(document.getElementById("14").checked){
            proteini = kalorije*0.3/4 + 500*0.3/4;
            masti = kalorije*0.35/9 + 500*0.35/9;
            ugljeniHidrati = kalorije*0.35/4 + 500*0.35/4;
        }
        if(document.getElementById("15").checked){
            proteini = kalorije*0.4/4 + 500*0.4/4;
            masti = kalorije*0.4/9 + 500*0.4/9;
            ugljeniHidrati = kalorije*0.2/4+ 500*0.2/4;
        }
        if(document.getElementById("16").checked){
            proteini = kalorije*0.3/4 + 500*0.3/4;
            masti = kalorije*0.2/9 + 500*0.2/9;
            ugljeniHidrati = kalorije*0.5/4 +500*0.5/4;
        }
    }
    proteini = Math.round(proteini);
    masti = Math.round(masti);
    ugljeniHidrati = Math.round(ugljeniHidrati);
    document.MAKRONUTRIJENTIforma.proteiniIspis.value = proteini;
    document.MAKRONUTRIJENTIforma.mastiIspis.value = masti;
    document.MAKRONUTRIJENTIforma.ugljeniHidratiIspis.value = ugljeniHidrati;
}

function ispisiRecept(){
if(document.getElementById("111").checked){
    var target = document.getElementById("dorucak");
    var random = Math.round(Math.random()*2);
    if(random==0){
        tekstRecepta = "OMLET OD POVRĆA: 2 jaja,1 šolja (20 grama) spanaća, 1/4 šolje (24 grama) pečurki,1/4 šolje (23 grama) brokule, 1 šolja (205 grama) dinstanog batata, 1 kašika (15 ml) maslinovog ulja"
    }
    if(random==1){
        tekstRecepta = "PARFE OD JAGODIČASTOG JOGURTA: 200 grama običnog grčkog jogurta,  1/2 šolje (74 grama) sveže borovnice, 1/2 šolje (76 grama) isečenih jagoda,1/4 šolje (30 grama) granole"
    }
    if (random==2){
        tekstRecepta = "OVSENA KAŠA SA SEMENKAMA I SUVIM VOČEM: 1/2 šolje (80 grama) ječma izrezanog od čelika,1 kašika (14 grama) semena konoplje,1 kašika (12 grama) semena lana, 2 kašike (20 grama) sušene višnje"
    }
    target.innerHTML += tekstRecepta;  
}
if(document.getElementById("112").checked){
    var target = document.getElementById("rucak");
    var random = Math.round(Math.random()*2);
    if(random==0){
        tekstRecepta = "PITA OD MEDITERANSKE TUNE: 1 pita od celokupnog žita, 140 grama tunjevine u konzervi, seckani crveni luk i celer, 1/4 avokada, 1 kašika (9 grama) izmrvljenog feta sira"
    }
    if(random==1){
        tekstRecepta = "CRNI PASULJ I BURITO OD SLATKOG KROMPIRA: 1 cela pšenična tortilja, 1/4 šolje (41 grama) kuvanog smeđeg pirinča, 1/2 šolje (102 grama) kuvanog slatkog krompira, 1/4 šolje (50 grama) crnog pasulja, 2 kašike (30 grama) salse"
    }
    if (random==2){
        tekstRecepta = "POVRĆE NA ŽARU I MOCARELA: 1 cela pšenična tortilja, 1/2 šolje (60 grama) crvene paprike na žaru, 5 kriški (42 grama) tikvica sa roštilja, 84 grama sveže mocarele"
    }
    target.innerHTML += tekstRecepta;  
}
if(document.getElementById("113").checked){
    var target = document.getElementById("vecera");
    var random = Math.round(Math.random()*2);
    if(random==0){
        tekstRecepta = "TESTENINA SA PESTOM, GRAŠKOM I ŠKAMPIMA: 2 kašike (30 grama) pestoa, 1/2 šolje (42 grama) penice od integralnog brašna ili smeđeg pirinča, 170 grama račića, 1/2 šolje (80 grama) graška, 1 kašika (5 grama) naribanog parmezana"
    }
    if(random==1){
        tekstRecepta = "PRŽENA PILETINA I BROKOLI: 5 grama (140 grama) piletine, 2 šolje (176 grama) brokule, 1/2 šolje (82 grama) kuvanog smeđeg pirinča, sveži beli luk i đumbir, 1 kašika (15 ml) soja sosa"
    }
    if (random==2){
        tekstRecepta = "LOSOS SA POVRĆEM I DIVLJIM PIRINČEM: 5 grama (140 grama) pečenog lososa, 2 kašike (30 ml) maslinovog ulja, 1/2 šolje (82 grama) kuvanog divljeg pirinča, 1 šolja (180 grama) pečenih šparoga, 1 šolja (100 grama) pečenog patlidžana"
    }
    target.innerHTML += tekstRecepta;  
} 
}

let vreme = 10;
let i = 1;
function stoperica() {
    if(i==1) ispisiSlikuJoga();
    vreme--;
    document.getElementById("vreme").innerHTML = vreme;
    if (vreme == 0) {
        vreme = 10;
        i++;
        ispisiSlikuJoga();
    };
}

function zapocniJogu(){
    stopericaHandle = setInterval(stoperica, 1000);
}

function ispisiSlikuJoga(){
    if(i==1){
    document.getElementById("joga").innerHTML = "<img src='1.png'>";
    }
    if(i==2){
        document.getElementById("joga").innerHTML = "<img src='2.png'>";
        }
        if(i==3){
            document.getElementById("joga").innerHTML = "<img src='3.png'>";
            }
            if(i==4){
                document.getElementById("joga").innerHTML = "<img src='4.png'>";
                }
                if(i==5){
                    document.getElementById("joga").innerHTML= "<img src='5.png'>";
                }
                if(i==6){
                    document.getElementById("joga").innerHTML= "VAS TRENING JE GOTOV!!!Čestitamo!";
                    clearInterval(stopericaHandle);
                }
                
}

let vreme2 = 10;
let i2 = 1;
function stoperica2() {
    if(i2==1) ispisiSlikuVezbeSnage();
    vreme2--;
    document.getElementById("vreme2").innerHTML = vreme2;
    if (vreme2 == 0) {
        vreme2 = 10;
        i2++;
        ispisiSlikuVezbeSnage();
    };
}

function zapocniVezbeSnage(){
    stopericaHandle2 = setInterval(stoperica2, 1000);
}

function ispisiSlikuVezbeSnage(){
    if(i2==1){
    document.getElementById("vezbeSnage").innerHTML = "Jump squats<br></br><img src='v1.png'>";
    }
    if(i2==2){
        document.getElementById("vezbeSnage").innerHTML = "Push-ups<br></br><img src='v2.png'>";
        }
        if(i2==3){
            document.getElementById("vezbeSnage").innerHTML = "Jumping lunges<br></br><img src='v3.png'>";
            }
            if(i2==4){
                document.getElementById("vezbeSnage").innerHTML = "Punches<br></br><img src='v4.png'>";
                }
                if(i2==5){
                    document.getElementById("vezbeSnage").innerHTML= "VAS TRENING JE GOTOV!!!Čestitamo!";
                    clearInterval(stopericaHandle2);
                }
                
}


let vreme3 = 10;
let i3 = 1;
function stoperica3() {
    if(i3==1) ispisiSlikuHIIT();
    vreme3--;
    document.getElementById("vreme3").innerHTML = vreme3;
    if (vreme3 == 0) {
        vreme3 = 10;
        i3++;
        ispisiSlikuHIIT();
    };
}

function zapocniHIIT(){
    stopericaHandle3 = setInterval(stoperica3, 1000);
}

function ispisiSlikuHIIT(){
    if(i3==1){
    document.getElementById("HIIT").innerHTML = "<img src='HIIT1.png'>";
    }
    if(i3==2){
        document.getElementById("HIIT").innerHTML = "<img src='HIIT2.png'>";
        }
        if(i3==3){
            document.getElementById("HIIT").innerHTML = "<img src='HIIT3.png'>";
            }
            if(i3==4){
                    document.getElementById("HIIT").innerHTML= "<img src='HIIT5.png'>";
                }
                if(i3==5){
                    document.getElementById("HIIT").innerHTML= "VAS TRENING JE GOTOV!!!Čestitamo!";
                    clearInterval(stopericaHandle3);
                }
                
}
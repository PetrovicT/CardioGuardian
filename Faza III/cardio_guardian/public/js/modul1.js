
function inicijalizujTabelu(){
for (let i=2; i<12; i++){
    // nivo holesterola 150-350
    if (i==2) {
        let broj=Math.floor(Math.random()*201+150);
        document.getElementById("2").innerHTML=broj;
    }
    // gornji pritisak 83-295
    if (i==3) {
    let broj=Math.floor(Math.random()*213+83);
    document.getElementById("3").innerHTML=broj;
    }

    // donji pritisak 48-143
    if (i==4) {
    let broj=Math.floor(Math.random()*96+48);
    document.getElementById("4").innerHTML=broj;
    }
    // heart rate 50-180
    if (i==5)
    { let broj=Math.floor(Math.random()*131+50);
    document.getElementById("5").innerHTML=broj;
    }
    // glukoza 40-394
    if (i==6) {
    let broj=Math.floor(Math.random()*355+40);
    document.getElementById("6").innerHTML=broj;
    }
    // resting blood pressure 94-200
    if (i==7) {
    let broj=Math.floor(Math.random()*107+94);
    document.getElementById("7").innerHTML=broj;
    }
    // fasting blood sugar
    if (i==8) {
    let broj=Math.floor(Math.random()*61+80);
    document.getElementById("8").innerHTML=broj;
    }
    // resting electrocardiogram 0,1,2
    if (i==9) {
    let broj=Math.floor(Math.random()*3);
    document.getElementById("9").innerHTML=broj;
    }
    // oldpeak 0-3.5
    if (i==10) {
    let broj=Math.floor(Math.random()*4);
    document.getElementById("10").innerHTML=broj; 
    }
    // ST slope 1,2,3
    if (i==11) {
    let broj=Math.floor(Math.random()*3+1);
    document.getElementById("11").innerHTML=broj;
    }

}
}

function analizaVrednosti(){

    let broj=document.getElementById("2").innerHTML;
    if (broj<=180) { 
        document.getElementById("2").classList.add("basLose");
        analizaTekst("Rezultati nivoa holesterola su loši, morate podići nivo holesterola. Pod velikim ste rizikom od razvoja ateroskleroze i srčanog udara.",2,1);
    }
    else if (broj>180 && broj<=200) { 
        document.getElementById("2").classList.add("lose");
        analizaTekst("Rezultati nivoa holesterola su loši, morate podići nivo holesterola. Pod velikim ste rizikom od razvoja ateroskleroze i srčanog udara.",2,2);
    }
    else if (broj>200 && broj<=250) document.getElementById("2").classList.add("fantasticno");
    else if (broj>250 && broj<=270)
    {
        document.getElementById("2").classList.add("lose");
        analizaTekst("Rezultati nivoa holesterola su loši, morate smanjiti nivo holesterola. Stvara Vam se depo masnih naslaga u arterijama.",2,2);
    }
    else if (broj>270) 
    {
        document.getElementById("2").classList.add("basLose");
        analizaTekst("Rezultati nivoa holesterola su loši, morate smanjiti nivo holesterola. Stvara Vam se depo masnih naslaga u arterijama.",2,1);
    }


    broj=document.getElementById("3").innerHTML;
    if (broj<=100) { 
        document.getElementById("3").classList.add("basLose");
        analizaTekst("Gornji pritisak Vam je mnogo ispod poželjnog.",3,1);
    }
    else if (broj>100 && broj<=120) { 
        document.getElementById("3").classList.add("lose");
        analizaTekst("Gornji pritisak Vam je malo ispod poželjnog.",3,2);
    }
    else if (broj>120 && broj<=240) 
    {
        document.getElementById("3").classList.add("fantasticno");
    }
    else if (broj>240 && broj<=260) {
        document.getElementById("3").classList.add("lose");
        analizaTekst("Gornji pritisak Vam je malo iznad poželjnog.",3,2);
    }
    else if (broj>260) {
        document.getElementById("3").classList.add("basLose");
        analizaTekst("Gornji pritisak Vam je mnogo iznad poželjnog.",3,1);
    }

    broj=document.getElementById("4").innerHTML;
    if (broj<=60) { 
        document.getElementById("4").classList.add("basLose");
        analizaTekst("Donji pritisak Vam je mnogo ispod poželjnog.",4,1);
    }
    else if (broj>60 && broj<=70) { 
    document.getElementById("4").classList.add("lose");
    analizaTekst("Donji pritisak Vam je malo ispod poželjnog.",4,2);
    }
    else if (broj>70 && broj<=120) {
        document.getElementById("4").classList.add("fantasticno");
    }
    else if (broj>120 && broj<=130) {
        document.getElementById("4").classList.add("lose");
        analizaTekst("Donji pritisak Vam je malo iznad poželjnog.",4,2);
    }
    else if (broj>130) {
        document.getElementById("4").classList.add("basLose");
        analizaTekst("Donji pritisak Vam je mnogo iznad poželjnog.",4,1);
    }

    broj=document.getElementById("5").innerHTML;
    if (broj<=60) { 
        document.getElementById("5").classList.add("basLose");
        analizaTekst("Rezultati otkucaja srca su Vam mnogo ispod poželjnog.",5,1);
    }
    else if (broj>60 && broj<=70) { 
        document.getElementById("5").classList.add("lose");
        analizaTekst("Rezultati otkucaja srca su Vam malo ispod poželjnog.",5,2);
    }
    else if (broj>70 && broj<=135) document.getElementById("5").classList.add("fantasticno");
    else if (broj>135 && broj<=155){
        document.getElementById("5").classList.add("lose");
        analizaTekst("Rezultati otkucaja srca su Vam malo iznad poželjnog.",5,2);
    }
    else if (broj>155) {
        document.getElementById("5").classList.add("basLose");
        analizaTekst("Rezultati otkucaja srca su Vam mnogo iznad poželjnog.",5,1);
    }

    broj=document.getElementById("6").innerHTML;
    if (broj<=75) { 
        document.getElementById("6").classList.add("basLose");
        analizaTekst("Nivo glukoze u krvi Vam je mnogo ispod poželjnog.",6,1);
    }
    else if (broj>75 && broj<=110) { 
        document.getElementById("6").classList.add("lose");
        analizaTekst("Nivo glukoze u krvi Vam je malo ispod poželjnog.",6,2);
    }
    else if (broj>110 && broj<=320) document.getElementById("6").classList.add("fantasticno");
    else if (broj>320 && broj<=355) {
        document.getElementById("6").classList.add("lose");
        analizaTekst("Nivo glukoze u krvi Vam je malo iznad poželjnog.",6,2);
    }
    else if (broj>355) {
        document.getElementById("6").classList.add("basLose");
        analizaTekst("Nivo glukoze u krvi Vam je mnogo iznad poželjnog.",6,1);
    }

    broj=document.getElementById("7").innerHTML;
    if (broj<=110) { 
        document.getElementById("7").classList.add("basLose");
        analizaTekst("Rezultati krvnog pritiska u stanju mirovanja su Vam mnogo ispod poželjnog.",7,1);
    }
    else if (broj>110 && broj<=120) { 
        document.getElementById("7").classList.add("lose");
        analizaTekst("Rezultati krvnog pritiska u stanju mirovanja su Vam malo ispod poželjnog.",7,2);
    }
    else if (broj>120 && broj<=180) {
        document.getElementById("7").classList.add("fantasticno");
    }
    else if (broj>180 && broj<=190) { 
        document.getElementById("7").classList.add("lose");
        analizaTekst("Rezultati krvnog pritiska u stanju mirovanja su Vam malo iznad poželjnog.",7,2);
    }
    else if (broj>190) {
        document.getElementById("7").classList.add("basLose");
        analizaTekst("Rezultati krvnog pritiska u stanju mirovanja su Vam mnogo iznad poželjnog.",7,1);
    }

    broj=document.getElementById("8").innerHTML;
    if (broj<=120) { 
        document.getElementById("8").classList.add("fantasticno");
    }
    else if (broj>120 && broj<=130) { 
        document.getElementById("8").classList.add("lose");
        analizaTekst("Nivo šećera u krvi tokom odmora Vam je malo veći od poželjnog.",8,2);
    }
    else if (broj>130) {
        document.getElementById("8").classList.add("basLose");
        analizaTekst("Nivo šećera u krvi tokom odmora Vam je mnogo veći od poželjnog.",8,1);
    }

    broj=document.getElementById("9").innerHTML;
    if (broj==0) { document.getElementById("9").classList.add("fantasticno");
    }else if (broj==1) { 
        document.getElementById("9").classList.add("lose");
        analizaTekst("Rezultati elektrokardiograma su Vam loši, obratite se kardiologu.",9,2);
    }
    else {
        document.getElementById("9").classList.add("basLose");
        analizaTekst("Rezultati elektrokardiograma su Vam izuzetno loši, obavezno se obratite kardiologu.",9,1);
    }

    broj=document.getElementById("10").innerHTML;
    if (broj==0) { 
        document.getElementById("10").classList.add("basLose");
        analizaTekst("Rezultat oldpeak-a je baš loš, obavezno se obratite kardiologu.",10,1);
    }
    else if (broj==1) { 
        document.getElementById("10").classList.add("lose");
        analizaTekst("Rezultat oldpeak-a je loš, obratite se kardiologu.",10,2);
    }
    else if (broj==2) {
        document.getElementById("10").classList.add("lose");
        analizaTekst("Rezultat oldpeak-a je loš, obratite se kardiologu.",10,2);
    }
    else if (broj==3) {
        document.getElementById("10").classList.add("fantasticno");
    }
    else {
        document.getElementById("10").classList.add("fantasticno");
    }

    broj=document.getElementById("11").innerHTML;
    if (broj==1) { document.getElementById("11").classList.add("fantasticno");}
    else if (broj==2) { document.getElementById("11").classList.add("fantasticno");}
    else if (broj==3) {
        document.getElementById("11").classList.add("lose");
        analizaTekst("Rezultat ST slope-a je loš, obratite se kardiologu.",11,2);
    }
    for (let j=2; j<12; j++) document.getElementById(j).classList.add("belaSlova");
}

function analizaTekst(tekst,id,boja){
    if (boja==1) document.getElementById("span"+id).classList.add("slovaJakoCrvenaMini");
    if (boja==2) document.getElementById("span"+id).classList.add("slovaLoseMala");
    document.getElementById("span"+id).innerHTML="<br>"+tekst;
}

function updateTextInput(val) {
    document.getElementById('textInput').value=val; 
  }

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
    if (broj<=180) { document.getElementById("2").classList.add("basLose");
    }else if (broj>180 && broj<=200) { document.getElementById("2").classList.add("lose");}
    else if (broj>200 && broj<=250) document.getElementById("2").classList.add("fantasticno");
    else if (broj>250 && broj<=270)document.getElementById("2").classList.add("lose");
    else if (broj>270) document.getElementById("2").classList.add("basLose");

    broj=document.getElementById("3").innerHTML;
    if (broj<=100) { document.getElementById("3").classList.add("basLose");
    }else if (broj>100 && broj<=120) { document.getElementById("3").classList.add("lose");}
    else if (broj>120 && broj<=240) document.getElementById("3").classList.add("fantasticno");
    else if (broj>240 && broj<=260)document.getElementById("3").classList.add("lose");
    else if (broj>260) document.getElementById("3").classList.add("basLose");

    broj=document.getElementById("4").innerHTML;
    if (broj<=60) { document.getElementById("4").classList.add("basLose");
    }else if (broj>60 && broj<=70) { document.getElementById("4").classList.add("lose");}
    else if (broj>70 && broj<=120) document.getElementById("4").classList.add("fantasticno");
    else if (broj>120 && broj<=130)document.getElementById("4").classList.add("lose");
    else if (broj>130) document.getElementById("4").classList.add("basLose");

    broj=document.getElementById("5").innerHTML;
    if (broj<=60) { document.getElementById("5").classList.add("basLose");
    }else if (broj>60 && broj<=70) { document.getElementById("5").classList.add("lose");}
    else if (broj>70 && broj<=135) document.getElementById("5").classList.add("fantasticno");
    else if (broj>135 && broj<=155)document.getElementById("5").classList.add("lose");
    else if (broj>155) document.getElementById("5").classList.add("basLose");

    broj=document.getElementById("6").innerHTML;
    if (broj<=75) { document.getElementById("6").classList.add("basLose");
    }else if (broj>75 && broj<=110) { document.getElementById("6").classList.add("lose");}
    else if (broj>110 && broj<=320) document.getElementById("6").classList.add("fantasticno");
    else if (broj>320 && broj<=355)document.getElementById("6").classList.add("lose");
    else if (broj>355) document.getElementById("6").classList.add("basLose");

    broj=document.getElementById("7").innerHTML;
    if (broj<=110) { document.getElementById("7").classList.add("basLose");
    }else if (broj>110 && broj<=120) { document.getElementById("7").classList.add("lose");}
    else if (broj>120 && broj<=180) document.getElementById("7").classList.add("fantasticno");
    else if (broj>180 && broj<=190)document.getElementById("7").classList.add("lose");
    else if (broj>190) document.getElementById("7").classList.add("basLose");

    broj=document.getElementById("8").innerHTML;
    if (broj<=120) { document.getElementById("8").classList.add("fantasticno");
    }else if (broj>120 && broj<=130) { document.getElementById("8").classList.add("lose");}
    else if (broj>130) document.getElementById("8").classList.add("basLose");

    broj=document.getElementById("9").innerHTML;
    if (broj==0) { document.getElementById("9").classList.add("fantasticno");
    }else if (broj==1) { document.getElementById("9").classList.add("lose");}
    else document.getElementById("9").classList.add("basLose");

    broj=document.getElementById("10").innerHTML;
    if (broj==0) { document.getElementById("10").classList.add("basLose");
    }else if (broj==1) { document.getElementById("10").classList.add("lose");}
    else if (broj==2) document.getElementById("10").classList.add("lose");
    else if (broj==3) document.getElementById("10").classList.add("fantasticno");
    else document.getElementById("10").classList.add("fantasticno");

    broj=document.getElementById("11").innerHTML;
    if (broj==1) { document.getElementById("11").classList.add("fantasticno");}
    else if (broj==2) { document.getElementById("11").classList.add("fantasticno");}
    else if (broj==3) document.getElementById("11").classList.add("lose");

    for (let j=2; j<12; j++) document.getElementById(j).classList.add("belaSlova");
}

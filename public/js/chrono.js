let dec = 0;
let sec = 0;
let maxTime=15;//in sec
let intervalId;

function timer(){
    document.getElementById('p1').innerHTML =sec + ' . ' + dec;
    intervalId = setInterval(function(){
        document.getElementById('p1').innerHTML =sec + ' . ' + dec+' / '+maxTime;
        dec += 1;
        if(dec >= 10){dec = 0; sec += 1;}
        if(sec >= 60){sec = 0; min += 1;}
        if(sec == maxTime){document.forms["quizForm"].submit();}
    }, 100); //Exécuté tous les 100 millisecondes (chaque dixième de seconde)
}

function stopTimer(){
    clearInterval(intervalId);
}
const ajax = new XMLHttpRequest();

function text(){
    var variable = document.getElementById("league").value;
   // alert(variable);
    ajax.open("GET","/phpProject2/php/league.php?league=" + variable);
    ajax.onreadystatechange=redraw;
    ajax.send();
}

function redraw(){
    document.getElementById("league_table").innerHTML=ajax.responseText;
}

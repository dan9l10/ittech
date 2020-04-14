const ajax = new XMLHttpRequest();

function text(){
    var variable = document.getElementById("league").value;
  //alert(variable);
    ajax.open("GET","../lab2/php/league.php?league=" + variable);
    ajax.onreadystatechange=redraw;
    ajax.send();
}

function redraw(){
    document.getElementById("league_table").innerHTML=ajax.responseText;
}

function xhr(){
    let date = document.getElementById("date").value;
    //alert(date);
    
    ajax.open("POST","../lab2/php/ajax_date.php");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onload=function(){
        if(ajax.status ===200){
            //console.log(ajax.response);
            let res = JSON.parse(ajax.response);
            let output="";
            for(let i in res){
                //alert(res[i].date);
                output+="<tr><td>"+res[i].date+"</td><td>"+res[i].place+"</td><td>"+res[i].league+"</td><td>"+res[i].name_team+"</td><td>"+res[i].team322+"</td><td>"+res[i].score+"</td><tr>";
            }
            let insert = document.getElementById("res");
            insert.innerHTML=output;
        }
    }
    ajax.send("date="+date);
}

function xmlhr(){
    var select = document.getElementById("name").value;
    //alert(select);
    ajax.open("POST","../lab2/php/select_game_name_xml.php");
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() 
    { 
    if(ajax.readyState === 4) { 
        if(ajax.status === 200) { 
            var res = document.getElementById("res");
        }
    } 
    var result = ""; 
    var rows = ajax.responseXML.firstChild.children; 
    for (var i= 0; i< rows.length; i++) { 
        result += "<tr>"; 
        result += "<td>" + rows[i].children[0].firstChild.nodeValue + "</td>";
        result += "<td>" + rows[i].children[1].textContent + "</td>";
        result += "<td>" + rows[i].children[2].textContent + "</td>"; 
        result += "<td>" + rows[i].children[3].textContent + "</td>"; 
        result += "<td>" + rows[i].children[4].textContent + "</td>"; 
        result += "<td>" + rows[i].children[5].textContent + "</td>"; 
        result += "</tr>"; 
    }
    //console.log(rows.length);
    res.innerHTML = result; 
    };
    ajax.send("name="+ select);
}
document.getElementById("unequally").onchange = function() { 
    document.getElementById("equal").style.display = "none";
    document.getElementById("unequal").style.display = "block"; 
} 

document.getElementById("equally").onchange = function() { 
    document.getElementById("unequal").style.display = "none";
    document.getElementById("equal").style.display = "block";
}
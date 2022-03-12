function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}

//vaidate form
function validate() {
    var v = document.forms["myform"]["email"]["password"].value;
    if (v == " ") {
        alert("Please fill form first");
        return false;
    }
}

function myFunction() {
    alert("Login succesfull!");
}
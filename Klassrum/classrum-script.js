//Global variables
let smallBench = document.getElementById('smallBench');
let bigBench = document.getElementById("bigBench");

//Animation för att öppna en kategori
let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
    let arrowParent = e.target.parentElement.parentElement;
    arrowParent.classList.toggle("showMenu");
  });
};

// Visa/dölja fönster ("smallBench")
function visablitySmall() {
  if (smallBench.style.display === "none") {
    smallBench.style.display = "block";
    bigBench.style.display = "none";
  } else {
    smallBench.style.display = "none";
  }
};

// Visa/dölja fönster ("bigBench")
function visablityBig() {
  if (bigBench.style.display === "none") {
    bigBench.style.display = "block";
    smallBench.style.display = "none";
  } else {
    bigBench.style.display = "none";
  }
};

//Skapa bord för en elev
document.getElementById("crt-Pupil").addEventListener("click", 
function() {
  //Skapa ett bord
  let smallBench = document.createElement("div");
  smallBench.id = "pupil";

  //Add styling
  smallBench.style.width = "90px";
  smallBench.style.height = "50px";
  smallBench.style.position = "absolute";
  smallBench.style.top = "70px";
  smallBench.style.left = "270px";
  smallBench.style.borderRadius = "4px";
  smallBench.style.textAlign = "center";
  smallBench.style.lineHeight = "50px";
  smallBench.style.background = "#995722";
  smallBench.style.color = "white";
  smallBench.innerHTML = document.getElementById("pupil").value;

  //Draggable function
  $(function(){
    $(smallBench).draggable({
      containment: "#home-section"
    });
  });

  //Remove smallBench function
  $(document).ready(function() {
    $(smallBench).dblclick(function(){
      $(this).hide();
    });
  });

  //Appedning the smallBench element to home-section
  document.getElementById("home-section").appendChild(smallBench);
  
  document.getElementById("pupil").value = "";
});

//Skapa bord för två elever
document.getElementById("crt-pupils").addEventListener("click", 
function() {
  //Skapa ett bord
  let bigBench = document.createElement("div");
  bigBench.id = "pupils";
  
  //Variabel för pupils
  let pupil_One = document.getElementById("pupil_One").value;
  let pupil_Two = document.getElementById("pupil_Two").value;

  //Add styling
  bigBench.style.position = "absolute";
  bigBench.style.width = "100px";
  bigBench.style.height = "90px";
  bigBench.style.top = "67px";
  bigBench.style.left = "270px";
  bigBench.style.borderRadius = "4px";
  bigBench.style.textAlign = "center";
  bigBench.style.paddingTop = "24px";
  bigBench.style.lineHeight = "20px";
  bigBench.style.background = "#995722";
  bigBench.style.color = "white";
  bigBench.innerHTML = pupil_One + "<br/>" + pupil_Two;
  //bigBench.innerHTML = document.getElementById("pupil_One").value + "<br />";
  //bigBench.innerHTML += document.getElementById("pupil_Two").value;

  //Draggable function
  $(function(){
    $(bigBench).draggable({
      containment: "#home-section"
    });
  });

  //Remove bigBench function
  $(document).ready(function() {
    $(bigBench).dblclick(function(){
      $(this).hide();
    });
  });

  //Appedning the bigBench element to home-section
  document.getElementById("home-section").appendChild(bigBench);
  
  document.getElementById("pupil_One").value = "";
  document.getElementById("pupil_Two").value = "";
});

//Remove all benches
$(document).ready(function(){
  $(".rmvPupil").click(function(){
    $("div").remove("#pupil");
    $("div").remove("#pupils");
  });
});

//Animation för att öppna en kategori
let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
    let arrowParent = e.target.parentElement.parentElement;
    arrowParent.classList.toggle("showMenu");
  })
}

document.getElementById("printClass").addEventListener("click", function(){
  window.print();
})

//Global variables
var smallWindw = document.getElementById("smallWindow");
var bigWindw = document.getElementById("bigWindow");

//Visa/dölja fönster ("SmallWindow")
function visablitySmall() {
  if (smallWindw.style.display === "none") {
    smallWindw.style.display = "block";
    bigWindw.style.display = "none";
  } else {
    smallWindw.style.display = "none";
  }
}

//Visa/dölja fönster ("BigWindow")
function visablityBig() {
  if (bigWindw.style.display === "none") {
    bigWindw.style.display = "block";
    smallWindw.style.display = "none";
  } else {
    bigWindw.style.display = "none";
  }
}

//Skapa ett bord ("OnePupil")
document.getElementById("OnePupil").addEventListener("click", function() {
  //Skapa ett bord
  var div = document.createElement("div");
  div.id = "smallDiv";

  //Add styling
  div.style.position = "absolute";
  div.style.top = "25px";
  div.style.left = "50px";
  div.style.width = "100px";
  div.style.height = "50px";
  div.style.background = "black";
  div.style.color = "white";
  div.innerHTML = document.getElementById("small-pupil").value;

  //Draggable function
  $(function(){
    $(div).draggable({
      containment: "#home-section"
    });
  });

  //Remove div function
  $(document).ready(function() {
    $(div).dblclick(function(){
      $(this).hide();
    });
  });

  //Appedning the div element to home-section
  document.getElementById("home-section").appendChild(div);

  //Hide the ("smallWindow") when creating div
  smallWindw.style.display = "none";
});

//Skapa ett större bord ("TwoPupil")
document.getElementById("TwoPupil").addEventListener("click", function() {
  //Skapa ett bord
  var bigDiv = document.createElement("div");
  bigDiv.id = "bigDiv";

  //Add styling
  bigDiv.style.position = "absolute";
  bigDiv.style.top = "25px";
  bigDiv.style.left = "300px";
  bigDiv.style.width = "100px";
  bigDiv.style.height = "90px";
  bigDiv.style.background = "black";
  bigDiv.style.color = "white";
  bigDiv.innerHTML = document.getElementById("big-pupilOne").value;
  bigDiv.innerHTML += document.getElementById("big-pupilTwo").value;

  //Draggable function
  $(function(){
    $(bigDiv).draggable({
      containment: "#home-section"
    });
  });

  //Remove div function
  $(document).ready(function() {
    $(bigDiv).dblclick(function(){
      $(this).hide();
    });
  });

  //Appedning the div element to home-section
  document.getElementById("home-section").appendChild(bigDiv);

  //Hide the ("bigWindow") when creating bigDiv
  bigWindw.style.display = "none";
});

$(document).ready(function(){
  $("#rmvPupil").click(function(){
    $("div").remove("#smallDiv");
    $("div").remove("#bigDiv");
  });
});

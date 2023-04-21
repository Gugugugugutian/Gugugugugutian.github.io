function dynamic_color(){
  // console.log("The setInterval function is running!");
  var date = new Date();
  var seconds = date.getSeconds();
  var color = Math.floor(seconds / 60 * 255).toString(16).padStart(2, "0");
  var textColor = "#" + color + color + color;
  console.log(textColor);
  var state=document.getElementsById("lar");
  console.log("state:"+state.color);
  state.color = textColor + " !important";
}

// get the width and height of the page
var width = window.innerWidth;
var height = window.innerHeight;

// // create 50 white dots
// for (var i = 0; i < 50; i++) {
//   // create a new star element
//   var star = document.createElement("div");
//   star.className = "star";

//   // set the top and left positions to random values within the page dimensions
//   star.style.top = Math.random() * height + "px";
//   star.style.left = Math.random() * width + "px";

//   // add the star element to the #stars container
//   document.getElementById("stars").appendChild(star);
// }

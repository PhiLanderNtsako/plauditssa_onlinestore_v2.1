/* Open when someone clicks on the span element */
function openNav() {
    document.getElementById("menuToggle").style.width = "100%";
  }
  
  /* Close when someone clicks on the "x" symbol inside the overlay */
  function closeNav() {
    document.getElementById("menuToggle").style.width = "0%";
  }

  /* Close when someone clicks on the "x" symbol inside the overlay */
  function openFilter() {
    document.getElementById("filter").style.display = "block";
  }

//   var slideIndex = 1;
// showSlides(slideIndex);

// // Next/previous controls
// function plusSlides(n) {
//   showSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide(n) {
//   showSlides(slideIndex = n);
// }

// function showSlides(n) {
//   var i;
//   var slides = document.getElementsByClassName("fade");
//   // var dots = document.getElementsByClassName("demo");
//   // var captionText = document.getElementById("caption");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   // for (i = 0; i < dots.length; i++) {
//   //   dots[i].className = dots[i].className.replace(" active", "");
//   // }
//   slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
//   captionText.innerHTML = dots[slideIndex-1].alt;
// } 
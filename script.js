
// SLideshow of image
document.addEventListener("DOMContentLoaded", () => {
    let slideIndex = 0;
    const slides = document.getElementsByClassName("bgImage");
    const dots = document.getElementsByClassName("dot");
  
    if (slides.length === 0) {
      console.error("No elements with class 'bgImage' found.");
      return;
    }
  
    showSlides(slideIndex);
  
    function showSlides(n) {
      slideIndex = (n + slides.length) % slides.length; 
      
      // Hide all slides and remove active class from dots
      [...slides].forEach(slide => (slide.style.display = "none"));
      [...dots].forEach(dot => dot.classList.remove("activeDot"));
  
      // Show the current slide and activate the corresponding dot
      slides[slideIndex].style.display = "block";
      if (dots.length > 0) dots[slideIndex].classList.add("activeDot");
    }
 
    window.plusSlides = (n) => showSlides(slideIndex + n);

    window.changeSlide = (n) => showSlides(n);
  });
  
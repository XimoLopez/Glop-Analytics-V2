/* 
    Slider de la librería de owlcarousel
    */
//?He añadido esta librería en un archivo separado del main.js ya que solo se va a usar en la pagina index.html y de esta forma evitamos que se cargue en página que no usen este recurso
$(".slider").owlCarousel({
  loop: true,
  autoplay: true,
  autoplayTimeout: 2000,
  autoplayHoverPause: true,
});




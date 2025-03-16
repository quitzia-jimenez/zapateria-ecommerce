document.addEventListener('DOMContentLoaded', function() {
  const imgFondo = [
    'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80', // Zapatos elegantes
    'https://images.unsplash.com/photo-1549298916-b41d501d3772?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80', // Zapatos deportivos
    'https://images.unsplash.com/photo-1560769629-975ec94e6a86?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80', // Zapatos casual
    'https://images.unsplash.com/photo-1515347619252-60a4bf4fff4f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80'  // Zapatos de mujer
  ];

  const heroSection = document.querySelector('.hero-section');
  if (heroSection) {
    imgFondo.forEach((imgUrl, index) => {
      const bgElement = document.createElement('div');
      bgElement.className = `carousel-background ${index === 0 ? 'active' : ''}`;
      bgElement.style.backgroundImage = `url(${imgUrl})`;
      heroSection.prepend(bgElement);
    });

    const backgrounds = document.querySelectorAll('.carousel-background');
    let currentIndex = 0;

    function changeBackground() {
      backgrounds.forEach(bg => bg.classList.remove('active'));
      currentIndex = (currentIndex + 1) % backgrounds.length;
      backgrounds[currentIndex].classList.add('active');
    }

    setInterval(changeBackground, 2000);
  }

  // Verificar la existencia de los elementos antes de acceder a ellos
  const elements = document.querySelectorAll('.some-element');
  if (elements.length > 0) {
    elements.forEach(element => {
      element.prepend('Some content');
    });
  }
});
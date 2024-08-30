document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.slider');
  const slides = slider.children;
  const totalSlides = slides.length;
  let currentIndex = 0;

  const nextButton = document.querySelector('.next-slide');
  const prevButton = document.querySelector('.prev-slide');

  nextButton.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % totalSlides;
      updateSlidePosition();
  });

  prevButton.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
      updateSlidePosition();
  });

  function updateSlidePosition() {
      slider.style.transform = `translateX(-${currentIndex * 100}%)`;
  }
});

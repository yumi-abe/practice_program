document.addEventListener('DOMContentLoaded', () => {
  function createSlider(sliderContainerClass, prevButtonClass, nextButtonClass) {
      const sliderContainer = document.querySelector(sliderContainerClass);
      if (!sliderContainer) {
          console.error(`Slider container not found: ${sliderContainerClass}`);
          return;
      }

      const slider = sliderContainer.querySelector('.slider');
      const slides = slider.children;
      const totalSlides = slides.length;
      let currentIndex = 0;

      const nextButton = sliderContainer.querySelector(nextButtonClass);
      const prevButton = sliderContainer.querySelector(prevButtonClass);
      const pageIndicator = sliderContainer.querySelector('.page-indicator'); // ページインジケータ

      if (!nextButton || !prevButton || !pageIndicator) {
          console.error(`Buttons or page indicator not found in: ${sliderContainerClass}`);
          return;
      }

      function updateSlidePosition() {
          slider.style.transform = `translateX(-${currentIndex * 100}%)`;
          pageIndicator.textContent = `${currentIndex + 1} / ${totalSlides}`; // ページ数の更新
      }

      nextButton.addEventListener('click', () => {
          currentIndex = (currentIndex + 1) % totalSlides;
          updateSlidePosition();
      });

      prevButton.addEventListener('click', () => {
          currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
          updateSlidePosition();
      });

      // 初回ロード時にページインジケータを表示
      updateSlidePosition();
  }

  // 現在の予約用スライダー
  createSlider('.current-reservations', '.current-prev-slide', '.current-next-slide');

  // 過去予約用スライダー
  createSlider('.past-reservations', '.past-prev-slide', '.past-next-slide');
});

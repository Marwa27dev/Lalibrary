if (!window.libraryProLoaded) {
window.libraryProLoaded = true;

document.addEventListener('DOMContentLoaded', () => {
  const animatedSelectors = [
    '.card',
    'aside',
    '.alert',
    'table',
    'form',
    '.container > h1',
    '.container > h2'
  ];

  document.querySelectorAll(animatedSelectors.join(',')).forEach((element, index) => {
    element.classList.add('library-reveal');
    element.style.transitionDelay = `${Math.min(index * 35, 280)}ms`;
  });

  const revealItems = document.querySelectorAll('.library-reveal');
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });

    revealItems.forEach((item) => observer.observe(item));
  } else {
    revealItems.forEach((item) => item.classList.add('is-visible'));
  }

  document.querySelectorAll('.card-img-top').forEach((image) => {
    image.classList.add('library-float');
  });
});
}

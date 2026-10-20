// nav toggle (mobile)
document.querySelectorAll('[data-nav-toggle]').forEach((btn) => {
  btn.addEventListener('click', () => {
    const nav = document.getElementById('site-nav');
    const open = nav.classList.toggle('site-nav--open');
    btn.setAttribute('aria-expanded', String(open));
  });
});

// split-scroll: swap the sticky side photos as the center column scrolls
const splitBlocks = document.querySelectorAll('.story-split__chapter');
const sideLeft = document.querySelector('[data-split-side="left"]');
const sideRight = document.querySelector('[data-split-side="right"]');

if (splitBlocks.length && sideLeft && sideRight && 'IntersectionObserver' in window) {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const { leftImg, leftAlt, rightImg, rightAlt, label } = entry.target.dataset;
        const leftPic = sideLeft.querySelector('img');
        const rightPic = sideRight.querySelector('img');
        if (leftImg && leftPic) {
          leftPic.src = leftImg;
          leftPic.alt = leftAlt || '';
        }
        if (rightImg && rightPic) {
          rightPic.src = rightImg;
          rightPic.alt = rightAlt || '';
        }
        if (label) {
          sideLeft.setAttribute('aria-label', label);
        }
      });
    },
    { rootMargin: '-40% 0px -40% 0px', threshold: 0 }
  );
  splitBlocks.forEach((block) => observer.observe(block));
}

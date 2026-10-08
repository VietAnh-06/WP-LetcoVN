document.addEventListener('DOMContentLoaded', () => {
  const toggle = document.querySelector('[data-menu-toggle]');
  const panel = document.querySelector('[data-menu-panel]');
  const header = document.querySelector('[data-site-header]');

  if (toggle && panel) {
    toggle.addEventListener('click', () => {
      const isOpen = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!isOpen));
      panel.classList.toggle('is-open', !isOpen);
      document.body.classList.toggle('menu-is-open', !isOpen);
    });

    panel.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => {
        toggle.setAttribute('aria-expanded', 'false');
        panel.classList.remove('is-open');
        document.body.classList.remove('menu-is-open');
      });
    });
  }

  const updateHeader = () => {
    if (header) header.classList.toggle('is-scrolled', window.scrollY > 16);
  };

  updateHeader();
  window.addEventListener('scroll', updateHeader, { passive: true });

  document.querySelectorAll('[data-hero-slider]').forEach((slider) => {
    const slides = Array.from(slider.querySelectorAll('[data-hero-slide]'));
    const dots = Array.from(slider.querySelectorAll('[data-hero-dot]'));
    const previous = slider.querySelector('[data-hero-prev]');
    const next = slider.querySelector('[data-hero-next]');
    const interval = Number.parseInt(slider.dataset.interval || '10000', 10);
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let activeIndex = 0;
    let timer = null;

    if (slides.length < 2) return;

    const showSlide = (index) => {
      activeIndex = (index + slides.length) % slides.length;
      slides.forEach((slide, slideIndex) => {
        const isActive = slideIndex === activeIndex;
        slide.classList.toggle('is-active', isActive);
        slide.setAttribute('aria-hidden', String(!isActive));
      });
      dots.forEach((dot, dotIndex) => {
        const isActive = dotIndex === activeIndex;
        dot.classList.toggle('is-active', isActive);
        dot.setAttribute('aria-current', String(isActive));
      });
    };

    const stopAutoplay = () => {
      if (timer) window.clearInterval(timer);
      timer = null;
    };

    const startAutoplay = () => {
      stopAutoplay();
      if (!reduceMotion && !document.hidden) {
        timer = window.setInterval(() => showSlide(activeIndex + 1), interval);
      }
    };

    previous?.addEventListener('click', () => {
      showSlide(activeIndex - 1);
      startAutoplay();
    });
    next?.addEventListener('click', () => {
      showSlide(activeIndex + 1);
      startAutoplay();
    });
    dots.forEach((dot, dotIndex) => {
      dot.addEventListener('click', () => {
        showSlide(dotIndex);
        startAutoplay();
      });
    });

    slider.addEventListener('mouseenter', stopAutoplay);
    slider.addEventListener('mouseleave', startAutoplay);
    slider.addEventListener('focusin', stopAutoplay);
    slider.addEventListener('focusout', startAutoplay);
    document.addEventListener('visibilitychange', startAutoplay);
    startAutoplay();
  });

  document.querySelectorAll('[data-content-carousel]').forEach((carousel) => {
    const viewport = carousel.querySelector('.content-carousel-viewport');
    const track = carousel.querySelector('[data-carousel-track]');
    const items = Array.from(track?.children || []);
    const previous = carousel.querySelector('[data-carousel-prev]');
    const next = carousel.querySelector('[data-carousel-next]');
    const dotsContainer = carousel.querySelector('[data-carousel-dots]');
    const interval = Number.parseInt(carousel.dataset.interval || '3000', 10);
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let activePage = 0;
    let pageCount = 1;
    let visibleItems = 1;
    let itemWidth = 0;
    let gap = 0;
    let timer = null;
    let resizeTimer = null;

    if (!viewport || !track || items.length < 2) return;

    const renderDots = () => {
      if (!dotsContainer) return;
      dotsContainer.replaceChildren();
      for (let index = 0; index < pageCount; index += 1) {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.setAttribute('aria-label', `Xem nhóm ${index + 1}`);
        dot.addEventListener('click', () => {
          showPage(index);
          startAutoplay();
        });
        dotsContainer.append(dot);
      }
    };

    const showPage = (page) => {
      activePage = (page + pageCount) % pageCount;
      const firstItem = Math.min(activePage * visibleItems, Math.max(0, items.length - visibleItems));
      track.style.transform = `translate3d(-${firstItem * (itemWidth + gap)}px, 0, 0)`;
      Array.from(dotsContainer?.children || []).forEach((dot, index) => {
        const isActive = index === activePage;
        dot.classList.toggle('is-active', isActive);
        dot.setAttribute('aria-current', String(isActive));
      });
    };

    const measure = () => {
      const styles = getComputedStyle(carousel);
      visibleItems = Math.max(1, Number.parseInt(styles.getPropertyValue('--carousel-visible'), 10) || 1);
      gap = Number.parseFloat(styles.getPropertyValue('--carousel-gap')) || 0;
      itemWidth = (viewport.clientWidth - gap * (visibleItems - 1)) / visibleItems;
      items.forEach((item) => {
        item.style.flexBasis = `${itemWidth}px`;
      });
      pageCount = Math.max(1, Math.ceil(items.length / visibleItems));
      activePage = Math.min(activePage, pageCount - 1);
      renderDots();
      showPage(activePage);
    };

    const stopAutoplay = () => {
      if (timer) window.clearInterval(timer);
      timer = null;
    };

    const startAutoplay = () => {
      stopAutoplay();
      if (!reduceMotion && !document.hidden && pageCount > 1) {
        timer = window.setInterval(() => showPage(activePage + 1), interval);
      }
    };

    previous?.addEventListener('click', () => {
      showPage(activePage - 1);
      startAutoplay();
    });
    next?.addEventListener('click', () => {
      showPage(activePage + 1);
      startAutoplay();
    });
    carousel.addEventListener('mouseenter', stopAutoplay);
    carousel.addEventListener('mouseleave', startAutoplay);
    carousel.addEventListener('focusin', stopAutoplay);
    carousel.addEventListener('focusout', startAutoplay);
    document.addEventListener('visibilitychange', startAutoplay);
    window.addEventListener('resize', () => {
      window.clearTimeout(resizeTimer);
      resizeTimer = window.setTimeout(() => {
        measure();
        startAutoplay();
      }, 150);
    });

    measure();
    startAutoplay();
  });
});

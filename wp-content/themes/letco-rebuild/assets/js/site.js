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

  // Long disclosures retain native details semantics, with staggered content when motion is allowed.
  const disclosureMotionOk = !window.matchMedia('(prefers-reduced-motion: reduce)').matches
    && 'animate' in Element.prototype;
  if (disclosureMotionOk) {
    document.querySelectorAll('.lp-budget-group, .lp-details--wide').forEach((details) => {
      const summary = details.querySelector('summary');
      const content = details.querySelector('.lp-budget-group-panel');
      const listItems = content
        ? Array.from(content.querySelectorAll('li'))
        : Array.from(details.querySelectorAll(':scope > p, :scope > ul > li'));
      const tableRows = content ? [] : Array.from(details.querySelectorAll(':scope > div table tr'));
      const items = listItems.length
        ? listItems
        : tableRows.length
          ? tableRows
          : Array.from(details.children).filter((child) => child !== summary);
      let animation = null;
      let itemAnimations = [];

      if (!summary || !items.length) return;

      const clearAnimation = () => {
        itemAnimations.forEach((itemAnimation) => itemAnimation.cancel());
        details.classList.remove('is-animating', 'is-closing');
        animation = null;
        itemAnimations = [];
      };

      summary.addEventListener('click', (event) => {
        event.preventDefault();
        if (animation) return;

        const startHeight = details.offsetHeight;
        const closing = details.open;

        if (!closing) details.open = true;

        const borderHeight = Number.parseFloat(getComputedStyle(details).borderTopWidth)
          + Number.parseFloat(getComputedStyle(details).borderBottomWidth);
        const endHeight = closing
          ? summary.offsetHeight + borderHeight
          : details.offsetHeight;

        details.classList.add('is-animating');
        details.classList.toggle('is-closing', closing);

        const orderedItems = closing ? [ ...items ].reverse() : items;
        const itemDuration = 180;
        const itemStagger = Math.max(
          18,
          Math.min(45, 360 / Math.max(1, orderedItems.length - 1))
        );
        const itemLead = closing ? 0 : 40;
        const totalDuration = Math.max(
          240,
          itemLead + itemDuration + Math.max(0, orderedItems.length - 1) * itemStagger
        );

        itemAnimations = orderedItems.map((item, index) => item.animate(
          closing
            ? [ { opacity: 1, transform: 'translateY(0)' }, { opacity: 0, transform: 'translateY(-10px)' } ]
            : [ { opacity: 0, transform: 'translateY(-10px)' }, { opacity: 1, transform: 'translateY(0)' } ],
          {
            duration: itemDuration,
            delay: itemLead + index * itemStagger,
            easing: 'cubic-bezier(0.2, 0.7, 0.2, 1)',
            fill: 'both',
          }
        ));

        animation = details.animate(
          { height: [ `${startHeight}px`, `${endHeight}px` ] },
          { duration: totalDuration, easing: 'cubic-bezier(0.4, 0, 0.2, 1)' }
        );
        animation.addEventListener('finish', () => {
          if (closing) details.open = false;
          clearAnimation();
        }, { once: true });
        animation.addEventListener('cancel', clearAnimation, { once: true });
      });
    });
  }

  // Daeduk opens a lightweight consultation form on entry and keeps focus inside it.
  const consultModal = document.querySelector('[data-consult-modal]');
  if (consultModal) {
    const dialog = consultModal.querySelector('[role="dialog"]');
    const closeButtons = consultModal.querySelectorAll('[data-consult-close]');
    const focusSelector = 'a[href], button:not([disabled]), input:not([type="hidden"]):not([disabled]), textarea:not([disabled]), select:not([disabled]), [tabindex]:not([tabindex="-1"])';
    const openDelay = Number.parseInt(consultModal.dataset.modalDelay || '4500', 10);
    const modalMotionOk = !window.matchMedia('(prefers-reduced-motion: reduce)').matches;
      const modalTransitionDuration = modalMotionOk ? 380 : 0;
    let previousFocus = null;
    let closeTimer = null;

      const openConsultModal = () => {
        previousFocus = document.activeElement;
        consultModal.hidden = false;
        document.body.classList.add('consult-modal-open');
        window.requestAnimationFrame(() => {
          window.requestAnimationFrame(() => {
            consultModal.classList.add('is-open');
            window.setTimeout(() => {
              const firstField = consultModal.querySelector('input:not([type="hidden"]):not([tabindex="-1"])');
              (firstField || dialog)?.focus();
            }, modalMotionOk ? 240 : 0);
          });
        });
      };

    const closeConsultModal = () => {
      consultModal.classList.remove('is-open');
      document.body.classList.remove('consult-modal-open');
      window.clearTimeout(closeTimer);
      closeTimer = window.setTimeout(() => {
        consultModal.hidden = true;
        if (previousFocus instanceof HTMLElement) previousFocus.focus();
      }, modalTransitionDuration);
    };

    closeButtons.forEach((button) => button.addEventListener('click', closeConsultModal));
    consultModal.addEventListener('keydown', (event) => {
      if (event.key === 'Escape') {
        event.preventDefault();
        closeConsultModal();
        return;
      }
      if (event.key !== 'Tab') return;

      const focusable = Array.from(consultModal.querySelectorAll(focusSelector))
        .filter((element) => element.getClientRects().length > 0);
      if (!focusable.length) return;
      const first = focusable[0];
      const last = focusable[focusable.length - 1];
      if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last.focus();
      } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first.focus();
      }
    });

    window.setTimeout(openConsultModal, openDelay);
  }

  // The fixed sign-up bar steps aside near the hero action and while a form is on screen.
  const mobileCta = document.querySelector('.lp-mobile-cta');
  if (mobileCta && 'IntersectionObserver' in window) {
    const visibleBlocks = new Set();
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) visibleBlocks.add(entry.target);
        else visibleBlocks.delete(entry.target);
      });
      mobileCta.classList.toggle('is-hidden', visibleBlocks.size > 0);
    }, {
      rootMargin: '0px 0px -12px 0px',
      threshold: 0.01,
    });
    document.querySelectorAll('form, .lp-hero .lp-actions').forEach((target) => observer.observe(target));
  }

  // Landing pages: reveal content and count figures up as they scroll into view.
  // Everything is visible without this script; motion is skipped when reduced.
  const motionOk = !window.matchMedia('(prefers-reduced-motion: reduce)').matches && 'IntersectionObserver' in window;
  if (motionOk && document.body.classList.contains('is-landing')) {
    const countUp = (node) => {
      const text = node.textContent;
      const match = text.match(/\d+/);
      if (!match) return;
      const target = Number.parseInt(match[0], 10);
      const started = performance.now();
      const tick = (now) => {
        const progress = Math.min(1, (now - started) / 900);
        const eased = 1 - (1 - progress) ** 4;
        node.textContent = text.replace(match[0], String(Math.round(target * eased)));
        if (progress < 1) requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
    };
    const revealTargets = document.querySelectorAll('.study-landing .section > .container > *, .lp-stats-list > div, .lp-bridge-figure');
    const revealer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-in');
        entry.target.querySelectorAll('[data-countup]').forEach(countUp);
        revealer.unobserve(entry.target);
      });
    }, { rootMargin: '0px 0px -8% 0px' });
    revealTargets.forEach((target) => {
      target.classList.add('lp-reveal');
      revealer.observe(target);
    });
  }
});

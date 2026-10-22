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
    document.querySelectorAll('.lp-budget-group, .lp-details, .study-accordion details, .study-documents--details, .study-lead-more, .jd-mini-details').forEach((details) => {
      const summary = details.querySelector('summary');
      const content = details.querySelector('.lp-budget-group-panel');
      const listItems = content
        ? Array.from(content.querySelectorAll('li'))
        : Array.from(details.querySelectorAll(':scope > p, :scope > ul > li, :scope > dl > div'));
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

        // A closed details box is its summary plus the box's own border and padding.
        const style = getComputedStyle(details);
        const frameHeight = ['borderTopWidth', 'borderBottomWidth', 'paddingTop', 'paddingBottom']
          .reduce((sum, key) => sum + Number.parseFloat(style[key]), 0);
        const endHeight = closing
          ? summary.offsetHeight + frameHeight
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

  // Countdown to an application deadline: ticks each second and swaps to the closed note at zero.
  document.querySelectorAll('[data-countdown]').forEach((block) => {
    const deadline = Date.parse(block.dataset.countdown);
    if (Number.isNaN(deadline)) return;
    const clock = block.querySelector('.jd-countdown-clock');
    const button = block.querySelector('.jd-button');
    const closed = block.querySelector('.jd-countdown-closed');
    const cells = {};
    block.querySelectorAll('[data-countdown-unit]').forEach((cell) => { cells[cell.dataset.countdownUnit] = cell; });
    let timer = 0;
    const tick = () => {
      const left = Math.max(0, Math.floor((deadline - Date.now()) / 1000));
      const values = { days: Math.floor(left / 86400), hours: Math.floor(left % 86400 / 3600), minutes: Math.floor(left % 3600 / 60), seconds: left % 60 };
      Object.entries(values).forEach(([unit, value]) => {
        const cell = cells[unit];
        const text = String(value).padStart(2, '0');
        if (!cell || cell.textContent === text) return;
        cell.textContent = text;
        // Restart the drop-in animation for the digit that changed.
        cell.classList.remove('is-tick');
        void cell.offsetWidth;
        cell.classList.add('is-tick');
      });
      if (left === 0) {
        window.clearInterval(timer);
        if (clock) clock.hidden = true;
        if (button) button.hidden = true;
        if (closed) closed.hidden = false;
      }
    };
    tick();
    timer = window.setInterval(tick, 1000);
  });

  // Daeduk opens a lightweight consultation form on entry and keeps focus inside it.
  const consultModal = document.querySelector('[data-consult-modal]');
  if (consultModal) {
    const dialog = consultModal.querySelector('[role="dialog"]');
    const closeButtons = consultModal.querySelectorAll('[data-consult-close]');
    const focusSelector = 'a[href], button:not([disabled]), input:not([type="hidden"]):not([disabled]), textarea:not([disabled]), select:not([disabled]), [tabindex]:not([tabindex="-1"])';
    const openDelay = Number.parseInt(consultModal.dataset.modalDelay || '0', 10);
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
              // The static preview disables and hides the fields, so only a usable one takes focus.
              const firstField = Array.from(consultModal.querySelectorAll('input:not([type="hidden"]):not([tabindex="-1"])'))
                .find((field) => !field.disabled && field.offsetParent !== null);
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

    // Pages with popup_buttons open the popup from every sign-up button; the links still point
    // at the form at the bottom, which stays in place and is used when scripts do not run.
    if (consultModal.hasAttribute('data-modal-buttons')) {
      document.addEventListener('click', (event) => {
        const link = event.target.closest('a[href="#dang-ky"]');
        if (!link || link.closest('#dang-ky') || consultModal.contains(link)) return;
        event.preventDefault();
        if (consultModal.hidden) openConsultModal();
      });
    }

    // A page with popup_delay opens the form on every visit, on every screen size.
    const isPhone = window.matchMedia('(max-width: 760px)').matches;
    if (openDelay > 0) window.setTimeout(openConsultModal, openDelay);

    // Interest trigger: open once per visit when the reader has read down to a chosen point,
    // unless they are already at the sign-up form.
    const triggerTarget = consultModal.dataset.modalTrigger && document.querySelector(consultModal.dataset.modalTrigger);
    if (triggerTarget && !isPhone && 'IntersectionObserver' in window) {
      let seen = false;
      try { seen = sessionStorage.getItem('letco-consult-shown') === '1'; } catch (error) { seen = false; }
      if (!seen) {
        const signup = document.getElementById('dang-ky');
        // Besides reading that far, the reader must have spent a while on the page;
        // the Daeduk page is short, so a quarter of a minute is enough.
        const minDwell = 10000;
        const openIfStillReading = () => {
          if (signup && (signup.contains(document.activeElement) || signup.getBoundingClientRect().top < window.innerHeight)) return;
          if (!consultModal.hidden) return;
          try { sessionStorage.setItem('letco-consult-shown', '1'); } catch (error) { /* storage unavailable */ }
          openConsultModal();
        };
        const watcher = new IntersectionObserver((entries) => {
          if (!entries.some((entry) => entry.isIntersecting)) return;
          watcher.disconnect();
          window.setTimeout(openIfStillReading, Math.max(0, minDwell - performance.now()));
        }, { rootMargin: '0px 0px -40% 0px' });
        watcher.observe(triggerTarget);
      }
    }
  }

  // Blocks that fold behind a toggle on phones and are simply open on wider screens.
  // The toggle is hidden there, so it cannot be focused or read as a collapsible control.
  const folds = document.querySelectorAll('[data-fold]');
  if (folds.length) {
    document.documentElement.classList.add('has-folds');
    const narrowQuery = window.matchMedia('(max-width: 760px)');
    // Phones start folded and keep whatever the reader opened; wider screens show everything.
    const opened = new WeakSet();
    const setFold = (fold, open) => {
      fold.classList.toggle('is-open', open);
      fold.querySelector('.lp-fold-toggle').setAttribute('aria-expanded', String(open));
      fold.querySelector('.lp-fold-body').hidden = !open;
    };
    const syncFolds = () => folds.forEach((fold) => setFold(fold, !narrowQuery.matches || opened.has(fold)));
    // Same motion as the native dropdowns: the panel eases its height while rows fade in turn.
    const foldMotionOk = !window.matchMedia('(prefers-reduced-motion: reduce)').matches && 'animate' in Element.prototype;
    const animateFold = (fold, open) => {
      const body = fold.querySelector('.lp-fold-body');
      body.getAnimations().forEach((animation) => animation.cancel());
      if (!foldMotionOk) {
        setFold(fold, open);
        return;
      }
      const rows = Array.from(body.querySelectorAll(':scope > p, :scope > ul > li, :scope > ol > li, :scope > dl > div, :scope > div > table tr, :scope > details'));
      const items = rows.length ? rows : Array.from(body.children);
      const startHeight = open ? 0 : body.offsetHeight;
      if (open) setFold(fold, true);
      // Read the open-state padding while the block still has its open class.
      const padding = getComputedStyle(body).paddingBottom;
      const endHeight = open ? body.offsetHeight : 0;
      if (!open) {
        fold.classList.remove('is-open');
        fold.querySelector('.lp-fold-toggle').setAttribute('aria-expanded', 'false');
      }
      const ordered = open ? items : [ ...items ].reverse();
      const stagger = Math.max(18, Math.min(45, 360 / Math.max(1, ordered.length - 1)));
      const lead = open ? 40 : 0;
      const duration = Math.max(240, lead + 180 + Math.max(0, ordered.length - 1) * stagger);
      body.classList.add('is-animating');
      ordered.forEach((item, index) => item.animate(
        open
          ? [ { opacity: 0, transform: 'translateY(-10px)' }, { opacity: 1, transform: 'translateY(0)' } ]
          : [ { opacity: 1, transform: 'translateY(0)' }, { opacity: 0, transform: 'translateY(-10px)' } ],
        { duration: 180, delay: lead + index * stagger, easing: 'cubic-bezier(0.2, 0.7, 0.2, 1)', fill: 'both' }
      ));
      // Padding eases with the height so the panel grows from nothing.
      const panel = body.animate(
        {
          height: [ `${startHeight}px`, `${endHeight}px` ],
          paddingBottom: open ? [ '0px', padding ] : [ padding, '0px' ],
        },
        { duration, easing: 'cubic-bezier(0.4, 0, 0.2, 1)' }
      );
      panel.onfinish = () => {
        items.forEach((item) => item.getAnimations().forEach((animation) => animation.cancel()));
        body.classList.remove('is-animating');
        if (!open) setFold(fold, false);
      };
    };
    folds.forEach((fold) => {
      fold.querySelector('.lp-fold-toggle').addEventListener('click', () => {
        if (opened.has(fold)) opened.delete(fold); else opened.add(fold);
        animateFold(fold, opened.has(fold));
      });
    });
    syncFolds();
    narrowQuery.addEventListener('change', syncFolds);
  }

  // Phone fields: check the Vietnamese number format on blur and on submit, with the message
  // right under the field. The server applies the same rule.
  document.querySelectorAll('input[data-phone]').forEach((input, index) => {
    const message = document.createElement('span');
    message.className = 'field-error';
    message.id = `phone-error-${index}`;
    message.hidden = true;
    input.insertAdjacentElement('afterend', message);
    input.setAttribute('aria-describedby', message.id);
    const check = () => {
      const value = input.value.trim();
      let text = '';
      if (value === '') text = 'Vui lòng nhập số điện thoại hoặc Zalo.';
      else if (input.validity.patternMismatch) text = 'Số điện thoại chưa đúng. Nhập số Việt Nam gồm 10 chữ số, ví dụ 0989 086 386.';
      message.textContent = text;
      message.hidden = !text;
      input.setAttribute('aria-invalid', text ? 'true' : 'false');
      return !text;
    };
    input.addEventListener('blur', () => { if (input.value.trim() !== '' || input.getAttribute('aria-invalid') === 'true') check(); });
    input.addEventListener('input', () => { if (input.getAttribute('aria-invalid') === 'true') check(); });
    // The browser blocks an invalid submit itself; show our message instead of its bubble.
    input.addEventListener('invalid', (event) => {
      event.preventDefault();
      check();
      input.focus();
    });
    input.form?.addEventListener('submit', (event) => {
      if (!check()) {
        event.preventDefault();
        input.focus();
      }
    });
  });

  // Photo row: previous/next buttons scroll one card; they disable at either end.
  document.querySelectorAll('.dk-moments-viewport').forEach((viewport) => {
    const track = viewport.querySelector('.dk-moments-track');
    const buttons = viewport.querySelectorAll('[data-moments]');
    if (!track || !buttons.length) return;
    const smooth = !window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const update = () => {
      const max = track.scrollWidth - track.clientWidth - 2;
      buttons.forEach((button) => {
        button.disabled = Number(button.dataset.moments) < 0 ? track.scrollLeft <= 2 : track.scrollLeft >= max;
      });
    };
    // Rows marked data-autoplay drift on their own and loop: the photos are repeated once
    // (hidden from assistive tech) and the scroll position wraps by one set's width.
    // Hover, focus, touch, an off-screen row or a hidden tab pauses the drift.
    const loop = viewport.hasAttribute('data-autoplay') && smooth;
    let half = 0;
    if (loop) {
      [...track.children].forEach((item) => {
        const copy = item.cloneNode(true);
        copy.setAttribute('aria-hidden', 'true');
        copy.querySelectorAll('img').forEach((img) => { img.alt = ''; });
        track.appendChild(copy);
      });
      const measure = () => { half = track.scrollWidth / 2; };
      measure();
      window.addEventListener('resize', measure);
      window.addEventListener('load', measure);
      track.style.scrollSnapType = 'none';
      let held = false;
      let inView = false;
      let resumeAt = 0;
      let last = 0;
      let position = track.scrollLeft;
      const hold = () => { resumeAt = performance.now() + 2500; };
      viewport.addEventListener('pointerenter', () => { held = true; });
      viewport.addEventListener('pointerleave', () => { held = false; hold(); });
      viewport.addEventListener('focusin', () => { held = true; });
      viewport.addEventListener('focusout', () => { held = false; hold(); });
      track.addEventListener('pointerdown', hold);
      track.addEventListener('wheel', hold, { passive: true });
      track.addEventListener('touchstart', hold, { passive: true });
      new IntersectionObserver((entries) => { inView = entries[0].isIntersecting; }).observe(viewport);
      const tick = (now) => {
        const dt = last ? Math.min(now - last, 64) : 0;
        last = now;
        if (Math.abs(track.scrollLeft - position) > 1) position = track.scrollLeft;
        if (inView && !held && !document.hidden && now > resumeAt && half) {
          position += dt * 0.03;
          if (position >= half) position -= half;
          track.scrollLeft = position;
        }
        requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
    }
    buttons.forEach((button) => button.addEventListener('click', () => {
      const card = track.querySelector('li');
      const step = card ? card.getBoundingClientRect().width + 12 : track.clientWidth * 0.8;
      const direction = Number(button.dataset.moments);
      if (loop && direction < 0 && track.scrollLeft < step) track.scrollLeft += half;
      if (loop && direction > 0 && track.scrollLeft + step >= half) track.scrollLeft -= half;
      track.scrollBy({ left: direction * step, behavior: 'smooth' });
    }));
    if (!loop) {
      track.addEventListener('scroll', update, { passive: true });
      window.addEventListener('resize', update);
      update();
    }
  });

  // Card rows with side buttons: each press moves one card; a button hides at its end.
  document.querySelectorAll('[data-carousel]').forEach((carousel) => {
    const track = carousel.querySelector('ul');
    const buttons = carousel.querySelectorAll('[data-carousel-step]');
    if (!track || !buttons.length) return;
    const update = () => {
      const max = track.scrollWidth - track.clientWidth - 8;
      buttons.forEach((button) => {
        button.disabled = Number(button.dataset.carouselStep) < 0 ? track.scrollLeft <= 8 : track.scrollLeft >= max;
      });
    };
    buttons.forEach((button) => button.addEventListener('click', () => {
      const card = track.querySelector('li');
      const gap = parseFloat(getComputedStyle(track).columnGap) || 0;
      const step = card ? card.getBoundingClientRect().width + gap : track.clientWidth * 0.8;
      track.scrollBy({ left: Number(button.dataset.carouselStep) * step });
    }));
    track.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
    update();
  });

  // A link to folded content opens it first, so the jump lands on the content itself.
  const openTarget = () => {
    const target = window.location.hash && document.getElementById(decodeURIComponent(window.location.hash.slice(1)));
    if (!target) return;
    const fold = target.closest('[data-fold]');
    const details = target.closest('details');
    let changed = false;
    if (fold && fold.querySelector('.lp-fold-body').hidden) {
      fold.querySelector('.lp-fold-toggle').click();
      changed = true;
    }
    if (details && !details.open) {
      details.open = true;
      changed = true;
    }
    if (changed) target.scrollIntoView();
  };
  openTarget();
  window.addEventListener('hashchange', openTarget);

  // The sign-up result is rendered from ?lead=; once shown, drop it from the address bar.
  const leadUrl = new URL(window.location.href);
  if (leadUrl.searchParams.has('lead')) {
    window.addEventListener('load', () => {
      leadUrl.searchParams.delete('lead');
      if (leadUrl.hash === '#form-dang-ky') leadUrl.hash = '';
      history.replaceState(history.state, '', leadUrl.pathname + leadUrl.search + leadUrl.hash);
    });
  }

  // On narrow screens the landing header tucks away while reading down and returns on scroll up.
  const landingHeader = document.querySelector('.lp-header');
  if (landingHeader) {
    const narrowQuery = window.matchMedia('(max-width: 1080px)');
    let lastY = window.scrollY;
    let ticking = false;
    // A jump to an in-page section keeps the header in place, so the section lands below it.
    let holdUntil = 0;
    document.addEventListener('click', (event) => {
      if (event.target.closest('a[href^="#"]')) {
        holdUntil = Date.now() + 1500;
        landingHeader.classList.remove('is-tucked');
      }
    });
    window.addEventListener('scroll', () => {
      if (ticking) return;
      ticking = true;
      window.requestAnimationFrame(() => {
        const y = window.scrollY;
        const tuck = narrowQuery.matches && y > 240 && y > lastY + 4 && Date.now() > holdUntil;
        if (tuck) landingHeader.classList.add('is-tucked');
        else if (y < lastY - 4 || y <= 240) landingHeader.classList.remove('is-tucked');
        lastY = y;
        ticking = false;
      });
    }, { passive: true });
    landingHeader.addEventListener('focusin', () => landingHeader.classList.remove('is-tucked'));
  }

  // The fixed sign-up bar steps aside near the hero action and while a form or the closing
  // sign-up band (which carries the same buttons) is on screen.
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
    document.querySelectorAll('form, .lp-hero .lp-actions, .lp-site-cta').forEach((target) => observer.observe(target));
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
    const revealTargets = document.querySelectorAll([
      '.study-landing .section > .container > *', '.lp-stats-list > div', '.lp-bridge-figure',
      // Other pages: article blocks that carry structure, news cards, the closing sign-up band.
      '.entry-content > :is(h2, h3, figure, table, ul, ol, .wp-block-table, .wp-block-image)',
      '.post-list > .post-card', '.lp-site-cta-inner',
    ].join(', '));
    const reveal = (target) => {
      if (target.classList.contains('is-in')) return;
      target.classList.add('is-in');
      target.querySelectorAll('[data-countup]').forEach(countUp);
      revealer.unobserve(target);
    };
    // Starts just before a block enters the screen, so it is settled by the time it is read.
    const revealer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => { if (entry.isIntersecting) reveal(entry.target); });
    }, { rootMargin: '0px 0px 15% 0px' });
    const armed = [];
    revealTargets.forEach((target) => {
      // Blocks already on screen at load are left alone.
      if (target.getBoundingClientRect().top < window.innerHeight) return;
      target.classList.add('lp-reveal');
      revealer.observe(target);
      armed.push(target);
    });
    // An anchor jump skips the scroll in between: settle everything up to the destination.
    const settleAbove = () => {
      const limit = window.scrollY + window.innerHeight * 1.5;
      armed.forEach((target) => {
        if (target.getBoundingClientRect().top + window.scrollY < limit) reveal(target);
      });
    };
    window.addEventListener('hashchange', settleAbove);
    document.addEventListener('click', (event) => {
      if (event.target.closest('a[href^="#"]')) window.setTimeout(settleAbove, 50);
    });
  }

  // Back to top: appears once the reader is a screen down; returns focus to the logo for keyboards.
  const toTop = document.querySelector('[data-to-top]');
  if (toTop) {
    toTop.hidden = false;
    const updateToTop = () => toTop.classList.toggle('is-visible', window.scrollY > window.innerHeight);
    updateToTop();
    window.addEventListener('scroll', updateToTop, { passive: true });
    toTop.addEventListener('click', () => {
      const smooth = !window.matchMedia('(prefers-reduced-motion: reduce)').matches;
      window.scrollTo({ top: 0, behavior: smooth ? 'smooth' : 'auto' });
      document.querySelector('.lp-logo')?.focus({ preventScroll: true });
    });
  }

  // Header nav: scroll to section without leaving the hash fragment in the URL bar.
  const headerNav = document.querySelector('.lp-header-nav');
  if (headerNav) {
    headerNav.addEventListener('click', (event) => {
      const link = event.target.closest('a[href^="#"]');
      if (!link) return;
      const id = link.getAttribute('href').slice(1);
      const target = id && document.getElementById(id);
      if (!target) return;
      event.preventDefault();
      const smooth = !window.matchMedia('(prefers-reduced-motion: reduce)').matches;
      target.scrollIntoView({ behavior: smooth ? 'smooth' : 'auto' });
      history.replaceState(null, '', window.location.pathname + window.location.search);
    });
  }
});

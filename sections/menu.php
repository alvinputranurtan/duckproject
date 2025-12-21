<?php $c = content(); ?>
<section class="py-20 bg-surface-dark/30" id="menu">
  <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
      <div>
        <h2 class="text-white text-3xl md:text-4xl font-black leading-tight mb-2">
          <?php echo e($c['menu']['title'] ?? 'Menu'); ?>
        </h2>
        <p class="text-gray-400">
          <?php echo e($c['menu']['subtitle'] ?? ''); ?>
        </p>
      </div>

      <!-- tombol sekarang scroll ke gallery -->
      <button
        type="button"
        class="text-primary font-bold hover:text-brand-yellow transition-colors flex items-center gap-1"
        onclick="document.getElementById('menuGallery')?.scrollIntoView({behavior:'smooth', block:'start'})"
      >
        <?php echo e($c['menu']['cta_text'] ?? 'Lihat Menu Lengkap'); ?>
        <span class="material-symbols-outlined">arrow_forward</span>
      </button>
    </div>

    <!-- Menu Andalan (grid) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach (($c['menu']['items'] ?? []) as $item) { ?>
        <article class="group bg-[#112117] rounded-3xl p-4 border border-white/5 hover:border-primary/50 transition-all hover:-translate-y-1">
          <div class="relative w-full aspect-square rounded-2xl overflow-hidden mb-4">
            <img
              src="<?php echo e($item['image'] ?? ''); ?>"
              alt="<?php echo e($item['alt'] ?? ($item['name'] ?? 'Menu')); ?>"
              class="w-full h-full object-cover"
              loading="lazy"
              width="600" height="600"
            >
            <?php if (!empty($item['badge'])) { ?>
              <div class="absolute top-3 right-3 bg-brand-yellow text-[#112117] text-xs font-bold px-3 py-1 rounded-full">
                <?php echo e($item['badge']); ?>
              </div>
            <?php } ?>
          </div>

          <?php if (!empty($c['site']['whatsapp_url'])) { ?>
            <a
              href="<?php echo e($c['site']['whatsapp_url']); ?>"
              class="w-full flex items-center justify-center h-12 rounded-full bg-primary hover:bg-primary/90 text-[#112117] text-base font-bold transition-all"
            >
              Pesan Sekarang
            </a>
          <?php } ?>
        </article>
      <?php } ?>
    </div>

    <!-- Menu Lengkap Gallery (langsung tampil) -->
    <div id="menuGallery" class="mt-12">
      <div class="flex items-center justify-between gap-4 mb-4">
        <h3 class="text-white text-2xl font-black">Menu Lengkap</h3>

        <!-- Controls -->
        <div class="hidden md:flex items-center gap-2">
          <button
            type="button"
            class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-primary text-[#112117] shadow-lg hover:opacity-90 active:scale-95 transition"
            aria-label="Sebelumnya"
            onclick="window.MenuGallery?.prev()"
          >
            <span class="material-symbols-outlined" style="font-size: 26px;">arrow_back</span>
          </button>
          <button
            type="button"
            class="inline-flex items-center justify-center w-11 h-11 rounded-full bg-primary text-[#112117] shadow-lg hover:opacity-90 active:scale-95 transition"
            aria-label="Berikutnya"
            onclick="window.MenuGallery?.next()"
          >
            <span class="material-symbols-outlined" style="font-size: 26px;">arrow_forward</span>
          </button>
        </div>
      </div>

      <!-- Wrapper -->
      <div class="relative">
        <!-- Fade edges (biar elegan) -->
        <div class="pointer-events-none absolute inset-y-0 left-0 w-10 bg-gradient-to-r from-[#0b140f] to-transparent z-10 hidden md:block"></div>
        <div class="pointer-events-none absolute inset-y-0 right-0 w-10 bg-gradient-to-l from-[#0b140f] to-transparent z-10 hidden md:block"></div>

        <!-- Carousel -->
        <div
          id="menuCarousel"
          class="flex overflow-x-auto scrollbar-hide gap-4 pb-2"
          style="scroll-behavior:smooth; scroll-snap-type:x mandatory;"
          aria-label="Galeri Menu Lengkap"
        >
          <!-- slides inserted by JS -->
        </div>
      </div>

      <!-- Indicators -->
      <div class="flex justify-center mt-3">
        <span id="imageIndicators" class="flex space-x-1"></span>
      </div>

      <!-- hint -->
      <p class="text-gray-400 text-sm mt-3 text-center">
        Geser untuk melihat menu lainnya. (HP: swipe • PC: scroll/drag)
      </p>
    </div>

  </div>
</section>

<style>
.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}
.scrollbar-hide::-webkit-scrollbar {
  display: none;
}
</style>

<script>
(function(){
  // ====== DATA (ganti ke source lain kalau mau) ======
  // Bisa kamu ambil dari content JSON juga kalau nanti kamu bikin:
  // $c['menu']['gallery_images'] (array)
  const images = [
    'assets/img/menu_1.webp',
    'assets/img/menu_2.webp',
    'assets/img/menu_3.webp',
    'assets/img/menu_4.webp',
    'assets/img/menu_5.webp',
    'assets/img/menu_6.webp',
    'assets/img/menu_7.webp',
    'assets/img/menu_8.webp'
  ];

  const carousel = document.getElementById('menuCarousel');
  const dotsWrap = document.getElementById('imageIndicators');
  if (!carousel || !dotsWrap) return;

  let current = 0;
  let settleTimer = null;
  let autoTimer = null;
  let isUserInteracting = false;

  // ====== CONFIG ======
  const SLIDE_ASPECT = 'aspect-[4/3]'; // ganti 'aspect-square' kalau mau 1:1
  const AUTO_INTERVAL_MS = 2600;       // kecepatan auto slide
  const AUTO_RESUME_MS   = 3500;       // resume setelah user interaksi

  // ====== RENDER ======
  function renderSlides(){
    carousel.innerHTML = '';
    images.forEach((src, idx) => {
      const slide = document.createElement('div');
      // 1 slide = 1 gambar besar
      slide.className = `flex-shrink-0 w-[88%] sm:w-[70%] lg:w-[55%] ${SLIDE_ASPECT} rounded-2xl overflow-hidden bg-white/5 border border-white/10`;
      slide.style.scrollSnapAlign = 'center';

      slide.innerHTML = `
        <img src="${src}" alt="Menu ${idx+1}" loading="lazy"
             class="w-full h-full object-contain bg-black/20">
      `;
      carousel.appendChild(slide);
    });
  }

  function buildDots(){
    dotsWrap.innerHTML = '';
    images.forEach((_, idx) => {
      const b = document.createElement('button');
      b.type = 'button';
      b.className = 'w-2.5 h-2.5 rounded-full transition-colors bg-gray-500';
      b.dataset.index = String(idx);
      b.onclick = () => scrollTo(idx, true);
      dotsWrap.appendChild(b);
    });
  }

  function setDotActive(idx){
    const dots = dotsWrap.children;
    for (let i=0;i<dots.length;i++){
      dots[i].classList.toggle('bg-primary', i===idx);
      dots[i].classList.toggle('bg-gray-500', i!==idx);
    }
  }

  function slideWidth(){
    // karena slide tidak full width, pakai offsetLeft slide target (lebih akurat)
    const slide = carousel.children[current];
    if (!slide) return 0;
    return slide.offsetLeft;
  }

  function scrollTo(idx, smooth){
    idx = (idx + images.length) % images.length;
    const slide = carousel.children[idx];
    if (!slide) return;

    current = idx;
    setDotActive(current);

    carousel.scrollTo({
      left: slide.offsetLeft,
      behavior: smooth ? 'smooth' : 'auto'
    });
  }

  // ====== NAV API ======
  window.MenuGallery = {
    next: () => scrollTo(current + 1, true),
    prev: () => scrollTo(current - 1, true),
    go:   (i) => scrollTo(i, true)
  };

  // ====== SETTLE INDEX (tanpa kedip) ======
  function computeIndex(){
    // cari slide yang paling dekat ke tengah viewport carousel
    const cx = carousel.scrollLeft + carousel.clientWidth / 2;
    let bestIdx = 0;
    let bestDist = Infinity;
    for (let i=0;i<carousel.children.length;i++){
      const el = carousel.children[i];
      const mid = el.offsetLeft + el.clientWidth / 2;
      const dist = Math.abs(mid - cx);
      if (dist < bestDist){ bestDist = dist; bestIdx = i; }
    }
    return bestIdx;
  }

  function settle(){
    const idx = computeIndex();
    if (idx !== current){
      current = idx;
      setDotActive(current);
    } else {
      setDotActive(current);
    }
  }

  carousel.addEventListener('scroll', () => {
    clearTimeout(settleTimer);
    settleTimer = setTimeout(settle, 120);
  }, { passive: true });

  // ====== USER INTERACTION DETECT ======
  const pauseAuto = () => {
    isUserInteracting = true;
    stopAuto();
    clearTimeout(window.__menuAutoResume);
    window.__menuAutoResume = setTimeout(() => {
      isUserInteracting = false;
      startAuto();
    }, AUTO_RESUME_MS);
  };

  // hover / pointer
  carousel.addEventListener('pointerdown', pauseAuto);
  carousel.addEventListener('wheel', pauseAuto, { passive: true });
  carousel.addEventListener('touchstart', pauseAuto, { passive: true });
  carousel.addEventListener('mouseenter', pauseAuto);

  // ====== AUTO SCROLL (slide by slide) ======
  function startAuto(){
    stopAuto();
    if (images.length <= 1) return;

    autoTimer = setInterval(() => {
      if (isUserInteracting) return;
      scrollTo(current + 1, true);
    }, AUTO_INTERVAL_MS);
  }

  function stopAuto(){
    if (autoTimer){
      clearInterval(autoTimer);
      autoTimer = null;
    }
  }

  // ====== INIT ======
  renderSlides();
  buildDots();
  setDotActive(0);

  // posisi awal pas load (tanpa smooth)
  requestAnimationFrame(() => scrollTo(0, false));
  startAuto();

  // resize: snap kembali ke slide aktif
  window.addEventListener('resize', () => scrollTo(current, false));
})();
</script>

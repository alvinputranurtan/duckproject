<?php $c = content(); ?>
<section id="beranda" class="relative w-full min-h-[85vh] flex items-center justify-center overflow-hidden">
  <div class="absolute inset-0">
    <img
      src="<?php echo e($c['hero']['image']); ?>"
      alt="<?php echo e($c['hero']['image_alt']); ?>"
      class="w-full h-full object-cover"
      width="1920" height="1080"
      fetchpriority="high"
    >
    <div class="absolute inset-0 bg-gradient-to-b from-[#112117]/70 to-[#112117]/95"></div>
  </div>

  <div class="relative z-10 max-w-[1280px] w-full mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center text-center">
    <h1 class="text-white text-5xl sm:text-6xl md:text-7xl font-black leading-tight tracking-tight mb-4">
      <?php echo e($c['hero']['headline_line1']); ?><br>
      <span class="text-brand-yellow"><?php echo e($c['hero']['headline_line2']); ?></span>
    </h1>

    <p class="text-gray-300 text-lg sm:text-xl font-normal max-w-2xl mx-auto mb-10 leading-relaxed">
      <?php echo e($c['hero']['subtitle']); ?>
      <span class="text-primary font-bold"><?php echo e($c['site']['tagline'] ?? ''); ?></span>
    </p>

    <div class="flex flex-wrap items-center justify-center gap-4">
      <?php if (!empty($c['site']['whatsapp_url'])) { ?>
        <a href="<?php echo e($c['site']['whatsapp_url']); ?>"
           class="flex items-center justify-center h-14 px-8 rounded-full bg-primary hover:bg-primary/90 text-[#112117] text-base font-bold transition-all transform hover:scale-105 shadow-[0_0_20px_rgba(48,232,122,0.4)]">
          Pesan Sekarang
        </a>
      <?php } ?>

      <a href="#menu"
         class="flex items-center justify-center h-14 px-8 rounded-full bg-surface-dark/50 hover:bg-surface-dark border border-white/20 text-white text-base font-bold transition-all backdrop-blur-sm hover:border-brand-yellow hover:text-brand-yellow">
        Lihat Menu
      </a>
    </div>
  </div>
</section>

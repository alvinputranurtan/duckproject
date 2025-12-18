<?php $c = content(); ?>
<section class="py-20 bg-[#112117]" id="tentang">
  <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
      <div class="w-full lg:w-1/2 relative">
        <div class="absolute -top-4 -left-4 w-24 h-24 border-t-4 border-l-4 border-brand-yellow rounded-tl-3xl opacity-50"></div>
        <div class="absolute -bottom-4 -right-4 w-24 h-24 border-b-4 border-r-4 border-primary rounded-br-3xl opacity-50"></div>

        <div class="relative w-full aspect-video lg:aspect-square rounded-2xl overflow-hidden shadow-2xl">
          <img
            src="<?php echo e($c['about']['image']); ?>"
            alt="<?php echo e($c['about']['image_alt']); ?>"
            class="w-full h-full object-cover"
            loading="lazy"
            width="1200" height="1200"
          >
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
        </div>
      </div>

      <div class="w-full lg:w-1/2 flex flex-col gap-6">
        <div class="flex flex-col gap-2">
          <h2 class="text-brand-yellow font-bold uppercase tracking-wider text-sm"><?php echo e($c['about']['kicker']); ?></h2>
          <p class="text-white text-3xl md:text-4xl font-black leading-tight"><?php echo e($c['about']['title']); ?></p>
        </div>

        <?php foreach (($c['about']['paragraphs'] ?? []) as $p) { ?>
          <p class="text-gray-300 text-base leading-relaxed"><?php echo e($p); ?></p>
        <?php } ?>

        <?php if (!empty($c['about']['cta_text'])) { ?>
          <div class="pt-4">
            <a href="#lokasi" class="inline-flex items-center justify-center h-12 px-8 rounded-full border border-primary text-primary hover:bg-primary hover:text-[#112117] font-bold transition-all">
              <?php echo e($c['about']['cta_text']); ?>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

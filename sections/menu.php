<?php $c = content(); ?>
<section class="py-20 bg-surface-dark/30" id="menu">
  <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
      <div>
        <h2 class="text-white text-3xl md:text-4xl font-black leading-tight mb-2"><?php echo e($c['menu']['title']); ?></h2>
        <p class="text-gray-400"><?php echo e($c['menu']['subtitle']); ?></p>
      </div>
      <a class="text-primary font-bold hover:text-brand-yellow transition-colors flex items-center gap-1" href="#lokasi">
        <?php echo e($c['menu']['cta_text']); ?> <span class="material-symbols-outlined">arrow_forward</span>
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach (($c['menu']['items'] ?? []) as $item) { ?>
        <article class="group bg-[#112117] rounded-3xl p-4 border border-white/5 hover:border-primary/50 transition-all hover:-translate-y-1">
          <div class="relative w-full aspect-square rounded-2xl overflow-hidden mb-4">
            <img
              src="<?php echo e($item['image']); ?>"
              alt="<?php echo e($item['alt']); ?>"
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

          <div class="flex flex-col gap-2">
            <h3 class="text-white text-lg font-bold group-hover:text-primary transition-colors"><?php echo e($item['name']); ?></h3>
            <p class="text-gray-400 text-xs line-clamp-2"><?php echo e($item['desc']); ?></p>

            <div class="flex items-center justify-between mt-2">
              <span class="text-primary font-bold text-lg"><?php echo e(rupiah((int) $item['price'])); ?></span>

              <?php if (!empty($c['site']['whatsapp_url'])) { ?>
                <a class="size-8 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-primary hover:text-[#112117] transition-colors"
                   href="<?php echo e($c['site']['whatsapp_url']); ?>"
                   aria-label="Pesan <?php echo e($item['name']); ?>">
                  <span class="material-symbols-outlined text-sm">add</span>
                </a>
              <?php } ?>
            </div>
          </div>
        </article>
      <?php } ?>
    </div>
  </div>
</section>

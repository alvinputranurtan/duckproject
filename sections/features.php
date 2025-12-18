<?php $c = content(); ?>
<section class="py-16 bg-background-dark">
  <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php foreach (($c['features'] ?? []) as $f) { ?>
        <div class="flex flex-col items-center text-center p-6 rounded-2xl bg-surface-dark border border-white/5 hover:border-brand-yellow/30 transition-colors">
          <div class="size-16 rounded-full bg-brand-yellow/10 flex items-center justify-center mb-4 text-brand-yellow">
            <span class="material-symbols-outlined text-4xl"><?php echo e($f['icon']); ?></span>
          </div>
          <h3 class="text-white text-xl font-bold mb-2"><?php echo e($f['title']); ?></h3>
          <p class="text-gray-400 text-sm leading-relaxed"><?php echo e($f['desc']); ?></p>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

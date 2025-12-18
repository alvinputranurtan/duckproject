<?php $c = content(); ?>
<section class="py-20 bg-background-dark" id="lokasi">
  <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-surface-dark rounded-3xl p-8 lg:p-12 border border-white/5 overflow-hidden relative">
      <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>

      <div class="flex flex-col lg:flex-row gap-12 relative z-10">
        <div class="flex-1 flex flex-col justify-center gap-8">
          <div>
            <h2 class="text-white text-3xl font-black mb-4"><?php echo e($c['location']['title']); ?></h2>
            <p class="text-gray-300"><?php echo e($c['location']['subtitle']); ?></p>
          </div>

          <div class="flex flex-col gap-6">
            <div class="flex items-start gap-4">
              <div class="size-10 rounded-full bg-brand-yellow/20 text-brand-yellow flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined">location_on</span>
              </div>
              <div>
                <h3 class="text-white font-bold mb-1">Alamat</h3>
                <p class="text-gray-400 text-sm"><?php echo e($c['location']['address']); ?></p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="size-10 rounded-full bg-primary/20 text-primary flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined">schedule</span>
              </div>
              <div>
                <h3 class="text-white font-bold mb-1">Jam Buka</h3>
                <p class="text-gray-400 text-sm"><?php echo e($c['location']['hours_text']); ?></p>
              </div>
            </div>

            <div class="flex items-start gap-4">
              <div class="size-10 rounded-full bg-green-500/20 text-green-500 flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined">chat</span>
              </div>
              <div>
                <h3 class="text-white font-bold mb-1">Pemesanan</h3>
                <?php if (!empty($c['site']['whatsapp_url'])) { ?>
                  <a class="inline-flex items-center gap-2 text-brand-yellow font-bold hover:underline"
                     href="<?php echo e($c['site']['whatsapp_url']); ?>">
                    Chat WhatsApp <span class="material-symbols-outlined text-sm">open_in_new</span>
                  </a>
                <?php } else { ?>
                  <p class="text-gray-400 text-sm">Isi link WhatsApp di content/site.json</p>
                <?php } ?>
              </div>
            </div>
          </div>

          <div class="mt-4">
            <?php if (!empty($c['site']['whatsapp_url'])) { ?>
              <a class="w-full sm:w-auto h-12 px-8 rounded-full bg-brand-yellow hover:bg-brand-yellow/90 text-[#112117] font-bold inline-flex items-center justify-center gap-2 transition-all shadow-lg shadow-brand-yellow/20"
                 href="<?php echo e($c['site']['whatsapp_url']); ?>">
                <span class="material-symbols-outlined">call</span>
                Hubungi Kami via WhatsApp
              </a>
            <?php } ?>
          </div>
        </div>

        <div class="flex-1 min-h-[300px] bg-gray-800 rounded-2xl overflow-hidden relative group">
          <img
            src="<?php echo e($c['location']['map_image']); ?>"
            alt="<?php echo e($c['location']['map_alt']); ?>"
            class="w-full h-full object-cover opacity-70 grayscale invert"
            loading="lazy"
            width="1200" height="800"
          >
          <div class="absolute inset-0 flex items-center justify-center">
            <?php if (!empty($c['site']['maps_url'])) { ?>
              <a href="<?php echo e($c['site']['maps_url']); ?>"
                 class="bg-primary text-[#112117] px-6 py-3 rounded-full font-bold shadow-xl hover:scale-105 transition-transform inline-flex items-center gap-2">
                <span class="material-symbols-outlined">map</span>
                Buka di Google Maps
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $c = content();
$year = (int) date('Y'); ?>
<footer class="bg-[#051a0d] pt-16 pb-8 border-t border-white/5 mt-auto">
  <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col items-center justify-center text-center gap-8 mb-12">
      <div class="flex items-center gap-3">
<div class="size-8 rounded-full overflow-hidden bg-brand-yellow flex items-center justify-center">
<img
  src="assets/img/logo.png"
  alt="<?php echo e($c['site']['name'] ?? 'Logo'); ?>"
  class="w-full h-full object-contain"
  width="32" height="32"
/>

</div>



        <h2 class="text-white text-lg font-bold"><?php echo e($c['site']['name'] ?? 'Bebek Pak Eko'); ?></h2>
      </div>

      <div class="flex gap-8 flex-wrap justify-center">
        <a class="text-gray-400 hover:text-primary transition-colors text-sm" href="#beranda">Beranda</a>
        <a class="text-gray-400 hover:text-primary transition-colors text-sm" href="#tentang">Tentang</a>
        <a class="text-gray-400 hover:text-primary transition-colors text-sm" href="#menu">Menu</a>
        <a class="text-gray-400 hover:text-primary transition-colors text-sm" href="#lokasi">Lokasi</a>
        <a class="text-gray-400 hover:text-primary transition-colors text-sm" href="privacy-policy.php">Kebijakan Privasi</a>
        <a class="text-gray-400 hover:text-primary transition-colors text-sm" href="terms-of-service.php">Syarat dan Ketentuan</a>
        <a class="text-gray-400 hover:text-primary transition-colors text-sm" href="data-deletion-instructions.php">Petunjuk Penghapusan Data</a>
      </div>

      <div class="flex gap-4">
        <?php if (!empty($c['site']['instagram_url'])) { ?>
          <a class="size-10 rounded-full bg-white/5 flex items-center justify-center text-white hover:bg-primary hover:text-[#112117] transition-all"
             href="<?php echo e($c['site']['instagram_url']); ?>" aria-label="Instagram">
            <span class="material-symbols-outlined text-lg">photo_camera</span>
          </a>
        <?php } ?>

        <?php if (!empty($c['site']['website_url'])) { ?>
          <a class="size-10 rounded-full bg-white/5 flex items-center justify-center text-white hover:bg-primary hover:text-[#112117] transition-all"
             href="<?php echo e($c['site']['website_url']); ?>" aria-label="Website">
            <span class="material-symbols-outlined text-lg">public</span>
          </a>
        <?php } ?>
      </div>
    </div>

    <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
      <p class="text-gray-500 text-xs">© <?php echo $year; ?> <?php echo e($c['site']['name'] ?? 'Bebek Goreng Pak Eko'); ?>. All rights reserved.</p>
      <div class="flex gap-6">
        <a class="text-gray-500 hover:text-gray-300 text-xs" href="<?php echo e($c['site']['privacy_url'] ?? '#'); ?>">Privacy Policy</a>
        <a class="text-gray-500 hover:text-gray-300 text-xs" href="<?php echo e($c['site']['terms_url'] ?? '#'); ?>">Terms of Service</a>
        <a class="text-gray-500 hover:text-gray-300 text-xs" href="data-deletion-instructions.php">Data Deletion</a>
      </div>
    </div>
  </div>
</footer>

</div>
</body>
</html>

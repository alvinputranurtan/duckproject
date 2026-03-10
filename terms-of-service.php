<?php

declare(strict_types=1);

require __DIR__.'/lib/content.php';
require __DIR__.'/lib/seo.php';

// Override title untuk halaman ini
$c['seo']['title'] = 'Syarat dan Ketentuan - ' . ($c['site']['name'] ?? 'Bebek Goreng Pak Eko');
$c['seo']['description'] = 'Pelajari syarat dan ketentuan penggunaan layanan di Bebek Goreng Pak Eko.';

require __DIR__.'/partials/header.php';

?>

<section class="py-20 bg-surface-dark/30">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-white text-4xl md:text-5xl font-black leading-tight mb-8 text-center">
      Syarat dan Ketentuan
    </h1>

    <div class="prose prose-lg prose-invert max-w-none">
      <p class="text-gray-300 mb-6">
        Terakhir diperbarui: <?php echo date('d F Y'); ?>
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">1. Penerimaan Syarat</h2>
      <p class="text-gray-300 mb-6">
        Dengan mengakses dan menggunakan situs web atau layanan Bebek Goreng Pak Eko, Anda menyetujui untuk terikat oleh syarat dan ketentuan ini. Jika Anda tidak setuju, harap jangan gunakan layanan kami.
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">2. Penggunaan Layanan</h2>
      <p class="text-gray-300 mb-6">
        Layanan kami tersedia untuk individu yang berusia minimal 18 tahun atau di bawah pengawasan orang tua. Anda setuju untuk menggunakan layanan kami hanya untuk tujuan yang sah dan tidak melanggar hukum.
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">3. Pesanan dan Pembayaran</h2>
      <p class="text-gray-300 mb-6">
        Semua pesanan tunduk pada ketersediaan. Harga dapat berubah tanpa pemberitahuan sebelumnya. Pembayaran harus dilakukan sesuai metode yang disediakan.
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">4. Pembatalan dan Pengembalian</h2>
      <p class="text-gray-300 mb-6">
        Pesanan dapat dibatalkan dalam waktu 24 jam setelah pemesanan. Pengembalian dana akan diproses sesuai kebijakan kami.
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">5. Tanggung Jawab</h2>
      <p class="text-gray-300 mb-6">
        Kami tidak bertanggung jawab atas kerugian tidak langsung, insidental, atau konsekuensial yang timbul dari penggunaan layanan kami. Penggunaan layanan atas risiko Anda sendiri.
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">6. Perubahan Syarat</h2>
      <p class="text-gray-300 mb-6">
        Kami berhak mengubah syarat dan ketentuan ini kapan saja. Perubahan akan diposting di halaman ini.
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">7. Kontak Kami</h2>
      <p class="text-gray-300 mb-6">
        Jika Anda memiliki pertanyaan, silakan hubungi kami di:
      </p>
      <ul class="text-gray-300 mb-6 list-disc list-inside">
        <li>Email: <?php echo e($c['site']['email'] ?? 'info@bebekgorengpakeko.id'); ?></li>
        <li>Telepon: <?php echo e($c['site']['phone'] ?? ''); ?></li>
        <li>Alamat: <?php echo e($c['location']['address'] ?? ''); ?></li>
      </ul>
    </div>
  </div>
</section>

<?php require __DIR__.'/partials/footer.php'; ?>
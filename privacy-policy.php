<?php

declare(strict_types=1);

require __DIR__.'/lib/content.php';
require __DIR__.'/lib/seo.php';

// Override title untuk halaman ini
$c['seo']['title'] = 'Kebijakan Privasi - ' . ($c['site']['name'] ?? 'Bebek Goreng Pak Eko');
$c['seo']['description'] = 'Pelajari tentang kebijakan privasi kami di Bebek Goreng Pak Eko. Kami berkomitmen untuk melindungi data pribadi Anda.';

require __DIR__.'/partials/header.php';

?>

<section class="py-20 bg-surface-dark/30">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-white text-4xl md:text-5xl font-black leading-tight mb-8 text-center">
      Kebijakan Privasi
    </h1>

    <div class="prose prose-lg prose-invert max-w-none">
      <p class="text-gray-300 mb-6">
        Terakhir diperbarui: <?php echo date('d F Y'); ?>
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">1. Pengumpulan Informasi</h2>
      <p class="text-gray-300 mb-6">
        Kami mengumpulkan informasi yang Anda berikan secara langsung kepada kami, seperti saat Anda menghubungi kami melalui WhatsApp, email, atau formulir di situs web. Informasi ini dapat mencakup nama, nomor telepon, alamat email, dan detail pesanan.
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">2. Penggunaan Informasi</h2>
      <p class="text-gray-300 mb-6">
        Informasi yang kami kumpulkan digunakan untuk:
      </p>
      <ul class="text-gray-300 mb-6 list-disc list-inside">
        <li>Memproses pesanan Anda</li>
        <li>Menyediakan layanan pelanggan</li>
        <li>Mengirim pembaruan tentang produk dan layanan kami</li>
        <li>Meningkatkan pengalaman pengguna di situs web kami</li>
      </ul>

      <h2 class="text-white text-2xl font-bold mb-4">3. Berbagi Informasi</h2>
      <p class="text-gray-300 mb-6">
        Kami tidak menjual, memperdagangkan, atau menyewakan informasi pribadi Anda kepada pihak ketiga. Informasi hanya dibagikan jika diperlukan untuk memproses pesanan atau sesuai dengan hukum yang berlaku.
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">4. Keamanan Data</h2>
      <p class="text-gray-300 mb-6">
        Kami menerapkan langkah-langkah keamanan yang wajar untuk melindungi informasi pribadi Anda dari akses, penggunaan, atau pengungkapan yang tidak sah.
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">5. Hak Anda</h2>
      <p class="text-gray-300 mb-6">
        Anda memiliki hak untuk mengakses, memperbarui, atau menghapus informasi pribadi Anda. Jika Anda ingin melakukannya, silakan hubungi kami melalui informasi kontak di bawah.
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">6. Perubahan Kebijakan</h2>
      <p class="text-gray-300 mb-6">
        Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Perubahan akan diposting di halaman ini dengan tanggal pembaruan.
      </p>

      <h2 class="text-white text-2xl font-bold mb-4">7. Kontak Kami</h2>
      <p class="text-gray-300 mb-6">
        Jika Anda memiliki pertanyaan tentang kebijakan privasi ini, silakan hubungi kami di:
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
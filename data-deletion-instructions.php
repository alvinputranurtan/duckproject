<?php

declare(strict_types=1);

require __DIR__.'/lib/content.php';
require __DIR__.'/lib/seo.php';

// Override meta untuk halaman ini
$c = content();
$c['seo']['title'] = 'Petunjuk Penghapusan Data - ' . ($c['site']['name'] ?? 'Bebek Goreng Pak Eko');
$c['seo']['description'] = 'Panduan permintaan penghapusan data pribadi pelanggan pada layanan Bebek Goreng Pak Eko.';

require __DIR__.'/partials/header.php';

$siteName = $c['site']['name'] ?? 'Bebek Goreng Pak Eko';
$phone = $c['site']['phone_international'] ?? ($c['site']['phone'] ?? '-');
$address = $c['location']['address'] ?? 'Alamat usaha tersedia pada halaman lokasi';
?>

<section class="py-20 bg-surface-dark/30">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-[2rem] border border-white/10 bg-[#112117]/90 overflow-hidden shadow-2xl">
      <div class="px-6 py-10 sm:px-10 lg:px-14 border-b border-white/10 bg-gradient-to-br from-primary/10 via-transparent to-brand-yellow/10">
        <p class="text-brand-yellow text-sm font-bold uppercase tracking-[0.2em] mb-3">Legal</p>
        <h1 class="text-white text-4xl md:text-5xl font-black leading-tight">Petunjuk Penghapusan Data</h1>
        <p class="text-gray-300 text-base md:text-lg mt-4 max-w-3xl leading-relaxed">
          Halaman ini menjelaskan cara mengajukan permintaan penghapusan data pribadi yang pernah Anda berikan kepada
          <?php echo e($siteName); ?> melalui WhatsApp, formulir kontak, atau kanal pemesanan lainnya.
        </p>
        <p class="text-gray-400 text-sm mt-4">Terakhir diperbarui: <?php echo date('d F Y'); ?></p>
      </div>

      <div class="px-6 py-10 sm:px-10 lg:px-14 space-y-10">
        <section>
          <h2 class="text-white text-2xl font-black mb-3">1. Data yang Dapat Dihapus</h2>
          <p class="text-gray-300 leading-relaxed">
            Anda dapat mengajukan penghapusan data pribadi yang kami simpan, seperti nama, nomor telepon, alamat
            pengantaran, riwayat percakapan layanan pelanggan, dan catatan pesanan, sepanjang data tersebut tidak
            diwajibkan untuk tetap disimpan oleh ketentuan hukum yang berlaku.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">2. Cara Mengajukan Permintaan</h2>
          <p class="text-gray-300 leading-relaxed mb-4">
            Kirim permintaan penghapusan data melalui kontak resmi dengan menyertakan informasi berikut:
          </p>
          <ul class="list-disc list-inside space-y-2 text-gray-300 leading-relaxed">
            <li>nama lengkap;</li>
            <li>nomor telepon yang pernah digunakan saat pemesanan/komunikasi;</li>
            <li>rincian data yang ingin dihapus;</li>
            <li>alasan singkat permintaan (opsional, namun membantu verifikasi).</li>
          </ul>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">3. Proses Verifikasi</h2>
          <p class="text-gray-300 leading-relaxed">
            Untuk melindungi privasi pelanggan, kami dapat melakukan verifikasi identitas sebelum memproses permintaan.
            Verifikasi dilakukan dengan membandingkan data permintaan dengan data yang tersedia di sistem komunikasi atau
            catatan layanan agar penghapusan tidak dilakukan terhadap data milik pihak lain.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">4. Waktu Penanganan</h2>
          <p class="text-gray-300 leading-relaxed">
            Permintaan yang valid akan diproses dalam waktu maksimal 14 (empat belas) hari kerja sejak verifikasi selesai.
            Jika diperlukan waktu tambahan karena kompleksitas permintaan, kami akan memberi pemberitahuan melalui kanal
            komunikasi yang Anda gunakan saat mengajukan permintaan.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">5. Kondisi Pengecualian</h2>
          <p class="text-gray-300 leading-relaxed">
            Dalam kondisi tertentu, sebagian data mungkin tetap kami simpan untuk memenuhi kewajiban hukum, penyelesaian
            sengketa, pencegahan penipuan, audit internal, atau kepentingan pembuktian transaksi yang sah.
          </p>
        </section>

        <section class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <h2 class="text-white text-2xl font-black mb-3">6. Kontak Permintaan Penghapusan Data</h2>
          <p class="text-gray-300 leading-relaxed">
            Untuk mengajukan permintaan, silakan hubungi:
          </p>
          <div class="mt-4 space-y-2 text-gray-300">
            <p><?php echo e($siteName); ?></p>
            <p>Telepon/WhatsApp: <?php echo e($phone); ?></p>
            <p>Alamat: <?php echo e($address); ?></p>
          </div>
        </section>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__.'/partials/footer.php'; ?>

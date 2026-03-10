<?php

declare(strict_types=1);

require __DIR__.'/lib/content.php';
require __DIR__.'/lib/seo.php';

// Override meta untuk halaman ini
$c = content();
$c['seo']['title'] = 'Syarat dan Ketentuan - ' . ($c['site']['name'] ?? 'Bebek Goreng Pak Eko');
$c['seo']['description'] = 'Syarat dan ketentuan penggunaan situs, informasi menu, serta pemesanan Bebek Goreng Pak Eko.';

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
        <h1 class="text-white text-4xl md:text-5xl font-black leading-tight">Syarat dan Ketentuan</h1>
        <p class="text-gray-300 text-base md:text-lg mt-4 max-w-3xl leading-relaxed">
          Syarat ini mengatur penggunaan situs <?php echo e($siteName); ?>, informasi menu dan cabang, serta
          interaksi pemesanan yang dilakukan melalui WhatsApp atau platform pemesanan pihak ketiga.
        </p>
        <p class="text-gray-400 text-sm mt-4">Terakhir diperbarui: <?php echo date('d F Y'); ?></p>
      </div>

      <div class="px-6 py-10 sm:px-10 lg:px-14 space-y-10">
        <section>
          <h2 class="text-white text-2xl font-black mb-3">1. Persetujuan Penggunaan</h2>
          <p class="text-gray-300 leading-relaxed">
            Dengan mengakses situs ini, Anda dianggap telah membaca, memahami, dan menyetujui syarat dan ketentuan yang berlaku.
            Jika Anda tidak setuju dengan sebagian atau seluruh isi halaman ini, Anda disarankan untuk tidak menggunakan situs
            atau melanjutkan proses pemesanan melalui tautan yang tersedia.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">2. Informasi Menu dan Harga</h2>
          <p class="text-gray-300 leading-relaxed">
            Kami berupaya menampilkan informasi menu, foto, harga, dan ketersediaan cabang secara akurat. Namun, seluruh informasi
            di situs ini bersifat informatif dan dapat berubah sewaktu-waktu sesuai kondisi operasional, stok bahan baku, promo,
            dan kebijakan masing-masing cabang. Konfirmasi akhir pesanan tetap mengikuti informasi yang disampaikan saat proses transaksi.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">3. Pemesanan dan Konfirmasi</h2>
          <p class="text-gray-300 leading-relaxed">
            Pemesanan dapat dilakukan melalui WhatsApp, kunjungan langsung ke cabang, atau melalui platform pemesanan yang terhubung.
            Pesanan dianggap diterima setelah ada konfirmasi dari pihak cabang atau sistem platform yang Anda gunakan. Waktu pelayanan,
            biaya tambahan, area pengantaran, dan metode pembayaran dapat berbeda antar cabang maupun antar platform.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">4. Tautan Pihak Ketiga</h2>
          <p class="text-gray-300 leading-relaxed">
            Situs ini dapat mengarahkan Anda ke layanan pihak ketiga seperti WhatsApp, Google Maps, GoFood, GrabFood, dan ShopeeFood.
            Setiap transaksi, akun, pembayaran, atau kendala teknis yang terjadi pada layanan tersebut tunduk pada syarat dan kebijakan
            milik penyedia masing-masing. Kami tidak mengendalikan sistem mereka dan tidak bertanggung jawab atas perubahan layanan di luar kendali kami.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">5. Penggunaan yang Diperbolehkan</h2>
          <p class="text-gray-300 leading-relaxed mb-4">
            Anda setuju untuk menggunakan situs ini secara wajar dan tidak melakukan tindakan yang dapat merugikan usaha kami, termasuk:
          </p>
          <ul class="list-disc list-inside space-y-2 text-gray-300 leading-relaxed">
            <li>memberikan data palsu atau melakukan pemesanan fiktif;</li>
            <li>mengganggu akses, keamanan, atau performa situs;</li>
            <li>menggunakan konten situs untuk tujuan melanggar hukum;</li>
            <li>menyalin, mengubah, atau mendistribusikan materi situs tanpa izin yang sah.</li>
          </ul>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">6. Batasan Tanggung Jawab</h2>
          <p class="text-gray-300 leading-relaxed">
            Situs ini disediakan sebagaimana adanya. Kami tidak menjamin bahwa situs akan selalu bebas gangguan, kesalahan teknis,
            atau ketidakakuratan sementara. Sepanjang diizinkan hukum, <?php echo e($siteName); ?> tidak bertanggung jawab atas kerugian tidak langsung,
            kehilangan keuntungan, kegagalan transaksi pada platform pihak ketiga, atau gangguan layanan yang terjadi di luar kendali wajar kami.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">7. Perubahan Layanan dan Ketentuan</h2>
          <p class="text-gray-300 leading-relaxed">
            Kami dapat memperbarui isi situs, daftar cabang, jam operasional, menu, harga, maupun syarat dan ketentuan ini sewaktu-waktu.
            Perubahan berlaku sejak dipublikasikan pada halaman ini. Anda disarankan meninjau halaman ini secara berkala.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">8. Hukum yang Berlaku</h2>
          <p class="text-gray-300 leading-relaxed">
            Syarat dan ketentuan ini ditafsirkan berdasarkan hukum Republik Indonesia. Setiap perselisihan akan diupayakan
            penyelesaiannya terlebih dahulu secara musyawarah dan itikad baik.
          </p>
        </section>

        <section class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <h2 class="text-white text-2xl font-black mb-3">9. Kontak</h2>
          <p class="text-gray-300 leading-relaxed">
            Untuk pertanyaan mengenai syarat penggunaan situs atau layanan kami, silakan hubungi:
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

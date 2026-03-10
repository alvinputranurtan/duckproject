<?php

declare(strict_types=1);

require __DIR__.'/lib/content.php';
require __DIR__.'/lib/seo.php';

// Override meta untuk halaman ini
$c = content();
$c['seo']['title'] = 'Kebijakan Privasi - ' . ($c['site']['name'] ?? 'Bebek Goreng Pak Eko');
$c['seo']['description'] = 'Kebijakan privasi terkait penggunaan situs, kontak WhatsApp, dan layanan pemesanan Bebek Goreng Pak Eko.';

require __DIR__.'/partials/header.php';

$siteName = $c['site']['name'] ?? 'Bebek Goreng Pak Eko';
$phone = $c['site']['phone_international'] ?? ($c['site']['phone'] ?? '-');
$address = $c['location']['address'] ?? 'Alamat usaha tersedia pada halaman lokasi';
?>

<section class="py-20 bg-surface-dark/30">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="rounded-[2rem] border border-white/10 bg-[#112117]/90 overflow-hidden shadow-2xl">
      <div class="px-6 py-10 sm:px-10 lg:px-14 border-b border-white/10 bg-gradient-to-br from-brand-yellow/10 via-transparent to-primary/10">
        <p class="text-brand-yellow text-sm font-bold uppercase tracking-[0.2em] mb-3">Legal</p>
        <h1 class="text-white text-4xl md:text-5xl font-black leading-tight">Kebijakan Privasi</h1>
        <p class="text-gray-300 text-base md:text-lg mt-4 max-w-3xl leading-relaxed">
          Halaman ini menjelaskan bagaimana <?php echo e($siteName); ?> mengelola informasi saat Anda mengakses situs,
          melihat menu, menghubungi kami melalui WhatsApp, atau menggunakan tautan pemesanan ke platform pihak ketiga.
        </p>
        <p class="text-gray-400 text-sm mt-4">Terakhir diperbarui: <?php echo date('d F Y'); ?></p>
      </div>

      <div class="px-6 py-10 sm:px-10 lg:px-14 space-y-10">
        <section>
          <h2 class="text-white text-2xl font-black mb-3">1. Informasi yang Kami Kumpulkan</h2>
          <p class="text-gray-300 leading-relaxed">
            Kami dapat menerima informasi yang Anda berikan secara langsung, seperti nama, nomor telepon, alamat pengantaran,
            detail pesanan, dan isi pesan ketika Anda menghubungi kami melalui WhatsApp atau kanal pemesanan lain.
            Kami juga dapat menerima data teknis terbatas seperti alamat IP, jenis perangkat, browser, halaman yang dibuka,
            dan waktu kunjungan untuk membantu analisis performa situs dan keamanan layanan.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">2. Tujuan Penggunaan Data</h2>
          <p class="text-gray-300 leading-relaxed mb-4">
            Informasi tersebut digunakan seperlunya untuk menjalankan operasional bisnis dan pelayanan pelanggan, termasuk:
          </p>
          <ul class="list-disc list-inside space-y-2 text-gray-300 leading-relaxed">
            <li>menanggapi pertanyaan, reservasi, atau permintaan pemesanan;</li>
            <li>mengonfirmasi detail pesanan, lokasi cabang, dan ketersediaan menu;</li>
            <li>mempermudah komunikasi lanjutan terkait pengiriman, komplain, atau dukungan pelanggan;</li>
            <li>meningkatkan kualitas situs, tampilan menu, dan pengalaman pengguna;</li>
            <li>memenuhi kewajiban hukum yang berlaku jika diperlukan.</li>
          </ul>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">3. Tautan ke WhatsApp dan Platform Pihak Ketiga</h2>
          <p class="text-gray-300 leading-relaxed">
            Situs ini menyediakan tautan ke WhatsApp, Google Maps, GoFood, GrabFood, dan ShopeeFood. Ketika Anda menekan
            tautan tersebut, Anda akan berpindah ke layanan milik pihak ketiga yang memiliki kebijakan privasi masing-masing.
            Kami menyarankan Anda membaca kebijakan mereka sebelum memberikan data pribadi atau menyelesaikan transaksi.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">4. Pembagian Informasi</h2>
          <p class="text-gray-300 leading-relaxed">
            Kami tidak menjual atau menyewakan data pribadi pelanggan. Informasi hanya dapat dibagikan secara terbatas kepada
            pihak yang membantu proses layanan, misalnya mitra pengantaran atau platform pemesanan yang Anda pilih, atau apabila
            diwajibkan oleh hukum, permintaan otoritas yang sah, atau untuk melindungi hak dan keamanan usaha kami.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">5. Penyimpanan dan Keamanan Data</h2>
          <p class="text-gray-300 leading-relaxed">
            Kami berupaya menjaga data pribadi dengan langkah yang wajar secara administratif dan teknis. Meski demikian,
            tidak ada sistem transmisi atau penyimpanan digital yang sepenuhnya bebas risiko. Karena itu, kami tidak dapat
            menjamin keamanan absolut, namun kami akan mengambil tindakan yang patut bila menemukan indikasi penyalahgunaan data.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">6. Hak Anda</h2>
          <p class="text-gray-300 leading-relaxed">
            Anda dapat meminta akses, koreksi, pembaruan, atau penghapusan informasi pribadi yang pernah Anda berikan kepada kami,
            sepanjang permintaan tersebut tidak bertentangan dengan kewajiban hukum atau kebutuhan pencatatan transaksi yang sah.
            Permintaan dapat disampaikan melalui kontak resmi yang tersedia di situs ini.
          </p>
        </section>

        <section>
          <h2 class="text-white text-2xl font-black mb-3">7. Perubahan Kebijakan</h2>
          <p class="text-gray-300 leading-relaxed">
            Kebijakan privasi ini dapat diperbarui sewaktu-waktu untuk menyesuaikan perubahan layanan, proses operasional,
            atau ketentuan hukum. Versi terbaru akan selalu ditampilkan pada halaman ini beserta tanggal pembaruannya.
          </p>
        </section>

        <section class="rounded-3xl border border-white/10 bg-white/5 p-6">
          <h2 class="text-white text-2xl font-black mb-3">8. Kontak</h2>
          <p class="text-gray-300 leading-relaxed">
            Untuk pertanyaan mengenai kebijakan privasi atau pengelolaan data pribadi, Anda dapat menghubungi <?php echo e($siteName); ?>
            melalui informasi berikut.
          </p>
          <div class="mt-4 space-y-2 text-gray-300">
            <p>Telepon/WhatsApp: <?php echo e($phone); ?></p>
            <p>Alamat: <?php echo e($address); ?></p>
          </div>
        </section>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__.'/partials/footer.php'; ?>

<?php
$c = content();

$title = $c['location']['title'] ?? 'Lokasi';
$subtitle = $c['location']['subtitle'] ?? '';

$center_geo = $c['location']['geo'] ?? null;
$branches = $c['location']['branches'] ?? [];
if (!is_array($branches)) {
    $branches = [];
}

function _lower($s)
{
    return is_string($s) ? mb_strtolower($s) : '';
}

function _platforms_str($b)
{
    $p = $b['platforms'] ?? [];
    $go = trim($p['gofood'] ?? '');
    $gr = trim($p['grab'] ?? '');
    $sh = trim($p['shopeefood'] ?? '');
    $offline = (!empty($b['maps_url'] ?? '') || !empty($b['address'] ?? '')) ? true : false;

    $arr = [];
    if ($go) {
        $arr[] = 'gofood';
    }
    if ($gr) {
        $arr[] = 'grab';
    }
    if ($sh) {
        $arr[] = 'shopeefood';
    }
    if ($offline) {
        $arr[] = 'offline';
    }

    return implode(',', $arr);
}

function _branch_hours_label($b)
{
    if (!empty($b['is_24h'])) {
        return '24 Jam';
    }
    $t = trim($b['hours_text'] ?? '');

    return $t;
}

// WA URL builder: wa.me/<number>?text=<encoded>
function _wa_url($b)
{
    $num = preg_replace('/\D+/', '', (string) ($b['wa_number'] ?? ''));
    if ($num === '') {
        return '';
    }
    $msg = (string) ($b['wa_message'] ?? '');
    $q = $msg !== '' ? ('?text='.rawurlencode($msg)) : '';

    return "https://wa.me/{$num}{$q}";
}
?>

<section class="py-20 bg-background-dark" id="lokasi">
  <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-surface-dark rounded-3xl p-6 sm:p-8 lg:p-10 border border-white/5 overflow-hidden relative">
      <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>

      <div class="relative z-10 flex flex-col gap-6">
        <!-- Header -->
        <div class="flex flex-col gap-2">
          <h2 class="text-white text-3xl font-black"><?php echo e($title); ?></h2>
          <?php if ($subtitle) { ?>
            <p class="text-gray-300"><?php echo e($subtitle); ?></p>
          <?php } ?>
        </div>

        <!-- Map wrapper: dibuat proporsional (4:3) + tidak terlalu lebar -->
        <div class="w-full flex justify-center">
          <div class="w-full max-w-4xl">
            <div class="relative rounded-2xl overflow-hidden border border-white/5 bg-black/20">
              <!-- Ratio 4:3 (lebih proporsional); ganti ke aspect-square kalau mau 1:1 -->
              <div id="osmMap" class="w-full aspect-[4/3]"></div>

              <!-- Overlay panduan singkat -->
              <div class="absolute top-3 left-1/2 -translate-x-1/2 z-[600] bg-black/60 text-white text-xs px-3 py-1 rounded-full pointer-events-none">
                Mobile: pinch • PC: Ctrl + Scroll • Drag untuk geser
              </div>

              <!-- Overlay kecil (opsional) untuk switch zoom mode -->
              <div class="absolute bottom-3 left-3 z-[600] bg-black/60 text-white text-xs px-3 py-1 rounded-full pointer-events-none">
                Scroll biasa tidak zoom (aman untuk halaman)
              </div>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <?php if (!empty($branches)) { ?>
          <div class="mt-2">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
              <h3 class="text-white font-black text-xl">Pilih Cabang</h3>

              <div class="flex flex-wrap gap-2" id="platformTabs">
                <button type="button" class="px-4 h-10 rounded-full bg-brand-yellow text-[#112117] font-bold" data-platform="all">Semua</button>
                <button type="button" class="px-4 h-10 rounded-full bg-white/10 text-white font-bold hover:bg-white/15" data-platform="gofood">GoFood</button>
                <button type="button" class="px-4 h-10 rounded-full bg-white/10 text-white font-bold hover:bg-white/15" data-platform="grab">GrabFood</button>
                <button type="button" class="px-4 h-10 rounded-full bg-white/10 text-white font-bold hover:bg-white/15" data-platform="shopeefood">ShopeeFood</button>
                <button type="button" class="px-4 h-10 rounded-full bg-white/10 text-white font-bold hover:bg-white/15" data-platform="offline">Offline</button>
              </div>
            </div>

            <div class="mt-3">
              <input id="branchSearch" type="text" placeholder="Cari cabang…"
                     class="w-full h-11 rounded-2xl bg-white/5 border border-white/10 px-4 text-white placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-yellow/50">
            </div>

            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3" id="branchGrid">
              <?php foreach ($branches as $i => $b) {
                  $name = $b['name'] ?? ('Cabang '.($i + 1));
                  $addr = $b['address'] ?? '';
                  $gmaps = $b['maps_url'] ?? '';
                  $geo = $b['geo'] ?? null;
                  $lat = (is_array($geo) && isset($geo['lat'])) ? $geo['lat'] : '';
                  $lng = (is_array($geo) && isset($geo['lng'])) ? $geo['lng'] : '';

                  $p = $b['platforms'] ?? [];
                  $go = trim($p['gofood'] ?? '');
                  $gr = trim($p['grab'] ?? '');
                  $sh = trim($p['shopeefood'] ?? '');

                  $hoursLabel = _branch_hours_label($b);
                  $waUrl = _wa_url($b);
                  $waNum = preg_replace('/\D+/', '', (string) ($b['wa_number'] ?? ''));
                  ?>
                <div class="rounded-2xl border border-white/10 bg-white/5 p-4"
                     data-name="<?php echo e(_lower($name)); ?>"
                     data-platforms="<?php echo e(_platforms_str($b)); ?>"
                     data-lat="<?php echo e($lat); ?>"
                     data-lng="<?php echo e($lng); ?>"
                     data-gmaps="<?php echo e($gmaps); ?>"
                     data-hours="<?php echo e($hoursLabel); ?>"
                     data-wa="<?php echo e($waUrl); ?>"
                >
                  <div class="flex items-start justify-between gap-3">
                    <div>
                      <div class="text-white font-bold"><?php echo e($name); ?></div>
                      <?php if ($addr) { ?><div class="text-gray-400 text-sm mt-1"><?php echo e($addr); ?></div><?php } ?>

                      <?php if ($hoursLabel) { ?>
                        <div class="mt-2 text-gray-300 text-sm inline-flex items-start gap-2">
                          <span class="material-symbols-outlined" style="font-size:18px; opacity:.9;">schedule</span>
                          <span class="whitespace-pre-line"><?php echo e($hoursLabel); ?></span>
                        </div>
                      <?php } ?>

                      <?php if ($waNum) { ?>
                        <div class="mt-2 text-gray-300 text-sm inline-flex items-center gap-2">
                          <span class="material-symbols-outlined" style="font-size:18px; opacity:.9;">call</span>
                          <span><?php echo e($waNum); ?></span>
                        </div>
                      <?php } ?>
                    </div>

                    <?php if ($gmaps) { ?>
                      <a href="<?php echo e($gmaps); ?>" class="shrink-0 text-brand-yellow font-bold hover:underline text-sm inline-flex items-center gap-1">
                        Maps <span class="material-symbols-outlined" style="font-size:18px;">open_in_new</span>
                      </a>
                    <?php } ?>
                  </div>

                  <div class="mt-3 flex flex-wrap gap-2">
                    <?php if ($waUrl) { ?>
                      <a href="<?php echo e($waUrl); ?>" class="h-9 px-4 rounded-full bg-brand-yellow text-[#112117] font-bold text-sm inline-flex items-center gap-2">
                        <span class="material-symbols-outlined" style="font-size:18px;">chat</span>
                        WhatsApp
                      </a>
                    <?php } ?>

                    <?php if ($go) { ?>
                      <a href="<?php echo e($go); ?>" class="h-9 px-4 rounded-full bg-white text-[#112117] font-bold text-sm inline-flex items-center">GoFood</a>
                    <?php } ?>
                    <?php if ($gr) { ?>
                      <a href="<?php echo e($gr); ?>" class="h-9 px-4 rounded-full bg-white/15 text-white font-bold text-sm inline-flex items-center hover:bg-white/20">GrabFood</a>
                    <?php } ?>
                    <?php if ($sh) { ?>
                      <a href="<?php echo e($sh); ?>" class="h-9 px-4 rounded-full bg-white/15 text-white font-bold text-sm inline-flex items-center hover:bg-white/20">ShopeeFood</a>
                    <?php } ?>

                    <?php if ($gmaps && $lat !== '' && $lng !== '') { ?>
                      <button type="button"
                              class="h-9 px-4 rounded-full bg-white/10 text-white font-bold text-sm inline-flex items-center hover:bg-white/15"
                              onclick="window.__focusBranchOnMap && window.__focusBranchOnMap(this)">
                        Lihat di Peta
                      </button>
                    <?php } ?>
                  </div>
                </div>
              <?php } ?>
            </div>

            <div id="branchEmpty" class="hidden mt-3 text-gray-400 text-sm">Tidak ada cabang yang cocok.</div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php if (!empty($branches)) { ?>
<script>
(function(){
  // ===== Filter UI =====
  const tabs = document.getElementById('platformTabs');
  const search = document.getElementById('branchSearch');
  const grid = document.getElementById('branchGrid');
  const empty = document.getElementById('branchEmpty');

  let activePlatform = 'all';

  const setActiveTabStyle = () => {
    if (!tabs) return;
    [...tabs.querySelectorAll('button[data-platform]')].forEach(btn => {
      const on = btn.dataset.platform === activePlatform;
      btn.className = on
        ? 'px-4 h-10 rounded-full bg-brand-yellow text-[#112117] font-bold'
        : 'px-4 h-10 rounded-full bg-white/10 text-white font-bold hover:bg-white/15';
    });
  };

  const applyFilter = () => {
    if (!grid || !search) return;
    const q = (search.value || '').trim().toLowerCase();
    let shown = 0;

    [...grid.children].forEach(card => {
      const name = card.dataset.name || '';
      const platforms = (card.dataset.platforms || '').split(',').filter(Boolean);

      const matchText = !q || name.includes(q);
      const matchPlat = activePlatform === 'all' || platforms.includes(activePlatform);

      const ok = matchText && matchPlat;
      card.style.display = ok ? '' : 'none';
      if (ok) shown++;
    });

    if (empty) empty.classList.toggle('hidden', shown !== 0);
  };

  if (tabs) {
    tabs.addEventListener('click', (e) => {
      const btn = e.target.closest('button[data-platform]');
      if (!btn) return;
      activePlatform = btn.dataset.platform;
      setActiveTabStyle();
      applyFilter();
    });
  }
  if (search) search.addEventListener('input', applyFilter);

  setActiveTabStyle();
  applyFilter();

  // ===== Map (Leaflet) =====
  const mapEl = document.getElementById('osmMap');
  if (!mapEl || typeof L === 'undefined') return;

  const center = <?php echo json_encode($center_geo); ?>;
  const branches = <?php echo json_encode($branches); ?>;

  const initialLat = (center && typeof center.lat === 'number') ? center.lat : -6.200000;
  const initialLng = (center && typeof center.lng === 'number') ? center.lng : 106.816666;

  const map = L.map('osmMap', {
    zoomControl: true,
    scrollWheelZoom: false // default mati -> kita buat Ctrl+Scroll
  }).setView([initialLat, initialLng], 12);

  // Dark tile lebih “elegan” (nolabels) — fallback ke dark_all jika tile gagal
  const darkNoLabels = L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/dark_nolabels/{z}/{x}/{y}{r}.png', {
    maxZoom: 19,
    subdomains: 'abcd',
    attribution: '&copy; OpenStreetMap contributors &copy; CARTO'
  });

  const darkAll = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
    maxZoom: 19,
    subdomains: 'abcd',
    attribution: '&copy; OpenStreetMap contributors &copy; CARTO'
  });

  darkNoLabels.addTo(map);
  darkNoLabels.on('tileerror', () => {
    try { map.removeLayer(darkNoLabels); } catch(e) {}
    darkAll.addTo(map);
  });

  const bounds = [];
  const markers = [];

  const esc = (s) => (s ?? '').toString()
    .replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;')
    .replace(/"/g,'&quot;').replace(/'/g,'&#039;');

  const mkPopup = (b) => {
    const name = esc(b?.name || 'Cabang');
    const addr = esc(b?.address || '');
    const gmaps = (b?.maps_url || '').toString().trim();
    const wa = (b?.wa_number || '').toString().replace(/\D+/g,'');
    const waMsg = (b?.wa_message || '').toString();
    const waUrl = wa ? `https://wa.me/${wa}${waMsg ? `?text=${encodeURIComponent(waMsg)}` : ''}` : '';

    const is24 = !!b?.is_24h;
    const hoursText = (b?.hours_text || '').toString().trim();
    const hoursLabel = is24 ? '24 Jam' : (hoursText || '');

    return `
      <div style="min-width:240px">
        <div style="font-weight:800;margin-bottom:6px">${name}</div>
        ${addr ? `<div style="font-size:12px;opacity:.85;margin-bottom:8px">${addr}</div>` : ''}
        ${hoursLabel ? `<div style="font-size:12px;opacity:.9;margin-bottom:10px"><b>Jam:</b> ${esc(hoursLabel).replace(/\n/g,'<br>')}</div>` : ''}
        <div style="display:flex; gap:8px; flex-wrap:wrap">
          ${gmaps ? `<button type="button" data-gmaps="${esc(gmaps)}"
            style="padding:8px 10px;border-radius:999px;border:none;cursor:pointer;font-weight:800;background:#f4f425;color:#181811">
            Google Maps
          </button>` : ''}
          ${waUrl ? `<a href="${esc(waUrl)}"
            style="padding:8px 10px;border-radius:999px;display:inline-block;text-decoration:none;font-weight:800;background:rgba(255,255,255,.12);color:white;border:1px solid rgba(255,255,255,.15)">
            WhatsApp
          </a>` : ''}
        </div>
      </div>
    `;
  };

  branches.forEach((b) => {
    const lat = b?.geo?.lat;
    const lng = b?.geo?.lng;
    if (typeof lat !== 'number' || typeof lng !== 'number') return;

    bounds.push([lat, lng]);

    const marker = L.marker([lat, lng]).addTo(map);
    marker.bindPopup(mkPopup(b));

    marker.on('popupopen', (e) => {
      const btn = e.popup.getElement()?.querySelector('button[data-gmaps]');
      if (btn) {
        btn.onclick = () => {
          const url = btn.getAttribute('data-gmaps');
          if (url) window.open(url, '_blank', 'noopener');
        };
      }
    });

    markers.push({ marker, lat, lng });
  });

  if (bounds.length >= 2) map.fitBounds(bounds, { padding: [24, 24] });
  else if (bounds.length === 1) map.setView(bounds[0], 15);

  // ===== Ctrl + Scroll to zoom (PC) =====
  // Scroll biasa: biarkan halaman scroll (tidak zoom peta)
  mapEl.addEventListener('wheel', (e) => {
    if (e.ctrlKey) {
      e.preventDefault();
      if (!map.scrollWheelZoom.enabled()) map.scrollWheelZoom.enable();

      // matikan lagi setelah jeda kecil supaya tetap aman
      clearTimeout(window.__mapWheelTimer);
      window.__mapWheelTimer = setTimeout(() => map.scrollWheelZoom.disable(), 900);
    } else {
      if (map.scrollWheelZoom.enabled()) map.scrollWheelZoom.disable();
      // jangan preventDefault -> halaman tetap scroll normal
    }
  }, { passive: false });

  // ===== Focus dari tombol "Lihat di Peta" =====
  window.__focusBranchOnMap = function(btn){
    const card = btn.closest('[data-lat][data-lng]');
    if (!card) return;

    const lat = parseFloat(card.dataset.lat || '');
    const lng = parseFloat(card.dataset.lng || '');
    if (!isFinite(lat) || !isFinite(lng)) return;

    map.setView([lat, lng], 16, { animate: true });
    const found = markers.find(m => Math.abs(m.lat - lat) < 1e-9 && Math.abs(m.lng - lng) < 1e-9);
    if (found) found.marker.openPopup();
  };
})();
</script>
<?php } ?>

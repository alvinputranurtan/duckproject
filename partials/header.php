<?php
$c = content();

$siteName = $c['site']['name'] ?? 'Bebek Goreng Pak Eko';
$title = $c['seo']['title'] ?? ($siteName.' - '.($c['site']['tagline'] ?? ''));
$desc = $c['seo']['description'] ?? ($c['site']['tagline'] ?? '');
$canon = canonical_url('/');

$ogImage = canonical_url($c['seo']['og_image'] ?? ($c['hero']['image'] ?? '/assets/img/hero.webp'));
$locale = 'id_ID';

// JSON-LD Restaurant
$ld = [
    '@context' => 'https://schema.org',
    '@type' => 'Restaurant',
    'name' => $siteName,
    'servesCuisine' => $c['seo']['servesCuisine'] ?? ['Indonesian'],
    'priceRange' => $c['seo']['priceRange'] ?? 'Rp',
    'telephone' => $c['site']['phone_international'] ?? null,
    'url' => canonical_url('/'),
    'image' => [$ogImage],
];

if (!empty($c['location']['address'])) {
    $ld['address'] = [
        '@type' => 'PostalAddress',
        'streetAddress' => $c['location']['address'],
        'addressLocality' => $c['location']['city'] ?? null,
        'addressRegion' => $c['location']['region'] ?? null,
        'postalCode' => $c['location']['postal_code'] ?? null,
        'addressCountry' => $c['location']['country'] ?? 'ID',
    ];
}

if (!empty($c['location']['openingHours'])) {
    $ld['openingHours'] = $c['location']['openingHours']; // e.g. ["Mo-Su 10:00-22:00"]
}

if (!empty($c['location']['geo'])) {
    $ld['geo'] = [
        '@type' => 'GeoCoordinates',
        'latitude' => $c['location']['geo']['lat'],
        'longitude' => $c['location']['geo']['lng'],
    ];
}

$ldJson = json_encode($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<!doctype html>
<html lang="id" class="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo e($title); ?></title>
  <meta name="description" content="<?php echo e($desc); ?>">
  <link rel="canonical" href="<?php echo e($canon); ?>">

  <meta name="robots" content="index,follow">
  <meta name="theme-color" content="#112117">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="<?php echo e($locale); ?>">
  <meta property="og:title" content="<?php echo e($title); ?>">
  <meta property="og:description" content="<?php echo e($desc); ?>">
  <meta property="og:url" content="<?php echo e($canon); ?>">
  <meta property="og:image" content="<?php echo e($ogImage); ?>">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo e($title); ?>">
  <meta name="twitter:description" content="<?php echo e($desc); ?>">
  <meta name="twitter:image" content="<?php echo e($ogImage); ?>">

  <link rel="icon" href="<?php echo e(canonical_url('/assets/favicon.ico')); ?>">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Spline+Sans:wght@300;400;500;600;700&family=Noto+Sans:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Material Symbols -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

  <!-- Tailwind CSS (dev/simple) -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#30e87a",
            "brand-yellow": "#fbbf24",
            "background-light": "#f6f8f7",
            "background-dark": "#112117",
            "surface-dark": "#1a2e22",
          },
          fontFamily: {
            "display": ["Spline Sans", "sans-serif"],
            "body": ["Noto Sans", "sans-serif"],
          },
          borderRadius: {"DEFAULT": "1rem", "lg": "2rem", "xl": "3rem", "full": "9999px"},
        },
      },
    }
  </script>

  <style>
    .material-symbols-outlined { font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #112117; }
    ::-webkit-scrollbar-thumb { background: #1a2e22; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #30e87a; }
  </style>

  <script type="application/ld+json"><?php echo $ldJson; ?></script>
</head>

<body class="bg-background-light dark:bg-background-dark text-[#111814] dark:text-white font-display antialiased overflow-x-hidden">
<div class="relative flex flex-col min-h-screen w-full">

<header class="sticky top-0 z-50 w-full backdrop-blur-md bg-[#112117]/80 border-b border-white/10">
  <div class="max-w-[1280px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">
      <a class="flex items-center gap-3" href="#beranda" aria-label="<?php echo e($siteName); ?>">
<div class="size-10 rounded-full overflow-hidden bg-brand-yellow flex items-center justify-center">
<img
  src="assets/img/logo.png"
  alt="<?php echo e($siteName); ?> logo"
  class="w-full h-full object-contain"
  width="40" height="40"
/>
</div>


        <span class="text-white text-xl font-bold tracking-tight"><?php echo e($siteName); ?></span>
      </a>

      <div class="hidden md:flex items-center gap-8">
        <nav class="flex gap-6" aria-label="Navigasi">
          <a class="text-white/80 hover:text-brand-yellow text-sm font-medium transition-colors" href="#beranda">Beranda</a>
          <a class="text-white/80 hover:text-brand-yellow text-sm font-medium transition-colors" href="#tentang">Tentang</a>
          <a class="text-white/80 hover:text-brand-yellow text-sm font-medium transition-colors" href="#menu">Menu</a>
          <a class="text-white/80 hover:text-brand-yellow text-sm font-medium transition-colors" href="#lokasi">Lokasi</a>
        </nav>

        <?php if (!empty($c['site']['whatsapp_url'])) { ?>
          <a href="<?php echo e($c['site']['whatsapp_url']); ?>"
             class="flex items-center justify-center gap-2 rounded-full h-10 px-6 bg-primary hover:bg-primary/90 text-[#112117] text-sm font-bold transition-all shadow-[0_0_15px_rgba(48,232,122,0.3)]">
            <span>Pesan Online</span>
            <span class="material-symbols-outlined text-[18px]">shopping_bag</span>
          </a>
        <?php } ?>
      </div>

      <!-- Mobile -->
      <button id="mobileBtn" class="md:hidden p-2 text-white hover:text-primary transition-colors" aria-label="Buka menu">
        <span class="material-symbols-outlined">menu</span>
      </button>
    </div>

    <div id="mobileMenu" class="md:hidden hidden pb-4">
      <nav class="flex flex-col gap-3" aria-label="Navigasi mobile">
        <a class="text-white/80 hover:text-brand-yellow text-sm font-medium" href="#beranda">Beranda</a>
        <a class="text-white/80 hover:text-brand-yellow text-sm font-medium" href="#tentang">Tentang</a>
        <a class="text-white/80 hover:text-brand-yellow text-sm font-medium" href="#menu">Menu</a>
        <a class="text-white/80 hover:text-brand-yellow text-sm font-medium" href="#lokasi">Lokasi</a>
        <?php if (!empty($c['site']['whatsapp_url'])) { ?>
          <a class="mt-2 inline-flex items-center justify-center gap-2 rounded-full h-11 px-6 bg-primary text-[#112117] text-sm font-bold"
             href="<?php echo e($c['site']['whatsapp_url']); ?>">Pesan Online</a>
        <?php } ?>
      </nav>
    </div>
  </div>
</header>

<script>
  (function(){
    const btn = document.getElementById('mobileBtn');
    const menu = document.getElementById('mobileMenu');
    if(!btn || !menu) return;
    btn.addEventListener('click', () => menu.classList.toggle('hidden'));
  })();
</script>

<?php
$products = [
    [
        "name" => "BenQ ScreenBar Halo Monitor Light",
        "category" => "DESK LAMP",
        "price" => 2350000,
        "stock" => 4,
        "image" => "BenQ ScreenBar Halo Monitor Light.webp"
    ],
    [
        "name" => "NuPhy Air75 V2 Wireless Mechanical",
        "category" => "KEYBOARD",
        "price" => 1950000,
        "stock" => 6,
        "image" => "NuPhy Air75 V2 Wireless Mechanical.webp"
    ],
    [
        "name" => "Sony WH-1000XM4 ANC Headphone",
        "category" => "AUDIO",
        "price" => 3400000,
        "stock" => 2,
        "image" => "Sony WH-1000XM4 ANC Headphone.webp"
    ],
    [
        "name" => "Fantech Helios II Pro Wireless",
        "category" => "MOUSE",
        "price" => 790000,
        "stock" => 9,
        "image" => "Fantech Helios II Pro Wireless.webp"
    ],
    [
        "name" => "Leather Desk Mat 90x40 Waterproof",
        "category" => "AKSESORIS",
        "price" => 185000,
        "stock" => 15,
        "image" => "Leather Desk Mat 90x40 Waterproof.webp"
    ],
    [
        "name" => "Anker 737 Power Bank 24000mAh",
        "category" => "POWERBANK",
        "price" => 1550000,
        "stock" => 0, // Stok habis untuk pengujian tombol disabled
        "image" => "Anker 737 Power Bank 24000mAh.webp"
    ],
    [
        "name" => "North Bayou F80 Monitor Arm Bracket",
        "category" => "BRACKET",
        "price" => 245000,
        "stock" => 7,
        "image" => "North Bayou F80 Monitor Arm Bracket.webp"
    ],
    [
        "name" => "Elgato Stream Deck MK.2 15 Keys",
        "category" => "STREAMING",
        "price" => 2200000,
        "stock" => 0, // Stok habis untuk pengujian tombol disabled
        "image" => "Elgato Stream Deck MK.2 15 Keys.webp"
    ]
];

// Menghitung jumlah produk secara otomatis
$totalProducts = count($products);

// Fungsi format mata uang Rupiah
function formatRupiah($nominal) {
    return "Rp" . number_format($nominal, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Solusi Teknologi</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: #1e293b;
        }

        /* 1. Header / Navbar dengan CSS Flexbox */
        header {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .store-brand {
            font-size: 20px;
            font-weight: bold;
            color: #0f172a;
        }

        nav a {
            color: #64748b;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }

        nav a:hover {
            color: #0f172a;
        }

        /* 2. Hero Section */
        .hero-section {
            background-color: #171923;
            color: #ffffff;
            margin: 25px 8%;
            padding: 60px 20px;
            border-radius: 12px;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 36px;
            margin-bottom: 12px;
        }

        .hero-section p {
            color: #a0aec0;
            font-size: 16px;
            margin-bottom: 24px;
        }

        .btn-hero {
            background-color: #ffffff;
            color: #171923;
            padding: 10px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        /* 3. Main Container & Info Jumlah Produk */
        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px 8% 50px 8%;
        }

        .catalog-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .catalog-info h2 {
            font-size: 22px;
        }

        .badge-count {
            background-color: #e2e8f0;
            color: #334155;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        /* 4. CSS Grid untuk Susunan Kartu Produk */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        /* Product Card & Pseudo-Class :hover */
        .product-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        /* Tampilan Gambar Produk */
        .product-image-container {
            width: 100%;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            overflow: hidden;
            border-radius: 6px;
            background-color: #ffffff;
        }

        .product-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .category-name {
            font-size: 12px;
            color: #718096;
            font-weight: bold;
        }

        .discount-badge {
            color: #e53e3e;
            font-size: 12px;
            font-weight: bold;
        }

        .product-title {
            font-size: 17px;
            font-weight: bold;
            color: #1a202c;
            margin-bottom: 12px;
            min-height: 42px;
        }

        .price-box {
            margin-bottom: 16px;
        }

        .original-price {
            font-size: 13px;
            color: #a0aec0;
            text-decoration: line-through;
            margin-bottom: 2px;
        }

        .final-price {
            font-size: 20px;
            font-weight: bold;
            color: #0f172a;
        }

        .stock-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            margin-bottom: 16px;
            color: #4a5568;
        }

        .status-pill {
            font-size: 12px;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: bold;
        }

        .status-available {
            color: #38a169;
            background-color: #f0fff4;
            border: 1px solid #c6f6d5;
        }

        .status-empty {
            color: #e53e3e;
            background-color: #fff5f5;
            border: 1px solid #fed7d7;
        }

        /* Tombol & Pseudo-Class :hover */
        .buy-button {
            width: 100%;
            padding: 10px;
            background-color: #171923;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            font-size: 14px;
            transition: opacity 0.2s ease;
        }

        .buy-button:hover {
            opacity: 0.85;
        }

        .buy-button:disabled {
            background-color: #cbd5e1;
            cursor: not-allowed;
            opacity: 0.7;
        }

        /* 5. Responsive Layout Menggunakan Media Query */
        @media (max-width: 900px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 24px;
            border-top: 1px solid #e2e8f0;
            color: #718096;
            font-size: 13px;
        }
    </style>
</head>
<body>

    <!-- 1. Header / Navbar -->
    <header>
        <div class="store-brand">Cia Store</div>
        <nav>
            <a href="#">Home</a>
            <a href="#products">Products</a>
            <a href="#">About</a>
        </nav>
    </header>

    <!-- 2. Hero Section -->
    <section class="hero-section">
        <h1>Simple Tech Store.</h1>
        <p>Solusi perangkat keras dan aksesoris teknologi pilihan untuk workstation modern Anda.</p>
        <a href="#products" class="btn-hero">Lihat Produk</a>
    </section>

    <!-- 3. Konten Utama / Katalog Produk -->
    <main id="products">
        <div class="catalog-info">
            <h2>Katalog Produk</h2>
            <span class="badge-count">Total: <?= $totalProducts; ?> Produk</span>
        </div>

        <div class="product-grid">
            <?php foreach ($products as $item): ?>
                <?php
                    // Logika Challenge Diskon 10% jika harga >= 1.000.000
                    $hasDiscount = false;
                    $finalPrice = $item['price'];

                    if ($item['price'] >= 1000000) {
                        $hasDiscount = true;
                        $discountAmount = $item['price'] * 0.10;
                        $finalPrice = $item['price'] - $discountAmount;
                    }

                    // Logika Percabangan Stok
                    $isAvailable = ($item['stock'] > 0);
                ?>
                
                <article class="product-card">
                    <div>
                        <!-- Menampilkan Foto Produk -->
                        <div class="product-image-container">
                            <img src="<?= htmlspecialchars($item['image']); ?>" alt="<?= htmlspecialchars($item['name']); ?>" class="product-image">
                        </div>

                        <div class="card-top">
                            <span class="category-name"><?= htmlspecialchars($item['category']); ?></span>
                            <?php if ($hasDiscount): ?>
                                <span class="discount-badge">DISKON 10%</span>
                            <?php endif; ?>
                        </div>

                        <h3 class="product-title"><?= htmlspecialchars($item['name']); ?></h3>

                        <div class="price-box">
                            <?php if ($hasDiscount): ?>
                                <div class="original-price"><?= formatRupiah($item['price']); ?></div>
                            <?php endif; ?>
                            <div class="final-price"><?= formatRupiah($finalPrice); ?></div>
                        </div>
                    </div>

                    <div>
                        <div class="stock-row">
                            <span>Stok: <strong><?= $item['stock']; ?></strong></span>
                            <?php if ($isAvailable): ?>
                                <span class="status-pill status-available">Tersedia</span>
                            <?php else: ?>
                                <span class="status-pill status-empty">Stok Habis</span>
                            <?php endif; ?>
                        </div>

                        <!-- Percabangan Tombol Beli -->
                        <?php if ($isAvailable): ?>
                            <button class="buy-button">Beli Sekarang</button>
                        <?php else: ?>
                            <button class="buy-button" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- 4. Footer -->
    <footer>
        <p>&copy; 2026 Cia Store. All rights reserved.</p>
    </footer>

</body>
</html>
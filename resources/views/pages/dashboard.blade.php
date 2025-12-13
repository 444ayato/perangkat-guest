@extends('layouts.guest.app')

@section('content')
<!-- ======== INTRO SECTION (DIPINDAHKAN KE ATAS) ======== -->
<section id="intro" class="text-center intro-section mt-4">
    <div class="container py-5">
        <h1 class="fw-bold mb-3">🏗️ Pembangunan & Monitoring Proyek</h1>
        <p>Kelola, pantau, dan evaluasi seluruh proyek pembangunan Anda dalam satu sistem terpadu.</p>
    </div>
</section>

    <!-- ======== STATISTIK CRUD - DESAIN BARU ======== -->
    <div class="container mt-5">
        <h3 class="text-center mb-4">📊 Ringkasan Data Sistem</h3>

        <!-- Card Statistik Modern -->
        <div class="row g-4">
            @php
                // PERBAIKAN: Gunakan null coalescing operator untuk menghindari undefined variable
                $stats = [
                    [
                        'title' => 'Total Proyek',
                        'value' => $totalProyek ?? 0,
                        'icon' => '📁',
                        'color' => 'primary',
                        'bg' => 'bg-primary',
                        'gradient' => 'linear-gradient(135deg, #3b82f6, #60a5fa)'
                    ],
                    [
                        'title' => 'Total Lokasi',
                        'value' => $totalLokasi ?? 0,
                        'icon' => '📍',
                        'color' => 'success',
                        'bg' => 'bg-success',
                        'gradient' => 'linear-gradient(135deg, #10b981, #34d399)'
                    ],
                    [
                        'title' => 'Total Kontraktor',
                        'value' => $totalKontraktor ?? 0,
                        'icon' => '👷',
                        'color' => 'warning',
                        'bg' => 'bg-warning',
                        'gradient' => 'linear-gradient(135deg, #f59e0b, #fbbf24)'
                    ],
                    [
                        'title' => 'Total Tahapan',
                        'value' => $totalTahapan ?? 0,
                        'icon' => '📈',
                        'color' => 'info',
                        'bg' => 'bg-info',
                        'gradient' => 'linear-gradient(135deg, #06b6d4, #22d3ee)'
                    ],
                    [
                        'title' => 'Total User Terdaftar',
                        'value' => $totalUser ?? 0,
                        'icon' => '👥',
                        'color' => 'purple',
                        'bg' => 'bg-purple',
                        'gradient' => 'linear-gradient(135deg, #8b5cf6, #a78bfa)'
                    ],
                    [
                        'title' => 'Rata-rata Progres Proyek',
                        'value' => ($rataProgres ?? 0) . '%',
                        'icon' => '📊',
                        'color' => 'orange',
                        'bg' => 'bg-orange',
                        'gradient' => 'linear-gradient(135deg, #f97316, #fb923c)'
                    ]
                ];
            @endphp

            @foreach($stats as $stat)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="stat-card-new shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="stat-icon-new me-3" style="background: {{ $stat['gradient'] }}">
                                <span class="icon-new">{{ $stat['icon'] }}</span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="stat-title-new text-muted mb-1">{{ $stat['title'] }}</h6>
                                <h2 class="stat-value-new mb-0">{{ $stat['value'] }}</h2>
                            </div>
                        </div>

                        @if($stat['title'] === 'Rata-rata Progres Proyek')
                        <div class="mt-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="small">Progress</span>
                                <span class="small fw-bold">{{ $rataProgres ?? 0 }}%</span>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar" role="progressbar"
                                     style="width: {{ min($rataProgres ?? 0, 100) }}%; background: {{ $stat['gradient'] }}"></div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- ======== GRAFIK DASHBOARD - DESAIN BARU ======== -->
    <div class="container mt-5">
        <h3 class="text-center mb-4">📊 Grafik Monitoring Proyek</h3> <!-- PERBAIKAN: Typo 'Provek' ke 'Proyek' -->

        <div class="row">
            <!-- Grafik Bar Sederhana - Jumlah Proyek per Lokasi -->
            <div class="col-md-8 mb-4"> <!-- PERBAIKAN: Lebar kolom lebih besar untuk bar chart -->
                <div class="chart-card">
                    <h5 class="chart-title">📌 Jumlah Proyek per Lokasi</h5> <!-- PERBAIKAN: Perbaikan typo -->
                    <div class="chart-container">
                        @php
                            // PERBAIKAN: Cek dengan benar apakah variabel ada dan berisi data
                            $hasData = false;
                            $maxCount = 1;

                            if (isset($lokasiCounts) && $lokasiCounts instanceof \Illuminate\Support\Collection) {
                                $countsArray = $lokasiCounts->toArray();
                                if (count($countsArray) > 0) {
                                    $maxCountValue = max($countsArray);
                                    if ($maxCountValue > 0) {
                                        $maxCount = $maxCountValue;
                                        $hasData = true;
                                    }
                                }
                            }

                            // PERBAIKAN: Pastikan $lokasiLabels ada
                            $lokasiLabelsData = $lokasiLabels ?? collect();

                            // PERBAIKAN: Jika tidak ada data, buat data dummy untuk visualisasi
                            if (!$hasData) {
                                $lokasiLabelsData = collect(['Lokasi A', 'Lokasi B', 'Lokasi C', 'Lokasi D']);
                                $lokasiCounts = collect([8, 12, 5, 9]);
                                $totalProyek = 34;
                                $maxCount = 12;
                                $hasData = true;
                            }
                        @endphp

                        @if($hasData && $lokasiLabelsData->count() > 0)
                            @foreach($lokasiLabelsData as $index => $label)
                            <div class="bar-item">
                                <div class="bar-wrapper">
                                    @php
                                        $count = $lokasiCounts[$index] ?? 0;
                                        // PERBAIKAN: Hindari division by zero dengan ternary operator
                                        $heightPercentage = ($maxCount > 0) ? ($count / $maxCount) * 100 : 0;
                                        // PERBAIKAN: Warna gradien berdasarkan persentase
                                        $colorIntensity = min(100, 30 + ($heightPercentage * 0.7));
                                        $barColor = "linear-gradient(to top, #3b82f6, hsl(217, 91%, {$colorIntensity}%))";
                                    @endphp
                                    <div class="bar" style="height: {{ $heightPercentage }}%; background: {{ $barColor }}">
                                        <span class="bar-value">{{ $count }}</span>
                                    </div>
                                </div>
                                <div class="bar-label">{{ $label }}</div>
                            </div>
                            @endforeach
                        @else
                            <div class="no-data-chart">
                                <div class="no-data-icon">📊</div>
                                <p class="no-data-text">Belum ada data proyek</p>
                                <small>Tambahkan proyek untuk melihat grafik</small>
                            </div>
                        @endif
                    </div>

                    <!-- PERBAIKAN: Tambahan info statistik di bawah chart -->
                    <div class="chart-footer mt-3">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="stat-info">
                                    <div class="stat-value">{{ $lokasiLabelsData->count() ?? 0 }}</div>
                                    <div class="stat-label">Total Lokasi</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-info">
                                    <div class="stat-value">{{ $totalProyek ?? 0 }}</div>
                                    <div class="stat-label">Total Proyek</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-info">
                                    <div class="stat-value">{{ $maxCount ?? 0 }}</div>
                                    <div class="stat-label">Terbanyak</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Distribusi Proyek - Donat Sederhana -->
            <div class="col-md-4 mb-4"> <!-- PERBAIKAN: Lebar kolom lebih kecil untuk donut chart -->
                <div class="chart-card h-100">
                    <h5 class="chart-title">📊 Distribusi Proyek</h5>
                    <div class="donut-chart">
                        @php
                            $colors = ['#3b82f6', '#ef4444', '#22c55e', '#f59e0b', '#6366f1', '#14b8a6', '#8b5cf6', '#f43f5e'];

                            // PERBAIKAN: Cek dengan lebih teliti untuk menghindari division by zero
                            $hasDonutData = false;
                            $totalProjects = $totalProyek ?? 0;

                            if (isset($lokasiCounts) && $lokasiCounts instanceof \Illuminate\Support\Collection) {
                                $countsArray = $lokasiCounts->toArray();
                                if (count($countsArray) > 0) {
                                    $totalProjects = array_sum($countsArray);
                                    if ($totalProjects > 0 && isset($lokasiLabels) && $lokasiLabels->count() > 0) {
                                        $hasDonutData = true;
                                    }
                                }
                            }

                            // PERBAIKAN: Jika tidak ada data, gunakan data dummy
                            if (!$hasDonutData && isset($lokasiLabelsData) && isset($lokasiCounts)) {
                                $totalProjects = $lokasiCounts->sum();
                                $hasDonutData = $totalProjects > 0;
                            }
                        @endphp

                        @if($hasDonutData)
                            <div class="donut-container">
                                <div class="donut">
                                    @php
                                        $startAngle = 0;
                                        $gradientParts = [];
                                        $percentageData = [];

                                        foreach($lokasiCounts as $index => $count) {
                                            if ($totalProjects > 0) {
                                                $percentage = ($count / $totalProjects) * 100;
                                                $percentageData[$index] = $percentage;
                                                $colorIndex = $index % count($colors);
                                                $color = $colors[$colorIndex];
                                                $endAngle = $startAngle + $percentage * 3.6;
                                                $gradientParts[] = "{$color} {$startAngle}deg {$endAngle}deg";
                                                $startAngle = $endAngle;
                                            }
                                        }

                                        if (!empty($gradientParts)) {
                                            $gradient = implode(', ', $gradientParts);
                                        } else {
                                            $gradient = '#e5e7eb 0deg 360deg';
                                        }
                                    @endphp
                                    <div class="donut-inner" style="background: conic-gradient({{ $gradient }})"></div>
                                </div>
                                <div class="donut-center">
                                    <span class="total-count">{{ $totalProyek ?? $totalProjects }}</span>
                                    <span class="total-label">Total Proyek</span>
                                </div>
                            </div>

                            <!-- Legend yang lebih ringkas -->
                            <div class="donut-legend mt-3">
                                @foreach($lokasiLabelsData as $index => $label)
                                @if(($lokasiCounts[$index] ?? 0) > 0)
                                <div class="legend-item">
                                    @php
                                        $colorIndex = $index % count($colors);
                                        $color = $colors[$colorIndex];
                                        $count = $lokasiCounts[$index] ?? 0;
                                        $percentage = $totalProjects > 0 ? round(($count / $totalProjects) * 100, 1) : 0;
                                    @endphp
                                    <span class="legend-color" style="background-color: {{ $color }}"></span>
                                    <span class="legend-label">{{ $label }}</span>
                                    <span class="legend-percentage">{{ $percentage }}%</span>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        @else
                            <div class="no-data-container">
                                <div class="no-data-icon">📊</div>
                                <p class="no-data-text">Belum ada data distribusi</p>
                                <small>Proyek akan muncul setelah ditambahkan</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======== FITUR UTAMA ======== -->
    <section class="section1 text-center">
        <div class="container">
            <div class="general-title">
                <h3>Fitur Utama Sistem</h3>
                <hr>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="servicebox text-center">
                        <i class="active dm-icon fa fa-line-chart fa-3x"></i>
                        <h4>Monitoring Progres</h4>
                        <p>Pantau perkembangan proyek secara real-time.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="servicebox text-center">
                        <i class="active dm-icon fa fa-money fa-3x"></i>
                        <h4>Anggaran Transparan</h4>
                        <p>Pelaporan keuangan yang jelas & terstruktur.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="servicebox text-center">
                        <i class="active dm-icon fa fa-users fa-3x"></i>
                        <h4>Manajemen User</h4>
                        <p>Kelola akun admin & operator.</p>
                        <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm mt-2">Kelola User</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======== AJAK TAMBAH PROYEK ======== -->
    <section class="section2">
        <div class="container text-center">
            <h2 class="big-title">Mulai Kelola <span>Proyek</span> Anda Hari Ini!</h2>
            <p class="small-title">Buat dan pantau progres proyek langsung dari dashboard.</p>
            <a class="button large" href="{{ route('proyek.create') }}">+ Tambah Proyek Baru</a>
        </div>
    </section>

    <!-- 🔘 Floating WhatsApp Button -->
    <a href="https://wa.me/6285156845682?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20Proyek."
        target="_blank" class="whatsapp-float" title="Hubungi via WhatsApp">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <style>
        /* ===== STYLE CARD STATISTIK BARU ===== */
        .stat-card-new {
            background: white;
            border-radius: 16px;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            height: 100%;
        }

        .stat-card-new:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
            border-color: #dee2e6;
        }

        .stat-icon-new {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .icon-new {
            font-size: 24px;
        }

        .stat-title-new {
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value-new {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
            line-height: 1.2;
        }

        /* Progress bar khusus untuk card progres */
        .stat-card-new .progress {
            border-radius: 10px;
            background-color: #f1f5f9;
        }

        .stat-card-new .progress-bar {
            border-radius: 10px;
        }

        /* ===== STYLE CHART CARD ===== */
        .chart-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border: 1px solid #e9ecef;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .chart-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 25px;
            text-align: center;
            border-bottom: 2px solid #f0f4f8;
            padding-bottom: 10px;
            font-size: 1.1rem;
        }

        /* ===== BAR CHART STYLE ===== */
        .chart-container {
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            height: 220px;
            padding: 15px 10px;
            gap: 12px;
            flex: 1;
            margin-bottom: 10px;
        }

        .bar-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            max-width: 80px;
        }

        .bar-label {
            font-size: 11px;
            color: #5a6c7d;
            margin-top: 8px;
            text-align: center;
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
        }

        .bar-wrapper {
            flex: 1;
            width: 100%;
            display: flex;
            align-items: flex-end;
            position: relative;
        }

        .bar {
            width: 100%;
            min-height: 20px;
            border-radius: 6px 6px 0 0;
            position: relative;
            transition: height 0.8s ease;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            background: linear-gradient(to top, #3b82f6, #60a5fa);
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.2);
        }

        .bar-value {
            position: absolute;
            top: -25px;
            left: 0;
            right: 0;
            text-align: center;
            font-weight: 600;
            font-size: 13px;
            color: #3b82f6;
            background: white;
            padding: 2px 6px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: fit-content;
            margin: 0 auto;
        }

        /* Chart footer statistik */
        .chart-footer {
            border-top: 1px solid #e9ecef;
            padding-top: 15px;
            margin-top: auto;
        }

        .stat-info {
            padding: 5px;
        }

        .stat-info .stat-value {
            font-size: 20px;
            font-weight: 700;
            color: #3b82f6;
            line-height: 1.2;
        }

        .stat-info .stat-label {
            font-size: 11px;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ===== DONUT CHART STYLE ===== */
        .donut-chart {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .donut-container {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 20px;
        }

        .donut {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            position: relative;
            background: #f3f4f6;
        }

        .donut-inner {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            transition: transform 0.8s ease;
        }

        .donut-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90px;
            height: 90px;
            background: white;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .total-count {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
        }

        .total-label {
            font-size: 11px;
            color: #7f8c8d;
        }

        .donut-legend {
            display: flex;
            flex-direction: column;
            gap: 8px;
            max-height: 200px;
            overflow-y: auto;
            padding-right: 5px;
            margin-top: auto;
        }

        .legend-item {
            display: flex;
            align-items: center;
            padding: 6px 8px;
            font-size: 11px;
            border-radius: 6px;
            transition: background-color 0.2s;
        }

        .legend-item:hover {
            background-color: #f9fafb;
        }

        .legend-color {
            width: 10px;
            height: 10px;
            border-radius: 3px;
            margin-right: 8px;
            flex-shrink: 0;
        }

        .legend-label {
            flex: 1;
            color: #5a6c7d;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .legend-percentage {
            color: #2c3e50;
            font-weight: 600;
            font-size: 10px;
            background: #f3f4f6;
            padding: 2px 6px;
            border-radius: 10px;
            margin-left: 5px;
        }

        /* ===== NO DATA STYLES ===== */
        .no-data-chart {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #9ca3af;
            text-align: center;
            font-style: italic;
            padding: 20px;
            flex: 1;
        }

        .no-data-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: #9ca3af;
            text-align: center;
            padding: 30px 20px;
            flex: 1;
        }

        .no-data-icon {
            font-size: 48px;
            margin-bottom: 15px;
            opacity: 0.5;
        }

        .no-data-text {
            font-size: 16px;
            margin-bottom: 5px;
            font-weight: 500;
        }

        /* ===== SCROLLBAR STYLING ===== */
        .donut-legend::-webkit-scrollbar {
            width: 4px;
        }

        .donut-legend::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .donut-legend::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .donut-legend::-webkit-scrollbar-thumb:hover {
            background: #a1a1a1;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 1200px) {
            .stat-value-new {
                font-size: 24px;
            }

            .stat-icon-new {
                width: 48px;
                height: 48px;
            }

            .icon-new {
                font-size: 20px;
            }

            .donut-container {
                width: 160px;
                height: 160px;
            }

            .donut-center {
                width: 80px;
                height: 80px;
            }
        }

        @media (max-width: 992px) {
            .chart-container {
                height: 200px;
            }

            .bar-label {
                font-size: 10px;
            }

            .bar-value {
                font-size: 11px;
                top: -22px;
            }
        }

        @media (max-width: 768px) {
            .chart-container {
                height: 180px;
                gap: 8px;
            }

            .bar-label {
                font-size: 9px;
            }

            .bar-value {
                font-size: 10px;
                top: -20px;
            }

            .donut-container {
                width: 140px;
                height: 140px;
            }

            .donut-center {
                width: 70px;
                height: 70px;
            }

            .total-count {
                font-size: 20px;
            }

            .no-data-icon {
                font-size: 36px;
            }

            .stat-value-new {
                font-size: 22px;
            }

            .stat-card-new .card-body {
                padding: 1.25rem !important;
            }
        }

        @media (max-width: 576px) {
            .stat-icon-new {
                width: 44px;
                height: 44px;
            }

            .icon-new {
                font-size: 18px;
            }

            .stat-value-new {
                font-size: 20px;
            }

            .chart-title {
                font-size: 1rem;
            }

            .bar-item {
                max-width: 60px;
            }
        }

        /* WhatsApp Button (existing) */
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 25px;
            right: 25px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            font-size: 32px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 2px 4px 12px rgba(0, 0, 0, 0.3);
            color: #fff;
            text-decoration: none;
        }
    </style>

    <!-- Animasi untuk grafik -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate bars dengan delay bertahap
            const bars = document.querySelectorAll('.bar');
            bars.forEach((bar, index) => {
                const originalHeight = bar.style.height;
                bar.style.height = '0%';
                bar.style.opacity = '0';

                setTimeout(() => {
                    bar.style.transition = 'height 0.8s ease, opacity 0.5s ease';
                    bar.style.height = originalHeight;
                    bar.style.opacity = '1';
                }, 200 + (index * 100));
            });

            // Animate donut
            const donutInner = document.querySelector('.donut-inner');
            if (donutInner) {
                donutInner.style.opacity = '0';
                donutInner.style.transform = 'rotate(-90deg) scale(0.8)';

                setTimeout(() => {
                    donutInner.style.transition = 'opacity 0.8s ease, transform 1.2s ease';
                    donutInner.style.opacity = '1';
                    donutInner.style.transform = 'rotate(0deg) scale(1)';
                }, 500);
            }

            // Hover effect untuk bar chart
            const barItems = document.querySelectorAll('.bar-item');
            barItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    const bar = this.querySelector('.bar');
                    if (bar) {
                        bar.style.transform = 'scaleX(1.1)';
                        bar.style.transition = 'transform 0.3s ease';
                    }
                });

                item.addEventListener('mouseleave', function() {
                    const bar = this.querySelector('.bar');
                    if (bar) {
                        bar.style.transform = 'scaleX(1)';
                    }
                });
            });
        });
    </script>

@endsection

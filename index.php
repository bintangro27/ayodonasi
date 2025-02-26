<?php

require_once "function/koneksi.php";
require_once "function/copyright.php";
$jumlahdataperhalaman = 5;
$jumlahdata = count(query("SELECT * FROM donatur"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman); 

$halamanaktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;


// Mengambil data dengan urutan ID yang benar
$donatur = query("SELECT * FROM donatur ORDER BY id DESC LIMIT $awaldata, $jumlahdataperhalaman");

$nomorID = $awaldata + 1; // Menentukan nomor ID dimulai dari offset + 1


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Donasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }
        .slide-in {
            animation: slideIn 1s ease-in-out;
        }
        .bounce-in {
            animation: bounceIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideIn {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        @keyframes bounceIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            60% {
                transform: scale(1.2);
                opacity: 1;
            }
            100% {
                transform: scale(1);
            }
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-gray-800 slide-in">AyoDonasi</a>
            <div class="hidden md:flex space-x-4">
                <a href="about.php" class="text-gray-800 hover:text-blue-600 slide-in">About</a>
                <a href="https://ribin.my.id/" class="text-gray-800 hover:text-blue-600 slide-in">Contact</a>
                <a href="tambah_donasi.php" class="text-gray-800 hover:text-blue-600 slide-in">Donate</a>
                <a href="login.php" class="text-gray-800 hover:text-blue-600 slide-in">Login</a>
            </div>
            <div class="md:hidden relative dropdown">
                <button id="menu-button" class="text-gray-800 focus:outline-none hover:text-blue-600">
                    <i class="fas fa-bars"></i>
                </button>
                <div id="mobile-menu" class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20">
                    <a href="about.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">About</a>
                    <a href="https://ribin.my.id/" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Contact</a>
                    <a href="tambah_donasi.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Donate</a>
                    <a href="login.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4 flex-grow">
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6 relative fade-in">
            <img alt="Background image showing a community coming together for donations" class="absolute inset-0 w-full h-full object-cover opacity-45 rounded-lg" height="300" src="https://storage.googleapis.com/a1aa/image/De-fNLiTkyYCGNilri06yVoDji1TLH8Ya6FcRzlW0Dc.jpg" width="1200"/>
            <div class="relative z-10">
                <h1 class="text-3xl font-bold mb-4 text-gray-800 bounce-in">Laporan Donasi</h1>
                <p class="text-gray-700 mb-6 slide-in">Selamat datang di AyoDonasi! Bergabunglah dalam gerakan kebaikan ini untuk melihat bagaimana kontribusi Anda berperan dalam mengubah banyak kehidupan. Di sini, Anda dapat memantau total donasi, jumlah donatur, dan tanggal terkumpulnya dana.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white p-6 rounded-lg shadow-md slide-in">
                    <?php
                            $query = "SELECT SUM(nominal) AS total_donasi FROM donatur";
                            $result = mysqli_query($conn, $query);
                            $total_donasi = mysqli_fetch_assoc($result);
                    ?>
                        <h2 class="text-lg font-semibold">Dana Terkumpul</h2>
                        <p class="text-3xl font-bold" id="dana-terkumpul"></p>
                    </div>
                    <div class="bg-gradient-to-r from-green-500 to-teal-500 text-white p-6 rounded-lg shadow-md slide-in">
                    <?php
                            $query = "SELECT COUNT(*) AS total_donatur FROM donatur";
                            $result = mysqli_query($conn, $query);
                            $total_donatur = mysqli_fetch_assoc($result);
                    ?>
                        <h2 class="text-lg font-semibold">Donatur Bergabung</h2>
                        <p class="text-3xl font-bold" id="donatur-bergabung"></p>
                    </div>
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white p-6 rounded-lg shadow-md slide-in">
                    <?php
                            $query = "SELECT tanggal_diterima FROM donatur ORDER BY tanggal_diterima DESC LIMIT 1";
                            $result = mysqli_query($conn, $query);
                            $tanggal_diterima = mysqli_fetch_assoc($result);
                    ?>
                        <h2 class="text-lg font-semibold">Tanggal Donasi Terkumpul</h2>
                        <p class="text-3xl font-bold" id="tanggal-donasi">
                        <?php echo $tanggal_diterima['tanggal_diterima']; ?>
                        </p>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <a href="tambah_donasi.php" class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-3 rounded-lg shadow-md hover:from-blue-600 hover:to-indigo-600 transition duration-300 bounce-in">
                        <i class="fas fa-donate mr-2"></i> Donate Now
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 fade-in">
            <h2 class="text-2xl font-bold mb-4 text-gray-800 bounce-in">Data Donasi</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">No</th>
                            <th class="py-3 px-6 text-left">Nama Donatur</th>
                            <th class="py-3 px-6 text-left">Nominal</th>
                            <th class="py-3 px-6 text-left">Metode Pembayaran</th>
                            <th class="py-3 px-6 text-left">Tgl Diterima</th>
                            <th class="py-3 px-6 text-left">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php $i = 1; ?>
                        <?php foreach($donatur as $row) : ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left"><?= $nomorID++; ?></td>
                            <td class="py-3 px-6 text-left"><?= $row["nama"]; ?></td>
                            <td class="py-3 px-6 text-left"><?= $row["nominal"]; ?></td>
                            <td class="py-3 px-6 text-left"><?= $row["metode"]; ?></td>
                            <td class="py-3 px-6 text-left"><?= $row["tanggal_diterima"]; ?></td>
                            <td class="py-3 px-6 text-left"><?= $row["deskripsi"]; ?></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 flex justify-center">
                
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <?php if($halamanaktif > 1) : ?>
                    <a href="?halaman=<?= $halamanaktif -1; ?>" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Previous</span>
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <?php endif; ?>
                    <?php for($i= 1; $i <= $jumlahhalaman; $i++) : ?>
                    <?php if($i == $halamanaktif) : ?>
                    <a href="?halaman=<?= $i; ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"><?= $i; ?></a>
                    <?php else : ?>
                    <a href="?halaman=<?= $i; ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50"><?= $i; ?></a>
                    <?php endif; ?>
                    <?php endfor; ?>
                    
                    <?php if($halamanaktif < $jumlahhalaman) : ?>
                    <a href="?halaman=<?= $halamanaktif + 1 ; ?>" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Next</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-white mt-6">
        <div class="container mx-auto p-4 flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400">
    &copy; <?= $copyright; ?>
    </p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="notfound.html" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="notfound.html" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                <a href=="https://www.instagram.com/bintangrrrrrr/"  target="_blank" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/in/bintangro/"  target="_blank" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Add fade-in effect to elements
        document.addEventListener('DOMContentLoaded', function() {
            const fadeInElements = document.querySelectorAll('.fade-in');
            fadeInElements.forEach(element => {
                element.classList.add('opacity-0');
                setTimeout(() => {
                    element.classList.remove('opacity-0');
                }, 100);
            });

            // Animate numbers
            animateNumber('dana-terkumpul', <?php 
            echo $total_donasi['total_donasi']; 
            ?>, 'Rp. ');
            animateNumber('donatur-bergabung', <?php echo $total_donatur['total_donatur']; ?>);
        });

        function animateNumber(id, endValue, prefix = '', isDate = false) {
            const element = document.getElementById(id);
            let startValue = 0;
            const duration = 2000;
            const startTime = performance.now();

            function updateNumber(currentTime) {
                const elapsedTime = currentTime - startTime;
                const progress = Math.min(elapsedTime / duration, 1);
                const currentValue = isDate ? endValue : Math.floor(progress * endValue);

                element.textContent = isDate ? endValue : `${prefix}${currentValue.toLocaleString()}`;

                if (progress < 1) {
                    requestAnimationFrame(updateNumber);
                }
            }

            requestAnimationFrame(updateNumber);
        }

        // Add scroll-to-top button
        const scrollToTopButton = document.createElement('button');
        scrollToTopButton.innerHTML = '<i class="fas fa-arrow-up"></i>';
        scrollToTopButton.classList.add('fixed', 'bottom-4', 'right-4', 'bg-blue-600', 'text-white', 'p-3', 'rounded-full', 'shadow-md', 'hover:bg-blue-700', 'transition', 'duration-300', 'hidden');
        document.body.appendChild(scrollToTopButton);

        scrollToTopButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                scrollToTopButton.classList.remove('hidden');
            } else {
                scrollToTopButton.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
<?php
require_once 'function/copyright.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Donation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f3f4f6;
        }
        main {
            flex: 1;
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
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <nav class="bg-white shadow-md">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-gray-800 slide-in"> AyoDonasi</a>
            <div class="hidden md:flex space-x-4">
                <a href="index.php" class="text-gray-800 hover:text-blue-600 slide-in">Home</a>
                <a href="https://ribin.my.id/" class="text-gray-800 hover:text-blue-600 slide-in">Contact</a>
                <a href="tambah_donasi.php" class="text-gray-800 hover:text-blue-600 slide-in">Donate</a>
                <a href="login.php" class="text-gray-800 hover:text-blue-600 slide-in">Login</a>
            </div>
            <div class="md:hidden relative dropdown">
                <button id="menu-button" class="text-gray-800 focus:outline-none hover:text-blue-600">
                    <i class="fas fa-bars"></i>
                </button>
                <div id="mobile-menu" class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20">
                    <a href="index.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Home</a>
                    <a href="https://ribin.my.id/" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Contact</a>
                    <a href="tambah_donasi.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Donate</a>
                    <a href="login.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6 relative fade-in">
            <div class="relative z-10">
                <h1 class="text-3xl font-bold mb-4 text-gray-800 bounce-in">Tentang Program Donasi Kami</h1>
                <p class="text-gray-700 mb-6 slide-in">Program donasi kami didedikasikan untuk memberikan dampak positif bagi masyarakat. Kami percaya pada kekuatan upaya kolektif dan perbedaan yang dapat dibuat dalam kehidupan mereka yang membutuhkan. Di bawah ini adalah beberapa foto dan deskripsi kegiatan donasi kami baru-baru ini.</p>
                <div class="text-center mb-6">
                    <a href="tambah_donasi.php" class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-3 rounded-lg shadow-md hover:from-blue-600 hover:to-indigo-600 transition duration-300 bounce-in">
                        <i class="fas fa-donate mr-2"></i> Donate Now
                    </a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md card">
                        <img alt="Image of volunteers distributing food to the needy" class="w-full h-48 object-cover rounded-lg mb-4" height="400" src="https://storage.googleapis.com/a1aa/image/SnqY0nEIx9B9NPPFLi4PekS0PoErUiyxffWEHRS-S-8.jpg" width="600"/>
                        <h3 class="text-lg font-semibold text-gray-800">Distribusi Makanan</h3>
                        <p class="text-gray-700 mt-2">Relawan kami mendistribusikan makanan kepada mereka yang membutuhkan di masyarakat. Inisiatif ini bertujuan untuk memastikan tidak ada yang kelaparan.</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md card">
                        <img alt="Image of a community clean-up event" class="w-full h-48 object-cover rounded-lg mb-4" height="400" src="https://storage.googleapis.com/a1aa/image/_fPIRlBZ4xrnPFWCKnuXO5pVuUUXYh9KUWQ7uaBtpio.jpg" width="600"/>
                        <h3 class="text-lg font-semibold text-gray-800">Pembersihan Lingkungan</h3>
                        <p class="text-gray-700 mt-2">Acara bersih-bersih komunitas yang diselenggarakan untuk mempromosikan lingkungan yang lebih bersih dan sehat bagi semua orang.</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md card">
                        <img alt="Image of children receiving school supplies" class="w-full h-48 object-cover rounded-lg mb-4" height="400" src="https://storage.googleapis.com/a1aa/image/TGEFSH3pB-eIROdaLqOGA4Ixw8jZdMtSCOiAtyE33Fk.jpg" width="600"/>
                        <h3 class="text-lg font-semibold text-gray-800">Distribusi Perlengkapan Sekolah</h3>
                        <p class="text-gray-700 mt-2">Mendistribusikan perlengkapan sekolah kepada anak-anak untuk mendukung pendidikan mereka dan memastikan mereka memiliki alat yang diperlukan untuk sukses.</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md card">
                        <img alt="Image of a medical camp providing free check-ups" class="w-full h-48 object-cover rounded-lg mb-4" height="400" src="https://storage.googleapis.com/a1aa/image/xrJAA3V63oVbYGybUEW37Pj9mfoWjSkX70Nk1Gp5g38.jpg" width="600"/>
                        <h3 class="text-lg font-semibold text-gray-800">Kamp Medis</h3>
                        <p class="text-gray-700 mt-2">Sebuah kamp medis yang menyediakan pemeriksaan gratis dan bantuan medis bagi mereka yang tidak mampu membayar layanan kesehatan.</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md card">
                        <img alt="Image of a tree planting event" class="w-full h-48 object-cover rounded-lg mb-4" height="400" src="https://storage.googleapis.com/a1aa/image/MpGR2DaZfHSDhlyFFgAOO8DW494SGtEI5POsCjIzBvg.jpg" width="600"/>
                        <h3 class="text-lg font-semibold text-gray-800">Penanaman Pohon</h3>
                        <p class="text-gray-700 mt-2">Acara penanaman pohon untuk mempromosikan kelestarian lingkungan dan memerangi perubahan iklim.</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg shadow-md card">
                        <img alt="Image of a fundraising event" class="w-full h-48 object-cover rounded-lg mb-4" height="400" src="https://storage.googleapis.com/a1aa/image/PFVVmOvUF-IyZgbbZG3rXRFY_5I9d_yUW_4Hfxcf67U.jpg" width="600"/>
                        <h3 class="text-lg font-semibold text-gray-800">Fundraising Event</h3>
                        <p class="text-gray-700 mt-2">Acara penggalangan dana untuk mengumpulkan sumber daya dan dukungan untuk berbagai inisiatif dan program komunitas kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-white mt-6">
        <div class="container mx-auto p-4 flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400">
    &copy; <?= $copyright; ?>
    </p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="notfound.html" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                <a href="notfound.html" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/bintangrrrrrr/"  target="_blank" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
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
        });

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
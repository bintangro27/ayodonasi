<?php
require_once 'function/tambah.php';
require_once 'function/copyright.php';

$databerhasil = ""; // Variabel untuk menyimpan pesan
$redirectUrl = ""; // URL untuk pengalihan

if(isset($_POST["submit"])) {
    if(tambah($_POST) > 0) {
        $databerhasil = "success";
        $redirectUrl = "index.php"; // Halaman tujuan
    } else {
        $databerhasil = "error";
    }
}
?>
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>
   Tambah Donasi
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
  </style>
 </head>
 <body class="bg-gray-50">
  <nav class="bg-white shadow-md">
   <div class="container mx-auto p-4 flex justify-between items-center">
    <a class="text-2xl font-bold text-gray-800 slide-in" href="#">
     AyoDonasi
    </a>
    <div class="hidden md:flex space-x-4">
     <a class="text-gray-800 hover:text-blue-600 slide-in" href="index.php">
      Home
     </a>
     <a class="text-gray-800 hover:text-blue-600 slide-in" href="about.php">
      About
     </a>
     <a class="text-gray-800 hover:text-blue-600 slide-in" href="https://ribin.my.id/">
      Contact
     </a>
     <a class="text-gray-800 hover:text-blue-600 slide-in" href="login.php">
      Login
     </a>
    </div>
    <div class="md:hidden relative dropdown">
     <button class="text-gray-800 focus:outline-none hover:text-blue-600" id="menu-button">
      <i class="fas fa-bars">
      </i>
     </button>
     <div class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20" id="mobile-menu">
      <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100" href="index.php">
       Home
      </a>
      <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100" href="about.php">
       About
      </a>
      <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100" href="https://ribin.my.id/">
       Contact
      </a>
      <a class="block px-4 py-2 text-gray-800 hover:bg-gray-100" href="login.php">
       Login
      </a>
     </div>
    </div>
   </div>
  </nav>
  <main class="container mx-auto p-4">
   <div class="bg-white shadow-lg rounded-lg p-6 mb-6 relative fade-in">
    <img alt="Background image showing hands holding a heart, symbolizing charity and donation" class="absolute inset-0 w-full h-full object-cover opacity-45 rounded-lg" height="300" src="https://storage.googleapis.com/a1aa/image/De-fNLiTkyYCGNilri06yVoDji1TLH8Ya6FcRzlW0Dc.jpg" width="1200"/>
    <div class="relative z-10">
     <h1 class="text-3xl font-bold mb-4 text-gray-800 bounce-in">
      Tambah Donasi
     </h1>
     <p class="text-gray-700 mb-6 slide-in">
      Silakan isi form di bawah ini untuk menambahkan donasi Anda. Setiap kontribusi sangat berarti bagi kami.
     </p>
     <form class="space-y-4" enctype="multipart/form-data" method="post">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
       <div class="col-span-1">
        <label class="block text-gray-700" for="nama-pengirim">
         Nama Pengirim
        </label>
        <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="nama-pengirim" name="nama" placeholder="Nama Pengirim" required="" type="name"/>
       </div>
       <div class="col-span-1">
        <label class="block text-gray-700" for="nominal">
         Nominal
        </label>
        <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="nominal" name="nominal" placeholder="Nominal" required="" type="number"/>
       </div>
      </div>
      <div>
       <label class="block text-gray-700" for="metode-pembayaran">
        Metode Pembayaran
       </label>
       <select class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="metode-pembayaran" name="metode" onchange="showVirtualAccount()" required="">
        <option value="">
         Pilih Metode Pembayaran
        </option>
        <option name="metode" type="radio" value="ShopeePay">
         ShopeePay
        </option>
        <option name="metode" type="radio" value="gopay">
         GoPay
        </option>
        <option name="metode" type="radio" value="Transfer">
         Transfer
        </option>
       </select>
      </div>
      <div class="hidden mt-4" id="virtual-account">
       <div class="bg-gray-100 p-4 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-800">
         Kode Virtual Account
        </h3>
        <p class="text-gray-700 mt-2" id="virtual-account-code">
        </p>
       </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
       <div class="hidden" id="bukti-transfer">
        <label class="block text-gray-700" for="bukti-transfer-file">
         Upload Bukti Transfer
        </label>
        <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="bukti-transfer-file" name="bukti" onchange="previewImage(event)" required="" type="file"/>
        <div class="mt-4" id="image-preview">
        </div>
       </div>
       <div class="hidden" id="deskripsi-container">
        <label class="block text-gray-700" for="deskripsi">
         Deskripsi (Optional)
        </label>
        <textarea class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
       </div>
      </div>
      <div class="text-center mt-6">
       <button class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-3 rounded-lg shadow-md hover:from-blue-600 hover:to-indigo-600 transition duration-300" name="submit" type="submit">
        <i class="fas fa-paper-plane mr-2">
        </i>
        Submit
       </button>
       <button class="bg-gradient-to-r from-gray-500 to-gray-700 text-white px-6 py-3 rounded-lg shadow-md hover:from-gray-600 hover:to-gray-800 transition duration-300 ml-4" onclick="resetPreview()" type="reset">
        <i class="fas fa-undo mr-2">
        </i>
        Reset
       </button>
      </div>
     </form>
    </div>
   </div>
  </main>
 </body>
</html>

  <footer class="bg-gray-900 text-white mt-6">
   <div class="container mx-auto p-4 flex flex-col md:flex-row justify-between items-center">
    <p class="text-gray-400">
    &copy; <?= $copyright; ?>
    </p>
    <div class="flex space-x-4 mt-4 md:mt-0">
     <a class="text-gray-400 hover:text-white" href="notfound.html">
      <i class="fab fa-facebook-f">
      </i>
     </a>
     <a class="text-gray-400 hover:text-white" href="notfound.html">
      <i class="fab fa-twitter">
      </i>
     </a>
     <a class="text-gray-400 hover:text-white" href="https://www.instagram.com/bintangrrrrrr/"  target="_blank">
      <i class="fab fa-instagram">
      </i>
     </a>
     <a class="text-gray-400 hover:text-white" href="https://www.linkedin.com/in/bintangro/" >
      <i class="fab fa-linkedin-in">
      </i>
     </a>
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

        function showVirtualAccount() {
            const metodePembayaran = document.getElementById('metode-pembayaran').value;
            const virtualAccountDiv = document.getElementById('virtual-account');
            const virtualAccountCode = document.getElementById('virtual-account-code');
            const buktiTransferDiv = document.getElementById('bukti-transfer');
            const deskripsiContainer = document.getElementById('deskripsi-container');

            if (metodePembayaran === 'ShopeePay') {
                virtualAccountDiv.classList.remove('hidden');
                virtualAccountCode.textContent = '122082111210341 (ShopeePay)';
                buktiTransferDiv.classList.remove('hidden');
                deskripsiContainer.classList.remove('hidden');
            } else if (metodePembayaran === 'gopay') {
                virtualAccountDiv.classList.remove('hidden');
                virtualAccountCode.textContent = '	70001082111210341 (GoPay)';
                buktiTransferDiv.classList.remove('hidden');
                deskripsiContainer.classList.remove('hidden');
            } else if (metodePembayaran === 'Transfer') {
                virtualAccountDiv.classList.remove('hidden');
                virtualAccountCode.textContent = '6220553521 (BCA/BINTANG RAMADHAN OCTAVIANTO)';
                buktiTransferDiv.classList.remove('hidden');
                deskripsiContainer.classList.remove('hidden');
            } else {
                virtualAccountDiv.classList.add('hidden');
                virtualAccountCode.textContent = '';
                buktiTransferDiv.classList.add('hidden');
                deskripsiContainer.classList.add('hidden');
            }
        }

        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            imagePreview.innerHTML = '';
            const file = event.target.files[0];
            if (file) {
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.classList.add('mt-2', 'rounded-lg', 'shadow-md');
                img.style.maxWidth = '200px';
                img.style.maxHeight = '200px';
                imagePreview.appendChild(img);
            }
        }

        function resetPreview() {
            const imagePreview = document.getElementById('image-preview');
            imagePreview.innerHTML = '';
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

          //untuk sweet alert
          document.addEventListener('DOMContentLoaded', function() {
            const databerhasil = "<?php echo $databerhasil; ?>";
            const redirectUrl = "<?php echo $redirectUrl; ?>";

            if (databerhasil === "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil disimpan.',
                }).then(() => {
                    window.location.href = redirectUrl; // Redirect setelah SweetAlert
                });
            } else if (databerhasil === "error") {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat menyimpan data.',
                });
            }
        });     
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 </body>
</html>

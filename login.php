<?php
session_start();




$databerhasil = ""; // Variabel untuk menyimpan pesan
$redirectUrl = ""; // URL untuk pengalihan


if(isset($_SESSION["login"])) {
    header("Location: admin/manage_donasi.php");
    exit;
}

require_once "function/koneksi.php";
require_once "function/copyright.php";

if(isset($_POST["login"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    /*
    $2y$10$9R7IYgmcL6dfFAaJqJEqZuZTtU0mnUs4.0jr70Rh8A40CNhYZilW6   //algoitma sha256
    */

    //cek username
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
          $_SESSION["login"] = true;
          $databerhasil = "success";
          $redirectUrl = "admin/manage_donasi.php"; // Halaman tujuan
        } else {
            $databerhasil = "error";
        }

    }

    $error = true;

    


}




?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    </style>
</head>
<body>
    <nav class="bg-white shadow-md">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-gray-800 slide-in">AyoDonasi</a>
            <div class="hidden md:flex space-x-4">
                <a href="index.php" class="text-gray-800 hover:text-blue-600 slide-in">Home</a>
                <a href="about.php" class="text-gray-800 hover:text-blue-600 slide-in">About</a>
                <a href="https://ribin.my.id/" class="text-gray-800 hover:text-blue-600 slide-in">Contact</a>
                <a href="tambah_donasi.php" class="text-gray-800 hover:text-blue-600 slide-in">Donate</a>
            </div>
            <div class="md:hidden relative dropdown">
                <button id="menu-button" class="text-gray-800 focus:outline-none hover:text-blue-600">
                    <i class="fas fa-bars"></i>
                </button>
                <div id="mobile-menu" class="dropdown-menu hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-20">
                    <a href="index.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Home</a>
                    <a href="about.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">About</a>
                    <a href="https://ribin.my.id/" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Contact</a>
                    <a href="tambah_donasi.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Donate</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-4 flex justify-center items-center flex-1">
        <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md relative fade-in">
            <h1 class="text-3xl font-bold mb-4 text-gray-800 bounce-in text-center">Login</h1>
            <p class="text-gray-700 mb-6 text-center">Login ini hanya untuk penggunaan admin. Masukkan kredensial Anda untuk mengakses dashboard admin.</p>
            <?php if(isset($error)) : ?>
              <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">Username atau password salah.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <a href="login.php">  <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 10-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z"/></svg></a>
                </span>
              </div>    
           <?php endif; ?>
            <form action="" method="post" class="space-y-4">
                <div>
                    <label for="username" class="block text-gray-700">username</label>
                    <input type="username" id="username" name="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your username">
                </div>
                <div>
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your Password">
                </div>
                <div class="text-center">
                    <button type="submit" name="login" class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-3 rounded-lg shadow-md hover:from-blue-600 hover:to-indigo-600 transition duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </button>
                </div>
            </form>
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


          //untuk sweet alert
          document.addEventListener('DOMContentLoaded', function() {
            const databerhasil = "<?php echo $databerhasil; ?>";
            const redirectUrl = "<?php echo $redirectUrl; ?>";
            const username =  "<?php echo $_POST["username"]; ?>";

            if (databerhasil === "success") {
                Swal.fire({
                    icon: "success",
                    title: "Selamat datang, " + username,
                    text: 'Login Berhasil!',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    window.location.href = redirectUrl; // Redirect setelah SweetAlert
                });
            }
            // else if (databerhasil === "error") {
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Gagal Login!',
            //         text: 'Username atau password salah.',
            //         confirmButtonText: "Coba Lagi"
            //     });
            // }
        });     
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>

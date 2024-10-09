<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Web dengan Navbar Modern</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <div class="container">
            <!-- Navbar -->
            <nav class="navbar">
                <div class="logo">
                    <a href="#">Garden</a>
                </div>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li> 
                    <li><a href="#about">About</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <!-- Tombol hamburger untuk mobile -->
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
        </div>
    </header>

    <section id="home">
        <div class="home">
            <h2>Flower's is Art</h2>
            <p>Flower's make us feel all emotions.</p>
            <a href="#" class="button">Pelajari Lebih Lanjut</a>
        </div>
    </section>

    <section id="about">
        <div class="about">
            <header>
                <h1>About</h1>
            </header>
            <div class="about-content">
                <img src="https://i.pinimg.com/736x/25/c1/12/25c1120c8a49585f25557d03e17e8613.jpg" alt="Gambar Tentang Kami" class="about-image">
                <div class="about-text">
                    <h2>The flower's Store in Indonesia </h2>
                    <p>Usaha atau bisnis yang khusus menyediakan berbagai jenis bunga dan tanaman, baik dalam bentuk segar maupun kering, untuk dijual kepada pelanggan. Toko bunga dapat menawarkan berbagai produk dan layanan yang berkaitan dengan bunga</p>

                    <h2>Mission</h2>
                    <p>Our mission is to help people express their emotions through flowers</p>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan">
        <div class="layanan">
            <header>
                <h2>Our Services</h2>
            </header>
            <div class="service-grid">
                <div class="card">
                    <h3>Bucket</h3>
                    <img src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2023/2/21/aa95c115-4bb8-4dfa-ba51-faa977ecfc14.png" alt="Bucket" class="service-image">
                    <p>Membuat berbagai jenis bucket dari berbagai jenis bunga</p>
                </div>
                <div class="card">
                    <h3>The Flower</h3>
                    <img src="https://images.tokopedia.net/img/cache/700/product-1/2020/2/10/22326866/22326866_6346d46d-569f-4840-98f9-b458f8183802_500_500" alt="The Flower" class="service-image">
                    <p>Menyediakan berbagai jenis Bunga</p>
                </div>
                <div class="card">
                    <h3>Plant</h3>
                    <img src="https://down-id.img.susercontent.com/file/id-11134207-7r992-lqcte70h7jt2a3" alt="Plant" class="service-image">
                    <p>Menyediakan tanaman bunga dalam pot</p>
                </div>
            </div>
        </div>
    </section>
    

    <section id="contact">
        <div class="contact">
            <header>
                <h1>Contact Us</h1>
            </header>
            <form action="contacts.php" method="post">
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Pesan:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="button">Kirim Pesan</button>
            </form>            
         
        </div>
    </section>
    
    <!-- Script untuk mengaktifkan burger menu -->
    <script>
        const burger = document.querySelector('.burger');
        const navLinks = document.querySelector('.nav-links');

        burger.addEventListener('click', () => {
            navLinks.classList.toggle('nav-active');
            burger.classList.toggle('toggle');
        });

        // Menutup menu saat tautan diklik (jika diinginkan)
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('nav-active');
                burger.classList.remove('toggle');
            });
        });
    </script>

</body>
</html>

<?php
// Konfigurasi koneksi ke database
$servername = "localhost";
$username = "root";  // Ganti dengan username MySQL Anda
$password = "";  // Ganti dengan password MySQL Anda
$dbname = "flower_store";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses data form jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Pesan berhasil dikirim!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}
?>

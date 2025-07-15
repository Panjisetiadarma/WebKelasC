<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Anomali - Teknik Informatika UNJANI</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Loading Screen -->
    <div class="loading-screen">
        <div class="anomali-logo">ANOMALI</div>
        <div id="hexContainer"></div>
    </div>

    <!-- Header & Navigation -->
    <header>
        <div class="container">
            <nav>
                <!-- <div class="logo">Kelas <span>Anomali</span></div> -->
                <a href="../student-crud/login.php" class="logo">Kelas <span>Anomali</span></a>
                <ul class="nav-links">
                    <li><a href="#landing">Home</a></li>
                    <li><a href="#tentang">Tentang</a></li>
                    <li><a href="#album">Album</a></li>
                    <li><a href="#mahasiswa">Mahasiswa</a></li>
                    <li><a href="#proyek">Proyek</a></li>
                    <li><a href="#sosial">Sosial Media</a></li>
                    <li><a href="#forum">Forum</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>

                <button class="hamburger" id="hamburger">
                    <i class="fas fa-bars"></i>
                </button>
            </nav>
        </div>
    </header>

    <!-- Landing Section -->
    <section id="landing">
        <div class="liquid-bg"></div>
        <div class="container">
            <div class="hero-content">
                <h1>Welcome to Kelas Anomali</h1>
                <h2>Teknik Informatika - Universitas Jenderal Achmad Yani</h2>
                <a href="#tentang" class="cta-button">Jelajahi Kelas</a>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang">
        <div class="container">
            <div class="section-title">
                <h2>Tentang Kelas</h2>
                <p>Mengenal lebih dalam tentang Kelas Anomali dan ciri khas yang membedakan kami</p>
            </div>
            <div class="glass-card">
                <div class="tentang-content">
                    <div class="tentang-text">
                        <h3>Kelas dengan Karakter Khusus</h3>
                        <p>Kelas Anomali adalah kelas di Program Studi Teknik Informatika Universitas Jenderal Achmad
                            Yani angkatan 24. Kami dikenal sebagai kelas dengan kreativitas tinggi dan kemampuan problem
                            solving yang cukup baik.</p>
                        <p>Nama "Anomali" dipilih karena kami percaya bahwa setiap mahasiswa memiliki keunikan dan
                            kemampuan khusus yang membuat mereka berbeda dari yang lain. Kami bukan kelas biasa, kami
                            adalah kelas dengan karakter yang kuat dan kemampuan untuk membuat perubahan.</p>
                        <p>Di Kelas Anomali, kami tidak hanya belajar tentang koding dan teknologi, tetapi juga tentang
                            kolaborasi, kepemimpinan, dan inovasi. Kami percaya bahwa teknologi harus digunakan untuk
                            menciptakan solusi yang bermanfaat bagi masyarakat.</p>
                    </div>
                    <div class="tentang-image">
                        <img src="img/postud2.jpg" alt="Foto Studio Kelas Anomali 2024">
                        <div class="image-caption">Kelas Anomali 2024</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Album Section -->
    <section id="album">
        <div class="container">
            <div class="section-title">
                <h2>Album Kegiatan</h2>
                <p>Kumpulan momen berharga dari berbagai kegiatan Kelas Anomali</p>
            </div>

            <div class="filter-buttons">
                <button class="filter-btn active">Semua</button>
                <button class="filter-btn">poto studio 2024</button>
                <button class="filter-btn">LDKK</button>
                <button class="filter-btn">Kunjungan keahmadyanian</button>
                <button class="filter-btn">Random</button>
            </div>

            <div class="gallery-grid">
                <div class="gallery-item" data-category="poto studio 2024">
                    <img src="img/postud3.jpg" alt="..." class="gallery-image">
                    <div class="overlay">
                        <h3>poto studio 2024</h3>
                        <p>mengabadikan momen pada Semester satu</p>
                    </div>
                </div>

                <div class="gallery-item" data-category="Random">
                    <img src="img/pantai.jpg" alt="..." class="gallery-image">
                    <div class="overlay">
                        <h3>pantai aloha pik2</h3>
                        <p>kunjungan ke Pantai haloha yang berada di pik2</p>
                    </div>
                </div>

                <div class="gallery-item" data-category="LDKK">
                    <img src="img/ldkk1.jpg" alt="..." class="gallery-image">
                    <div class="overlay">
                        <h3>LDKK unjani 2024</h3>
                        <p>pengabadian momen setalah melakukan ldkk tahun 2024</p>
                    </div>
                </div>

                <div class="gallery-item" data-category="Random">
                    <img src="img/bukber.jpg" alt="..." class="gallery-image">
                    <div class="overlay">
                        <h3>Buka bersama ramadhan 2024</h3>
                        <p>buka bersama kelas c yang di hadiri oleh pak Gunawan S.Si, M.Cs</p>
                    </div>
                </div>

                <div class="gallery-item" data-category="Kunjungan keahmadyanian">
                    <img src="img/meetfirst.jpg" alt="..." class="gallery-image">
                    <div class="overlay">
                        <h3>First meeting</h3>
                        <p>Pertemuan pertama kelas c pada saat masih pkkmb</p>
                    </div>
                </div>

                <div class="gallery-item" data-category="Random">
                    <img src="img/fotbarkelas.jpg" alt="..." class="gallery-image">
                    <div class="overlay">
                        <h3>poto bersama</h3>
                        <p>poto bersama setelah melakukan kbm selama beberapa bulan</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Profil Mahasiswa Section -->
    <section id="mahasiswa">
        <div class="container">
            <div class="section-title">
                <h2>Profil Mahasiswa</h2>
                <p>Kenali anggota Kelas Anomali yang penuh bakat dan kreativitas</p>
            </div>

            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="searchStudent" placeholder="Cari nama atau NIM mahasiswa...">
            </div>

            <div class="students-grid" id="studentsContainer">
            </div>

            <div class="counter">Total Mahasiswa: <span id="studentCount">0</span></div>
        </div>
    </section>

    <!-- Proyek Section -->
    <section id="proyek">
        <div class="container">
            <div class="section-title">
                <h2>Proyek Kelas</h2>
                <p>Karya inovatif yang dikembangkan oleh mahasiswa Kelas Anomali</p>
            </div>

            <div class="timeline">
                <!-- Project 1 -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="timeline-date">Januari 2024</span>
                        <h3 class="timeline-title">Sistem Informasi Desa Digital</h3>
                        <p class="timeline-desc">Platform terintegrasi untuk administrasi desa yang membantu dalam
                            pengelolaan data kependudukan, keuangan, dan pelayanan publik.</p>
                        <div class="tech-tags">
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">Vue.js</span>
                            <span class="tech-tag">MySQL</span>
                        </div>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="timeline-date">Maret 2024</span>
                        <h3 class="timeline-title">Aplikasi Edukasi Anak "Cerdas Cilik"</h3>
                        <p class="timeline-desc">Aplikasi pembelajaran interaktif untuk anak usia dini dengan konten
                            edukasi yang menarik dan ramah anak.</p>
                        <div class="tech-tags">
                            <span class="tech-tag">Flutter</span>
                            <span class="tech-tag">Firebase</span>
                            <span class="tech-tag">Adobe Animate</span>
                        </div>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="timeline-date">Juni 2024</span>
                        <h3 class="timeline-title">Sistem Monitoring Kualitas Udara</h3>
                        <p class="timeline-desc">Perangkat IoT yang memantau kualitas udara secara real-time dengan
                            dashboard analisis dan notifikasi.</p>
                        <div class="tech-tags">
                            <span class="tech-tag">Python</span>
                            <span class="tech-tag">Arduino</span>
                            <span class="tech-tag">React.js</span>
                        </div>
                    </div>
                </div>

                <!-- Project 4 -->
                <div class="timeline-item">
                    <div class="timeline-content">
                        <span class="timeline-date">September 2024</span>
                        <h3 class="timeline-title">Marketplace UMKM Lokal</h3>
                        <p class="timeline-desc">Platform e-commerce khusus untuk usaha mikro, kecil, dan menengah
                            dengan fitur promosi terintegrasi.</p>
                        <div class="tech-tags">
                            <span class="tech-tag">Next.js</span>
                            <span class="tech-tag">Node.js</span>
                            <span class="tech-tag">MongoDB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sosial Media Section -->
    <section id="sosial">
        <div class="container">
            <div class="section-title">
                <h2>Sosial Media Kelas</h2>
                <p>Ikuti perkembangan terbaru Kelas Anomali di platform sosial media</p>
            </div>

            <div class="social-container">
                <div class="social-card">
                    <div class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h3>Instagram</h3>
                    <p>Follow kami untuk melihat kegiatan sehari-hari, tips belajar, dan dokumentasi kegiatan kelas.</p>
                    <a href="https://www.instagram.com/ifclass_anomali?igsh=MXNwcTZrNnRoamRsZw=="
                        class="social-link">Follow @ifclass_anomali</a>
                </div>

                <div class="social-card">
                    <div class="social-icon">
                        <i class="fab fa-youtube"></i>
                    </div>
                    <h3>YouTube</h3>
                    <p>Subscribe channel kami untuk tutorial pemrograman, rekaman seminar, dan video proyek mahasiswa.
                    </p>
                    <a href="#" class="social-link">Subscribe Channel</a>
                </div>

                <div class="social-card">
                    <div class="social-icon">
                        <i class="fab fa-github"></i>
                    </div>
                    <h3>GitHub</h3>
                    <p>Kunjungi repositori kami untuk melihat kode sumber proyek open source yang dikembangkan
                        mahasiswa.</p>
                    <a href="#" class="social-link">Explore Repositories</a>
                </div>
            </div>
        </div>
    </section>

    <section id="forum">
        <h2 style="text-align: center; color: white; margin-bottom: 20px;">Tambah Komentar</h2>
        <form method="POST" action="simpan_komentar.php">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="nama" class="form-control" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="form-group">
                <label for="comment">Komentar</label>
                <textarea id="comment" name="komentar" class="form-control" rows="5"
                    placeholder="Tulis komentar Anda..." required></textarea>
            </div>
            <button type="submit" class="btn-submit">Kirim Komentar</button>
        </form>
        <br>
        <div class="comments-section">
            <?php
            // Koneksi ke database
            $koneksi = new mysqli("localhost", "root", "", "anomali");
            $sql = "SELECT * FROM komentar_forum ORDER BY tanggal DESC";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $nama = htmlspecialchars($row['nama']);
                    $komentar = htmlspecialchars($row['komentar']);
                    $tanggal = date("d F Y", strtotime($row['tanggal']));
                    $inisial = strtoupper(substr($nama, 0, 1));
                    echo "
                        <div class='comment'>
                            <div class='comment-header'>
                                <div class='comment-avatar'>$inisial</div>
                                <div class='comment-author'>$nama</div>
                                <div class='comment-date'>$tanggal</div>
                            </div>
                            <div class='comment-text'>$komentar</div>
                        </div>
                    ";
                }
            } else {
                echo "<p>Belum ada komentar.</p>";
            }
            $koneksi->close();
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak">
        <div class="container">
            <div class="footer-content">
                <div class="footer-about">
                    <div class="footer-logo">Kelas Anomali</div>
                    <p>Kelas khusus Program Studi Teknik Informatika Universitas Jenderal Achmad Yani yang fokus pada
                        pengembangan talenta digital dan inovasi teknologi.</p>
                    <div class="social-footer">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>

                <div class="footer-links">
                    <h3>Link Cepat</h3>
                    <ul>
                        <li><a href="#landing">Home</a></li>
                        <li><a href="#tentang">Tentang Kami</a></li>
                        <li><a href="#album">Album Kegiatan</a></li>
                        <li><a href="#mahasiswa">Profil Mahasiswa</a></li>
                        <li><a href="#proyek">Proyek Kelas</a></li>
                        <li><a href="#forum">Forum</a></li>
                    </ul>
                </div>

                <div class="footer-bottom">
                    <p>&copy; 2024 Kelas Anomali - Teknik Informatika UNJANI. All Rights Reserved.</p>
                </div>
            </div>
    </footer>

    <!-- Scroll to Top Button -->
    <div class="scroll-top" id="scrollTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script src="script.js"></script>
</body>

</html>
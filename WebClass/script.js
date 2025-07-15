// script.js - VERSI FINAL YANG SUDAH DIPERBAIKI DAN DIBERSIHKAN TOTAL

// =========================================================
// Bagian 1: Definisi Fungsi Pembantu (Helpers)
// =========================================================

/**
 * Memformat nama menjadi kapital di setiap awal kata.
 * @param {string} name - Nama yang akan diformat.
 * @returns {string} Nama yang sudah diformat.
 */
function formatName(name) {
    if (!name) return '';
    return name.toLowerCase().split(' ')
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
        .join(' ');
}

/**
 * Membuat elemen kartu mahasiswa HTML dari objek data mahasiswa.
 * @param {object} student - Objek mahasiswa dari database.
 * @returns {string} String HTML representasi kartu mahasiswa.
 */
function createStudentCard(student) {
    const formattedName = formatName(student.nama); // 'nama' karena kolom dari DB

    // Pastikan jalur gambar dan formatnya benar (.png atau .jpg)
    // Sediakan 'images/default_avatar.png' jika gambar tidak ada.
    const imgSrc = `images/${student.nim}.png`; 

    // Helper untuk membuat link sosial media jika URL-nya ada
    const instagramLink = student.instagram ? `<a href="${student.instagram}" target="_blank"><i class="fab fa-instagram"></i></a>` : '';
    const githubLink = student.github ? `<a href="${student.github}" target="_blank"><i class="fab fa-github"></i></a>` : '';
    const linkedinLink = student.linkedin ? `<a href="${student.linkedin}" target="_blank"><i class="fab fa-linkedin"></i></a>` : '';
    const portfolioLink = student.portfolio ? `<a href="${student.portfolio}" target="_blank" class="portfolio-link"><i class="fas fa-folder-open"></i></a>` : '';

    return `
        <div class="student-card animate" data-name="${formattedName.toLowerCase()}" data-nim="${student.nim}">
            <div class="student-inner">
                <div class="student-front">
                    <div class="student-avatar">
                        <img src="${imgSrc}" alt="${formattedName}" onerror="this.onerror=null;this.src='images/default_avatar.png';" />
                    </div>
                    <h3 class="student-name">${formattedName}</h3>
                    <p class="student-Nim">${student.nim}</p>
                    <a class="view-profile">Lihat Profil</a>
                </div>
                <div class="student-back">
                    <div class="student-details">
                        <h3>${formattedName}</h3>
                        <p><strong>TTL:</strong> ${student.ttl || 'N/A'}</p>
                        <p class="student-bio">${student.bio || 'Tidak ada biografi.'}</p>
                        <div class="social-links">
                            ${instagramLink}
                            ${githubLink}
                            ${linkedinLink}
                            ${portfolioLink}
                        </div>
                    </div>
                    <div class="flip-back">
                        <i class="fas fa-undo"></i>
                    </div>
                </div>
            </div>
        </div>
    `;
}

/**
 * Mengambil data mahasiswa dari database melalui get_mahasiswa.php dan menampilkannya.
 */
async function renderStudentsFromDatabase() {
    const container = document.getElementById('studentsContainer');
    if (!container) { 
        console.error("Elemen #studentsContainer tidak ditemukan. Data mahasiswa tidak dapat ditampilkan.");
        return; 
    }
    container.innerHTML = '<p style="text-align: center; color: white;">Memuat data mahasiswa...</p>'; // Pesan loading

    try {
        const response = await fetch('get_mahasiswa.php');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const studentsData = await response.json(); // Parsing respons sebagai JSON

        container.innerHTML = ''; // Kosongkan container sebelum menambahkan kartu

        if (studentsData.length > 0) {
            studentsData.forEach(student => {
                container.innerHTML += createStudentCard(student);
            });
        } else {
            container.innerHTML = '<p style="text-align: center; color: white;">Tidak ada data mahasiswa yang ditemukan.</p>';
        }

        const studentCountElement = document.getElementById('studentCount');
        if (studentCountElement) { 
            studentCountElement.textContent = studentsData.length;
        }

        // Atur ulang Event Listeners untuk Flip Card setelah kartu dimuat
        document.querySelectorAll('.student-card').forEach(card => {
            // Event listener untuk klik pada seluruh area kartu agar bisa flip
            card.addEventListener('click', function(e) {
                // Mencegah klik pada link atau tombol anak agar tidak memicu flip ganda
                if (!e.target.closest('a') && !e.target.closest('button') && !e.target.classList.contains('flip-back')) {
                     this.classList.toggle('flipped');
                }
            });
            
            // Event listener untuk tombol "Lihat Profil"
            const flipBtn = card.querySelector('.view-profile');
            if (flipBtn) {
                flipBtn.addEventListener('click', (e) => {
                    e.stopPropagation(); 
                    const cardParent = e.target.closest('.student-card');
                    if (cardParent) cardParent.classList.add('flipped');
                });
            }
            
            // Event listener untuk tombol "Flip Back"
            const flipBackBtn = card.querySelector('.flip-back');
            if (flipBackBtn) {
                flipBackBtn.addEventListener('click', (e) => {
                    e.stopPropagation(); 
                    const cardParent = e.target.closest('.student-card');
                    if (cardParent) cardParent.classList.remove('flipped');
                });
            }
        });

    } catch (error) {
        console.error('Error fetching student data:', error);
        container.innerHTML = '<p style="text-align: center; color: red;">Gagal memuat data mahasiswa. Cek konsol browser untuk detail error.</p>';
        const studentCountElement = document.getElementById('studentCount');
        if (studentCountElement) studentCountElement.textContent = '0';
    }
}

/**
 * Menghasilkan heksagon untuk latar belakang loading screen.
 */
function generateHexagons() {
    const hexContainer = document.getElementById('hexContainer');
    if (!hexContainer) { 
        console.warn("Elemen #hexContainer tidak ditemukan. Hexagon tidak dapat digenerate.");
        return; 
    }

    hexContainer.innerHTML = ''; 

    const width = window.innerWidth;
    const height = window.innerHeight;
    const hexSize = 60;
    const hexWidth = hexSize * 2;
    const hexHeight = Math.sqrt(3) * hexSize;
    
    const cols = Math.ceil(width / (hexWidth * 0.75)) + 2;
    const rows = Math.ceil(height / (hexHeight * 0.5)) + 2;
    
    for (let row = 0; row < rows; row++) {
        for (let col = 0; col < cols; col++) {
            const hex = document.createElement('div');
            hex.className = 'hexagon';
            
            const offset = (col % 2) * (hexHeight / 2);
            const x = col * hexWidth * 0.75;
            const y = row * hexHeight - offset;
            
            const randX = Math.random() * 20 - 10;
            const randY = Math.random() * 20 - 10;
            
            hex.style.left = `${x + randX}px`;
            hex.style.top = `${y + randY}px`;
            
            const duration = 20 + Math.random() * 30;
            const delay = Math.random() * 5;
            
            hex.style.animation = `hex-float ${duration}s ${delay}s infinite linear`;
            
            hexContainer.appendChild(hex);
        }
    }
}


// =========================================================
// Bagian 2: Event Listener Utama (DOMContentLoaded)
// Kode di sini akan dijalankan setelah HTML selesai dimuat.
// =========================================================
document.addEventListener('DOMContentLoaded', () => {

    // 1. Panggil fungsi untuk menampilkan mahasiswa dari database
    renderStudentsFromDatabase();

    // 2. Inisialisasi dan panggil fungsi untuk loading screen/hexagon
    generateHexagons(); 
    
    // 3. Logika untuk menyembunyikan loading screen
    const loadingScreen = document.querySelector('.loading-screen');
    if (loadingScreen) { 
        setTimeout(() => {
            loadingScreen.classList.add('hidden');
            setTimeout(() => {
                loadingScreen.style.display = 'none';
            }, 800);
        }, 3000);
    } else {
        console.warn("Elemen .loading-screen tidak ditemukan.");
    }


    // =========================================================
    // Bagian 3: Event Listeners Lainnya
    // =========================================================

    // Mobile Navigation
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.querySelector('.nav-links');
    
    if (hamburger && navLinks) { 
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.innerHTML = navLinks.classList.contains('active') ? 
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });
    }

    // Smooth Scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            if (navLinks) { 
                navLinks.classList.remove('active');
            }
            if (hamburger) { 
                hamburger.innerHTML = '<i class="fas fa-bars"></i>';
            }
            
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Header Scroll Effect
    const header = document.querySelector('header');
    if (header) { 
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // Scroll to Top Button
    const scrollTopBtn = document.getElementById('scrollTop');
    if (scrollTopBtn) { 
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });
        
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Gallery Filter
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    if (filterButtons.length > 0 && galleryItems.length > 0) { 
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');

                const filterValue = button.textContent.trim().toLowerCase();

                galleryItems.forEach(item => {
                    const itemCategory = item.getAttribute('data-category').toLowerCase();
                    if (filterValue === 'semua' || itemCategory === filterValue) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    // Comment Form Submission (Menggunakan AJAX) - Ini adalah bagian yang opsional,
    // jika Anda ingin form komentar refresh halaman, hapus bagian ini.
    // Jika Anda ingin AJAX, pastikan simpan_komentar.php mendukung respons JSON.
    const commentFormElement = document.querySelector('.comment-form form'); 
    const commentsSection = document.querySelector('.comments-section');

    if (commentFormElement && commentsSection) { 
        commentFormElement.addEventListener('submit', async (e) => { 
            e.preventDefault(); 

            const nameInput = document.getElementById('name');
            const commentTextInput = document.getElementById('comment');

            const name = nameInput.value;
            const commentText = commentTextInput.value;

            if (name && commentText) {
                const submitBtn = commentFormElement.querySelector('.btn-submit');
                submitBtn.disabled = true;
                submitBtn.textContent = 'Mengirim...'; 

                try {
                    const response = await fetch('simpan_komentar.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({ 
                            nama: name,
                            komentar: commentText
                        }).toString()
                    });

                    if (response.ok) {
                        const newComment = document.createElement('div');
                        newComment.className = 'comment';
                        const currentDate = new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
                        newComment.innerHTML = `
                            <div class="comment-header">
                                <div class="comment-avatar">${name.charAt(0).toUpperCase()}</div>
                                <div class="comment-author">${name}</div>
                                <div class="comment-date">${currentDate}</div>
                            </div>
                            <div class="comment-text">${commentText}</div>
                        `;

                        commentsSection.prepend(newComment); 

                        nameInput.value = '';
                        commentTextInput.value = '';
                        newComment.scrollIntoView({ behavior: 'smooth', block: 'start' });

                    } else {
                        alert('Gagal menyimpan komentar. Silakan coba lagi.');
                        console.error('Server response was not OK:', response.status, response.statusText);
                    }
                } catch (error) {
                    alert('Terjadi kesalahan saat mengirim komentar.');
                    console.error('Error submitting comment:', error);
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Kirim Komentar';
                }
            }
        });
    } else {
        // console.warn("Form komentar tidak ditemukan, AJAX submission tidak aktif.");
        // Baris ini dikomentari agar tidak muncul warning jika sengaja tidak pakai AJAX
    }

    // Search Functionality for students 
    const searchInput = document.getElementById('searchStudent');
    if (searchInput) { 
        searchInput.addEventListener('input', () => {
            const searchTerm = searchInput.value.toLowerCase();
            const studentCards = document.querySelectorAll('.student-card');
            
            studentCards.forEach(card => {
                const studentName = card.dataset.name;
                const studentNim = card.dataset.nim;
                
                if (studentName && studentNim && (studentName.includes(searchTerm) || studentNim.includes(searchTerm))) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    } else {
        console.warn("Elemen #searchStudent tidak ditemukan. Fungsi pencarian mahasiswa tidak aktif.");
    }

    // Animations on Scroll 
    // Amati elemen-elemen yang akan dianimasikan, setelah renderStudentsFromDatabase selesai
    const animatableElements = document.querySelectorAll('.section-title, .glass-card, .gallery-item, .student-card, .timeline-item, .social-card');
    if (animatableElements.length > 0) {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        animatableElements.forEach(el => {
            observer.observe(el);
        });
    }
}); // Tutup DOMContentLoaded
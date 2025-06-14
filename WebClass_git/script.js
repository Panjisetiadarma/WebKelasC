
        // Loading Screen
        window.addEventListener('load', function() {
            const loadingScreen = document.querySelector('.loading-screen');
            setTimeout(() => {
                loadingScreen.classList.add('hidden');
            }, 2000);
        });

        // Mobile Navigation
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.querySelector('.nav-links');
        
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.innerHTML = navLinks.classList.contains('active') ? 
                '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
        });

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                navLinks.classList.remove('active');
                hamburger.innerHTML = '<i class="fas fa-bars"></i>';
                
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
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Scroll to Top Button
        const scrollTopBtn = document.getElementById('scrollTop');
        
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

        // Student Card Flip
        document.querySelectorAll('.student-card').forEach(card => {
            const flipBtn = card.querySelector('.view-profile');
            const flipBackBtn = card.querySelector('.flip-back');
            
            flipBtn.addEventListener('click', (e) => {
                e.preventDefault();
                card.classList.add('flipped');
            });
            
            flipBackBtn.addEventListener('click', () => {
                card.classList.remove('flipped');
            });
        });

        // Gallery Filter
        const filterBtns = document.querySelectorAll('.filter-btn');
        
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                
                // Add active class to clicked button
                btn.classList.add('active');
                
                // Filter functionality would go here
                console.log(`Filter by: ${btn.textContent}`);
            });
        });

        // Comment Form Submission
        const commentForm = document.querySelector('.comment-form');
        const commentsSection = document.querySelector('.comments-section');
        
        commentForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const commentText = document.getElementById('comment').value;
            
            if (name && commentText) {
                // Create new comment element
                const newComment = document.createElement('div');
                newComment.className = 'comment';
                newComment.innerHTML = `
                    <div class="comment-header">
                        <div class="comment-avatar">${name.charAt(0)}</div>
                        <div class="comment-author">${name}</div>
                        <div class="comment-date">${new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</div>
                    </div>
                    <div class="comment-text">${commentText}</div>
                `;
                
                // Add new comment to the top
                commentsSection.insertBefore(newComment, commentsSection.firstChild);
                
                // Clear form
                document.getElementById('name').value = '';
                document.getElementById('comment').value = '';
                
                // Scroll to new comment
                newComment.scrollIntoView({ behavior: 'smooth' });
            }
        });

        // Search Functionality
        const searchInput = document.getElementById('searchStudent');
        
        searchInput.addEventListener('input', () => {
            const searchTerm = searchInput.value.toLowerCase();
            const studentCards = document.querySelectorAll('.student-card');
            
            studentCards.forEach(card => {
                const studentName = card.querySelector('.student-name').textContent.toLowerCase();
                if (studentName.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Animations on Scroll
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

        document.querySelectorAll('.section-title, .glass-card, .gallery-item, .student-card, .timeline-item, .social-card').forEach(el => {
            observer.observe(el);
        });
    
       const students = [
            {
                nim: "2450081061",
                name: "DAMADIKA ROBIKURNIA",
                ttl: "Bandung, 12 Januari 2006",
                bio: "Penggemar teknologi, suka eksplorasi UI/UX.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081062",
                name: "M. SULTHAN ARIQ ATHALLA",
                ttl: "Jakarta, 14 September 2003",
                bio: "Mewing dulu gak sih",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081063",
                name: "RAFLY ANGGARA PUTRA",
                ttl: "Jakarta, 3 Maret 2006",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081064",
                name: "S.SANSAN ZAHRA JULLIA .A",
                ttl: "Jakarta, 3 Maret 2006",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081065",
                name: "NABILA DWI MARSONO",
                ttl: "Bogor, 27 Januari 2006",
                bio: "say the name",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081066",
                name: "FAWAZ AZMI ADZDZIKRI",
                ttl: "Bandung, 19 September 2006",
                bio: "yang penting hidup.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081067",
                name: "FANI AULIA DIVAYANTI",
                ttl: "purwakarta 16 juli 2005",
                bio:"You are stronger than you think.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081068",
                name: "RAZIQ RABBANI SUPARDI",
                ttl: "Bandung, 17 Mei 2006",
                bio: "aku tampan banget kata bunda.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081069",
                name: "RIDO ALAN ALJAUHARI",
                ttl: "Kuningan, 27 Juli 2005",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081070",
                name: "VINA LUCITA HARAHAP",
                ttl: "Huta Tunggal, 9 Maret 2006",
                bio: "If you can dream it, you can do it.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081071",
                name: "KHANSA HUMAIRA SUGIHARTO",
                ttl: "Bekasi, 14 Agustus 2006",
                bio: "99.9%",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081072",
                name: "KEVIN CAHYAWIGUNA",
                ttl: "Cimahi, 1 Januari 2007",
                bio: "tetaplah jadi pemalas",
                ig : "https://www.instagram.com/kepincahya/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081073",
                name: "M.ARYA PERDANA NATAWIRIA",
                ttl: "Jakarta, 3 Maret 2006",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081074",
                name: "M. RIZAL SOBARI",
                ttl: "Jakarta, 3 Maret 2006",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081075",
                name: "FEBRIAN FIRMANSYAH",
                ttl: "Bandung, 2 Februari 2007",
                bio: "Cowo Nyalse",
                ig : "https://www.instagram.com/pepvri/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081076",
                name: "INSAN NAZIB",
                ttl: "Sumedang, 3 July 2006",
                bio: "Mahasiswa TI yang ingin menguasai cyber security.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081077",
                name: "MUH. ZACKY YASIR SYIFA",
                ttl: "Makassar, 25 Desember",
                bio: "Omke Gams Omke Gams",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081078",
                name: "RAFI SAPUTRA",
                ttl: "Jakarta, 19 Maret 2003",
                bio: "Pecinta Mie Ayam",
                ig : "https://www.instagram.com/rafi_saputra2005/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081079",
                name: "AHMAD RAFI NASTI",
                ttl: "Jakarta, 3 Maret 2006",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081080",
                name: "M. FARIELYABI GHANI",
                ttl: "Jakarta, 3 Maret 2006",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081081",
                name: "DIDEN DIKI GUSTIAN",
                ttl: "Jakarta, 3 Maret 2006",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081082",
                name: "ALFA HAEDAR ALI",
                ttl: "Jakarta, 3 Maret 2006",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081083",
                name: "SITI AULIA RAHMAN",
                ttl: "Sukabumi, 3 Juni 2006",
                bio: "everything happens for reason",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081084",
                name: "NAILA PUTRI RAMADHANI",
                ttl: "Bandung, 5 Oktober 2006",
                bio: "everything be okay",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081085",
                name: "REXA ARFA ANDIKA .D",
                ttl: "Jakarta, 3 Maret 2006",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081086",
                name: "RICHARDI SIHOTANG",
                ttl: "Jakarta, 3 Maret 2006",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081087",
                name: "Panji Setiadarma",
                ttl: "Karawang, 22 February 2006",
                bio: "variable tanpa value.",
                ig : "https://www.instagram.com/_ujiw._/", 
                git: "https://github.com/Panjisetiadarma/",
                in : "https://www.linkedin.com/in/panji-setiadarma-27b57536b/",
                porto : "../MyPorto/index.html"
            },
            {
                nim: "2450081088",
                name: "REQI FAUZAN",
                ttl: "Karawang, 01 April 2005",
                bio: " Absolutely Cinema 🖐🏻😧🖐🏻",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081089",
                name: "FAISAL AKBAR WIDYATNA",
                ttl: "Cianjur, 10 Mei 2005",
                bio: "mending sare",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
            {
                nim: "2450081090",
                name: "M. RIDWAN FAUZI",
                ttl: "Jakarta, 3 Maret 2006",
                bio: "Mahasiswa TI yang aktif di bidang AI dan robotika.",
                ig : "https://www.instagram.com/",
                git: "https://github.com/",
                in : "https://www.linkin.com/",
                porto : ""
            },
        ];
        
        // Fungsi untuk memformat nama menjadi huruf kapital di awal kata
        function formatName(name) {
            return name.toLowerCase().split(' ')
                .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                .join(' ');
        }
        
        // Fungsi untuk membuat kartu mahasiswa
        function createStudentCard(student) {
            const formattedName = formatName(student.name);
            const img = new Image();
            img.src = `images/${student.nim}.jpg`;
            img.onerror = () => console.error("GAGAL LOAD: ", student.nim); 

            return `
                <div class="student-card" data-name="${formattedName.toLowerCase()}" data-nim="${student.nim}">
                    <div class="student-inner">
                        <div class="student-front">
                            <div class="student-avatar">
                                <img src="images/${student.nim}.png" alt="${formattedName}" />
                            </div>
                            <h3 class="student-name">${formattedName}</h3>
                            <p class="student-Nim">${student.nim}</p>
                            <a class="view-profile">Lihat Profil</a>
                        </div>
                        <div class="student-back">
                            <div class="student-details">
                                <h3>${formattedName}</h3>
                                <p><strong>TTL:</strong> ${student.ttl}</p>
                                <p class="student-bio">${student.bio}</p>
                                <div class="social-links">
                                    <a href="${student.ig}"><i class="fab fa-instagram"></i></a>
                                    <a href="${student.git}"><i class="fab fa-github"></i></a>
                                    <a href="${student.in}"><i class="fab fa-linkedin"></i></a>
                                    <a href="${student.porto}" target="_blank" class="portfolio-link">
                                        <i class="fas fa-folder-open"></i>
                                    </a>
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

        // Fungsi untuk menampilkan semua kartu mahasiswa
        function renderStudents() {
            const container = document.getElementById('studentsContainer');
            container.innerHTML = '';
            
            students.forEach(student => {
                container.innerHTML += createStudentCard(student);
            });
            
            // Update counter
            document.getElementById('studentCount').textContent = students.length;
            
            // Tambahkan event listeners
            document.querySelectorAll('.student-card').forEach(card => {
                card.addEventListener('click', function() {
                    this.classList.toggle('flipped');
                });
            });
        }
        
        // Fungsi untuk mencari mahasiswa
        function searchStudents() {
            const searchTerm = document.getElementById('searchStudent').value.toLowerCase();
            const allCards = document.querySelectorAll('.student-card');
            
            allCards.forEach(card => {
                const name = card.dataset.name;
                const nim = card.dataset.nim;
                
                if (name.includes(searchTerm) || nim.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        // Event listener untuk pencarian
        document.getElementById('searchStudent').addEventListener('input', searchStudents);
        
        // Inisialisasi
        window.onload = renderStudents;



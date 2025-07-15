<!-- login.php 2-1026 -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #1a2a6c);
            color: #333;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }
        
        .app-title {
            text-align: center;
            color: white;
            margin-bottom: 30px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }
        
        .app-title h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .app-title p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        /* Login Container */
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 500px;
            margin: 0 auto;
            text-align: center;
        }
        
        .login-title {
            font-size: 28px;
            color: #1a2a6c;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-title i {
            margin-right: 12px;
            color: #b21f1f;
        }
        
        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }
        
        .form-group input, .form-group textarea { /* Added textarea */
            width: 100%;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .form-group input:focus, .form-group textarea:focus { /* Added textarea */
            border-color: #1a2a6c;
            outline: none;
            box-shadow: 0 0 0 3px rgba(26, 42, 108, 0.2);
        }
        
        .btn-login {
            background: linear-gradient(to right, #1a2a6c, #b21f1f);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            margin-top: 10px;
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .password-hint {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            border: 2px dashed #ddd;
        }
        
        .password-hint i {
            margin-right: 8px;
            color: #b21f1f;
        }
        
        .error-message {
            color: #b21f1f;
            background: rgba(178, 31, 31, 0.1);
            padding: 12px;
            border-radius: 8px;
            margin-top: 15px;
            display: none;
        }
        
        /* App Container (setelah login) */
        .app-container {
            display: none;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }
        
        .form-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            flex: 1;
            min-width: 400px;
            max-width: 500px;
        }
        
        .preview-section {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            flex: 1;
            min-width: 400px;
            max-width: 600px;
            display: flex;
            flex-direction: column;
        }
        
        .section-title {
            font-size: 24px;
            color: #1a2a6c;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 12px;
            color: #b21f1f;
        }
        
        /* Preview Card Styles */
        .card {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .header {
            background: linear-gradient(to right, #1a2a6c, #b21f1f);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }
        
        .profile-pic-container { /* New container for image and edit button */
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            margin: 0 auto 20px;
            background: linear-gradient(45deg, #FFD700, #FFA500);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
            color: white;
            overflow: hidden; /* Ensure image stays within bounds */
            cursor: pointer;
        }

        .profile-pic-container:hover .edit-profile-pic-btn,
        .profile-pic-container:hover .delete-profile-pic-btn {
            opacity: 1;
            transform: translateY(0);
        }

        .profile-pic-container:hover .edit-profile-pic-btn {
            transform: translateY(-30px); /* Adjust based on delete button height */
        }

        .profile-pic-container img { /* For displaying actual image */
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            display: none; /* Hidden by default until an image is loaded */
        }

        .profile-pic-container .fa-user { /* Default icon */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .edit-profile-pic-btn, .delete-profile-pic-btn {
            position: absolute;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px 0;
            font-size: 14px;
            cursor: pointer;
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .edit-profile-pic-btn {
            bottom: 30px; /* Position above delete button */
            border-bottom: 1px solid rgba(255,255,255,0.2); /* Visual separator */
        }

        .delete-profile-pic-btn {
            bottom: 0; /* Position at the very bottom */
            background: rgba(178, 31, 31, 0.8); /* Red color for delete */
        }

        .edit-profile-pic-btn i, .delete-profile-pic-btn i {
            margin-right: 0; /* Remove default margin from i */
            font-size: 14px;
        }

        .header h1 {
            font-size: 32px;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }
        
        .header h2 {
            font-size: 18px;
            font-weight: 400;
            opacity: 0.9;
        }
        
        .content {
            display: flex;
            flex-wrap: wrap;
            padding: 30px;
            flex: 1;
        }
        
        .info-section {
            flex: 1;
            min-width: 300px;
            padding: 20px;
        }
        
        .social-section {
            flex: 1;
            min-width: 300px;
            padding: 20px;
        }
        
        .info-item {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f5f5f5;
        }
        
        .info-label {
            width: 120px;
            font-weight: 600;
            color: #555;
        }
        
        .info-value {
            flex: 1;
            color: #333;
            word-break: break-word;
        }
        
        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-link {
            flex: 1;
            min-width: 120px;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .social-link:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            border-color: #1a2a6c;
        }
        
        .social-link i {
            font-size: 36px;
            margin-bottom: 10px;
        }
        
        .social-link .fa-instagram {
            color: #E1306C;
        }
        
        .social-link .fa-github {
            color: #333;
        }
        
        .social-link .fa-linkedin {
            color: #0077B5;
        }
        
        .social-link .fa-briefcase {
            color: #8E54E9;
        }
        
        .social-link h3 {
            font-size: 16px;
            margin-bottom: 8px;
            color: #555;
        }
        
        .social-link a {
            text-decoration: none;
            color: #1a2a6c;
            font-size: 14px;
            word-break: break-all;
        }
        
        .social-link a:hover {
            text-decoration: underline;
        }
        
        .portfolio-placeholder {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            color: #777;
            border: 2px dashed #ddd;
            margin-top: 10px;
        }
        
        .portfolio-placeholder i {
            font-size: 48px;
            margin-bottom: 15px;
            color: #ccc;
        }
        
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #777;
            font-size: 14px;
            border-top: 1px solid #eee;
        }
        
        @media (max-width: 900px) {
            .app-container {
                flex-direction: column;
            }
            
            .form-section, .preview-section {
                max-width: 100%;
            }
            
            .content {
                flex-direction: column;
            }
            
            .social-section {
                border-top: 1px solid #eee;
                margin-top: 20px;
                padding-top: 30px;
            }
        }
        
        .empty-data {
            color: #999;
            font-style: italic;
        }
        
        .input-hint {
            font-size: 13px;
            color: #777;
            margin-top: 5px;
        }
        
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 8px 15px;
            border-radius: 50px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
        
        .login-logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(45deg, #1a2a6c, #b21f1f);
            margin: 0 auto 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="app-title">
            <h1><i class="fas fa-user-graduate"></i> Sistem Profil Mahasiswa</h1>
            <p>Masuk untuk mengelola profil Anda</p>
        </div>
        
        <div id="login-page">
            <div class="login-container">
                <div class="login-logo">
                    <i class="fas fa-lock"></i>
                </div>
                
                <div class="login-title">
                    <i class="fas fa-sign-in-alt"></i> Login Mahasiswa
                </div>
                
                <form id="login-form">
                    <div class="form-group">
                        <label for="login-nim"><i class="fas fa-id-card"></i> NIM</label>
                        <input type="text" id="login-nim" placeholder="Masukkan NIM Anda" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="login-password"><i class="fas fa-key"></i> Password</label>
                        <input type="password" id="login-password" placeholder="Masukkan password" required>
                    </div>
                    
                    <button type="submit" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Masuk
                    </button>
                    
                    <div class="error-message" id="login-error">
                        <i class="fas fa-exclamation-circle"></i> NIM atau password salah!
                    </div>
                    
                    <div class="password-hint">
                        <i class="fas fa-info-circle"></i> khusus untuk mahasiswa kelas Anomali
                    </div>
                </form>
            </div>
        </div>
        
        <div id="main-page" class="app-container">
            <div class="form-section">
                <div class="section-title">
                    <i class="fas fa-edit"></i> Formulir Profil
                </div>
                
                <form id="profile-form">
                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="text" id="nim" placeholder="Masukkan NIM Anda">
                        <p class="input-hint">Contoh: 2450081065</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="name">Nama Lengkap:</label>
                        <input type="text" id="name" placeholder="Masukkan nama lengkap Anda">
                    </div>
                    
                    <div class="form-group">
                        <label for="ttl">Tempat, Tanggal Lahir:</label>
                        <input type="text" id="ttl" placeholder="Contoh: Bogor, 27 Januari 2006">
                    </div>
                    
                    <div class="form-group">
                        <label for="bio">Bio Singkat:</label>
                        <textarea id="bio" rows="3" placeholder="Tulis bio singkat tentang Anda"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="ig">Instagram URL:</label>
                        <input type="url" id="ig" placeholder="https://www.instagram.com/username">
                    </div>
                    
                    <div class="form-group">
                        <label for="git">GitHub URL:</label>
                        <input type="url" id="git" placeholder="https://github.com/username">
                    </div>
                    
                    <div class="form-group">
                        <label for="in">LinkedIn URL:</label>
                        <input type="url" id="in" placeholder="https://www.linkedin.com/in/username">
                    </div>
                    
                    <div class="form-group">
                        <label for="porto">Portfolio URL:</label>
                        <input type="url" id="porto" placeholder="https://portfolio-anda.com">
                    </div>
                    
                    <button type="submit" class="btn-login">
                        <i class="fas fa-sync-alt"></i> Perbarui Profil
                    </button>
                </form>
            </div>
            
            <div class="preview-section">
                <div class="card">
                    <div class="header">
                        <button a href="../WebClass/index.php" class="logout-btn" id="logout-btn">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                        <div class="profile-pic-container" id="profile-pic-container">
                            <i class="fas fa-user" id="profile-pic-icon"></i>
                            <img id="profile-pic-img" alt="Profile Picture">
                            <div class="edit-profile-pic-btn" id="edit-profile-pic-btn">
                                <i class="fas fa-camera"></i> Edit Foto
                            </div>
                            <div class="delete-profile-pic-btn" id="delete-profile-pic-btn">
                                <i class="fas fa-trash-alt"></i> Hapus Foto
                            </div>
                            <input type="file" id="profile-pic-upload" accept="image/*" style="display: none;">
                        </div>
                        <h1 id="preview-name">Nama Mahasiswa</h1>
                        <h2>Mahasiswa | NIM: <span id="preview-nim">-</span></h2>
                    </div>
                    
                    <div class="content">
                        <div class="info-section">
                            <div class="section-title">
                                <i class="fas fa-info-circle"></i> Informasi Pribadi
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">NIM</div>
                                <div class="info-value" id="preview-nim-value">-</div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">Nama Lengkap</div>
                                <div class="info-value" id="preview-name-value">-</div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">TTL</div>
                                <div class="info-value" id="preview-ttl">-</div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-label">Bio</div>
                                <div class="info-value" id="preview-bio">-</div>
                            </div>
                        </div>
                        
                        <div class="social-section">
                            <div class="section-title">
                                <i class="fas fa-share-alt"></i> Media & Portfolio
                            </div>
                            
                            <div class="social-links">
                                <div class="social-link">
                                    <i class="fab fa-instagram"></i>
                                    <h3>Instagram</h3>
                                    <a href="#" target="_blank" id="preview-ig">@username</a>
                                </div>
                                
                                <div class="social-link">
                                    <i class="fab fa-github"></i>
                                    <h3>GitHub</h3>
                                    <a href="#" target="_blank" id="preview-git">github.com</a>
                                </div>
                                
                                <div class="social-link">
                                    <i class="fab fa-linkedin-in"></i>
                                    <h3>LinkedIn</h3>
                                    <a href="#" target="_blank" id="preview-in">linkedin.com</a>
                                </div>
                                
                                <div class="social-link">
                                    <i class="fas fa-briefcase"></i>
                                    <h3>Portfolio</h3>
                                    <div class="portfolio-placeholder" id="preview-porto">
                                        <i class="fas fa-folder-plus"></i>
                                        <p>Portfolio belum tersedia</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="footer">
                        <p>&copy; 2023 Profil Mahasiswa | Data dapat diisi melalui formulir</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginPage = document.getElementById('login-page');
        const mainPage = document.getElementById('main-page');
        const loginForm = document.getElementById('login-form');
        const logoutBtn = document.getElementById('logout-btn');
        const errorMessage = document.getElementById('login-error');
        
        // Elemen-elemen formulir profil
        const nimInput = document.getElementById('nim');
        const nameInput = document.getElementById('name');
        const ttlInput = document.getElementById('ttl');
        const bioInput = document.getElementById('bio');
        const igInput = document.getElementById('ig');
        const gitInput = document.getElementById('git');
        const inInput = document.getElementById('in');
        const portoInput = document.getElementById('porto');

        // Elemen-elemen preview profil
        const previewName = document.getElementById('preview-name');
        const previewNim = document.getElementById('preview-nim');
        const previewNameValue = document.getElementById('preview-name-value');
        const previewNimValue = document.getElementById('preview-nim-value');
        const previewTtl = document.getElementById('preview-ttl');
        const previewBio = document.getElementById('preview-bio');
        const previewIgLink = document.getElementById('preview-ig');
        const previewGitLink = document.getElementById('preview-git');
        const previewInLink = document.getElementById('preview-in');
        const previewPortoDiv = document.getElementById('preview-porto');

        // Elemen-elemen untuk foto profil
        const profilePicContainer = document.getElementById('profile-pic-container');
        const profilePicIcon = document.getElementById('profile-pic-icon');
        const profilePicImg = document.getElementById('profile-pic-img');
        const editProfilePicBtn = document.getElementById('edit-profile-pic-btn');
        const deleteProfilePicBtn = document.getElementById('delete-profile-pic-btn');
        const profilePicUploadInput = document.getElementById('profile-pic-upload');

        // Variable to hold current NIM after login
        let currentLoggedInNim = '';

        // Fungsi untuk mengisi dan menampilkan data profil
        function updateProfileUI(data) {
            nimInput.value = data.nim || '';
            nameInput.value = data.nama || '';
            ttlInput.value = data.ttl || '';
            bioInput.value = data.bio || '';
            igInput.value = data.instagram || '';
            gitInput.value = data.github || '';
            inInput.value = data.linkedin || '';
            portoInput.value = data.portfolio || '';

            previewName.textContent = data.nama || 'Nama Mahasiswa';
            previewNim.textContent = data.nim || '-';
            previewNameValue.textContent = data.nama || '-';
            previewNimValue.textContent = data.nim || '-';
            previewTtl.textContent = data.ttl || '-';
            previewBio.textContent = data.bio || '-';

            // Update social links
            previewIgLink.href = data.instagram || '#';
            previewIgLink.textContent = data.instagram ? data.instagram.split('/').pop() || '@username' : '@username';
            previewIgLink.parentElement.style.display = data.instagram ? 'flex' : 'none';
            
            previewGitLink.href = data.github || '#';
            previewGitLink.textContent = data.github ? data.github.split('/').pop() || 'github.com' : 'github.com';
            previewGitLink.parentElement.style.display = data.github ? 'flex' : 'none';

            previewInLink.href = data.linkedin || '#';
            previewInLink.textContent = data.linkedin ? data.linkedin.split('/').pop() || 'linkedin.com' : 'linkedin.com';
            previewInLink.parentElement.style.display = data.linkedin ? 'flex' : 'none';
            
            if (data.portfolio) {
                previewPortoDiv.innerHTML = `
                    <a href="${data.portfolio}" target="_blank" style="color: #1a2a6c; text-decoration: none;">
                        <i class="fas fa-external-link-alt" style="font-size: 36px; margin-bottom: 10px; color: #1a2a6c;"></i>
                        <p style="color: #1a2a6c; font-weight: 600;">Lihat Portfolio</p>
                    </a>
                `;
                previewPortoDiv.parentElement.style.display = 'flex';
            } else {
                previewPortoDiv.innerHTML = `
                    <i class="fas fa-folder-plus"></i>
                    <p>Portfolio belum tersedia</p>
                `;
                previewPortoDiv.parentElement.style.display = 'flex';
            }

            // Update profile picture
            if (data.profile_pic && data.profile_pic !== '') {
                profilePicImg.src = data.profile_pic;
                profilePicImg.style.display = 'block';
                profilePicIcon.style.display = 'none';
                deleteProfilePicBtn.style.display = 'flex'; // Show delete button if there's a picture
            } else {
                profilePicImg.src = '';
                profilePicImg.style.display = 'none';
                profilePicIcon.style.display = 'block';
                deleteProfilePicBtn.style.display = 'none'; // Hide delete button if no picture
            }
        }

        // Handle login form submission
        loginForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const nim = document.getElementById('login-nim').value;
            const password = document.getElementById('login-password').value;

            try {
                const response = await fetch('aksi_login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        nim: nim,
                        password: password
                    }).toString()
                });

                const result = await response.json();

                if (result.status === 'success') {
                    errorMessage.style.display = 'none';
                    loginPage.style.display = 'none';
                    mainPage.style.display = 'flex';
                    
                    currentLoggedInNim = nim; // Store the logged-in NIM
                    updateProfileUI(result.data);

                    animateLoginSuccess();
                } else {
                    errorMessage.textContent = result.message;
                    errorMessage.style.display = 'block';
                    animateLoginError();
                }
            } catch (error) {
                console.error('Error during login fetch:', error);
                errorMessage.textContent = 'Terjadi kesalahan jaringan atau server.';
                errorMessage.style.display = 'block';
                animateLoginError();
            }
        });
        
        // Handle logout
        if (logoutBtn) {
            logoutBtn.addEventListener('click', function() {
                // In a real application, you'd make a fetch call to a logout.php
                // that destroys the session. For this example, we just hide UI.
                loginPage.style.display = 'block';
                mainPage.style.display = 'none';
                document.getElementById('login-nim').value = '';
                document.getElementById('login-password').value = '';
                errorMessage.style.display = 'none';
                currentLoggedInNim = ''; // Clear logged-in NIM on logout
            });
        }
        
        // Handle profile form submission (Simpan ke database)
        const profileForm = document.getElementById('profile-form');
        if (profileForm) {
            profileForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                // Get form values
                const name = document.getElementById('name').value;
                const ttl = document.getElementById('ttl').value;
                const bio = document.getElementById('bio').value;
                const ig = document.getElementById('ig').value;
                const git = document.getElementById('git').value;
                const inUrl = document.getElementById('in').value;
                const porto = document.getElementById('porto').value;

                try {
                    const response = await fetch('update_profil.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            nim: currentLoggedInNim, // Use the stored logged-in NIM
                            nama: name,
                            ttl: ttl,
                            bio: bio,
                            instagram: ig,
                            github: git,
                            linkedin: inUrl,
                            portfolio: porto
                        }).toString()
                    });
                    const result = await response.json();

                    if (result.status === 'success') {
                        alert('Profil berhasil diperbarui!');
                        updateProfileUI(result.data);
                        animateUpdate();
                    } else {
                        alert('Gagal memperbarui profil: ' + result.message);
                        console.error('Update profile error:', result.message);
                    }
                } catch (error) {
                    alert('Terjadi kesalahan saat memperbarui profil.');
                    console.error('Error updating profile:', error);
                }
            });
        }

        // --- Profile Picture Upload Logic ---
        if (editProfilePicBtn && profilePicUploadInput) {
            editProfilePicBtn.addEventListener('click', () => {
                profilePicUploadInput.click(); // Trigger click on hidden file input
            });

            profilePicUploadInput.addEventListener('change', async (event) => {
                const file = event.target.files[0];
                if (file && currentLoggedInNim) {
                    const formData = new FormData();
                    formData.append('profile_pic', file);
                    formData.append('nim', currentLoggedInNim); // Send NIM to identify which profile to update

                    try {
                        const response = await fetch('upload_profile_pic.php', { // You need to create this PHP file
                            method: 'POST',
                            body: formData,
                        });
                        const result = await response.json();

                        if (result.status === 'success') {
                            alert(result.message);
                            // Update the preview with the new image URL
                            profilePicImg.src = result.profile_pic_url;
                            profilePicImg.style.display = 'block';
                            profilePicIcon.style.display = 'none';
                            deleteProfilePicBtn.style.display = 'flex'; // Ensure delete button appears
                        } else {
                            alert('Gagal mengunggah foto profil: ' + result.message);
                            console.error('Upload profile pic error:', result.message);
                        }
                    } catch (error) {
                        alert('Terjadi kesalahan saat mengunggah foto profil.');
                        console.error('Error uploading profile pic:', error);
                    }
                }
            });
        }
        // --- End Profile Picture Upload Logic ---

        // --- Delete Profile Picture Logic ---
        if (deleteProfilePicBtn) {
            deleteProfilePicBtn.addEventListener('click', async () => {
                if (!currentLoggedInNim) {
                    alert('Anda harus login untuk menghapus foto profil.');
                    return;
                }

                if (confirm('Apakah Anda yakin ingin menghapus foto profil ini?')) {
                    try {
                        const response = await fetch('delete_profile_pic.php', { // You need to create this PHP file
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: new URLSearchParams({
                                nim: currentLoggedInNim
                            }).toString()
                        });
                        const result = await response.json();

                        if (result.status === 'success') {
                            alert(result.message);
                            // Reset UI to default icon
                            profilePicImg.src = '';
                            profilePicImg.style.display = 'none';
                            profilePicIcon.style.display = 'block';
                            deleteProfilePicBtn.style.display = 'none'; // Hide delete button
                        } else {
                            alert('Gagal menghapus foto profil: ' + result.message);
                            console.error('Delete profile pic error:', result.message);
                        }
                    } catch (error) {
                        alert('Terjadi kesalahan saat menghapus foto profil.');
                        console.error('Error deleting profile pic:', error);
                    }
                }
            });
        }
        // --- End Delete Profile Picture Logic ---
        
        // Animasi (tidak berubah)
        function animateLoginSuccess() {
            const loginContainer = document.querySelector('.login-container');
            if (loginContainer) {
                loginContainer.style.transform = 'scale(0.9)';
                loginContainer.style.opacity = '0';
                
                setTimeout(() => {
                    if (mainPage) {
                        mainPage.style.opacity = '0';
                        mainPage.style.transform = 'translateY(20px)';
                        mainPage.style.display = 'flex';
                        
                        setTimeout(() => {
                            mainPage.style.transition = 'all 0.5s ease';
                            mainPage.style.opacity = '1';
                            mainPage.style.transform = 'translateY(0)';
                        }, 100);
                    }
                }, 300);
            }
        }
        
        function animateLoginError() {
            if (errorMessage) {
                errorMessage.style.animation = 'none';
                setTimeout(() => {
                    errorMessage.style.animation = 'shake 0.5s';
                }, 10);
            }
        }
        
        function animateUpdate() {
            const card = document.querySelector('.card');
            if (card) {
                card.style.transform = 'scale(0.98)';
                card.style.opacity = '0.9';
                
                setTimeout(() => {
                    card.style.transition = 'all 0.4s ease';
                    card.style.transform = 'scale(1)';
                    card.style.opacity = '1';
                }, 100);
            }
        }
        
        // Add shake animation for error message
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes shake {
                0%, 100% {transform: translateX(0);}
                10%, 30%, 50%, 70%, 90% {transform: translateX(-5px);}
                20%, 40%, 60%, 80% {transform: translateX(5px);}
            }
        `;
        document.head.appendChild(style);
    });
</script>
</body>
</html>
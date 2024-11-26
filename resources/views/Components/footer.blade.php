<head>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <style>
        /* Footer Styles */
        footer {
            background: linear-gradient(-45deg, #0d3b66, #00509e, #0d3b66, #00509e);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            padding-top: 40px;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        footer .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Footer Columns */
        footer .col-lg-4,
        footer .col-lg-3,
        footer .col-lg-2 {
            margin-bottom: 30px;
        }

        /* Logo and Title */
        footer .logo-title {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        footer .logo-title img {
            width: 60px;
            margin-right: 15px;
        }

        footer .logo-title div {
            color: #ffffff;
        }

        footer .logo-title .fs-5 {
            font-weight: 600;
            font-size: 20px;
        }

        footer .logo-title span {
            font-size: 16px;
            display: block;
        }

        /* Contact Info */
        footer .contact-info p {
            font-size: 16px;
            margin-bottom: 8px;
        }

        footer .contact-info a {
            color: #ffa500;
            text-decoration: none;
        }

        /* Footer Links */
        footer h6 {
            font-weight: 600;
            margin-bottom: 20px;
            font-size: 18px;
            color: #ffffff;
            position: relative;
        }

        footer h6::after {
            content: '';
            width: 50px;
            height: 2px;
            background-color: #ffa500;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

        footer ul {
            list-style: none;
            padding: 0;
        }

        footer ul li {
            margin-bottom: 10px;
        }

        footer ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        footer ul li a:hover {
            color: #ffa500;
        }

        /* Social Media */
        footer .social-media a {
            color: #ffffff;
            font-size: 20px;
            margin-right: 15px;
            transition: color 0.3s;
        }

        footer .social-media a:hover {
            color: #ffa500;
        }

        /* Prodi List */
        footer .prodi-list li {
            font-size: 16px;
            color: #ffffff;
            margin-bottom: 8px;
        }

        /* Copyright */
        .it-copyright-area {
            background-color: #083358;
            padding: 15px 0;
        }

        .it-copyright-area p {
            color: #ffffff;
            margin: 0;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 767px) {
            footer .logo-title {
                flex-direction: column;
                align-items: flex-start;
            }

            footer .logo-title img {
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Konten Lainnya -->

    <footer>
        <div class="container">
            <div class="row">
                <!-- Kolom 1: Logo dan Kontak -->
                <div class="col-lg-4 col-md-6">
                    <div class="logo-title">
                        <img src="{{ asset('assets/vendor/img/logo.png') }}" alt="Logo Sistem Informasi Karir IT Del">
                        <div>
                            <span class="fs-5">Sistem Informasi Karir IT Del</span>
                            <span>Institut Teknologi Del</span>
                        </div>
                    </div>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Sisingamangaraja, Sitoluama Laguboti, Kab.
                            Toba, Sumut, Indonesia</p>
                        <p><i class="fas fa-envelope me-2"></i> Email: <a
                                href="mailto:info@del.ac.id">info@del.ac.id</a></p>
                        <p><i class="fas fa-phone me-2"></i> Telp: +62-632-331234, 331235, 331237</p>
                        <p><i class="fas fa-globe me-2"></i> <a href="https://www.del.ac.id">www.del.ac.id</a></p>
                    </div>
                </div>

                <!-- Kolom 2: Menu -->
                <div class="col-lg-2 col-md-6">
                    <h6>Menu</h6>
                    <ul>
                        <li><a href="#">Lowongan Kerja</a></li>
                        <li><a href="#">Daftar Perusahaan</a></li>
                        <li><a href="#">Acara</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Artikel</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Sosial Media -->
                <div class="col-lg-3 col-md-6">
                    <h6>Sosial Media</h6>
                    <div class="social-media">
                        <a href="https://www.instagram.com/yourprofile" aria-label="Instagram"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/yourprofile" aria-label="Facebook"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.youtube.com/yourchannel" aria-label="YouTube"><i
                                class="fab fa-youtube"></i></a>
                        <a href="https://www.twitter.com/yourprofile" aria-label="Twitter"><i
                                class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/yourprofile" aria-label="LinkedIn"><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <!-- Kolom 4: Prodi -->
                <div class="col-lg-3 col-md-6">
                    <h6>Program Studi</h6>
                    <ul class="prodi-list">
                        <li>D3 - Teknologi Informasi</li>
                        <li>D3 - Teknologi Komputer</li>
                        <li>D4 - Teknologi Rekayasa Perangkat Lunak</li>
                        <li>S1 - Informatika</li>
                        <li>S1 - Sistem Informasi</li>
                        <li>S1 - Teknik Elektro</li>
                        <li>S1 - Teknik Bioproses</li>
                        <li>S1 - Manajemen Rekayasa</li>
                        <li>S1 - Metalurgi</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright Area -->
        <div class="it-copyright-area">
            <div class="container text-center">
                <p>&copy; 2024 <a href="#" style="color: #ffa500; text-decoration: none;">PPKHA IT Del</a>. All
                    rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Skrip JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-..."
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

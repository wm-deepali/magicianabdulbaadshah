<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <title>
        @yield('title', 'Magician Badshah | Theme Party Planner & Balloon Magic')
    </title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body>
    <!-- PRELOADER -->
    <div id="preloader" class="preloader">
        <div class="magic-ball"></div>
    </div>

    <!-- TOP BAR -->
    <div class="py-2 bg-dark text-white small">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto d-flex align-items-center gap-3">
                    <a href="tel:++ 91 - 9838457702" class="text-white text-decoration-none">
                        <i class="fa fa-phone me-2"></i> + 91 - 9838457702
                    </a>
                    <a href="https://wa.me/+ 91 - 9838457702" target="_blank" class="text-white text-decoration-none">
                        <i class="fa-brands fa-whatsapp me-2"></i> WhatsApp
                    </a>
                </div>
                <div class="col-auto">
                    <a href="#" class="text-white mx-3"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="text-white mx-3"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="text-white mx-3"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top shadow-sm" id="mainNav">
        <div class="container">
            <a class="navbar-brand logo" href="#">Magician Badshah</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-4">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#videos">Videos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#packages">Packages</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
                <a href="https://wa.me/+ 91 - 9838457702" target="_blank"
                    class="btn magic-btn ms-lg-4 d-none d-lg-block">
                    <i class="fa-brands fa-whatsapp"></i> Book Now
                </a>
            </div>
        </div>
    </nav>


    @yield('content')

    <!-- FOOTER -->
    <footer class="bg-dark text-white py-5 position-relative overflow-hidden">
        <div class="container position-relative z-2">
            <!-- Decorative subtle overlay for premium feel -->
            <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25"
                style="background: radial-gradient(circle at 30% 70%, rgba(255,202,40,0.08), transparent 60%); pointer-events:none;">
            </div>

            <div class="row g-5">
                <!-- Brand & Social -->
                <div class="col-lg-4">
                    <h4 class="logo mb-3" style="font-size: 2.4rem;">Magician Badshah</h4>
                    <p class="text-white-75 mb-4 lead fs-6">
                        Crafting unforgettable moments with premium theme parties & exquisite balloon artistry across
                        Delhi-NCR.
                    </p>
                    <div class="d-flex gap-4">
                        <a href="#" class="text-white-50 hover-lift fs-4 transition-all">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-white-50 hover-lift fs-4 transition-all">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="text-white-50 hover-lift fs-4 transition-all">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <a href="#" class="text-white-50 hover-lift fs-4 transition-all">
                            <i class="fa-brands fa-pinterest"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-4">
                    <h5 class="fw-semibold mb-4 text-uppercase letter-spacing-1">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-3"><a href="#home"
                                class="text-white-75 text-decoration-none hover-accent">Home</a></li>
                        <li class="mb-3"><a href="#about" class="text-white-75 text-decoration-none hover-accent">About
                                Us</a></li>
                        <li class="mb-3"><a href="#services"
                                class="text-white-75 text-decoration-none hover-accent">Services</a></li>
                        <li class="mb-3"><a href="#gallery"
                                class="text-white-75 text-decoration-none hover-accent">Gallery</a></li>
                        <li><a href="#contact" class="text-white-75 text-decoration-none hover-accent">Contact</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="col-lg-2 col-md-4">
                    <h5 class="fw-semibold mb-4 text-uppercase letter-spacing-1">Our Services</h5>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-3"><a href="#" class="text-white-75 text-decoration-none hover-accent">Custom
                                Themes</a></li>
                        <li class="mb-3"><a href="#" class="text-white-75 text-decoration-none hover-accent">Balloon
                                Artistry</a></li>
                        <li class="mb-3"><a href="#" class="text-white-75 text-decoration-none hover-accent">Birthday
                                Celebrations</a></li>
                        <li class="mb-3"><a href="#" class="text-white-75 text-decoration-none hover-accent">Wedding &
                                Engagement</a></li>
                        <li><a href="#" class="text-white-75 text-decoration-none hover-accent">Corporate Events</a>
                        </li>
                    </ul>
                </div>

                <!-- Contact & Newsletter -->
                <div class="col-lg-4 col-md-4">
                    <h5 class="fw-semibold mb-4 text-uppercase letter-spacing-1">Get in Touch</h5>
                    <p class="mb-3"><i class="fa-solid fa-phone-volume me-3 text-accent"></i> + 91 - 9838457702</p>
                    <p class="mb-4"><i class="fa-brands fa-whatsapp me-3 text-accent"></i> + 91 - 9305059906.</p>

                    <p class="small text-white-75 mb-3">Chowk, Lucknow Uttar Pradesh, India - 226003</p>

                    <!-- Simple Newsletter (premium touch) -->
                    <form class="mt-4">
                        <div class="input-group input-group-lg">
                            <input type="email"
                                class="form-control bg-transparent border-white text-white placeholder-white-50"
                                placeholder="Your email for updates & offers" aria-label="Newsletter email">
                            <button class="btn btn-outline-accent px-4" type="submit">
                                <i class="fa-solid fa-paper-plane"></i>
                            </button>
                        </div>
                        <small class="text-white-50 mt-2 d-block">Stay magical – subscribe for exclusive offers</small>
                    </form>
                </div>
            </div>

            <!-- Horizontal elegant divider -->
            <hr class="my-5 border-top border-white opacity-25" style="border-width: 2px;">

            <!-- Copyright row - left & right aligned -->
            <div class="row align-items-center small text-white-75">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    © 2026 Magician Badshah Theme Party Planner. All Rights Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed with <i class="fa-solid fa-heart text-danger mx-1"></i> & Pure Magic by <span
                        class="fw-semibold text-accent">Janmejay</span>
                </div>
            </div>
        </div>

        <!-- Optional subtle particle/floating effect at bottom (if you have particles-bg already) -->
        <!-- <div class="position-absolute bottom-0 start-0 w-100 h-50 pointer-events-none" id="footer-particles"></div> -->
    </footer>

    <!-- STICKY WHATSAPP -->
    <a href="https://wa.me/+ 91 - 9838457702" target="_blank" class="sticky-whatsapp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <!-- SCROLL TO TOP -->
    <button onclick="window.scrollTo({top:0, behavior:'smooth'})" id="scrollTop" class="scroll-top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Preloader
        window.addEventListener('load', () => {
            const preloader = document.getElementById('preloader');
            preloader.style.opacity = '0';
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 800);
        });

        // Sparkle Generator
        function createSparkles() {
            const container = document.getElementById('sparkles');
            for (let i = 0; i < 35; i++) {
                const sparkle = document.createElement('i');
                sparkle.className = 'sparkle fa-solid fa-star';
                sparkle.style.left = Math.random() * 100 + '%';
                sparkle.style.top = Math.random() * 80 + '%';
                sparkle.style.animationDelay = Math.random() * 4 + 's';
                sparkle.style.fontSize = (Math.random() * 18 + 12) + 'px';
                container.appendChild(sparkle);

                // Remove and recreate for endless effect
                setInterval(() => {
                    sparkle.style.opacity = '0';
                    setTimeout(() => {
                        sparkle.style.left = Math.random() * 100 + '%';
                        sparkle.style.top = Math.random() * 80 + '%';
                        sparkle.style.opacity = '1';
                    }, 3000);
                }, 6000);
            }
        }

        // Gallery Images
        function populateGallery() {
            const images = [
                "https://picsum.photos/id/1015/600/600",
                "https://picsum.photos/id/201/600/600",
                "https://picsum.photos/id/870/600/600",
                "https://picsum.photos/id/29/600/600",
                "https://picsum.photos/id/160/600/600",
                "https://picsum.photos/id/251/600/600",
                "https://picsum.photos/id/314/600/600",
                "https://picsum.photos/id/401/600/600"
            ];

            const grid = document.getElementById('galleryGrid');
            images.forEach((src, index) => {
                const div = document.createElement('div');
                div.className = `col-md-6 col-lg-3 gallery-img`;
                div.innerHTML = `
                    <img src="${src}" class="img-fluid w-100" style="height:280px; object-fit:cover;" alt="Party ${index + 1}">
                `;
                div.onclick = () => {
                    document.getElementById('modalImage').src = src;
                    new bootstrap.Modal(document.getElementById('galleryModal')).show();
                };
                grid.appendChild(div);
            });
        }

        // Form Validation + Success
        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const name = document.getElementById('name').value.trim();
            const phone = document.getElementById('phone').value.trim();

            if (name === '' || phone === '') {
                alert("Please fill name and phone number ✨");
                return;
            }

            const btn = this.querySelector('button');
            const originalText = btn.textContent;
            btn.innerHTML = `<i class="fa-solid fa-sparkles fa-spin"></i> Sending Magic...`;
            btn.disabled = true;

            setTimeout(() => {
                alert("🎉 Thank you! Our magician will call you within 5 minutes.");
                this.reset();
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 1800);
        });

        // Scroll Top Button
        function handleScrollTop() {
            const btn = document.getElementById('scrollTop');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 600) {
                    btn.style.display = 'flex';
                } else {
                    btn.style.display = 'none';
                }
            });
        }

        // Smooth scrolling for nav links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Initialize everything
        window.onload = function () {
            createSparkles();
            populateGallery();
            handleScrollTop();

            // Navbar active link highlight on scroll (bonus)
            window.addEventListener('scroll', () => {
                const sections = document.querySelectorAll('section[id]');
                const navLinks = document.querySelectorAll('.nav-link');

                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    if (scrollY >= sectionTop - 300) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('text-primary');
                    if (link.getAttribute('href') === `#${current}`) {
                        link.classList.add('text-primary');
                    }
                });
            });

            // Auto carousel already handled by Bootstrap
            console.log('%c✨ Magician Badshah Homepage Loaded Successfully ✨', 'color:#e91e63; font-size:14px; font-weight:bold;');
        };
    </script>
</body>

</html>
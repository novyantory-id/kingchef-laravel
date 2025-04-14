<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE-edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Novyantory Blogger</title>
        <meta name="title" content="Novblog - Novyantory Blogger" />
        <meta
            name="description"
            content="This is a blog recipe by novyantory"
        />
        <!-- Favicon -->
        <link
            rel="shortcut icon"
            href="{{ asset('assets/img/img-icon.png') }} "
            type="image/x-icon"
        />

        {{-- QUill snow css --}}
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <!-- ionicon -->
        <link
            href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css"
            rel="stylesheet"
        />

        <!-- css -->
        <link rel="stylesheet" href="{{ asset('assets/css/frontend-style.css') }} " />

        <!-- preload images -->
        <link
            rel="preload"
            as="image"
            href="{{ asset('assets/img/frontend/opor.jpg') }} "
        />
        <link
            rel="preload"
            as="image"
            href="{{ asset('assets/img/frontend/dendeng.jpg') }} "
        />
        <link
            rel="preload"
            as="image"
            href="{{ asset('assets/img/frontend/rendang.jpg') }} "
        />
    </head>
    <body id="#top">
    <!-- 
        - #HEADER 
        -->

        <header class="header" data-header>
            <div class="container">
                <a href="#" class="logo">
                    <img
                        src="{{ asset('assets/img/kingchef.png') }} "
                        height="100"
                        width="100"
                        alt="NovFood"
                    />
                </a>

                <nav class="navbar" data-navbar>
                    <div class="navbar-top">
                        <a href="#" class="logo">
                            <img
                                src="{{ asset('assets/img/kingchef.png') }} "
                                height="50"
                                width="70"
                                alt="NovFood"
                            />
                        </a>

                        <button
                            class="nav-close-btn"
                            aria-label="close menu"
                            data-nav-toggler
                        >
                            <ion-icon
                                name="close"
                                aria-hidden="true"
                            ></ion-icon>
                        </button>
                    </div>

                    <ul class="navbar-list">
                        <li>
                            <a
                                href="#hero"
                                class="navbar-link hover-1"
                                data-nav-toggler
                                >Home</a
                            >
                            </li>
                            <li>
                                <a
                                href="#topics"
                                class="navbar-link hover-1"
                                data-nav-toggler
                                >Topics</a
                            >
                            </li>
                            <li>
                                <a
                                href="#featured"
                                class="navbar-link hover-1"
                                data-nav-toggler
                                >Featured</a
                            >
                            </li>
                            <li>
                                <a
                                href="#recent"
                                class="navbar-link hover-1"
                                data-nav-toggler
                                >Recent Post</a
                            >
                            </li>
                            <li>
                                <a
                                href="#contact"
                                class="navbar-link hover-1"
                                data-nav-toggler
                                >Contact</a
                            >
                            </li>
                    </ul>
                    
                </nav>

                <a href="#" class="btn btn-primary">Subscribe</a>

                <button
                    class="nav-open-btn"
                    aria-label="open menu"
                    data-nav-toggler
                >
                    <ion-icon name="menu" aria-hidden="true"></ion-icon>
                </button>
            </div>
        </header>

        <main>
            <article>

                @yield('content')

                @stack('scripts')
         
            </article>
        </main>

         <!-- 
         - #FOOTER 
         -->

         <footer id="contact">
            <div class="container">
                <div class="card footer">
                    <div class="section footer-top">

                        <div class="footer-brand">
                            <a href="#" class="logo">
                                <img src="{{ asset('assets/img/kingchef.png') }} " width="119" height="37" loading="lazy" alt="King Chef">
                            </a>

                            <p class="footer-text">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur maxime unde optio cupiditate deleniti qui consequatur, nam ab inventore suscipit magnam harum dolores, libero id voluptatem laudantium, quibusdam quo ducimus.
                            </p>

                            <p class="footer-list-title">Address</p>

                            <address class="footer-text address">
                                Padat Karya Street
                                South Lampung, SL 35362
                            </address>
                        </div>

                        <div class="footer-list">

                            <p class="footer-list-title">Categories</p>

                            <ul>
                                <li>
                                    <a href="#" class="footer-link hover-2">Makanan Utama</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Makanan Pembuka</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Makanan Penutup</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Masakan Indonesia</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Camilan</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Minuman</a>
                                </li>
                                <li>
                                    <a href="#" class="footer-link hover-2">Resep</a>
                                </li>
                            </ul>
                        </div>

                        <div class="footer-list">

                            <p class="footer-list-title">Newsletter</p>

                            <p class="footer-text">
                                Sign up to be first to receive the latest stories inspiring us, case studies, and industry news.
                            </p>

                            <div class="input-wrapper">
                                <input type="text" name="name" placeholder="Your name" id="" class="input-field" autocomplete="off" required>

                                <ion-icon name="person" aria-hidden="true"></ion-icon>
                            </div>

                            <div class="input-wrapper">
                                <input type="email" name="email_address" placeholder="Your name" id="" class="input-field" autocomplete="off" required>

                                <ion-icon name="mail" aria-hidden="true"></ion-icon>
                            </div>

                            <a href="#" class="btn btn-primary">
                                <span class="span">Subscribe</span>

                                <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>    
                            </a>
                        </div>

                    </div>

                    <div class="footer-bottom">

                        <p class="copyright">
                            &copy; Developed by <a href="#" class="copyright-link">Novyantory</a>
                        </p>

                        <ul class="social-list">

                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-twitter"></ion-icon>

                                    <span class="span">Twitter</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-instagram"></ion-icon>

                                    <span class="span">Instagram</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="social-link">
                                    <ion-icon name="logo-github"></ion-icon>

                                    <span class="span">Github</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
         </footer>

        <!-- 
         - #BACK TO TOP 
         -->

         <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
            <ion-icon name="arrow-round-up" aria-hidden="true"></ion-icon>
         </a>

        <!-- Ionicons link -->
        <script src="{{ asset('assets/js/frontend-main.js') }} "></script>

        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    </body>
</html>

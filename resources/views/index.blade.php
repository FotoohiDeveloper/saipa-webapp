<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <title>ربات وضعیت خودرو</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/fav.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
</head>

<body>
    <nav id="navbar" class="navbar fixed-top navbar-expand-lg navbar-header navbar-mobile">
        <div class="navbar-container container">
            <div class="navbar-brand">
                <a class="navbar-brand-logo" href="#top">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-layout-grid2"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav menu-navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#top">
                            <p class="nav-link-menu">خانه</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">
                            <p class="nav-link-menu">درباره ما</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">
                            <p class="nav-link-menu">خدمات ما</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">
                            <p class="nav-link-menu">تعرفه ها</p>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link learn-more-btn btn-invert" href="/auth/login"><span
                                class="ti ti-arrow-right">ورود</span></a>
                    </li>
                </ul>
            </div>
            <!-- End Menu-->
        </div>
    </nav>
    <!-- Header End -->
    <div id="top"></div>
    <!-- Banner Start-->
    <div class="wrapper">
        <div class="header">
            <div class="container header-container">
                <div class="col-lg-6 header-img-section">
                    <img src="{{ asset('assets/images/banner-2.svg') }}" alt="banner">
                </div>
                <div class="col-lg-6 header-title-section">
                    <h1 class="header-title">مشاهده وضعیت خودروی مشتریان</h1>
                    <p class="header-title-text">نمایش وضعیت خودروی مشتریان شرکت های ایران خودرو، ایران خودرو دیزل،
                        سایپا، مدیران خودرو و کرمان موتور دارای ربات پیگیر وضعیت خودروی مشتریان برای چک کردن تمام وقت
                        وضعیت خودروی های مشتریان</p>
                    <div class="learn-more-btn-section">
                        <a class="nav-link learn-more-btn" href="#services"><span class="ti ti-settings">خدمات
                                ما</span></a>
                        <a class="nav-link learn-extra-btn" href="#contact"><span class="ti ti-arrow-right">تماس با
                                ما</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner End-->
        <!-- About Section Start-->
        <div id="about"></div>
        <div class="about-section">
            <div class="container about-container">
                <div class="col-lg-5 col-md-12 about-header-img">
                    <img src="{{ asset('assets/images/about-2.svg') }}" alt="aboutus banner">
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-12 about-title-section">
                    <p class="about-subtitle">درباره تیم برنامه نویسی</p>
                    <h2 class="about-title">برنامه نویسان</h2>
                    <p class="about-text">تیم برنامه نویسی این ربات دارای سوابق طراحی سایت های فراوانی بوده است و برای
                        بررسی برخی از شرکت ها از مدل هوش مصنوعی استفاده شده است</p>
                    <div class="learn-more-btn-section">
                        <a class="nav-link learn-more-btn" href="#services"><span class="ti ti-support">خدمات
                                ما</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About Section End-->
        <!-- Service Section Start-->
        <div id="services"></div>
        <div class="services-section">
            <div class="container">
                <div class="col-lg-12 col-sm-12 about-title-section">
                    <p class="about-subtitle">ربات وضعیت خودرو</p>
                    <h2 class="about-title">برخی خدمات ما</h2>
                    <p class="about-text mb-5">برای خدمات اضافی میتوانید تماس بگیرید</p>
                    <div class="row service-list">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service-box">
                                <span class="icon ti-layout"></span>
                                <h5 class="my-4">وضعیت خودرو</h5>
                                <p>نمایش خودرو مشتریان در لحظه در یک سایت و بدون نیاز به مراجعه به سایت شرکت برای نمایش
                                    وضعیت خودرو.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service-box">
                                <span class="icon ti-mobile"></span>
                                <h5 class="my-4">پیامک به موبایل</h5>
                                <p>وضعیت خودرو شما همیشه چک میشود! البته با ربات 😁 و بلافاصله بعد از هر تغییری به شما
                                    پیامک میدهد</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="service-box">
                                <span class="icon ti-location-arrow"></span>
                                <h5 class="my-4">شرکت های مختلف</h5>
                                <p>ربات ما از شرکت های مختلفی پشتیبانی میکند و اگر شرکت مورد نظر شما در لیست ما موجود
                                    نبود، میتوانید به تیم برنامه نویسی پیام دهید.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service Section End-->
        <!-- Pricing Section Start-->
        <div id="pricing"></div>
        <div class="pricing-section">
            <div class="container pricing-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pricing-title">
                            <h2>تعرفه ها</h2>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است</p>
                        </div>
                    </div>
                </div>
                <div class="pricing-plan-cards-section">
                    <div class="col-lg-4 col-md-8 col-xs-10 pricing-card-section">
                        <div class="pricing-card pricing-one">
                            <p class="pricing-period"><img src="{{ asset('assets/images/pricing/cycle.png') }}"
                                    alt="cycle"></p>
                            <p class="pricing-rate">رایگان</p>
                            <div class="pricing-all-plan-features-section basic-plan-features-section">
                                <ul>
                                    <li>بررسی وضعیت خودرو مشتریان</li>
                                    <li>
                                        <s>مانیتور وضعیت خودرو</s>
                                    </li>
                                    <li>
                                        <s>بررسی وضعیت خودرو هر 5 ساعت</s>
                                    </li>
                                    <li>
                                        <s>بررسی وضعیت خودرو هر 30 دقیقه</s>
                                    </li>
                                </ul>
                            </div>
                            <a class="nav-link learn-extra-btn m-0" href="#contact"><i class="fa fa-apple"
                                    aria-hidden="true"></i>
                                پیام به پشتیبانی</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-xs-10 pricing-card-section">
                        <div class="pricing-card featured">
                            <p class="pricing-period"><img src="{{ asset('assets/images/pricing/scooter.png') }}"
                                    alt="scooter"></p>
                            <p class="pricing-rate">50 هزار تومان در ماه</p>
                            <div class="pricing-all-plan-features-section medium-plan-features-section">

                                <ul>
                                    <li>بررسی وضعیت خودرو مشتریان</li>
                                    <li>
                                        مانیتور وضعیت خودرو
                                    </li>
                                    <li>
                                        بررسی وضعیت خودرو هر 5 ساعت
                                    </li>
                                    <li>
                                        <s>بررسی وضعیت خودرو هر 30 دقیقه</s>
                                    </li>
                                </ul>
                            </div>
                            <a class="nav-link learn-more-btn" href="#contact"><i class="fa fa-apple"
                                    aria-hidden="true"></i>
                                پیام به پشتیبانی</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8 col-xs-10 pricing-card-section">
                        <div class="pricing-card pricing-three">
                            <p class="pricing-period"><img src="{{ asset('assets/images/pricing/car.png') }}"
                                    alt="car"></p>
                            <p class="pricing-rate">100 هزارتومان در ماه</p>
                            <div class="pricing-all-plan-features-section advance-plan-features-section">
                                <ul>
                                    <li>بررسی وضعیت خودرو مشتریان</li>
                                    <li>
                                        مانیتور وضعیت خودرو
                                    </li>
                                    <li>
                                        بررسی وضعیت خودرو هر 5 ساعت
                                    </li>
                                    <li>
                                        بررسی وضعیت خودرو هر 30 دقیقه
                                    </li>
                                </ul>
                            </div>
                            <a class="nav-link learn-extra-btn m-0" href="#contact"><i class="fa fa-apple"
                                    aria-hidden="true"></i>
                                پیام به پشتیبانی</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonials Section End-->
        <!-- Contact Section Start-->
        <div id="contact"></div>
        <div class="contact-section">
            <div class="container contact-container">
                <div class="col-md-6 col-sm-12">
                    <form class="contact-form">
                        <div class="form-group">
                            <label>نام</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>شماره تماس</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>ایمیل</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>پیام</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn learn-more-btn">ارسال</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 offset-md-1 col-sm-12 contact-header-img">
                    <div class="pricing-title">
                        <h2>تماس با ما</h2>
                        <p class="mb-5">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                            طراحان گرافیک است</p>
                    </div>
                    <img src="{{ asset('assets/images/contact.svg') }}" alt="contact banner">
                </div>
            </div>
        </div>
        <!-- Contact Section End-->
        <!-- Footer Section Start-->
        <div class="footer-section">
            <div class="container footer-container">
                <div class="col-lg-3 col-md-6 footer-logo">
                    <img src="{{ asset('assets/images/logo-white.png') }}" alt="footer logo">
                    <p class="footer-susection-text">تیم برنامه نویسی ایرانی</p>
                </div>
                <div class="col-lg-3 col-md-6 footer-subsection">
                    <div class="footer-subsection-2-1">
                        <h3 class="footer-subsection-title">دسترسی سریع</h3>
                        <ul class="footer-subsection-list">
                            <li>
                                <a href="#about"><span class="ti-angle-right"></span> درباره ما</a>
                            </li>
                            <li>
                                <a href="#services"><span class="ti-angle-right"></span> خدمات ما</a>
                            </li>
                            <li>
                                <a href="#pricing"><span class="ti-angle-right"></span> قیمت گذاری</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-subsection">
                    <h3 class="footer-subsection-title">تماس</h3>
                    <ul class="footer-subsection-list">
                        <li>ایران - فارس
                            <br>
                        </li>
                        <li>
                            <a href="#">developer@a8f.ir</a>
                        </li>
                    </ul>
                </div>
                <div class="container footer-credits">
                    <p>تمامی حقوق برای تیم برنامه نویسی این محصول محفوظ است</p>
                </div>
            </div>
        </div>
        <!-- Javascript files-->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/smoothscroll.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <!-- Javascript files-->
</body>
<!-- Mirrored from www.konnectplugins.com/vistha/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jul 2020 11:22:50 GMT -->

</html>

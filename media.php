<?php include 'includes/header.php'; ?>

<style>
    .page-banner {
        background-image: url('assests/image/banner11.jpeg');
        background-size: cover;
        background-position: center;
        padding: 180px 0 120px;
        position: relative;
        text-align: center;
        color: #fff;
    }
    .page-banner::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.4);
    }
    .page-banner .container { position: relative; z-index: 2; }
    .page-banner h1 { font-size: 3.5rem; font-weight: 700; margin: 0; color: aliceblue;}

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        margin-bottom: 30px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        cursor: pointer;
    }
    .gallery-item img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .gallery-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(201, 164, 92, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s;
    }
    .gallery-item:hover .gallery-overlay { opacity: 1; }
    .gallery-item:hover img { transform: scale(1.1); }
    
    .gallery-overlay i { color: #fff; font-size: 2rem; transform: translateY(20px); transition: 0.3s; }
    .gallery-item:hover .gallery-overlay i { transform: translateY(0); }

    .section-title { font-weight: 700; margin-bottom: 15px; }
    .title-underline { width: 60px; height: 3px; background: #c9a45c; margin: 0 auto 40px; }
</style>

<div class="media-page-wrapper">
    <section class="page-banner">
        <div class="container">
            <h1>Media Gallery</h1>
        </div>
    </section>

    <section class="py-5 mt-5">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title">Our Projects Gallery</h2>
                <div class="title-underline"></div>
            </div>
            
            <div class="row g-4">
                <!-- Gallery Item 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assests/image/projects/project1.jpg" class="fancybox" data-fancybox="gallery">
                            <img src="assests/image/projects/project1.jpg" alt="Project 1">
                            <div class="gallery-overlay">
                                <i class="icon-search"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Gallery Item 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assests/image/projects/project2.jpg" class="fancybox" data-fancybox="gallery">
                            <img src="assests/image/projects/project2.jpg" alt="Project 2">
                            <div class="gallery-overlay">
                                <i class="icon-search"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Gallery Item 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assests/image/3985.jpg" class="fancybox" data-fancybox="gallery">
                            <img src="assests/image/3985.jpg" alt="Project 3">
                            <div class="gallery-overlay">
                                <i class="icon-search"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Gallery Item 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assests/image/banner9.jpg" class="fancybox" data-fancybox="gallery">
                            <img src="assests/image/banner9.jpg" alt="Project 4">
                            <div class="gallery-overlay">
                                <i class="icon-search"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Gallery Item 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assests/image/banner.jpg" class="fancybox" data-fancybox="gallery">
                            <img src="assests/image/banner.jpg" alt="Project 5">
                            <div class="gallery-overlay">
                                <i class="icon-search"></i>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Gallery Item 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assests/image/banner2.jpg" class="fancybox" data-fancybox="gallery">
                            <img src="assests/image/banner2.jpg" alt="Project 6">
                            <div class="gallery-overlay">
                                <i class="icon-search"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>

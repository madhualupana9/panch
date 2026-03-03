<?php include 'includes/header.php'; ?>

<style>
    /* Modern Banner Styling */
    .page-banner {
        background-image: url('assests/image/banner11.jpeg');
        background-size: cover;
        background-position: center;
        padding: 200px 0 150px;
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
    .page-banner h1 { 
        font-size: 4rem; 
        font-weight: 800; 
        margin: 0; 
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 4px;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
    }

    /* Filter Navigation */
    .gallery-filters {
        padding: 50px 0 30px;
        text-align: center;
    }
    .filter-btn {
        background: transparent;
        border: 2px solid #eee;
        padding: 10px 30px;
        margin: 5px;
        border-radius: 50px;
        font-weight: 600;
        color: #333;
        cursor: pointer;
        transition: 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .filter-btn.active, .filter-btn:hover {
        background: #c9a45c;
        border-color: #c9a45c;
        color: #fff;
        box-shadow: 0 5px 15px rgba(201, 164, 92, 0.4);
    }

    /* Modern Gallery Grid */
    .gallery-container {
        padding-bottom: 80px;
    }
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        margin-bottom: 30px;
        background: #fff;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        cursor: pointer;
        transition: 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .gallery-item img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .gallery-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    }
    .gallery-item:hover img {
        transform: scale(1.1);
    }

    /* Overlay Styling */
    .gallery-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
        padding: 30px;
        opacity: 0;
        transition: 0.4s;
    }
    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }
    .gallery-overlay h4 {
        color: #fff;
        font-weight: 700;
        margin-bottom: 5px;
        transform: translateY(20px);
        transition: 0.4s;
    }
    .gallery-overlay p {
        color: #c9a45c;
        font-weight: 500;
        margin: 0;
        transform: translateY(20px);
        transition: 0.4s 0.1s;
    }
    .gallery-item:hover .gallery-overlay h4,
    .gallery-item:hover .gallery-overlay p {
        transform: translateY(0);
    }

    /* Fancybox Popup Enhancement */
    .fancybox-content {
        border-radius: 15px;
    }
    
    /* Animation Helpers */
    .reveal {
        opacity: 0;
        transform: translateY(30px);
    }

    @media (max-width: 768px) {
        .page-banner { padding: 150px 0 100px; }
        .page-banner h1 { font-size: 2.5rem; }
        .gallery-item img { height: 280px; }
    }
</style>

<div class="media-page-wrapper">
    <!-- Header Banner -->
    <section class="page-banner">
        <div class="container">
            <h1 id="media-title">Portfolio Gallery</h1>
        </div>
    </section>

    <!-- Filters Section -->
    <div class="container">
        <div class="gallery-filters reveal">
            <button class="filter-btn active" onclick="filterGallery('all')">Recents Gallery</button>
        </div>
    </div>

    <!-- Gallery Grid -->
    <section class="gallery-container">
        <div class="container">
            <div class="row g-4" id="gallery-grid">
                
                <!-- Item 1: Plots -->
                <div class="col-lg-4 col-md-6 gallery-box plots reveal">
                    <div class="gallery-item">
                        <a href="assests/image/banner.jpg" class="fancybox" data-fancybox="gallery" data-caption="Premium Open Plots - Kadthal">
                            <img src="assests/image/banner.jpg" alt="Premium Plots">
                            <div class="gallery-overlay">
                                <h4>Premium Plots</h4>
                                <p>Open Land • Kadthal</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Item 2: Villas -->
                <div class="col-lg-4 col-md-6 gallery-box villas reveal">
                    <div class="gallery-item">
                        <a href="assests/image/projects/project2.jpg" class="fancybox" data-fancybox="gallery" data-caption="Luxury Villa - Urban Elite">
                            <img src="assests/image/projects/project2.jpg" alt="Luxury Villa">
                            <div class="gallery-overlay">
                                <h4>Luxury Villas</h4>
                                <p>Project • Urban Elite</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Item 3: Apartments -->
                <div class="col-lg-4 col-md-6 gallery-box apartments reveal">
                    <div class="gallery-item">
                        <a href="assests/image/projects/project1.jpg" class="fancybox" data-fancybox="gallery" data-caption="Premium County Apartments">
                            <img src="assests/image/projects/project1.jpg" alt="Apartment View">
                            <div class="gallery-overlay">
                                <h4>Modern Apartments</h4>
                                <p>Design • Premium County</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Item 4: Plots -->
                <div class="col-lg-4 col-md-6 gallery-box plots reveal">
                    <div class="gallery-item">
                        <a href="assests/image/banner2.jpg" class="fancybox" data-fancybox="gallery" data-caption="Eco-Friendly Land Development">
                            <img src="assests/image/banner2.jpg" alt="Eco Plots">
                            <div class="gallery-overlay">
                                <h4>Eco Plots</h4>
                                <p>Development • Future City</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Item 5: Villas -->
                <div class="col-lg-4 col-md-6 gallery-box villas reveal">
                    <div class="gallery-item">
                        <a href="assests/image/banner9.jpg" class="fancybox" data-fancybox="gallery" data-caption="Green Landscape Villa Plots">
                            <img src="assests/image/banner9.jpg" alt="Villa Plots">
                            <div class="gallery-overlay">
                                <h4>Villa Plots</h4>
                                <p>Nature • Eco Villages</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Item 6: Apartments -->
                <div class="col-lg-4 col-md-6 gallery-box apartments reveal">
                    <div class="gallery-item">
                        <a href="assests/image/3985.jpg" class="fancybox" data-fancybox="gallery" data-caption="Contemporary High-Rise Lifestyle">
                            <img src="assests/image/3985.jpg" alt="Lifestyle View">
                            <div class="gallery-overlay">
                                <h4>High-Rise Lifestyle</h4>
                                <p>Living • Urban Luxury</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<!-- Modern Gallery Scripts -->
<script src="assests/js/gsap.min.js"></script>
<script>
    // Filtering Logic
    function filterGallery(category) {
        const boxes = document.querySelectorAll('.gallery-box');
        const buttons = document.querySelectorAll('.filter-btn');
        
        // Update active button
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');

        // GSAP transition for filtering
        gsap.to(boxes, {
            scale: 0.8,
            opacity: 0,
            duration: 0.3,
            onComplete: () => {
                boxes.forEach(box => {
                    if (category === 'all' || box.classList.contains(category)) {
                        box.style.display = 'block';
                    } else {
                        box.style.display = 'none';
                    }
                });
                
                gsap.to('.gallery-box:visible', {
                    scale: 1,
                    opacity: 1,
                    duration: 0.4,
                    stagger: 0.1
                });
            }
        });
    }

    // Initial Reveal Animations
    document.addEventListener('DOMContentLoaded', () => {
        gsap.to('#media-title', { 
            opacity: 1, 
            y: 0, 
            duration: 1, 
            delay: 0.5 
        });

        gsap.to('.reveal', {
            opacity: 1,
            y: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out",
            scrollTrigger: {
                trigger: '.reveal',
                start: 'top 80%'
            }
        });
    });

    // Custom visible selector helper
    jQuery.expr.filters.visible = function(elem) {
        return !!(elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length);
    };
</script>

<?php include 'includes/footer.php'; ?>

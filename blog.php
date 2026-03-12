<?php include 'includes/header.php'; ?>

<!-- Custom Styles for Blog Page -->
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

    .section-padding { padding: 120px 0; }
    .bg-light-section { background-color: #fcfbf7; }

    .section-title { margin-bottom: 50px; font-weight: 700; color: #1a1a1a; position: relative; text-align: center; }
    .section-title::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: #c9a45c;
        margin: 15px auto 0;
    }

    .blog-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: 0.3s;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .blog-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }
    .blog-img-wrapper {
        position: relative;
        height: 250px;
        overflow: hidden;
    }
    .blog-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s;
    }
    .blog-card:hover .blog-img {
        transform: scale(1.1);
    }
    .blog-date {
        position: absolute;
        bottom: 15px;
        left: 15px;
        background: #c9a45c;
        color: #fff;
        padding: 5px 15px;
        border-radius: 5px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    .blog-content {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .blog-category {
        color: #c9a45c;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 10px;
    }
    .blog-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: #1a1a1a;
        line-height: 1.4;
    }
    .blog-excerpt {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }
    .read-more {
        margin-top: auto;
        color: #c9a45c;
        font-weight: 700;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: 0.3s;
    }
    .read-more:hover {
        gap: 12px;
        color: #b08e4a;
    }

    @media (max-width: 768px) {
        .page-banner { padding: 120px 0 80px; }
        .page-banner h1 { font-size: 2.5rem; }
        .section-padding { padding: 120px 0; }
        .blog-img-wrapper { height: 200px; }
    }
</style>

<div class="blog-page-wrapper">

    <!-- Blog Posts Grid -->
    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">Latest Updates</h2>
            
            <div class="row g-4">
                <?php
                $stmt = $pdo->prepare("SELECT * FROM news WHERE is_published = 1 ORDER BY published_at DESC");
                $stmt->execute();
                $news_articles = $stmt->fetchAll();

                if ($news_articles):
                    foreach ($news_articles as $article):
                        $date = date('F d, Y', strtotime($article['published_at']));
                        $image_path = $article['image'];
                        if (strpos($image_path, 'news/') === 0) {
                            $image_path = 'admin/public/storage/' . $image_path;
                        }
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card">
                        <div class="blog-img-wrapper">
                            <img src="<?php echo htmlspecialchars($image_path); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>" class="blog-img">
                            <div class="blog-date"><?php echo $date; ?></div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-category"><?php echo htmlspecialchars($article['category']); ?></div>
                            <h3 class="blog-title"><?php echo htmlspecialchars($article['title']); ?></h3>
                            <p class="blog-excerpt"><?php echo htmlspecialchars($article['excerpt']); ?></p>
                            <a href="news-detail.php?slug=<?php echo $article['slug']; ?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php 
                    endforeach;
                else:
                ?>
                <div class="col-12 text-center">
                    <p>No news articles found.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>

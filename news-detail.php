<?php 
include 'includes/db.php';

$slug = isset($_GET['slug']) ? $_GET['slug'] : '';
$article = null;

if ($slug) {
    $stmt = $pdo->prepare("SELECT * FROM news WHERE slug = ? AND is_published = 1 LIMIT 1");
    $stmt->execute([$slug]);
    $article = $stmt->fetch();
}

if (!$article) {
    header("Location: /blog");
    exit;
}

$image_path = $article['image'];
if (strpos($image_path, 'news/') === 0) {
    $image_path = 'admin/storage/' . $image_path;
}

include 'includes/header.php'; 

$date = date('F d, Y', strtotime($article['published_at']));
?>

<style>
    .news-detail-banner {
        background-image: url('<?php echo htmlspecialchars($image_path); ?>');
        background-size: cover;
        background-position: center;
        padding: 200px 0 100px;
        position: relative;
        text-align: center;
        color: #fff;
    }
    .news-detail-banner::before {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.6);
    }
    .news-detail-banner .container { position: relative; z-index: 2; }
    .news-detail-banner h1 { font-size: 2rem; font-weight: 700; margin-bottom: 20px; color: aliceblue;}
    .news-meta {
        font-size: 1.1rem;
        font-weight: 500;
        display: flex;
        justify-content: center;
        gap: 30px;
    }
    .content-section { padding: 80px 0; }
    .news-article-content {
        max-width: 900px;
        margin: 0 auto;
        font-size: 1.15rem;
        line-height: 1.8;
        color: #333;
    }
    .news-article-content img {
        max-width: 100%;
        height: auto;
        border-radius: 15px;
        margin: 30px 0;
    }
    .category-badge {
        background: #c9a45c;
        color: #fff;
        padding: 5px 15px;
        border-radius: 5px;
        font-size: 0.9rem;
        text-transform: uppercase;
        margin-bottom: 15px;
        display: inline-block;
    }
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #c9a45c;
        text-decoration: none;
        font-weight: 700;
        margin-bottom: 40px;
    }
    .back-btn:hover { color: #b08e4a; }
</style>

<div class="news-detail-wrapper">
    <section class="news-detail-banner">
        <div class="container">
            <div class="category-badge"><?php echo htmlspecialchars($article['category']); ?></div>
            <h1><?php echo htmlspecialchars($article['title']); ?></h1>
            <div class="news-meta">
                <span><i class="far fa-calendar-alt"></i> <?php echo $date; ?></span>
                <span><i class="far fa-user"></i> <?php echo htmlspecialchars($article['author']); ?></span>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <div class="news-article-content">
                <a href="blog" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Blog</a>
                
                <div class="article-body">
                    <?php echo $article['content']; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'includes/footer.php'; ?>

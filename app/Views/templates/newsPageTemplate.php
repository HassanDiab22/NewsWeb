<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .news-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .news-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .news-date {
            color: #666;
            margin-bottom: 10px;
        }

        .news-content {
            line-height: 1.6;
        }
    </style>

<div class="container">
    <?php echo '<img class="news-image" src="../images/' . $news['image'] . '.jpg" width="120px" height="120px">'; ?>
        <h2 class="news-title"><?= $news['title'] ?></h2>
        <p class="news-date"><?= $news['date'] ?></p>
        <div class="news-content">
            <p><?= $news['description'] ?></p>
            
        </div>
    </div>
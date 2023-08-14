<style>
    *{
        /* background-color:red; */
    }
    .cards-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr); 
        gap: 20px;
        margin: 7px 15px; 
    }

    .card {
        width: 18rem;
    }
</style>
<div class="cards-container">
<?php foreach ($news as $news_item): ?>

<div class="card" style="width: 18rem;">
<img class="card-img-top" src="images/<?= $news_item['image'] ?>.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $news_item['title'] ?></h5>
    <p class="card-text"><?=  substr($news_item['title'], 0, 100).'...'?></p>
    <p class="card-date"><?= $news_item['date'] ?></p>
    <a href="/news/<?= $news_item['id'] ?>" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<?php endforeach; ?>
</div>
<a href="/create"><button>Add new</button></a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">author</th>
      <th scope="col">description</th>
      <th scope="col">image</th>
      <th scope="col">edit</th>
      <th scope="col">remove</th>
    </tr>
  </thead>
  <tbody>
    <?php $order_number=0?>

  <?php foreach ($news as $news_item): ?>
    <?php $order_number++; ?>
   
    <tr>
   
      <th scope="row"><?= $order_number?></th>
      <td><?= $news_item['title'] ?></td>
      <td><?= $news_item['author_id'] ?></td>
      <td><?= $news_item['description'] ?></td>
      <td><?php echo '<img src="images/' . $news_item['image'] . '" width="120px" height="120px">'; ?></td>
      <td><a href=<?= base_url('/edit/'.$news_item['id'] ) ?>><button class="btn btn-success">edit</button></a></td>
      <td><button onclick="deleteNews(<?= $news_item['id'] ?>)" class="btn btn-danger">delete</button></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<script>
    function deleteNews(id) {
        var result = confirm("Are you sure you want to delete this news item?");
        if (result === true) {
          window.location.href = '/delete/' + id;
        }   
    }
</script>

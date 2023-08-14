<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>


<form action="<?= base_url('/news/update/'.$news['id']) ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label class="form-label" for="title">Title</label>
        <input class="form-control" type="input" name="title" value="<?= set_value('title', $news['title']) ?>">
    </div>

    <div class="mb-3">  
        <label class="form-label">Author</label>
        <select name="author_id" class="form-select" id="selectAuthor">
            <?php foreach ($authors as $author): ?>
                <?php if ($author['id'] == $news['author_id']): ?>
                    <option value="<?= $author['id'] ?>" selected><?= $author['name'] ?></option>
                <?php else: ?>
                    <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <?php echo '<img src="images/'.$news['image'] .'" width="300px" height="120px">'; ?>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input class="form-control" name="image" type="file" id="formFile">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"><?= set_value('description', $news['description']) ?></textarea>
    </div> 

    <a href="/admin">
        <input class="btn btn-primary" type="submit" name="submit" value="Create news item">
    </a>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectAuthor = document.getElementById('selectAuthor');
            const authorIdInput = document.getElementsByName('author_id')[0];

            selectAuthor.addEventListener('change', function() {
                authorIdInput.value = selectAuthor.options[selectAuthor.selectedIndex].value;
            });
        });
    </script>
</form>

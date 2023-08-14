<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="/news/create" method="post" enctype="multipart/form-data">
<?php echo form_open_multipart('upload/do_upload');?>
<?= csrf_field() ?>
<div class="mb-3">
<label class="form-label" for="title">Title</label>
    <input class="form-control" type="input" name="title">
</div>

<div class="mb-3">  
<label class="form-label">author</label>


<select name="author_id" class="form-select" id="selectAuthor">
<?php foreach ($authors as $author): ?>
    <!-- ask about that  -->
    <option value="<?= $author['id'] ?>" ><?= $author['name'] ?></option>
    <?php endforeach; ?>
</select>

</div>
 <!-- <div class="mb-3">
  <label for="formFile" class="form-label">Default file input example</label>
  <input class="form-control" name="image" type="file" id="formFile">
</div> -->

<div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input class="form-control" name="image" type="file" id="formFile">
    </div>

<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
</div> 
    <a href="/admin"><input class="btn btn-primary" type="submit" name="submit" value="Create news item"></a>
 
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
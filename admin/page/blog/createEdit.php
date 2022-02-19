<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-4 text-gray-800"><?php if ($id) : ?>Upravit článek<?php else : ?>Přidat clánek<?php endif; ?></h1>
</div>

<div>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title">Nadpis</label>
      <input name="title" type="text" class="form-control" id="title" required value="<?php echo isset($blogPost) ? $blogPost->getTitle() : null; ?>">
    </div>
    <div class="form-group">
      <label for="subtitle">Podnadpis</label>
      <input name="subtitle" type="text" class="form-control" id="subtitle" required value="<?php echo isset($blogPost) ? $blogPost->getSubtitle() : null; ?>">
    </div>
    <div class="form-group">
      <label for="text">Text</label>
      <textarea name="text" type="text" class="form-control" id="text" rows="7" required><?php echo isset($blogPost) ? $blogPost->getText() : null; ?></textarea>
    </div>
    <div class="form-group">
      <label for="imageUpload">Obrázek</label>
      <input name="imageUpload" type="file" class="form-control" id="imageUpload" <?php echo !isset($blogPost) ? "required" : null; ?>>
      <?php if (isset($blogPost)) : ?>
        <small id="passwordHelp" class="form-text text-muted">Nechte prázdné pro ponechání původního obrázku.</small>
      <?php endif; ?>
    </div>
    <div class="form-group">
      <label for="author">Autor</label>
      <input name="author" type="text" class="form-control" id="author" required value="<?php echo isset($blogPost) ? $blogPost->getAuthor() : null; ?>">
    </div>
    <button type="submit" class="btn btn-primary"><?php if ($id) : ?>Upravit článek<?php else : ?>Přidat clánek<?php endif; ?></button>
  </form>
</div>
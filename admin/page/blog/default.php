<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-4 text-gray-800"><?php echo $this->title; ?></h1>
  <div>
    <a class="d-inline-block btn btn-primary shadow-sm" href="?page=blog&action=create-edit">
      <i class="fas fa-plus fa-sm text-white-50"></i> Přidat článek
    </a>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-hover">
    <tr>
      <th>Náhled</th>
      <th>Nadpis</th>
      <th>Podnadpis</th>
      <th>Autor</th>
      <th>Datum</th>
      <th></th>
    </tr>
    <?php foreach ($blogPosts as $blogPost) : ?>
      <tr>
        <td style="max-width: 50px;">
          <a data-fslightbox="blog-posts" href="../<?php echo $blogPost->getImage(); ?>"><img src="../<?php echo $blogPost->getImage(); ?>" class="img-fluid" /></a>
        </td>
        <td><?php echo $blogPost->getTitle(); ?></td>
        <td><?php echo $blogPost->getSubtitle(); ?></td>
        <td><?php echo $blogPost->getAuthor(); ?></td>
        <td><?php echo $blogPost->getCreatedAt()->format('j. n. Y'); ?></td>
        <td>
          <a href="?page=blog&action=create-edit&id=<?php echo $blogPost->getId(); ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
          <a href="?page=blog&action=delete&id=<?php echo $blogPost->getId(); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
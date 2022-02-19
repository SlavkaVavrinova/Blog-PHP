<!--blogDetail.php-->
<?php

/** @var BlogPost $clanek */
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('<?php echo $clanek->getImage(); ?>')">
  <div class="container position-relative px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="post-heading">
          <h1><?php echo $clanek->getTitle(); ?></h1>
          <h2 class="subheading">
            <?php echo $clanek->getSubtitle(); ?>
          </h2>
          <span class="meta">
            Posted by
            <?php echo $clanek->getAuthor(); ?>
            dne <?php echo $clanek->getCreatedAt()->format('j. n. Y'); ?>
          </span>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Post Content-->
<article class="mb-4">
  <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <?php echo $clanek->getText(); ?>
      </div>
    </div>
  </div>
</article>
<!--blog.php-->
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
  <div class="container position-relative px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="site-heading">
          <h1>Blog</h1>
          <span class="subheading">Moje články na blogu</span>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5 mt-4">
  <div class="row gx-4 gx-lg-5 justify-content-center">

    <!-- Blog section -->
    <section class="col-md-10 m-a">
      <h2>Blog</h2>
      <?php
      /** @var BlogPost $clanek */
      foreach ($clanky as $clanek) :
      ?>
      <!-- Post preview-->
      <article class="post-preview">
        <a href="?stranka=blog&id=<?php echo $clanek->getId(); ?>">
          <div class="row">
            <div class="col-md-4">
              <img src="<?php echo $clanek->getImage(); ?>" class="img-fluid" />
            </div>
            <div class="col-md-8">
              <h3 class="post-title">
                <?php echo $clanek->getTitle(); ?>
              </h3>
            </div>
            <div class="col-12 mt-3">
              <h4 class="post-subtitle">
                <?php echo $clanek->getSubtitle(); ?>
              </h4>
            </div>
          </div>
        </a>
        <p class="post-meta">
          Posted by
          <em><?php echo $clanek->getAuthor(); ?></em>
          on <?php echo $clanek->getCreatedAt()->format('j. n. Y'); ?>
        </p>
      </article>
      <!-- Divider-->
      <hr class="my-4" />
      <?php endforeach; ?>
    </section>
  </div>
</div>
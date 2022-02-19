 <!-- Page Header-->
 <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
   <div class="container position-relative px-4 px-lg-5">
     <div class="row gx-4 gx-lg-5 justify-content-center">
       <div class="col-md-10 col-lg-8 col-xl-7">
         <div class="site-heading">
           <h1> <?php echo preloz('pageName'); ?></h1>



           <span class="subheading">Základní šablona pro kurz PHP</span>
         </div>
       </div>
     </div>
   </div>
 </header>
 <!-- Main Content-->
 <div class="container px-4 px-lg-5 mt-4">
   <div class="row gx-4 gx-lg-5 justify-content-center">
     <!-- About me section-->
     <section class="col-12 col-md-10 col-lg-4">
       <h2>

         <?php echo preloz('homepage.aboutMe'); ?>
       </h2>
       <div class="row">
         <div class="col-12">
           <img src="assets/img/about.png" alt="Já" class="img-fluid" />
         </div>
         <div class="col-12">
           <table class="table table-striped table-hover table-about">
             <tr>
               <th><?php echo preloz('homepage.name'); ?>:</th>
               <td><?php echo $jmeno . ' '. $prijmeni; ?>
               </td>
             </tr>
             <tr>
               <th><?php echo preloz('homepage.born'); ?>:</th>
               <td><?php echo $datumNarozeni; ?></td>
             </tr>
             <tr>
               <th><?php echo preloz('homepage.email'); ?>:</th>
               <td>
                 <a href="mailto: <?php echo $email; ?>"> <?php echo $email; ?></a>
               </td>
             </tr>
           </table>
         </div>
       </div>
     </section>
     <!-- ! Jedná se pouze o část šablony domu.php (section pro Blog)-->
     <!-- Blog section -->
     <section class="col-md-10 col-lg-8">
       <h2>Blog</h2>
       <p>
         <?php
        echo preloz('homepage.countArticles');
        echo $pocetClanku;
        ?>.
       </p>
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

       <!-- Pager-->
       <div class="d-flex justify-content-end mb-4">
         <a class="btn btn-primary text-uppercase" href="?stranka=blog">Starší články →</a>
       </div>
     </section>
   </div>
 </div>
<!-- Navigation-->
<div id="progress-bar" class="progress-bar"></div>
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
  <div class="container px-4 px-lg-5">
    <a class="navbar-brand" href=" ?stranka=domu"><?php echo preloz('pageName'); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
      aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto py-4 py-lg-0">
        <?php echo vypisMenu($polozkyMenu);?>
        <li class="nav-item dropdown">
          <a class="nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $povoleneJazyky[$jazyk]; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <?php foreach ($povoleneJazyky as $kodJazyka => $povolenyJazyk) : ?>
            <li><a class="dropdown-item"
                href="?stranka=jazyk&jazyk=<?php echo $kodJazyka; ?>"><?php echo $povolenyJazyk; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
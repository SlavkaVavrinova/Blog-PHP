<!DOCTYPE html>
<html lang="cs">

<?php require __DIR__ . '/head.php'; ?>

<body id="page-top">
  <div id="wrapper">
    <?php require __DIR__ . '/sidebar.php'; ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php require __DIR__ . '/topbar.php'; ?>
        <div class="container-fluid">
          <?php require $this->template; ?>
        </div>
      </div>

      <?php require __DIR__ . '/footer.php'; ?>
    </div>
  </div>
  <?php require __DIR__ . '/scripts.php'; ?>
</body>

</html>
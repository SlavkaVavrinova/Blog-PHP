<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-4 text-gray-800"><?php if ($id) : ?>Upravit uživatele<?php else : ?>Přidat uživatele<?php endif; ?></h1>
</div>

<div>
  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="email">Email</label>
      <input name="email" type="text" class="form-control" id="email" required value="<?php echo isset($user) ? $user->getEmail() : null; ?>">
    </div>
    <div class="form-group">
      <label for="name">Jméno</label>
      <input name="name" type="text" class="form-control" id="name" required value="<?php echo isset($user) ? $user->getName() : null; ?>">
    </div>
    <div class="form-group">
      <label for="surname">Příjmení</label>
      <input name="surname" type="text" class="form-control" id="surname" required value="<?php echo isset($user) ? $user->getSurname() : null; ?>" />
    </div>
    <div class="form-group">
      <label for="password">Heslo</label>
      <input name="password" type="password" class="form-control" id="password" <?php echo !isset($user) ? "required" : null; ?>>
      <?php if (isset($user)) : ?>
        <small id="passwordHelp" class="form-text text-muted">Pro ponechání stejného hesla nechte prázdné.</small>
      <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary"><?php if ($id) : ?>Upravit uživatele<?php else : ?>Přidat uživatele<?php endif; ?></button>
  </form>
</div>
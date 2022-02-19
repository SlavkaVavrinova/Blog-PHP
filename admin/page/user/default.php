<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-4 text-gray-800"><?php echo $this->title; ?></h1>
  <div>
    <a class="d-inline-block btn btn-primary shadow-sm" href="?page=user&action=create-edit">
      <i class="fas fa-plus fa-sm text-white-50"></i> Přidat uživatele
    </a>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-hover">
    <tr>
      <th>Email</th>
      <th>Jméno</th>
      <th>Příjmení</th>
      <th></th>
    </tr>
    <?php foreach ($users as $user) : ?>
      <tr>
        <td><?php echo $user->getEmail(); ?></td>
        <td><?php echo $user->getName(); ?></td>
        <td><?php echo $user->getSurname() ?></td>
        <td>
          <a href="?page=user&action=create-edit&id=<?php echo $user->getId(); ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
          <a href="?page=user&action=delete&id=<?php echo $user->getId(); ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
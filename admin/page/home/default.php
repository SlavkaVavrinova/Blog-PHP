<h1 class="h3 mb-4 text-gray-800"><?php echo $this->title; ?></h1>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Zprávy</h6>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover">
      <tr>
        <th>Jméno</th>
        <th>Email</th>
        <th>Zpráva</th>
      </tr>
      <?php foreach ($messages as $message) : ?>
      <tr>
        <td><?php echo $message->getName(); ?></td>
        <td><?php echo $message->getEmail(); ?></td>
        <td><?php echo $message->getText(); ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
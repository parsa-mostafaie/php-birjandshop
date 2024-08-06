<?php
/**
 * Convert array of models into HTML Table
 * 
 * @param array $fields
 * @param array $values
 * @param callable $render
 * @return void
 */
function tablify(
  $fields = [],
  $values = [],
  $render = null,
  $empty_msg = null,
  $table_class = 'table table-responsive',
) {
  $render ??= fn($model, $tdr) => $tdr($model->toArray());

  if (count($values) == 0) {
    echo value($empty_msg);
    return;
  }

  $td_render = function ($values) {
    $values = wrap($values);
    ?>
    <?php foreach ($values as $value): ?>
      <td><?= value($value) ?></td>
    <?php endforeach; ?>
  <?php
  }

    ?>
  <table class="<?= $table_class ?>">
    <thead>
      <tr>
        <?php foreach ($fields as $field): ?>
          <th><?= value($field) ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($values as $value): ?>
        <tr>
          <?= $render($value, $td_render) ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php
}
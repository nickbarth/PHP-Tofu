<h2>Create an Apple Page</h2>

<?php if ($apple && $apple->isValid()): ?>
  <i>Apple Successfully created</i><br/><br/>
<?php endif; ?>

<form action="" method="post">
  <fieldset>
      <label>Type</label><input type="text" name="apple[type]" value="<?php post('type', 'apple') ?>">
        <?php error($apple, 'type') ?>
      <br/>
      <label>Size</label><input type="text" name="apple[size]" value="<?php post('size', 'apple') ?>">
        <?php error($apple, 'size') ?>
      <br/>
      <label>Weight</label><input type="text" name="apple[weight]" value="<?php post('weight', 'apple') ?>">
        <?php error($apple, 'weight') ?>
      <br/>
      <input type="submit" value="Create Apple">
  </fieldset>
</form>

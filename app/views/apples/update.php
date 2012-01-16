<h2>Update Apple Page</h2>

<?php if ($apple && $apple->isUpdated()): ?>
  <i>Apple Successfully Updated</i><br/><br/>
<?php endif; ?>

<form action="" method="post">
  <fieldset>
      <label>Type</label><input type="text" name="apple[type]" value="<?php postf($apple->type, 'type') ?>">
        <?php error($apple, 'type') ?>
      <br/>
      <label>Size</label><input type="text" name="apple[size]" value="<?php postf($apple->size, 'size') ?>">
        <?php error($apple, 'size') ?>
      <br/>
      <label>Weight</label><input type="text" name="apple[weight]" value="<?php postf($apple->weight, 'weight') ?>">
        <?php error($apple, 'weight') ?>
      <br/>
      <input type="submit" value="Update Apple">
  </fieldset>
</form>

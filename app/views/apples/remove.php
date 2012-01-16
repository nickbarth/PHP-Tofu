<h2>Remove Apple Page</h2>

<?php if (!$apple->isRemoved()): ?>
  <b><?php output($apple->size) ?></b> <?php output($apple->type) ?>,
  <?php output($apple->weight, '(', 'kg)') ?>
  <a href="<<BASEURL>>/update/<?php print $apple->id ?>/">Update</a>
  <a href="<<BASEURL>>/view/<?php print $apple->id ?>/">View</a>
  
  <br/><br/>
  
  <form action="" method="post">
    <fieldset>
      <legend>Remove this Apple?</legend>
        <input type="hidden" name="apple[id]" value="<?php print $apple->id ?>">
        <input type="submit" value="Remove">
        <a href="<<BASEURL>>/">Cancel</a>
    </fieldset>
  </form>
<?php else: ?>
  Apple Successfully Removed.
  <br/>
<?php endif ?>

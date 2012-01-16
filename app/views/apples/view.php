<h2>Single Apple Page</h2>
  <?php echo '<b>', $apple->size, '</b>' ?>
  <?php echo $apple->type ?>,
  <?php echo '(', $apple->weight, 'kg)' ?>
  <a href="<<BASEURL>>/update/<?php print $apple->id ?>/">Update</a>
  <a href="<<BASEURL>>/remove/<?php print $apple->id ?>/">Remove</a>
<br/>

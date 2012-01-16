<h2>Apple Listing Page</h2>

<ul>
<?php foreach($apples as $apple): ?>
  <li>
    <?php echo '<b>', $apple->size, '</b>' ?>
    <?php echo $apple->type ?>,
    <?php echo '(', $apple->weight, 'kg)' ?>
    <a href="<<BASEURL>>/update/<?php print $apple->id ?>/">Update</a>
    <a href="<<BASEURL>>/view/<?php print $apple->id ?>/">View</a>
    <a href="<<BASEURL>>/remove/<?php print $apple->id ?>/">Remove</a>
  </li>
<?php endforeach ?>
</ul>

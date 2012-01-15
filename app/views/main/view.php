<?php Template::layout('common/header') ?>
	
	<h2>Single Tofu Page</h2>
		<?php Template::output($tofu->size, '<b>', '</b>') ?>
		<?php Template::output($tofu->type, '', ',') ?>
		<?php Template::output($tofu->weight, '(', 'kg)') ?>
		<a href="<<BASEURL>>/update/<?php print $tofu->id ?>/">Update</a>
		<a href="<<BASEURL>>/remove/<?php print $tofu->id ?>/">Remove</a>
	<br/>
	
<?php Template::layout('common/footer') ?>

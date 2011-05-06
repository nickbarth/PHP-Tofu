<?php Template::layout('common/header') ?>
	
	<h2>Tofu Listing Page</h2>

	<ul>
	<?php foreach($tofus as $tofu): ?>
		<li>
			<b><?php Template::output($tofu->size) ?></b> <?php Template::output($tofu->type) ?>,
			<?php Template::output($tofu->weight, '(', 'kg)') ?>
			<a href="<<BASEURL>>/update/<?php print $tofu->id ?>/">Update</a>
			<a href="<<BASEURL>>/view/<?php print $tofu->id ?>/">View</a>
			<a href="<<BASEURL>>/remove/<?php print $tofu->id ?>/">Remove</a>
		</li>
	<?php endforeach ?>
	</ul>
	
<?php Template::layout('common/footer') ?>

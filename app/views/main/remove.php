<?php Template::layout('common/header') ?>
	
	<h2>Remove Tofu Page</h2>
	
	<?php if (!$tofu->isRemoved()): ?>
		<b><?php Template::output($tofu->size) ?></b> <?php Template::output($tofu->type) ?>,
		<?php Template::output($tofu->weight, '(', 'kg)') ?>
		<a href="<<BASEURL>>/update/<?php print $tofu->id ?>/">Update</a>
		<a href="<<BASEURL>>/view/<?php print $tofu->id ?>/">View</a>
		
		<br/><br/>
		
		<form action="" method="post">
			<fieldset>
			  <legend>Remove this Tofu?</legend>
			  	<input type="hidden" name="delete" value="1">
	    		<input type="submit" value="Remove">
	    		<a href="<<BASEURL>>/">Cancel</a>
			</fieldset>
		</form>
	<?php else: ?>
		Tofu Successfully Removed.
		<br/>
	<?php endif ?>
	
<?php Template::layout('common/footer') ?>

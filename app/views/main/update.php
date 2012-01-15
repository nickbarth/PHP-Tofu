<?php Template::layout('common/header') ?>

	<h2>Update Tofu Page</h2>
	
	<?php if ($tofu && $tofu->isUpdated()): ?>
		<i>Tofu Successfully Updated</i><br/><br/>
	<?php endif; ?>
	
	<form action="" method="post">
		<fieldset>
		    <label>Type</label><input type="text" name="tofu[type]" value="<?php Template::postf($tofu->type, 'type') ?>">
		    	<?php Template::error($tofu, 'type') ?>
		    <br/>
		    <label>Size</label><input type="text" name="tofu[size]" value="<?php Template::postf($tofu->size, 'size') ?>">
		    	<?php Template::error($tofu, 'size') ?>
		    <br/>
    		<label>Weight</label><input type="text" name="tofu[weight]" value="<?php Template::postf($tofu->weight, 'weight') ?>">
		    	<?php Template::error($tofu, 'weight') ?>
    		<br/>
    		<input type="submit" value="Update Tofu">
		</fieldset>
	</form>
	
<?php Template::layout('common/footer') ?>

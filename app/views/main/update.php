<?php Template::layout('common/header') ?>
	
	<h2>Update Tofu Page</h2>

	<?php if ($tofu && $tofu->isUpdated()): ?>
		<i>Tofu Successfully Updated</i><br/><br/>
	<?php endif; ?>
	
	<form action="" method="post">
		<fieldset>
		  <legend>Update Tofu</legend>
		    <label>Type</label><input type="text" name="type" value="<?php Template::postf($tofu->type, 'type') ?>">
		    	<?php Template::output($errors['type'], '<i>', '</i>') ?>
		    <br/>
		    <label>Size</label><input type="text" name="size" value="<?php Template::postf($tofu->size, 'size') ?>">
		    	<?php Template::output($errors['size'], '<i>', '</i>') ?>
		    <br/>
    		<label>Weight</label><input type="text" name="weight" value="<?php Template::postf($tofu->weight, 'weight') ?>">
		    	<?php Template::output($errors['weight'], '<i>', '</i>') ?>
    		<br/>
    		<input type="submit" value="Update Tofu">
		</fieldset>
	</form>
	
<?php Template::layout('common/footer') ?>

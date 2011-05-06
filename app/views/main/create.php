<?php Template::layout('common/header') ?>

	<h2>Create an Tofu Page</h2>
	
	<?php if ($tofu && $tofu->isValid()): ?>
		<i>Tofu Successfully created</i><br/><br/>
	<?php endif; ?>
	
	<form action="" method="post">
		<fieldset>
		    <label>Type</label><input type="text" name="type" value="<?php Template::post('type') ?>">
		    	<?php Template::output($errors['type'], '<i>', '</i>') ?>
		    <br/>
		    <label>Size</label><input type="text" name="size" value="<?php Template::post('size') ?>">
		    	<?php Template::output($errors['size'], '<i>', '</i>') ?>
		    <br/>
    		<label>Weight</label><input type="text" name="weight" value="<?php Template::post('weight') ?>">
				<?php Template::output($errors['weight'], '<i>', '</i>') ?>
    		<br/>
    		<input type="submit" value="Create Tofu">
		</fieldset>
	</form>
	
<?php Template::layout('common/footer') ?>

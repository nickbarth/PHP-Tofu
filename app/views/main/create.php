<?php Template::layout('common/header') ?>

	<h2>Create an Tofu Page</h2>
	
	<?php if ($tofu && $tofu->isValid()): ?>
		<i>Tofu Successfully created</i><br/><br/>
	<?php endif; ?>
	
	<form action="" method="post">
		<fieldset>
		    <label>Type</label><input type="text" name="tofu[type]" value="<?php Template::post('type', 'tofu') ?>">
		    	<?php Template::error($tofu, 'type') ?>
		    <br/>
		    <label>Size</label><input type="text" name="tofu[size]" value="<?php Template::post('size', 'tofu') ?>">
		    	<?php Template::error($tofu, 'size') ?>
		    <br/>
    		<label>Weight</label><input type="text" name="tofu[weight]" value="<?php Template::post('weight', 'tofu') ?>">
		    	<?php Template::error($tofu, 'weight') ?>
    		<br/>
    		<input type="submit" value="Create Tofu">
		</fieldset>
	</form>
	
<?php Template::layout('common/footer') ?>

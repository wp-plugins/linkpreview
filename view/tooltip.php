<?php
if(!defined('LINK_PREVIEW')) return;
?>
<div class="lp-tooltip">
<h4>
<?php if ($linkpreview_settings["linkpreview_favicon"] == 'on' && $data->favicon != null) : ?>
	<span><img class="lp-favicon" src="<?php echo $data->favicon;?>"></span>&nbsp;
<?php endif; ?>
<?php echo $data->title; ?></h4>
<?php if (isset($data->image)) echo '<img class="lp-image" src="'.$data->image.'">'; ?>
<?php if (isset($data->description)) echo '<p>'.$data->description.'</p>'; ?>
</div>
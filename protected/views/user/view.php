<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	$model->username,
);

?>
<br>
<h1>Opgeslagen gegevens voor <?php echo $model->username; ?></h1>
<br>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idtbl_user',
		'username',
		'password',
		//'salt',
		'email',
	),
)); ?>
<br /><br />
<div class="row">
	Je wachtwoord is versleuteld in de database opgeslagen. Mocht de database gestolen worden
	dan is je wachtwoord nog steeds veilig!
</div>
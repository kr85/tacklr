<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

 

<?php 
	// return to login page
	//$this->redirect(array('login'));  
	$this->widget('bootstrap.widgets.TbCarousel', array(
		'items'=>array(
				array('image'=>Yii::app()->baseUrl . '/images/corkboard.png',
					  'src' => 'http://localhost:8080/tacklr', 
					  'label'=>'Tacklr Welcome', 
					  'caption'=>'Welcome to Tacklr World!!'),
				
		),
	)); 
	
?>

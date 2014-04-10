<?php
/* @var $this BoardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Boards',
);

$this->menu=array(
	array('label'=>'Create Board', 'url'=>array('create')),
);
?>
<?php
Yii::app()->clientScript->registerCoreScript('jquery');
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($baseUrl.'/js/jquery-1.10.2.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.js');
$cs->registerScriptFile($baseUrl.'/js/jquery-ui-1.10.4.custom.min.js');
$cs->registerScriptFile($baseUrl.'/js/tack_generator.js');


//Yii::import('extensions/Yiitube');
?>

<h1 xmlns="http://www.w3.org/1999/html">Boards</h1>

<?php
// Get the boards from the user in the DB...
$user_in_db = User::model()->findByAttributes(array('username'=>Yii::app()->user->getId()));
$UID = ($user_in_db['userID']);
$boards = Board::model()->findAllByAttributes(array('userID'=>(int)$UID));
?>

<div class="row">
    <div class="span12">
        <ul class="thumbnails">
            <?php foreach ($boards as $board): ?>
                <li class="span4">
                    <div class="drag">
                        <div class="thumbnail">
                            <div class="caption">
                                <a href="/mytacks/tacklr/board/view/id/<?php echo $board['boardID']; ?>">
                                    <h3><?php echo $board['boardTitle'] ?></h3></a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>

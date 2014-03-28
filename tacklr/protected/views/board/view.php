<?php
/* @var $this BoardController */
/* @var $model Board */

$this->breadcrumbs=array(
	'Boards'=>array('index'),
	$model->boardID,
);

$this->menu=array(
    array('label'=>'Create Tack', 'url'=>('/mytacks/tacklr/tack/create')),
	array('label'=>'Update Board', 'url'=>array('update', 'id'=>$model->boardID)),
	array('label'=>'Delete Board', 'url'=>('/mytacks/tacklr/board/delete?&id='.$model->boardID)),
    array('label'=>'List Boards', 'url'=>array('index')),
);
?>

<h1>Board: <?php echo $model->boardTitle; ?></h1>

<?php

$BID = $model->boardID;
$tacks = Tack::model()->findAllByAttributes(array('boardID'=>(int)$BID));

?>
<div class="row">
    <div class="span12">
        <ul class="thumbnails">
            <?php
            foreach ($tacks as $tack)
            {
                ?>
                <li class="span4">
                     <div class="thumbnail">
                        <img src="<?php echo $tack['imageURL']; ?>">
                        <div class="caption">
                            <a href="/mytacks/tacklr/tack/view?&id=<?php echo $tack['tackID']; ?>"><h3> <?php echo $tack['tackName'] ?></h3></a>
                            <a href="<?php echo $tack['tackURL'] ?>"><h5>Link</h5></a>
                        </div>
                     </div>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>

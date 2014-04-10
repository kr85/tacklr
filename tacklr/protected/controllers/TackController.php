<?php

class TackController extends Controller
{
	public function actionCreate()
	{
        $model=new Tack;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Tack']))
        {
            var_dump($_POST);
            //echo var_dump($_POST["Tack"]);
            $model->attributes=$_POST['Tack'];
            echo "\n\nmodel:";
            var_dump($model);
            if($model->save())
            {
                $this->redirect(array('../board/view','id'=>$_POST['boardID']));
            }
            else
            {
                echo "nope";
            }
        }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $pst = new DateTimeZone('America/Los_Angeles');
        $date = new DateTime();
        $date->setTimezone($pst);
        $timeStamp = $date->format('Y-m-d H:i:s');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tack']))
		{
			$model->attributes=$_POST['Tack'];
            $model->updateDate = $timeStamp;
			if($model->save())
				$this->redirect(array('view','id'=>$model->tackID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $BID = $this->loadModel($id)->boardID;
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
        {
            $this->redirect(array('board/view','id'=>$BID));
        }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tack');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tack('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tack']))
			$model->attributes=$_GET['Tack'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tack the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tack::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tack $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tack-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

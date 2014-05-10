<?php 

class Feedback extends CActiveRecord
{

	public function tableName()
	{
		return 'feedback';
	}

    public function relations()
    {
        return array(
            'tacks'=>array(self::BELONGS_TO, 'Tack', 'tack_id'),
            'user'=>array(self::BELONGS_TO, 'User', 'userID')
        );
    }

    /**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tack_id' => 'Tack',
			'userID' => 'User',
			'content' => 'content',
			'timestamp' => 'timestamp'
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

?>
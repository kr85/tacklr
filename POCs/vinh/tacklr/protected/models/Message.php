<?php

/**
 * This is the model class for table "tbl_message".
 *
 * The followings are the available columns in table 'tbl_message':
 * @property integer $messageID
 * @property string $senderID
 * @property string $receiverID
 * @property string $messageTitle
 * @property string $messageContent
 * @property string $updateDate
 * @property string $createDate
 *
 * The followings are the available model relations:
 * @property User $sender
 * @property User $receiver
 */
class Message extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_message';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('updateDate', 'required'),
			array('senderID, receiverID', 'length', 'max'=>20),
			array('messageTitle', 'length', 'max'=>255),
			array('messageContent, createDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('messageID, senderID, receiverID, messageTitle, messageContent, updateDate, createDate', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'sender' => array(self::BELONGS_TO, 'User', 'senderID'),
			'receiver' => array(self::BELONGS_TO, 'User', 'receiverID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'messageID' => 'Message',
			'senderID' => 'Sender',
			'receiverID' => 'Receiver',
			'messageTitle' => 'Message Title',
			'messageContent' => 'Message Content',
			'updateDate' => 'Update Date',
			'createDate' => 'Create Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('messageID',$this->messageID);
		$criteria->compare('senderID',$this->senderID,true);
		$criteria->compare('receiverID',$this->receiverID,true);
		$criteria->compare('messageTitle',$this->messageTitle,true);
		$criteria->compare('messageContent',$this->messageContent,true);
		$criteria->compare('updateDate',$this->updateDate,true);
		$criteria->compare('createDate',$this->createDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Message the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

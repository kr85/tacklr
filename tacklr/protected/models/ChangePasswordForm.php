<?php
/*
 * ChangePasswordForm is used to store user password
 */
class ChangePasswordForm extends CFormModel
{
	public $password;
	public $password_repeat;
	public $activationKey;	
	/*
	 * Declares validation rules for password
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password', 'required'),
			array('password_repeat','compare','compareAttribute'=>'password', 'message'=>'Password does not match'),
			);
	}
	
	/*
	 * Declares attribute labels
	 */
	public function attributeLabels()
	{
		return array('password'=>'Password');
	}
	
	/*
	 * Store Activation Key
	*/
	public function setActivationKey($key)
	{
		$this->activationKey = $key;
	}
}
?>
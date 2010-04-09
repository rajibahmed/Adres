<?php  

class Log extends AppModel {

	public $actsAs=array('Containable');
	
	public $belongsTo = array(
		'Contact' => array(
			'className' => 'Contact', 
			'foreignKey' => 'contact_id'
			),
		'User' => array(
			'className'=>'User',
			'foreignKey' => 'user_id' 
			) 
		);
		
}
?>
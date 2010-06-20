<?php
class SitesController extends AppController {
    
    public $name ='Sites';
    
    public $uses=array('Contact','Filter','ContactSet','ContactType','Field','Group','Affiliation');
    
    public $layout = "users";
    	

    public function edit_record($contact_id=null){
		$this->redirect_if_not_ajax_request();
		$this->redirect_if_id_is_empty($contact_id);
		
		$plugins = $this->Field->getPluginTypes($this->Session->read("Contact.contact_type_id"));
		$form_inputs = "";
		foreach ($plugins as $plugin) {
			$className = $plugin['Field']['field_type_class_name'];
			$form_inputs .= ClassRegistry::init($className)->renderEditForm($contact_id,$plugin);
		}
		$form_inputs .= "<input id='edit-contact-id' type='hidden' name='data[contact_id]' value='$contact_id'>";
		$this->set('form_inputs',$form_inputs);
		$this->set('contactId',$contact_id);
    }


	public function show_record($id=null){
		$this->redirect_if_not_ajax_request();
		$this->redirect_if_id_is_empty($id);
		$contact = $this->Contact->read(null,$id);
		$value =array();
		
		$plugins = $this->Field->getPluginTypes($contact['Contact']['contact_type_id']);
		$output='';
		
		foreach($plugins as $field){
			//TODO refactoring is needed here
			// this can be put into the plugin model
			$pluginName 	= $field['Field']['field_type_class_name'];
			$field_name		= $field['Field']['name'];
			$field_id 		= $field['Field']['id'];
			$contact_field 	= ClassRegistry::init($pluginName)->getJoinContact();
			$join_field		= ClassRegistry::init($pluginName)->getJoinField();
			
			$value = ClassRegistry::init($pluginName)->find('first',array(
				//'contain'=>array('Field'),
				'conditions'=>array(
				$pluginName.'.'.$contact_field .' = '.$id,
				$pluginName.'.'.$join_field .' = '.$field_id 
				)	
			));
			
			if(empty($value)){
				ClassRegistry::init($pluginName)->save(
					array(
						$contact_field => $id,
						$join_field => $field_id
					)	
				);
								
			}
			$output.= ClassRegistry::init($pluginName)->renderShowDetail($field_name,$value);
		}
		$this->set('contact',$output); 
		$this->set('contactId',$id);
		$this->set('status',true);
    }
	
		
	public function update_contact(){
		$this->set('status',true);
		if(!empty($this->data)){
			$plugins = $this->Field->getPluginTypes($this->Session->read("Contact.contact_type_id"));
						
			ClassRegistry::init('Plugin')->processEditForm($this->data,$plugins,$this->Auth->User('id'));
		}
		$this->render(null);
	}
	
	
	public function group($contact_id)
	{
		$this->redirect_if_not_ajax_request();
		$this->redirect_if_id_is_empty($contact_id);
		$contact = $this->Contact->getContactGroups($contact_id);
		$groups = $this->Group->getList($contact);
		$this->set(compact('contact','groups'));
		//$this->render('/elements/contact_groups');
	}

	
	public function affiliate($contact_id)
	{
		$this->redirect_if_not_ajax_request();
		$this->redirect_if_id_is_empty($contact_id);
		$contact = $this->Contact->getContactAffiliations($contact_id);
		$this->set(compact('contact'));		
	}

    
	public function history($contact_id)
	{
		$this->redirect_if_not_ajax_request();
		$this->redirect_if_id_is_empty($contact_id);
		$contact = $this->Contact->getContactLogs($contact_id);
		$this->set(compact('contact'));		
	}
}
?>
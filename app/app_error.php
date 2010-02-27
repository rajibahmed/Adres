<?php  
class AppError extends ErrorHandler {
    
  	public function error404($params) {  
		$this->controller->redirect(array('controller'=>'pages', 'action'=>'index','error'));
		parent::error404($params);
    }
    
    public function cannotWriteFile($params) {
		$this->controller->set('file', $params['file']);
  		$this->_outputMessage('cannot_write_file');
	}
	
}
?>
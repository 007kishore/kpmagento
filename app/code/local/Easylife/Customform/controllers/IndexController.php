<?php
class Easylife_Customform_IndexController extends Mage_Core_Controller_Front_Action{

	public function indexAction(){
		$this->loadLayout();
		//Zend_Debug::dump($this->getLayout()->getUpdate()->gethandles());
		$this->_initLayoutMessages('core/session'); //this will allow flash messages
		$this->renderLayout();
	}
	public function sendAction(){ //handles the form submit
		$mydata = $this->getRequest()->getPost();
		// here the data is processed
		
		Mage::getSingleton('core/session')->addSuccess($this->__("your message goes here"));
		$this->_redirect('*/*');// will redirect to form page

	}
}
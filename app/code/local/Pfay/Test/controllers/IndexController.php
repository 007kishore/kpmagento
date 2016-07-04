<?php
Class Pfay_Test_IndexController extends Mage_Core_Controller_Front_Action{
    public function indexAction(){
        $this->loadLayout();
        //Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());
        $this->renderLayout();
    }
    
    public function mymethodAction(){
        echo "Mymethod Action";
    }
    
    public function saveAction(){
        $name      = ''.$this->getRequest()->getPost('nom');
        $prename   = ''.$this->getRequest()->getPost('prenom');
        $telephone = ''.$this->getRequest()->getPost('telephone');
        if((isset($name)&&($name!='') && isset($prename)&&($prename!='')  && isset($telephone)&&($telephone!='') )){
            $contact = Mage::getModel('test/test');
            $contact->setData('nom', $name);
            $contact->setData('prenom', $prename);
            $contact->setData('telephone' , $telephone);
            $contact->save();
        }
        $this->_redirect('test/index/index');
    }
}
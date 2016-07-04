<?php
Class Pfay_Test_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action{
    public function indexAction(){
        $this->loadLayout();
        //var_dump(Mage::getSingleton('core/layout')->getUpdate()->getHandles());
        //Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());
        $this->renderLayout();
    }
}
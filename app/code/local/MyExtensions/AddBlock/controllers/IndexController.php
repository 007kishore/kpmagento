<?php
class MyExtensions_AddBlock_IndexController extends Mage_Core_Controller_Front_Action{
    public function indexAction(){
        $this->loadLayout();
        Zend_Debug::dump($this->getLayout()->getUpdate()->getHandles());
        $this->renderLayout();
    }
}
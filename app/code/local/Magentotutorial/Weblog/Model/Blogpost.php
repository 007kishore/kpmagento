<?php
Class Magentotutorial_Weblog_Model_Blogpost extends Mage_Core_Model_Abstract{
    protected function _construct(){
        $this->_init('weblog/blogpost');// 'weblog/blogpost' must be the same URI which is used for getModel();
    }
}
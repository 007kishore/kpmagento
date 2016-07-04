<?php
Class Magentotutorial_Weblog_Model_Resource_Blogpost_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract{
    public function _construct() {
        $this->_init('weblog/blogpost');
    }
}
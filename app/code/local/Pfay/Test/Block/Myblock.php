<?php
Class Pfay_Test_Block_Myblock extends Mage_Core_Block_Template{
    public function methodblock(){
        $result = '';
        $collection = Mage::getModel('test/test')->getCollection()->setOrder('id_pfay_test','asc');
        foreach($collection as $data){
            $result .= $data->getData('nom')."--".$data->getData('prenom')."--".$data->getData('telephone')."<br>";
        }
        Mage::getSingleton('adminhtml/session')->addSuccess('cool it works !!!');
        return $result;
    }
}
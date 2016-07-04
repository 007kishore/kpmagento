<?php
Class Magentotutorial_Complexworld_IndexController extends Mage_Core_Controller_Front_Action{
    public function indexAction(){
        $weblog2 = Mage::getModel('complexworld/eavblogpost');
        $weblog2->load(1);
        var_dump($weblog2);
    }
    
    public function populateEntriesAction(){
        for($i = 0; $i < 10; $i++){
            $weblog2 = Mage::getModel('complexworld/eavblogpost');
            $weblog2->setTitle("Title for eav model".$i);
            $weblog2->setContent("This content is for the eav table, which has many tables in the database".$i);
            $weblog2->setDate(now());
            $weblog2->save();
        }
        echo "data inserted";
    }
    
    public function showCollectionAction(){
        $weblog2 = Mage::getModel('complexworld/eavblogpost');
        //$entries = $weblog2->getCollection()->addAttributeToSelect('*');
        $entries = $weblog2->getCollection()
                ->addAttributeToSelect('title')
                ->addAttributeToSelect('content');
        $entries->load();
        foreach ($entries as $val) {
            //var_dump($val->getData());
            echo "Title = ".$val['title']."\t\t\t";
            echo "Content = ".$val['content']."</br>";
        }
    }
}
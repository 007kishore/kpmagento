<?php
Class Magentotutorial_Weblog_IndexController extends Mage_Core_Controller_Front_Action{
    public function testModelAction(){
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');
        echo "your post id is ".$params['id'];
        $blogpost ->load($params['id']);
        $data = $blogpost->getData();
        $title = $blogpost->getData('title');
        echo $title;
        echo "<pre>";print_r($data);echo "</pre>";
        var_dump($data);
    }
    
    public function createNewPostAction(){
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->setTitle('Decrease HDI in India');
        $blogpost->setPost('The current HDI of India is 135 where as of Srilanka, it is 37. This is why we should clear about "make in India" concept introduced by PMO,Mr. Narendra Modi');
        $blogpost->save();
        echo "The last inserted Id is = ".$blogpost->getId();
    }
    
    public function editFirstPostAction(){
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load(1);
        $blogpost->setTitle('This is my first post\'s title');
        $blogpost->save();
    }
    
    public function showAllBlogPostAction(){
        $posts = Mage::getModel('weblog/blogpost')->getCollection();
        echo "<table border='1'><tr><th>Post ID</th><th>Post Title</th><th>Content</th><th>Updated At</th><th>Created At</th></tr>";
        foreach($posts as $blogpost){
            echo "<tr><td>".$blogpost->getId()."</td>";
            echo "<td>".$blogpost->getTitle()."</td>";
            echo "<td>".$blogpost->getPost()."</td>";
            echo "<td>".$blogpost->getUpdatedAt()."</td>";
            echo "<td>".$blogpost->getCreatedAt()."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}
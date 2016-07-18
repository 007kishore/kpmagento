<?php
$installer = $this;
$installer->startSetup();
$installer->run("
    CREATE TABLE `{$installer->getTable('weblog/blogpost')}` (
        `blogpost_id` int(11) NOT NULL auto_increment,
        `title` text,
        `post` text,
        `updated_at` datetime default NULL,
        `created_at` timestamp  NOT NULL default CURRENT_TIMESTAMP,
        PRIMARY KEY (`blogpost_id`)
    )ENGINE=InnoDB DEFAULT charset=utf8;
    
    INSERT INTO `{$installer->getTable('weblog/blogpost')}` VALUES (1,'The installer title','This post is inserted by the installer script to demonstrate the working of the installer script','','2016-08-18 18:40:12');
    ");
$installer->endSetup();
    
// Another method of the script which doesn't include any raw sql statement (mostly prefered for compatible across databases)

/***
$installer = $this;
$installer->startSetup();
$table= $installer->getConnection()->newTable($installer->getTable('weblog/blogpost'))
        ->addColumn('blogpost_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'unsigned' => true,
            'nullable' => false,
            'primary' => true,
            'identity' => true,
        ),'Blogpost ID')
        ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, null, array('nullable' => false),'Blogpost Title')
        ->addColumn('post', Varien_Db_Ddl_Table::TYPE_TEXT, null, array('nullable' => true),'Blogpost Post')
        ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(),'Blogpost Updated_at')
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(),'Blogpost Created_at')
        ->setComment('Magentotutorial weblog/blogpost entity table');
$installer->getConnection()->createTable($table);
$installer->endSetup();
 
 *****/
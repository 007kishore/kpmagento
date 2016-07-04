<?php
    $installer = $this;
    $installer->startSetup();
    $installer->run("create table `{$installer->getTable('weblog/blogpost')}` (
    `blogpost_id` int(11) NOT NULL auto_increment,
    `title` text,
    `post` text,
    `updated_at` datetime default NULL,
    `created_at` timestamp NOT NULL default CURRENT_TIMESTAMP,
    PRIMARY KEY (`blogpost_id`)
    )ENGINE=InnoDB DEFAULT CHARSET = utf8;
    
    INSERT INTO `{$installer->getTable('weblog/blogpost')}` values('1','Title using installer','Yes using an installer you also can create table and data','2016-12-12 12:02:12','2016-04-04 07:27:12');
        
    ");
    $installer->endSetup();
    
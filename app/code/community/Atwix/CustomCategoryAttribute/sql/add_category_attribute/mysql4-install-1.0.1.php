<?php
 $this->startSetup();
 $this->addAttribute(Mage_Catalog_Model_Category::ENTITY, 'new_attribute', array(
 	'group'		=>'General Information',
 	'input'		=>'textarea',
 	'type'		=>'text',
 	'label'		=>'New Attribute',
 	'backend' 	=>'',
 	'visible'	=>true,
 	'required' 	=>false,
 	'visible_on_front' =>true,
 	'global'  	=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
 ));
 $this->endSetup();


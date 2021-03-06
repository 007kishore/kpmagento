<?php 
/**
 * Ultimate_ModuleCreator extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE_UMC.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category       Ultimate
 * @package        Ultimate_ModuleCreator
 * @copyright      Copyright (c) 2014
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 * @author         Marius Strajeru <ultimate.module.creator@gmail.com>
 */
/**
 * decimal attribute type
 *
 * @category    Ultimate
 * @package     Ultimate_ModuleCreator
 * @author      Marius Strajeru <ultimate.module.creator@gmail.com>
 */
class Ultimate_ModuleCreator_Model_Attribute_Type_Decimal extends Ultimate_ModuleCreator_Model_Attribute_Type_Int
{
    /**
     * type code
     *
     * @var string
     */
    protected $_type        = 'decimal';

    /**
     * sql column ddl type
     *
     * @var string
     */
    protected $_typeDdl     = 'TYPE_DECIMAL';

    /**
     * sql column ddl size
     *
     * @var string
     */
    protected $_sizeDdl     = "'12,4'";

    /**
     * eav setup type
     *
     * @var string
     */
    protected $_setupType   = 'decimal';
}

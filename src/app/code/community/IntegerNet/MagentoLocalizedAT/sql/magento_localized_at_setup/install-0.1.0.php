<?php
/**
 * Austrian Localization package for Magento Localized (aka Magento AT) 
 *
 * @category   IntegerNet
 * @package    IntegerNet_MagentoLocalizedAT
 * @copyright  Copyright (c) 2013 integer_net GmbH (http://www.integer-net.de/)
 * @license    http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 * @author     Andreas von Studnitz <avs@integer-net.de>
 */

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

// translate attribute labels
$attributesSqlFilename = Mage::getBaseDir('locale') . DS . 'de_DE' . DS . 'sql_translation' . DS . 'attributes.sql';

if (file_exists($attributesSqlFilename)) {

    // run script only if no database table prefix is set
    if ($installer->getTable('poll') == 'poll') {

        $attributesSql = file_get_contents($attributesSqlFilename);
        // question marks break the installer as they are intended as placeholders
        $attributesSql = str_replace('?', '&quest;', $attributesSql);
        $installer->run($attributesSql);
    }
}

$installer->endSetup();
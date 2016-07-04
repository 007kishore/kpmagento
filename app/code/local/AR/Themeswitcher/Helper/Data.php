<?php
class AR_Themeswitcher_Helper_Data extends Mage_Core_Helper_Abstract
{
    const FULL_SITE_COOKIE = 'USE_FULL_SITE';

    public function getMobileToDesktopUrl() {
        return Mage::getUrl('themeswitcher/switch/desktop');
    }

    public function getDesktopToMobileUrl() {
        return Mage::getUrl('themeswitcher/switch/mobile');
    }
}

?>
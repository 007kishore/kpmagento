<?php
class AR_Themeswitcher_SwitchController extends Mage_Core_Controller_Front_Action
{
    /**
     * Switch to Desktop theme
     */
    public function desktopAction()
    {
        setcookie(AR_Themeswitcher_Helper_Data::FULL_SITE_COOKIE, 1, 0, '/');
        $this->_redirectReferer();
    }

    /**
     * Switch to Mobile theme
     */
    public function mobileAction()
    {
        setcookie(AR_Themeswitcher_Helper_Data::FULL_SITE_COOKIE, 0, 0, '/');
        $this->_redirectReferer();
    }
}
?>
<?php
class AR_Themeswitcher_Model_Core_Design_Package extends Mage_Core_Model_Design_Package
{
    /**
     * Get regex rules from config and check user-agent against them. We override to
     * determine if the design exception should be ignored based on presence of a cookie.
     * 
     * @param string $regexpsConfigPath
     * @return mixed
     * @see Mage_Core_Model_Design_Package
     */
    protected function _checkUserAgentAgainstRegexps($regexpsConfigPath)
    {
        $ignoreException = null;
        if (isset($_COOKIE[AR_Themeswitcher_Helper_Data::FULL_SITE_COOKIE])) {
            $ignoreException = $_COOKIE[AR_Themeswitcher_Helper_Data::FULL_SITE_COOKIE];
        }
        return $ignoreException ? false : parent::_checkUserAgentAgainstRegexps($regexpsConfigPath);
    }
}
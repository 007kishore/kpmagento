<?php
class Crius_SkipStep1_Block_Checkout_Onepage extends Mage_Checkout_Block_Onepage
{
    public function getSteps() {
        if (Mage::helper('skipstep1')->isSkipEnabled() && $this->checkMobileAgents()) {
            $steps = parent::getSteps();
            if (array_key_exists('login', $steps)) {
                unset($steps['login']);
            }
            return $steps;
        } else {
            return parent::getSteps();
        }
    }
    
    public function getActiveStep()
    {
        if (Mage::helper('skipstep1')->isSkipEnabled() && $this->checkMobileAgents()) {
            return 'billing';
        } else {
            return parent::getActiveStep();
        }
    }

    public function checkMobileAgents() 
    { 
        $mobileAgents = "/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|" 
        . "htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|" 
        . "blackberry|blackberry10|bb10|playbook|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|" 
        . "symbian|smartphone|mmp|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|" 
        . "jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220" 
        . ")/i"; 
        if (preg_match($mobileAgents, strtolower($_SERVER['HTTP_USER_AGENT']))) { 
            return true; 
        } 
        return false; 
    } 
}
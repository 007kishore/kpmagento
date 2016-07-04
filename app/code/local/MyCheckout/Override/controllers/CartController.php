<?php
require_once 'Mage/Checkout/controllers/CartController.php';
class MyCheckout_Override_CartController extends Mage_Checkout_CartController
{
    /**
     * Initialize shipping information
     */
    public function estimatePostAction()
    {
        $country    = (string) $this->getRequest()->getParam('country_id');
        $postcode   = (string) $this->getRequest()->getParam('estimate_postcode');
        $city       = (string) $this->getRequest()->getParam('estimate_city');
        $regionId   = (string) $this->getRequest()->getParam('region_id');
        $region     = (string) $this->getRequest()->getParam('region');

        $this->_getQuote()->getShippingAddress()
            ->setCountryId($country)
            ->setCity($city)
            ->setPostcode($postcode)
            ->setRegionId($regionId)
            ->setRegion($region)
            ->setCollectShippingRates(true);
        $this->_getQuote()->save();
        //echo "<pre>";print_r($this->_getQuote());echo "</pre>";exit;
        //$this->_goBack();


        if(Mage::getSingleton('core/design_package')->getTheme('frontend')=='iphone'){
            $this->_redirectUrl(Mage::getBaseUrl()."checkout/cart/deliveryoption");            
        }else
            $this->_redirectUrl(Mage::getBaseUrl()."checkout/cart#shipping");
    }
    // Customization of login for mobile checkout step 1
    public function loginAction(){
        if(!Mage::getSingleton('customer/session')->isLoggedIn()){
            $this->loadLayout();
            $this->renderLayout();
        }else{
            $this->_redirectUrl(Mage::getBaseUrl()."checkout/cart/deliverymethod");
        }
        
    }

    public function deliverymethodAction(){
        $this->loadLayout();
        $this->renderLayout();
    }

    public function deliveryoptionAction(){
        $this->loadLayout();
        $this->renderLayout();
    }

    public function payoptionAction(){
        $this->loadLayout();
        $this->renderLayout();
    }

    public function estimateUpdatePostAction()
    {
        $code = (string) $this->getRequest()->getParam('estimate_method');
        if (!empty($code)) {
            $this->_getQuote()->getShippingAddress()->setShippingMethod($code)/*->collectTotals()*/->save();
        }

        //echo "<pre>";print_r($this->_getQuote());echo "</pre>";exit;

        if(Mage::getSingleton('core/design_package')->getTheme('frontend')=='iphone'){
            $this->_redirectUrl(Mage::getBaseUrl()."checkout/cart/deliveryoption");            
        }else
            $this->_redirectUrl(Mage::getBaseUrl()."checkout/cart#shipping");
    }
}
?> 

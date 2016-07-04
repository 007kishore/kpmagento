<?php
	require_once 'Mage/Customer/controllers/AccountController.php';
	class Mob_Customcustomer_AccountController extends Mage_Customer_AccountController
	{	
		
		public function loginPostAction()
		{ echo "hmmmm";exit;
			if ($this->_getSession()->isLoggedIn()) {
				$this->_redirect('*/*/');
				return;
			}
			$session = $this->_getSession();

			if ($this->getRequest()->isPost()) {
				$login = $this->getRequest()->getPost('login');
				if (!empty($login['username']) && !empty($login['password'])) {
					try {
						$session->login($login['username'], $login['password']);
						if ($session->getCustomer()->getIsJustConfirmed()) {
							$this->_welcomeCustomer($session->getCustomer(), true);
						}
					} catch (Mage_Core_Exception $e) {
						switch ($e->getCode()) {
							case Mage_Customer_Model_Customer::EXCEPTION_EMAIL_NOT_CONFIRMED:
								$value = Mage::helper('customer')->getEmailConfirmationUrl($login['username']);
								$message = Mage::helper('customer')->__('This account is not confirmed. <a href="%s">Click here</a> to resend confirmation email.', $value);
								break;
							case Mage_Customer_Model_Customer::EXCEPTION_INVALID_EMAIL_OR_PASSWORD:
								$message = $e->getMessage();
								break;
							default:
								$message = $e->getMessage();
						}
						$session->addError($message);
						$session->setUsername($login['username']);
					} catch (Exception $e) {
						// Mage::logException($e); // PA DSS violation: this exception log can disclose customer password
					}
				} else {
					$session->addError($this->__('Login and password are required.'));
				}
			}

			$this->_loginPostRedirect($login);
		}
		
		
		protected function _loginPostRedirect($login)
		{	echo "hello";exit;
			$session = $this->_getSession();

			if (!$session->getBeforeAuthUrl() || $session->getBeforeAuthUrl() == Mage::getBaseUrl()) {
				// Set default URL to redirect customer to
				$session->setBeforeAuthUrl(Mage::helper('customer')->getAccountUrl());
				// Redirect customer to the last page visited after logging in
				if ($session->isLoggedIn()) {
					if (!Mage::getStoreConfigFlag(
						Mage_Customer_Helper_Data::XML_PATH_CUSTOMER_STARTUP_REDIRECT_TO_DASHBOARD
					)) {
						$referer = $this->getRequest()->getParam(Mage_Customer_Helper_Data::REFERER_QUERY_PARAM_NAME);
						if ($referer) {
							// Rebuild referer URL to handle the case when SID was changed
							$referer = Mage::getModel('core/url')
								->getRebuiltUrl(Mage::helper('core')->urlDecode($referer));
							if ($this->_isUrlInternal($referer)) {
								$session->setBeforeAuthUrl($referer);
							}
						}
					} else if ($session->getAfterAuthUrl()) {
						$session->setBeforeAuthUrl($session->getAfterAuthUrl(true));
					}
				} else {
					$session->setBeforeAuthUrl(Mage::helper('customer')->getLoginUrl());
				}
			} else if ($session->getBeforeAuthUrl() == Mage::helper('customer')->getLogoutUrl()) {
				$session->setBeforeAuthUrl(Mage::helper('customer')->getDashboardUrl());
			} else {
				if (!$session->getAfterAuthUrl()) {
					$session->setAfterAuthUrl($session->getBeforeAuthUrl());
				}
				if ($session->isLoggedIn()) {
					$session->setBeforeAuthUrl($session->getAfterAuthUrl(true));
				}
			}
			if(isset($login['isMobCheckout'])){
				$this->_redirectUrl($login['isMobCheckout']);
			}
			else{
				$this->_redirectUrl($session->getBeforeAuthUrl(true));
			}
			//$this->_redirectUrl($session->getBeforeAuthUrl(true));
		}
	}
?>
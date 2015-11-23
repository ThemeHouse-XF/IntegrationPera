<?php

/**
 * @see XenForo_ControllerPublic_Account
 */
class ThemeHouse_IntegrationPer_Extend_XenForo_ControllerPublic_Account extends XFCP_ThemeHouse_IntegrationPer_Extend_XenForo_ControllerPublic_Account
{
    /**
     * @see XenForo_ControllerPublic_Account::actionFacebook()
     */
    public function actionFacebook()
    {
        /* @var $response XenForo_ControllerResponse_View */
        $response = parent::actionFacebook();

        if ($response instanceof XenForo_ControllerResponse_View) {
            $errorPhraseKey = '';
            if (!$response->subView->params['fbUser']) {
                $this->_assertCanExternalAuth();
            }
        }

        return $response;
   } /* END ThemeHouse_IntegrationPer_Extend_XenForo_ControllerPublic_Account::actionFacebook */

   /**
    * @see Steam_ControllerPublic_Account::actionSteam()
    */
   public function actionSteam()
   {
       /* @var $response XenForo_ControllerResponse_View */
       $response = parent::actionSteam();

       if ($response instanceof XenForo_ControllerResponse_View) {
           $errorPhraseKey = '';
           if (!$response->subView->params['stUser']) {
               $this->_assertCanExternalAuth();
           }
       }

       return $response;
   } /* END ThemeHouse_IntegrationPer_Extend_XenForo_ControllerPublic_Account::actionSteam */

   /**
    * @see Social_ControllerPublic_Account::_getProviderResponse()
    */
   protected function _getProviderResponse(Social_Provider_Abstract $helper)
   {
       /* @var $response XenForo_ControllerResponse_View */
       $response = parent::_getProviderResponse($helper);

       if ($response instanceof XenForo_ControllerResponse_View) {
           if (!isset($response->subView->params['profile'])) {
               $this->_assertCanExternalAuth();
           }
       }

       return $response;
   } /* END ThemeHouse_IntegrationPer_Extend_XenForo_ControllerPublic_Account::_getProviderResponse */

   protected function _assertCanExternalAuth()
   {
       $userExternalModel = $this->getModelFromCache('XenForo_Model_UserExternal');
       $errorPhraseKey = '';
       if (!$userExternalModel->canExternalAuth($errorPhraseKey)) {
           if ($errorPhraseKey) {
               throw $this->responseException(
                   $this->responseError(new XenForo_Phrase($errorPhraseKey), 403)
               );
           } else {
               throw $this->responseException(
                   $this->responseNoPermission()
               );
           }
       }
   } /* END ThemeHouse_IntegrationPer_Extend_XenForo_ControllerPublic_Account::_assertCanExternalAuth */
}
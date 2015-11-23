<?php

class ThemeHouse_IntegrationPer_Extend_XenForo_Model_UserExternal_Base extends XFCP_ThemeHouse_IntegrationPer_Extend_XenForo_Model_UserExternal
{

    /**
     * Determines if the viewing user can authenticate from an external site
     * (e.g Facebook)
     *
     * @param string $errorPhraseKey
     * @param array|null $viewingUser
     *
     * @return boolean
     */
    public function canExternalAuth(&$errorPhraseKey = '', array $viewingUser = null)
    {
        $this->standardizeViewingUserReference($viewingUser);

        return ($viewingUser['user_id'] &&
             XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'externalAuth'));
    } /* END canExternalAuth */
}

if (XenForo_Application::$versionId < 1030000) {

    class ThemeHouse_IntegrationPer_Extend_XenForo_Model_UserExternal extends ThemeHouse_IntegrationPer_Extend_XenForo_Model_UserExternal_Base
    {

        /**
         *
         * @see XenForo_Model_UserExternal::updateExternalAuthAssociation()
         */
        public function updateExternalAuthAssociation($provider, $providerKey, $userId, $userProfileField = null,
            array $extra = null)
        {
            /* @var $userModel XenForo_Model_User */
            $userModel = XenForo_Model::create('XenForo_Model_User');

            $user = $userModel->getVisitingUserById($userId);
            $user['permissions'] = XenForo_Permission::unserializePermissions($user['global_permission_cache']);

            $errorPhraseKey = 'do_not_have_permission';
            if (!$this->canExternalAuth($errorPhraseKey, $user)) {
                throw new XenForo_Exception(new XenForo_Phrase($errorPhraseKey), true);
            }

            return parent::updateExternalAuthAssociation($provider, $providerKey, $userId, $userProfileField, $extra);
        } /* END updateExternalAuthAssociation */
    }
} else {

    class ThemeHouse_IntegrationPer_Extend_XenForo_Model_UserExternal extends ThemeHouse_IntegrationPer_Extend_XenForo_Model_UserExternal_Base
    {

        /**
         *
         * @see XenForo_Model_UserExternal::updateExternalAuthAssociation()
         */
        public function updateExternalAuthAssociation($provider, $providerKey, $userId, array $extra = null)
        {
            /* @var $userModel XenForo_Model_User */
            $userModel = XenForo_Model::create('XenForo_Model_User');

            $user = $userModel->getVisitingUserById($userId);
            $user['permissions'] = XenForo_Permission::unserializePermissions($user['global_permission_cache']);

            $errorPhraseKey = 'do_not_have_permission';
            if (!$this->canExternalAuth($errorPhraseKey, $user)) {
                throw new XenForo_Exception(new XenForo_Phrase($errorPhraseKey), true);
            }

            return parent::updateExternalAuthAssociation($provider, $providerKey, $userId, $extra);
        } /* END updateExternalAuthAssociation */
    }
}
<?php

class ThemeHouse_IntegrationPer_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{
    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_IntegrationPer' => array(
                'controller' => array(
                    'XenForo_ControllerPublic_Account',
                ), /* END 'controller' */
                'model' => array(
                    'XenForo_Model_UserExternal',
                ), /* END 'model' */
            ), /* END 'ThemeHouse_IntegrationPer' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassController($class, array &$extend)
    {
        $loadClassController = new ThemeHouse_IntegrationPer_Listener_LoadClass($class, $extend, 'controller');
        $extend = $loadClassController->run();
    } /* END loadClassController */

    public static function loadClassModel($class, array &$extend)
    {
        $loadClassModel = new ThemeHouse_IntegrationPer_Listener_LoadClass($class, $extend, 'model');
        $extend = $loadClassModel->run();
    } /* END loadClassModel */
}
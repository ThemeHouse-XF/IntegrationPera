<?php

class ThemeHouse_IntegrationPer_Install_Controller extends ThemeHouse_Install
{

    protected $_resourceManagerUrl = 'http://xenforo.com/community/resources/integration-permissions.1922/';

    protected function _getPermissionEntries()
    {
        return array(
            'general' => array(
                'externalAuth' => array(
                    'permission_group_id' => 'general', /* 'permission_group_id' */
                    'permission_id' => 'view', /* 'permission_id' */
                ), /* 'externalAuth' */
            ), /* 'general' */
        );
    } /* END _getPermissionEntries */
}
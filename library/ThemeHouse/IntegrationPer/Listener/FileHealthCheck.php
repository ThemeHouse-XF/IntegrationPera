<?php

class ThemeHouse_IntegrationPer_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/ThemeHouse/IntegrationPer/Extend/XenForo/ControllerPublic/Account.php' => '13d3949885ed1f7c1368cb120fec4fcc',
                'library/ThemeHouse/IntegrationPer/Extend/XenForo/Model/UserExternal.php' => 'e09d7ae446e456f01cec7ce0c7f92779',
                'library/ThemeHouse/IntegrationPer/Install/Controller.php' => '2c137384fe62dc42b3037958d5afb477',
                'library/ThemeHouse/IntegrationPer/Listener/ControllerPreDispatch.php' => '633e436a17407d91ddab5f24fbca9251',
                'library/ThemeHouse/IntegrationPer/Listener/LoadClass.php' => 'be3639058863e26fe01f7e6f77a8c2e6',
                'library/ThemeHouse/Install.php' => '18f1441e00e3742460174ab197bec0b7',
                'library/ThemeHouse/Install/20151109.php' => '2e3f16d685652ea2fa82ba11b69204f4',
                'library/ThemeHouse/Deferred.php' => 'ebab3e432fe2f42520de0e36f7f45d88',
                'library/ThemeHouse/Deferred/20150106.php' => 'a311d9aa6f9a0412eeba878417ba7ede',
                'library/ThemeHouse/Listener/ControllerPreDispatch.php' => 'fdebb2d5347398d3974a6f27eb11a3cd',
                'library/ThemeHouse/Listener/ControllerPreDispatch/20150911.php' => 'f2aadc0bd188ad127e363f417b4d23a9',
                'library/ThemeHouse/Listener/InitDependencies.php' => '8f59aaa8ffe56231c4aa47cf2c65f2b0',
                'library/ThemeHouse/Listener/InitDependencies/20150212.php' => 'f04c9dc8fa289895c06c1bcba5d27293',
                'library/ThemeHouse/Listener/LoadClass.php' => '5cad77e1862641ddc2dd693b1aa68a50',
                'library/ThemeHouse/Listener/LoadClass/20150518.php' => 'f4d0d30ba5e5dc51cda07141c39939e3',
            ));
    }
}
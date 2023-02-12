<?php
defined('TYPO3_MODE') || die();

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(function()
{
    $extensionKey = 't3_basic';

    // Register TsConfig file
    ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/TsConfig/Page/All.tsconfig',
        'T3 Basic'
    );
});

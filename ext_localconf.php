<?php
defined('TYPO3_MODE') || die();

call_user_func(
    function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'TYPO3.'.'T3Basic',
            'Person',
            [ \TYPO3\T3Basic\Controller\PersonController::class => 'list, show, showSelected, filter' ],
            [ \TYPO3\T3Basic\Controller\PersonController::class => '' ]
        );

        /**
         * Register plugin wizard
         */
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            '@import "EXT:t3_basic/Configuration/TsConfig/Page/Mod/Wizards/ContentElements.tsconfig"');
    }
);

/***************
 * Register Icons
 */
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$icons = ['persons'];

foreach ($icons as $icon) {
    $iconRegistry->registerIcon(
        't3basic-' . $icon,
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:t3_basic/Resources/Public/Icons/ContentElements/' . $icon . '.svg']
    );
}


/**
 * Extend ke_search
 */
if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('ke_search')) {
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['registerIndexerConfiguration'][] = 'TYPO3\T3Basic\Indexer\CustomIndexer';
    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['ke_search']['customIndexer'][] = 'TYPO3\T3Basic\Indexer\CustomIndexer';
}

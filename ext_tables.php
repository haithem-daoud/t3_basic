<?php
defined('TYPO3_MODE') || die();

call_user_func(
    function () {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_t3_basic_domain_model_person',
            'EXT:t3_basic/Resources/Private/Language/locallang_csh_tx_t3basic_domain_model_person.xlf'
        );
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_t3_basic_domain_model_person');
    }
);

$GLOBALS['TCA']['tx_t3_basic_domain_model_person']['columns']['categories'] = [
    'label' => 'LLL:EXT:t3_basic/Resources/Private/Language/locallang_be.xlf:flexforms_general.categories',
    'config' => [
        'type' => 'category',
        'foreign_table' => 'sys_category',
        'foreign_table_where' => 'AND (sys_category.sys_language_uid = 0 OR sys_category.l10n_parent = 0) ORDER BY sys_category.sorting',
    ]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_t3_basic_domain_model_person',
    'categories'
);

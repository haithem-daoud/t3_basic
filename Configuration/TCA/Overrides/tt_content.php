<?php
defined('TYPO3_MODE') || die();

call_user_func(function ($extensionKey) {

    /**
     * register plugin
     */
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'T3Basic',
        'Person',
        'LLL:EXT:' . $extensionKey . '/Resources/Private/Language/locallang_be.xlf:plugin.persons.title',
        'EXT:'. $extensionKey . '/Resources/Public/Icons/ContentElements/persons.svg'
    );
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['t3basic_person'] = 'recursive,select_key,pages';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['t3basic_person'] = 'pi_flexform';

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        't3basic_person',
        'FILE:EXT:t3_basic/Configuration/FlexForms/flexform_person.xml'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        $extensionKey . '_person',
        'FILE:EXT:' . $extensionKey . '/Configuration/FlexForms/person.xml'
    );
}, 't3_basic');

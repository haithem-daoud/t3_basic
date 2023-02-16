<?php
defined('TYPO3_MODE') or die();

$ll = 'LLL:EXT:t3_basic/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => $ll . 'tx_t3_basic_domain_model_person',
        'label' => 'last_name',
        'label_alt' => 'first_name,title',
        'label_alt_force' => 1,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'translationSource' => 'l10n_source',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,first_name,last_name,position,address,zip,city,phone,email,www,biography,image',
        'iconfile' => 'EXT:t3_basic/Resources/Public/Icons/ContentElements/persons.svg'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l18n_parent, l18n_diffsource, hidden, global_id, gender, title, first_name, last_name, position, address, zip, city, phone, email,www,short_biography, biography, image',
    ],
    'palettes' => [
        'pName' => [
            'showitem' => 'gender,--linebreak--,first_name,last_name'
        ],
        'pPosition' => [
            'showitem' => 'position, title'
        ],
        'pPhoto' => [
            'showitem' => 'image',
        ],
        'pContact' => [
            'showitem' => 'phone,email,www'
        ],
        'pAddress' => [
            'showitem' => 'zip,city,address'
        ]
    ],
    'types' => [
        '1' => [
            'showitem' => 'sys_language_uid, l18n_parent, l18n_diffsource,
        --palette--;Person Name;pName,
        --palette--;Person Position;pPosition,
        --palette--;Person Photo;pPhoto,
        --palette--;Person Contact;pContact,
        --palette--;Person Address;pAddress,
        short_biography, biography,
        --div--;' . $ll . 'tab.additionalFields,content_elements,categories,
        --div--;' . $ll . 'tab.additionalImages,additional_images,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l18n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0,
                    ],
                ],
                'foreign_table' => 'tx_t3_basic_domain_model_person',
                'foreign_table_where' => 'AND {#tx_t3_basic_domain_model_person}.{#pid}=###CURRENT_PID###' . ' AND {#tx_t3_basic_domain_model_person}.{#sys_language_uid} IN (-1,0)',
                'default' => 0,
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'l18n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => '',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true,
                    ],
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038),
                ],
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
        ],

        // ... Person Fields ... //

        'gender' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.gender',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                    [ $ll . 'tx_t3_basic_domain_model_person.gender.male', 1],
                    [ $ll . 'tx_t3_basic_domain_model_person.gender.female', 2],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => ''
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'first_name' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.first_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'last_name' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.last_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'position' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.position',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'address' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.address',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'zip' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'city' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'phone' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.phone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'email' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.email',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'www' => [
            'exclude' => 0,
            'label' => $ll . 'tx_t3_basic_domain_model_person.www',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'biography' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.biography',
            'config' => [
                'type' => 'text',
                'size' => 30,
                'eval' => 'trim',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default'
            ],
        ],
        'short_biography' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.short_biography',
            'config' => [
                'type' => 'text',
                'size' => 30,
                'eval' => 'trim',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default'
            ],
        ],
        'image' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ]
                        ],
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'content_elements' => [
            'exclude' => true,
            'label' => $ll . 'tx_t3_basic_domain_model_person.content_elements',
            'config' => [
                'type' => 'inline',
                'allowed' => 'tt_content',
                'foreign_table' => 'tt_content',
                'foreign_sortby' => 'sorting',
                'foreign_field' => 'tx_t3_basic_related_person',
                'minitems' => 0,
                'maxitems' => 99,
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => true,
                    'showAllLocalizationLink' => true,
                    'showSynchronizationLink' => true,
                    'enabledControls' => [
                        'info' => false,
                    ],
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
    ],
];

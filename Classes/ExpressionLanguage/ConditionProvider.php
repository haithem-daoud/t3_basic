<?php
declare(strict_types=1);

namespace TYPO3\T3Basic\ExpressionLanguage;

use TYPO3\CMS\Core\ExpressionLanguage\AbstractProvider;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * ConditionProvider
 */
class ConditionProvider extends AbstractProvider
{
    public function __construct()
    {
        $this->expressionLanguageVariables = [
            'extension' => GeneralUtility::makeInstance(ExtensionManager::class)
        ];
    }
}

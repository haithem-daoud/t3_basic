<?php
namespace TYPO3\T3Basic\PageTitle;

use TYPO3\CMS\Core\PageTitle\AbstractPageTitleProvider;

class PageTitleProvider extends AbstractPageTitleProvider
{
    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
}

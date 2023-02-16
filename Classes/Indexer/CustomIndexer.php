<?php

namespace TYPO3\T3Basic\Indexer;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class CustomIndexer
{

    // Set a key for your indexer configuration.
    // Add this in Configuration/TCA/Overrides/tx_kesearch_indexerconfig.php, too!
    protected string $indexerConfigurationKey = 'customIndexer';

    /**
     *
     * @param array $params
     * @param type $pObj
     */
    public function registerIndexerConfiguration(&$params, $pObj)
    {
        // Set a name and an icon for your indexer.
        $customIndexer = array(
            '[CUSTOM] Custom-Indexer ',
            $this->indexerConfigurationKey,''
        );
        $params['items'][] = $customIndexer;
    }

    /**
     * Custom indexer for ke_search
     *
     * @param array $indexerConfig Configuration from TYPO3 Backend
     * @param array $indexerObject Reference to indexer class.
     * @return  string Message containing indexed elements
     */
    public function customIndexer(array &$indexerConfig, &$indexerObject)
    {
        if ($indexerConfig['type'] == $this->indexerConfigurationKey) {
            $content = '';

            /**Render record */
            $fields = '*';
            $table = 'fe_users';
            $where = 'pid IN (' . $indexerConfig['sysfolder'] . ') AND hidden = 0 AND deleted = 0';
            $queryBuilder  = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($table);
            $queryBuilder ->select($fields)
                ->from($table)
                ->where($where);
            $res = $queryBuilder->execute()->fetchAll();

            if ($res) {
                $counter = 0;
                foreach ($res as $record) {
                    // compile the information which should go into the index
                    // the field names depend on the table you want to index!
                    $title = strip_tags($record['name']);

                    $fullContent = $title . "\n" .strip_tags($record['summary']);

                    // Link to detail view
                    $params = '&tx_inkassojudgement_detailview[action]=show&tx_inkassojudgement_detailview[controller]=Judgement&tx_inkassojudgement_detailview[judgement]='.$record['uid'];
                    // Tags
                    // If you youse Sphinx, use "_" instead of "#" (configurable in the extension manager)
                    $tags = '';

                    // Additional information
                    $additionalFields = array(
                        'sortdate' => $record['crdate'],
                        'orig_uid' => $record['uid'],
                        'orig_pid' => $record['pid'],
                    );

                    // ... and store the information in the index
                    $indexerObject->storeInIndex(
                        $indexerConfig['storagepid'],        // storage PID
                        $title,                              // page title inkl. tt_content-title
                        $this->indexerConfigurationKey,      // content type
                        $indexerConfig['targetpid'],         // target PID: where is the single view?
                        $fullContent,                        // indexed content, includes the title (linebreak after title)
                        $tags,                               // tags
                        $params,                             // typolink params for singleview
                        '',                                  // abstract
                        $record['sys_language_uid'],         // language uid
                        $record['starttime'],                // starttime
                        $record['endtime'],                  // endtime
                        $record['fe_group'],                 // fe_group
                        false,                               // debug only?
                        $additionalFields                    // additional fields added by hooks
                    );
                    $counter++;
                }
                $content =
                    '<p><b>Custom Indexer "'
                    . $indexerConfig['title'] . '": ' . $counter
                    . ' Elements have been indexed.</b></p>';
            }
            return $content;
        }
    }
}

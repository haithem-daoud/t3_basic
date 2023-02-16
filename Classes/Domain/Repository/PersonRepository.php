<?php

namespace TYPO3\T3Basic\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException;
use TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper;
use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\T3Basic\Domain\Model\Person;

/**
 * Person Repository
 */
class PersonRepository extends Repository
{

    /**
     * @var string Table name of associated model
     */
    public const TABLE_NAME = 'tx_t3_basic_domain_model_person';

    /**
     * @var DataMapper Data mapper
     */
    protected DataMapper $dataMapper;

    /**
     * @var ConfigurationManager Configuration manager
     */
    protected ConfigurationManager $configurationManager;

    /**
     * @param ConfigurationManager $configurationManager
     * @param DataMapper $dataMapper
     */
    public function __construct(
        ConfigurationManager $configurationManager,
        DataMapper $dataMapper
    )
    {
        $this->configurationManager = $configurationManager;
        $this->dataMapper = $dataMapper;
    }

    /**
     * Find multiple records by given UIDs and optional ordering.
     *
     * @param string $recordList A comma separated string containing ids
     * @param string|null $order Optional ordering in the form 'fieldName1|asc,fieldName2|desc'
     * @return array Matching Records
     * @throws DBALException|InvalidConfigurationTypeException
     */
    public function findMultipleByUid(string $recordList, ?string $order = null): array
    {
        // Get storage PIDs
        $storagePageIds = $this->getStoragePageIds();

        // Get selected UIDs
        $ids = GeneralUtility::intExplode(',', $recordList, true);

        if (empty($ids)) { return []; }

        // Build base query
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->select('*')
            ->from(self::TABLE_NAME)
            ->where($queryBuilder->expr()->andX(
                $queryBuilder->expr()->in('uid', $ids),
                $queryBuilder->expr()->in('pid', $storagePageIds)
            ));

        $queryBuilder->add('orderBy', 'FIELD(' . self::TABLE_NAME . '.uid, ' . implode(',', $ids) . ')');

        $result = $queryBuilder->execute()->fetchAll();
        return $this->dataMapper->map(Person::class, $result);
    }

    /**
     * Get storage page IDs from current configuration.
     *
     * @return array Storage page IDs from current configuration
     * @throws InvalidConfigurationTypeException
     */
    protected function getStoragePageIds(): array
    {
        $frameworkConfiguration = $this->configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
        return GeneralUtility::intExplode(',', $frameworkConfiguration['persistence']['storagePid']);
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder(): QueryBuilder
    {
        return GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable(self::TABLE_NAME);
    }
}

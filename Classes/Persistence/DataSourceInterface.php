<?php
namespace CPSIT\T3importExport\Persistence;

use CPSIT\T3importExport\ConfigurableInterface;

/**
 * Interface DataSourceInterface
 *
 * Describes data sources.
 *
 * @package CPSIT\T3importExport\Persistence
 */
interface DataSourceInterface extends ConfigurableInterface
{
    /**
     * Fetches records from a data source.
     *
     * @param array $configuration Source query configuration
     * @return array Array of records or empty array
     */
    public function getRecords(array $configuration);
}

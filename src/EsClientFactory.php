<?php

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace Pimcore\Bundle\ElasticsearchClientBundle;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Psr\Log\LoggerInterface;

class EsClientFactory
{
    public static function create(LoggerInterface $logger, array $configuration): Client
    {
        $builder = ClientBuilder::create()
            ->setHosts($configuration['hosts'])
            ->setLogger($logger);

        if (isset($configuration['username']) && isset($configuration['password'])) {
            $builder->setBasicAuthentication($configuration['username'], $configuration['password']);
        }

        return $builder->build();
    }
}

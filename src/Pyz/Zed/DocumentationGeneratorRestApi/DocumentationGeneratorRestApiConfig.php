<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\DocumentationGeneratorRestApi;

use Spryker\Zed\DocumentationGeneratorRestApi\DocumentationGeneratorRestApiConfig as SprykerDocumentationGeneratorRestApiConfig;

class DocumentationGeneratorRestApiConfig extends SprykerDocumentationGeneratorRestApiConfig
{
    /**
     * @project Only needed internal non-split project, not in public split project.
     *
     * @return array<string>
     */
    protected function getCoreAnnotationSourceDirectoryPatterns(): array
    {
        return [
            APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/%1$s/src/Spryker/Glue/%1$s/Controller/',
        ];
    }

    /**
     * @return string
     */
    public function getPathVersionPrefix(): string
    {
        return 'v';
    }

    /**
     * @return bool
     */
    public function getPathVersionResolving(): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isNestedRelationshipsEnabled(): bool
    {
        return true;
    }
}

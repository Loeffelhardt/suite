<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\Glossary;

use Spryker\Zed\Glossary\GlossaryConfig as SprykerGlossaryConfig;

class GlossaryConfig extends SprykerGlossaryConfig
{
    /**
     * @return array<string>
     */
    public function getGlossaryFilePaths(): array
    {
        $paths = parent::getGlossaryFilePaths();
        $paths = $this->addSprykerFilePath($paths);

        return $paths;
    }

    /**
     * @project Only needed in Project, not in demoshop
     *
     * @param array<string> $paths
     *
     * @return array<string>
     */
    private function addSprykerFilePath(array $paths): array
    {
        $paths = array_merge(
            $paths,
            glob(APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/Spryker/*/*/Resources/glossary.yml') ?: [],
        );

        return $paths;
    }
}

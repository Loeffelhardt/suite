<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\WebProfiler;

use Spryker\Zed\WebProfiler\WebProfilerConfig as SprykerWebProfilerConfig;
use Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener;

class WebProfilerConfig extends SprykerWebProfilerConfig
{
    /**
     * @project Only needed in non-split projects.
     *
     * @return array<string>
     */
    public function getWebProfilerTemplatePaths(): array
    {
        if (!class_exists(WebDebugToolbarListener::class)) {
            return [];
        }

        return parent::getWebProfilerTemplatePaths();
    }
}

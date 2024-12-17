<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Yves\Twig;

use Spryker\Yves\Twig\TwigConfig as SprykerTwigConfig;

class TwigConfig extends SprykerTwigConfig
{
    /**
     * @project Only needed in Project, not in demoshop
     *
     * @param array<string> $paths
     *
     * @return array<string>
     */
    protected function addCoreTemplatePaths(array $paths): array
    {
        $paths = parent::addCoreTemplatePaths($paths);

        $paths[] = APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/%1$s/src/Spryker/Yves/%1$s/Theme/' . $this->getThemeNameDefault();
        $paths[] = APPLICATION_VENDOR_DIR . '/spryker/spryker-shop/Bundles/%1$s/src/SprykerShop/Yves/%1$s/Theme/' . $this->getThemeNameDefault();
        $paths[] = APPLICATION_VENDOR_DIR . '/spryker-eco/%1$s/src/SprykerEco/Yves/%1$s/Theme/' . $this->getThemeNameDefault();

        return $paths;
    }
}

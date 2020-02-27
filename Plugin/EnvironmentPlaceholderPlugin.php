<?php
/**
 * Copyright © Hampus Westman 2020
 * See LICENCE provided with this module for licence details
 *
 * @author     Hampus Westman <hampus.westman@gmail.com>
 * @copyright  Copyright (c) 2020 Hampus Westman
 * @license    MIT License https://opensource.org/licenses/MIT
 * @link       https://github.com/Pr00xxy
 *
 */

declare(strict_types=1);

namespace PrOOxxy\DotEnv\Plugin;

use Magento\Config\Model\Config\Processor\EnvironmentPlaceholder;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Dotenv\Dotenv;

class EnvironmentPlaceholderPlugin
{

    /** @var Filesystem */
    private $filesystem;
    /**
     * @var string
     */
    private $envFile;

    public function __construct(
        Filesystem $filesystem,
        string $envFile
    ) {
        $this->filesystem = $filesystem;
        $this->envFile = $envFile;
    }

    /**
     * @param EnvironmentPlaceholder $subject
     * @param array $result
     * @return array
     * @see EnvironmentPlaceholder::process
     */
    public function beforeProcess(
        EnvironmentPlaceholder $subject,
        array $result
    ): array {
        $this->importDotenvFile();
        return [$result];
    }

    private function importDotenvFile()
    {
        $readInstance = $this->filesystem->getDirectoryRead(DirectoryList::CONFIG);

        $dirPath = $readInstance->getAbsolutePath();

        if (!$readInstance->isFile(\implode(DIRECTORY_SEPARATOR, [$dirPath, $this->envFile]))) {
            return;
        }

        $dotenv = new Dotenv($dirPath, $this->envFile);

        $dotenv->overload();

    }
}

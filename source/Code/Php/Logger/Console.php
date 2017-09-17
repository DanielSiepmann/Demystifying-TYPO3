<?php
namespace Codappix\CdxCore\Log\Writer;

/*
 * Copyright (C) 2017  Daniel Siepmann <coding@daniel-siepmann.de>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301, USA.
 */

use TYPO3\CMS\Core\Log\Writer\AbstractWriter;
use TYPO3\CMS\Core\Log\LogLevel;

/**
 * Adapted from https://github.com/neos/flow/
 */
class Console extends AbstractWriter
{
    /**
     * An array of severity labels, indexed by their integer constant
     * @var array
     */
    protected $severityLabels;

    /**
     * @var resource
     */
    protected $streamHandle;

    /**
     * @throws CouldNotOpenResourceException If stream could not be opened.
     */
    public function __construct(array $options = ['stream' => 'php://stdout'])
    {
        if ($options === []) {
            $options = ['stream' => 'php://stdout'];
        }
        $this->severityLabels = [
            LOG_EMERG   => 'EMERGENCY',
            LOG_ALERT   => 'ALERT    ',
            LOG_CRIT    => 'CRITICAL ',
            LOG_ERR     => 'ERROR    ',
            LOG_WARNING => 'WARNING  ',
            LOG_NOTICE  => 'NOTICE   ',
            LOG_INFO    => 'INFO     ',
            LOG_DEBUG   => 'DEBUG    ',
        ];

        $this->streamHandle = @fopen($options['stream'], 'w');

        if (!is_resource($this->streamHandle)) {
            throw new CouldNotOpenResourceException(
                'Could not open stream "' . $options['stream'] . '" for write access.',
                1310986609
            );
        }
    }

    public function writeLog(\TYPO3\CMS\Core\Log\LogRecord $record) : Console
    {
        $this->append($record->getMessage(), $record->getLevel(), $record->getData());

        return $this;
    }

    /**
     * Appends the given message along with the additional information into the log.
     *
     * @param string $message The message to log
     * @param int $severity One of the LOG_* constants
     * @param mixed $additionalData A variable containing more information
     */
    protected function append(
        string $message,
        int $severity = LOG_INFO,
        $additionalData = null
    ) : void {
        $severityLabel = 'UNKNOWN  ';
        if (isset($this->severityLabels[$severity])) {
            $severityLabel = $this->severityLabels[$severity];
        }
        $output = $severityLabel . ' ' . $message;
        if (is_resource($this->streamHandle)) {
            fputs($this->streamHandle, $output . PHP_EOL);
        }
    }
}

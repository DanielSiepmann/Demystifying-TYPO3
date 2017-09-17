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

/**
 * Adapted from https://github.com/neos/flow/
 */
class AnsiConsole extends Console
{
    const FG_BLACK = "\033[0;30m";
    const FG_WHITE = "\033[1;37m";
    const FG_GRAY = "\033[0;37m";
    const FG_BLUE = "\033[0;34m";
    const FG_CYAN = "\033[0;36m";
    const FG_YELLOW = "\033[1;33m";
    const FG_RED = "\033[0;31m";
    const FG_GREEN = "\033[0;32m";
    const BG_CYAN = "\033[46m";
    const BG_GREEN = "\033[42m";
    const BG_RED = "\033[41m";
    const BG_YELLOW = "\033[43m";
    const BG_WHITE = "\033[47m";
    const END = "\033[0m";

    /**
     * @var array
     */
    protected $tagFormats = [];

    public function __construct(array $options = ['stream' => 'php://stdout'])
    {
        if ($options === []) {
            $options = ['stream' => 'php://stdout'];
        }
        parent::__construct($options);

        $this->tagFormats = [
            'emergency' => self::FG_BLACK . self::BG_RED . '|' . self::END,
            'alert' => self::FG_BLACK . self::BG_YELLOW . '|' . self::END,
            'critical' => self::FG_BLACK . self::BG_CYAN . '|' . self::END,
            'error' => self::FG_RED . '|' . self::END,
            'warning' => self::FG_YELLOW . '|' . self::END,
            'notice' => self::FG_WHITE . '|' . self::END,
            'info' => self::FG_GREEN . '|' . self::END,
            'debug' => self::FG_BLUE . '|' . self::END,
        ];
    }

    /**
     * Appends the given message along with the additional information into the log.
     */
    protected function append(
        string $message,
        int $severity = LOG_INFO,
        $additionalData = null
    ) : void {
        $severityName = strtolower(trim($this->severityLabels[$severity]));
        $output = '<' . $severityName . '>' . $message . '</' . $severityName . '>';
        $output = $this->formatOutput($output);
        if (is_resource($this->streamHandle)) {
            fputs($this->streamHandle, $output . PHP_EOL);
        }
    }

    /**
     * Apply ansi formatting to output according to tags
     */
    protected function formatOutput(string $output) : string
    {
        $tagFormats = $this->tagFormats;
        do {
            $lastOutput = $output;
            $output = preg_replace_callback(
                '|(<([^>]+?)>(.*?)</\2>)|s',
                function ($matches) use ($tagFormats) {
                    $format = isset($tagFormats[$matches[2]]) ? $tagFormats[$matches[2]] : '|';
                    return str_replace('|', $matches[3], $format);
                },
                $output
            );
        } while ($lastOutput !== $output);
        return $output;
    }
}

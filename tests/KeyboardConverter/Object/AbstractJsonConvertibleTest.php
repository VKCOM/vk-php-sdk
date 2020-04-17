<?php

namespace Test\KeyboardConverter\Object;

use PHPUnit\Framework\TestCase;

abstract class AbstractJsonConvertibleTest extends TestCase
{
    protected function getExpectedJsonByFileName(string $name): string
    {
        return file_get_contents($this->convertFullPathToJsonByFileName($name));
    }

    abstract protected function getJsonFolderPath(): string;

    private function convertFullPathToJsonByFileName(string $filename): string
    {
        return sprintf('%s/%s', $this->getJsonFolderPath(), $filename);
    }
}
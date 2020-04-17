<?php

namespace Test\KeyboardConverter\Object\Keyboard\Type;

use VK\Tool\Messages\KeyboardConverter\Object\Keyboard\Type\AbstractType;
use Test\KeyboardConverter\Object\AbstractJsonConvertibleTest;

abstract class AbstractTypeTest extends AbstractJsonConvertibleTest
{
    public function testConvert(): void
    {
        $type = $this->getTypeWithNullableFields();
        $convertedToJsonTypeFileName = $this->getConvertedToJsonTypeFileName();
        $this->assertSame(
            json_decode($this->getExpectedJsonByFileName($convertedToJsonTypeFileName), true),
            json_decode($type->convert(), true)
        );
    }

    protected function getJsonFolderPath(): string
    {
        return __DIR__ . '/converted_to_json_types';
    }

    abstract protected function getTypeWithNullableFields(): AbstractType;
    abstract protected function getConvertedToJsonTypeFileName(): string;
}
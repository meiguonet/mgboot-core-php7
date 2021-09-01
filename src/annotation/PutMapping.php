<?php

namespace mgboot\core\annotation;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * @Target("METHOD")
 */
final class PutMapping
{
    /**
     * @var string
     */
    private $value;

    public function __construct($arg0)
    {
        $value = '';

        if (is_string($arg0) && $arg0 !== '') {
            $value = $arg0;
        } else if (is_array($arg0) && is_string($arg0['value']) && $arg0['value'] !== '') {
            $value = $arg0['value'];
        }

        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}

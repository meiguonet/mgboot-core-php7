<?php

namespace mgboot\core\annotation;

use Doctrine\Common\Annotations\Annotation\Target;

/**
 * @Annotation
 * @Target({"ANNOTATION", "PROPERTY"})
 */
final class UploadedFile
{
    /**
     * @var string
     */
    private $value;

    public function __construct(?string $value = null)
    {
        $this->value = empty($value) ? 'file' : $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}

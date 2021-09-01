<?php

namespace mgboot\core\annotation;

use Doctrine\Common\Annotations\Annotation\Target;
use mgboot\Cast;

/**
 * @Annotation
 * @Target({"ANNOTATION", "PROPERTY"})
 */
final class JwtClaim
{
    /**
     * @var string
     */
    private $name;

    public function __construct(?string $name = null)
    {
        $this->name = empty($name) ? '' : $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

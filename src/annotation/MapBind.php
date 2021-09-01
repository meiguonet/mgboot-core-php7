<?php

namespace mgboot\core\annotation;

use Doctrine\Common\Annotations\Annotation\Target;
use mgboot\constant\Regexp;

/**
 * @Annotation
 * @Target("ANNOTATION")
 */
final class MapBind
{
    /**
     * @var string[]
     */
    private $rules;

    public function __construct($arg0 = null)
    {
        $rules = [];

        if (is_string($arg0) && $arg0 !== '') {
            $rules = preg_split(Regexp::COMMA_SEP, $arg0);
        } else if (is_array($arg0) && !empty($arg0)) {
            foreach ($arg0 as $s1) {
                if (!is_string($s1) || $s1 === '') {
                    continue;
                }

                $rules[] = $s1;
            }
        }

        $this->rules = $rules;
    }

    /**
     * @return string[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }
}

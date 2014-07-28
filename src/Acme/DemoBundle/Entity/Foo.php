<?php

namespace Acme\DemoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Foo
{
    /**
     * @Assert\NotBlank()     
     */
    public $baz;

    /**
     * @Assert\NotNull()
     */
    public $bar;

}
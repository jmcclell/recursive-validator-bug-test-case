<?php

namespace Acme\DemoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Foo
{
    /**
     * @Assert\NotBlank()     
     */
    protected $baz;

    /**
     * @Assert\NotNull()
     */
    protected $bar;

    public function getBaz()
    {
        return $this->baz;
    }

    public function setBaz($baz)
    {
        $this->baz = $baz;
    }

    public function getBar()
    {
        return $this->bar;
    }

    public function setBar($bar)
    {
        $this->bar = $bar;
        return $this;
    }
}
<?php

namespace Acme\DemoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Bar
{

    /**
     * @Assert\NotBlank()
     */
    public $id;

    public function __construct($id = null)
    {
        $this->id = $id ?: 1;
    }
}
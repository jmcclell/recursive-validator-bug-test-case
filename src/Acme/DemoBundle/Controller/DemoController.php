<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Acme\DemoBundle\Form\FooType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


use Acme\DemoBundle\Entity\Foo;
use Acme\DemoBundle\Entity\Bar;

class DemoController extends Controller
{
    /**
     * @Route("/foo", name="_demo_foo")
     * @Template()
     */
    public function fooAction(Request $request)
    {
        $foo = new Foo();

        /**
         * Using the new recursive validator, if I leave the following line commented and submit the form
         * with a completely empty array, I get a 400 back as expected because none of the values validate
         * based on the annotations - neither on the Foo object nor the Bar object.
         *
         * However, If I provide a default value for $foo->bar (by uncommenting the line), the form validates
         * **even though the other assertions on Foo fail**. 
         *
         * This behavior is not seen with the lgacy validator.
         *
         * Notes:
         *
         * 1. CSRF protection must be disabled
         * 2. This seems to only occur with setting default values for nested objects, not scalar values
         * 3. This only occurs with the new Validator API
         *
         * I would expect the form to honor all constraints, even if the input request is empty and a
         * default value is set for one (or more) nested objects via this method.
         */
        $foo->bar = new Bar(1);
        
        $form = $this->createForm(new FooType(), $foo);
        $form->submit($request->request->all(), false);

        if ($form->isValid()) {            
            return new Response('Valid.', 200);
        } else {
            return new Response('Invalid.', 400);
        }
    }
}

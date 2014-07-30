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
     * This action demonstrates the bug in its simplest (as far as I can tell) form.
     *
     * I am instantiating an empty Foo object which has 2 properties, ::bar and ::baz.
     *
     * The test sends an empty request.
     *
     * I am using $clearMissing = false.
     *
     * I expect $form-isValid() to return false, but it returns true.
     * 
     * @Route("/foo", name="_demo_foo")
     * @Template()
     */
    public function fooAction(Request $request)
    {
        $foo = new Foo();
      
        $form = $this->createForm(new FooType(), $foo);

        $form->submit($request->request->all(), $clearMissing = false);

        if ($form->isValid()) {           

            $validator = $this->get('validator');

            if(0 < $errors = count($validator->validate($foo))) {
                return new Response('Form failed to validate the entity properly.', 500);                    
            } else {
                return new Response('Valid.', 200);                    
            }
            
        } else {
            return new Response('Invalid.', 400);
        }
    }
}

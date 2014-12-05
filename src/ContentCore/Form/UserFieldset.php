<?php
namespace ContentCore\Form;


use ContentCore\Entity\User;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;

class UserFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('User');
        $this->setHydrator(new ObjectPropertyHydrator(false))
             ->setObject(new User());
             $this->setLabel('User');
             $this->add(array(
            'name' => 'firstName',
            'options' => array(
                'label' => 'User\'s First Name'
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));

        $this->add(array(
            'name' => 'lastName',
            'options' => array(
                'label' => 'User\'s Last Name'
            ),
            'attributes' => array(
                'required' => 'required'
            )
        ));
    }
    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'firstName' => array(
                'required' => true,
            ),
            'lastName' => array(
                'required' => true,
            )
        );
    }
}
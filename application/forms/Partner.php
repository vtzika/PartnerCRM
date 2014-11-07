<?php
class Application_Form_Partner extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
 

        // Add name element
        $this->addElement('text', 'name', array(
            'label'      => 'Name:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            )
        );

        // Add email element
        $this->addElement('text', 'email', array(
            'label'      => 'Email:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));

        // Add account manager element
        $this->addElement('text', 'account_manager', array(
            'label'      => 'Account Manager:',
            'required'   => false,
            'filters'    => array('StringTrim'),
            )
        );

           // Add address element
        $this->addElement('text', 'address', array(
            'label'      => 'Address:',
            'required'   => false,
            'filters'    => array('StringTrim'),
            )
        );

           // Add mobile element
        $this->addElement('text', 'mobile', array(
            'label'      => 'Mobile:',
            'required'   => false,
            'filters'    => array('StringTrim'),
            )
        );

        // Add type element
        $this->addElement('select', 'type', array(
            'label'      => 'Type:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'multioptions'    => array('advertiser'=>'Advertiser', 'publisher'=>'Publisher'),
            )
        );
        

        // Add the comment element
        $this->addElement('textarea', 'comments', array(
            'label'      => 'Comment:',
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
                )
        ));
 
    
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Add Partner',
        ));
 
        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
    }
}
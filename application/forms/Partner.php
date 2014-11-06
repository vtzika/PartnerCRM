<?php
class Application_Form_Partner extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
 

        // Add name element
        $this->addElement('text', 'Name', array(
            'label'      => 'Name:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            )
        );

        // Add email element
        $this->addElement('text', 'email', array(
            'label'      => 'Your email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));

        // Add account manager element
        $this->addElement('text', 'Account Manager', array(
            'label'      => 'Account Manager:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            )
        );

           // Add address element
        $this->addElement('text', 'Address', array(
            'label'      => 'Address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            )
        );

           // Add mobile element
        $this->addElement('text', 'Mobile', array(
            'label'      => 'Mobile:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            )
        );

        // Add type element
        $this->addElement('select', 'Type', array(
            'label'      => 'Type:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'multioptions'    => array('advertiser'=>'Advertiser', 'publisher'=>'Publisher'),
            )
        );
        

        // Add the comment element
        $this->addElement('textarea', 'comment', array(
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
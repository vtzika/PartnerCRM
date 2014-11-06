<?php

class UsersController extends Zend_Controller_Action
{

  public function indexAction()
    {
        $users = new Application_Model_DbTable_Users();
        $this->view->users = $users->fetchAll();
    }

    public function loginAction()
    {
        $users = new Application_Model_DbTable_Users();
        #$this->view->user = $users->addUser($username, $email, $password, $role);
        $form = new Zend_Form;
        
        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Username');
        $form->addElement($username);

        $password = new Zend_Form_Element_Text('password');
        $password->setLabel('Password');
        $form->addElement($password);

        $submit = new Zend_Form_Element_Button('submit');
        $submit->setLabel('Login'); 
        $form->addElement($submit);

        $this->view->form = $form;
    }


     public function registerAction()
        {
            $users = new Application_Model_DbTable_Users();
            #$this->view->user = $users->addUser($username, $email, $password, $role);
            $form = new Zend_Form;
            
            $username = new Zend_Form_Element_Text('username');
            $username->setLabel('Username');
            $form->addElement($username);

            $password = new Zend_Form_Element_Text('password');
            $password->setLabel('Password');
            $form->addElement($password);

            $submit = new Zend_Form_Element_Button('register');
            $submit->setLabel('Register'); 
            $form->addElement($submit);

            $this->view->form = $form;
        }



    
  
    public function deleteAction($id)
    {
        $users = new Application_Model_DbTable_Users();
        $this->view->users = $users->deleteUser($id);
    }
    
}


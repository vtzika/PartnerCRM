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
        /*
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
        */

        $form = new Application_Form_Login();
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($form->isValid($request->getPost())) {
                if ($this->_process($form->getValues())) {
                    $this->_helper->redirector('index', 'index');
                }
            }
        }
        $this->view->form = $form;
    }

    public function registerAction()
    {
        $form = new Zend_Form;
        
        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('Username');
        $form->addElement($username);

        $password = new Zend_Form_Element_Text('password');
        $password->setLabel('Password');
        $form->addElement($password);

        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email');
        $form->addElement($email);

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
    

       protected function _process($values)
    {
        $adapter = $this->_getAuthAdapter();
        $adapter->setIdentity($values['username']);
        $adapter->setCredential($values['password']);

        $auth = Zend_Auth::getInstance();
        $result = $auth->authenticate($adapter);
        if ($result->isValid()) {
        $user = $adapter->getResultRowObject();
        $auth->getStorage()->write($user);
        return true;
        }
        return false;
    }


    protected function _getAuthAdapter()
    {

        $dbAdapter = Zend_Db_Table::getDefaultAdapter();
        $authAdapter = new Zend_Auth_Adapter_DbTable($dbAdapter);

        $authAdapter->setTableName('users')->setIdentityColumn('username')->setCredentialColumn('password');
        #->setCredentialTreatment('SHA1(CONCAT(?,salt))');

        return $authAdapter;
    }

 
}


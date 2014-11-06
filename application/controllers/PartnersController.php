<?php

class PartnersController extends Zend_Controller_Action
{

    public function addAction($name, $email, $account_manager, $mobile)
    {
        $partners = new Application_Model_DbTable_Partners();
        $this->view->partners = $partners->addPartner($name, $email, $account_manager, $mobile);
    }

    public function indexAction()
    {
        $partners = new Application_Model_DbTable_Partners();
        $this->view->partners = $partners->fetchAll();
    }
    
    public function editAction($id)
    {
        $partners = new Application_Model_DbTable_Partners();
        $this->view->partners = $partners->getPartner($id);
    }
    
}


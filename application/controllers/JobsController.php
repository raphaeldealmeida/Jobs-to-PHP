<?php

class JobsController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
    }

    public function newAction()
    {
        $form = new Application_Form_Job();
        $this->view->form = $form;

        if ($this->_request->isPost()) {
            $data = $this->_request->getPost();
            if ($form->isValid($data)) {
                $jobs = new Application_Model_DbTable_Job();
                $jobs->insert($data['job']);
                $this->_redirect('jobs');
            }
        }
        
    }
}

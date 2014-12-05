<?php

namespace ContentCore\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $_createUserForm;

    protected function _getCreateUserForm()
    {
        if (!$this->_createUserForm) {
            $this->_setCreateUserForm(
                $this->getServiceLocator()->get('contentuser_create_user_form')
            );
        }
        return $this->_createUserForm;
    }

    protected function _setCreateUserForm(\Zend\Form\Form $createUserForm)
    {
        $this->_createUserForm = $createUserForm;
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function formtestAction()
    {
        $form = $this->_getCreateUserForm();
        $User = new User();
        $form->bind($User);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                // take action
            }
        }

        return new ViewModel(array('form' => $form));
    }


}


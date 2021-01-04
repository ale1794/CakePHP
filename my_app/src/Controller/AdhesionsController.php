<?php

namespace App\Controller;

class AdhesionsController extends AppController
{
    public function initialize()
    {
        parent::initialize();           

    }

    public function processRequest()
    {
        if ($this->request->is('post')) {
            $email= $this->request->getData('email');

            $adesione= $this->Adhesions->find()->select(['id', 'users_email', 'stato'])->where(['users_email' => $email, 'stato' => 'Nuova'])->first();

            $adesione->stato= $this->request->getData('stato');

            if ($this->Adhesions->save($adesione)) {
                $this->Flash->success(__('Socio: '. $adesione->users_email .' has been updated.'));
            } else {
                $this->Flash->error(__('Unable to update your adhesion.'));
                return $this->redirect(['controller' => 'Users','action' => 'index']);
            }
        }

        $richieste = $this->Adhesions->find()->select(['users_email', 'stato'])->where(['stato' => 'Nuova']);

        $this->set(['richieste' => $richieste]);

    }

    public function showRequests()
    {
        $user = $this->request->getSession()->read('Auth.User.email');
        $ruolo = $this->request->getSession()->read('Auth.User.ruolo');
        if ($ruolo == 'admin') {
            $richieste = $this->Adhesions->find('all');
            $this->set(['richieste' => $richieste]);
        } else {

            $adesioni= $this->Adhesions->find()->select(['users_email','stato'])->where(['users_email' => $user])->all();
            $this->set(['richieste' => $adesioni]);
        }
    }

    public function addRequest()
    {

        $user = $this->request->getSession()->read('Auth.User.email');
        $request= $this->Adhesions->newEntity(['users_email' => $user, 'stato' => 'Nuova']);
        
        if ($this->Adhesions->save($request)) {
                $this->Flash->success(__('Richiesta inviata...'));
                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }
        $this->Flash->error(__('Unable to add your user.'));
    }
}
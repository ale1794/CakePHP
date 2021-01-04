<?php

namespace App\Controller;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $user= $this->Users->newEntity(['email' => 'mariorossi@hotmail.it', 
                                        'nome' => 'mario', 
                                        'cognome' => 'rossi', 
                                        'password' => 'mariorossi', 
                                        'data_iscrizione' => date("Y"), 
                                        'data_di_nascita' => '1990-12-12',
                                        'ruolo' => 'admin']);
        
        ($this->Users->save($user));
        $this->Auth->allow(['addUser', 'logout']);              

    }

    public function index() 
    {
        $session= $this->request->getSession();
        if($session) {
            if($session->read('Auth.User.ruolo') == 'admin') return $this->redirect(['action'=> 'adminView']);
            if($session->read('Auth.User.ruolo') == 'socio') return $this->redirect(['action'=> 'socioView']);
            if($session->read('Auth.User.ruolo') == 'guest') return $this->redirect(['action'=> 'guestView']);
        }
        $this->redirect(['action'=>'login']);
    }


    // Funzione per registrazione user e invio richiesta di adesione
    public function addUser() 
    {
        $user= $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $user->data_iscrizione= date("Y");

            if ($this->Users->save($user)) {
                $this->Auth->setUser($user);
                $this->Flash->success(__('User: '. $user->nome .' has been saved.'));
                return $this->redirect(['controller' => 'Adhesions', 'action' => 'addRequest']);
            }
            $this->Flash->error(__('Unable to add your user.'));

        }
    }

    // Funziona per il login 
    public function login() 
    {
        if ($this->request->is('post')) {

            // identifica l'utente secondo le credenziali impostate
            $user = $this->Auth->identify();
            if ($user) {
                
                // salva le informazioni dell'utente nella sessione
                $this->Auth->setUser($user);

                $result= $this->Users->find()
                                    ->select(['ruolo'])    
                                    ->where(['email'=> $this->request->getData('email')])
                                    ->first();

                // Indirizzamento nella view corrispondente
                if ($result->ruolo == 'admin') {

                    return $this->redirect(['action'=> 'adminView']);
                }

                if ($result->ruolo == 'socio') {

                    return $this->redirect(['action'=> 'socioView']);
                }

                if ($result->ruolo == 'guest') {

                    return $this->redirect(['action'=> 'guestView']);
                }
                                        
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    // Funzione dell'user admin
    public function adminView() 
    {
        $this->set(['user' => $this->request->getSession()->read('Auth.User.email')]);
    }

    // Funzione dell'user socio
    public function socioView() 
    {
        $this->set(['user' => $this->request->getSession()->read('Auth.User.email')]);
    }

    // Funzione dell'user guest
    public function guestView() 
    {
        $this->set(['user' => $this->request->getSession()->read('Auth.User.email')]);
    }

    // Funzione per il logout
    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

}
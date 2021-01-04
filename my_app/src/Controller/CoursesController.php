<?php

namespace App\Controller;

class CoursesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout']);              

    }

    public function addCourse()
    {
        $corso= $this->Courses->newEntity();
        if ($this->request->is('post')) {
            $corso = $this->Courses->patchEntity($corso, $this->request->getData());

            if ($this->Courses->save($corso)) {
                $this->Flash->success(__('Corso: '. $corso->nome .' has been saved.'));
                return $this->redirect(['controller' => 'Users','action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your course.'));

        }
    }

    public function editCourse()
    {
        if ($this->request->is('post')) {
            $nome= $this->request->getData('nome');

            $corso= $this->Courses->get(['nome' => $nome]);

            $corso->numero_ore= $this->request->getData('numero_ore');
            $corso->numero_iscritti= $this->request->getData('numero_iscritti');

            if ($this->Courses->save($corso)) {
                $this->Flash->success(__('Corso: '. $corso->nome .' has been updated.'));
                return $this->redirect(['controller' => 'Users','action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your course.'));

        }
    }

    public function showCourses()
    {
        $corsi = $this->Courses->find('all');
        $this->set(['corsi' => $corsi]);
    }

}
<?php
App::uses('AppController', 'Controller');

class ServersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }

    public function index() {
        $this->Server->recursive = 0;
        $this->set('servers', $this->paginate());
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Server->create();
            $this->Server->set('user_id', $this->Auth->user('id'));
            if ($this->Server->save($this->request->data)) {
                $this->Session->setFlash(__('The server has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The server could not be saved. Please, try again.'), 'flash_failure');
            }
        }
        $lans = $this->Server->Lan->find('list');
        $this->set(compact('lans'));
    }

    public function edit($id = null) {
        if (!$this->Server->exists($id)) {
            throw new NotFoundException(__('Invalid server'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Server->read(null, $id);
            if ($this->Server->save($this->request->data)) {
                $this->Session->setFlash(__('The server has been saved'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The server could not be saved. Please, try again.'), 'flash_failure');
            }
        } else {
            $options = array('conditions' => array('Server.' . $this->Server->primaryKey => $id));
            $this->request->data = $this->Server->find('first', $options);
        }
        $lans = $this->Server->Lan->find('list');
        $this->set(compact('lans'));
    }

    public function delete($id = null) {
        $this->Server->id = $id;
        if (!$this->Server->exists()) {
            throw new NotFoundException(__('Invalid server'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Server->delete()) {
            $this->Session->setFlash(__('Server deleted'), 'flash_success');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Server was not deleted'), 'flash_failure');
        $this->redirect(array('action' => 'index'));
    }


    public function isAuthorized() {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it, so can an admin
        if (in_array($this->action, array('edit', 'delete'))) {
            $serverId = $this->request->params['pass'][0];
            if ($this->Server->isOwnedBy($serverId, $this->user['User']['id']) || $this->Auth->User('role') == 'admin') {
                return true;
            } else {
                return false;
            }
        }

        return parent::isAuthorized();
    }
}

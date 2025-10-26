<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Muestras Controller
 *
 * @property \App\Model\Table\MuestrasTable $Muestras
 */
class MuestrasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Muestras->find();
        $muestras = $this->paginate($query);

        $this->set(compact('muestras'));
    }

    /**
     * View method
     *
     * @param string|null $id Muestra id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $muestra = $this->Muestras->get($id, contain: []);
        $this->set(compact('muestra'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $muestra = $this->Muestras->newEmptyEntity();
        if ($this->request->is('post')) {
            $muestra = $this->Muestras->patchEntity($muestra, $this->request->getData());
            if ($this->Muestras->save($muestra)) {
                $this->Flash->success(__('La muestra ha sido registrada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La muestra no pudo ser registrada. Inténtalo de nuevo.'));
        }
        $this->set(compact('muestra'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Muestra id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $muestra = $this->Muestras->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $muestra = $this->Muestras->patchEntity($muestra, $this->request->getData());
            if ($this->Muestras->save($muestra)) {
                $this->Flash->success(__('La muestra {0} ha sido actualizada.', $id));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La muestra {0} no pudo ser actualizada. Inténtalo de nuevo.', $id));
        }
        $this->set(compact('muestra'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Muestra id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $muestra = $this->Muestras->get($id);
        if ($this->Muestras->delete($muestra)) {
            $this->Flash->success(__('La muestra {0} ha sido borrada.', $id));
        } else {
            $this->Flash->error(__('La muestra {0} no pudo ser borrada. Inténtalo de nuevo.', $id));
        }

        return $this->redirect(['action' => 'index']);
    }
}

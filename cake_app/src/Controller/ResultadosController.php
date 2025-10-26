<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Resultados Controller
 *
 */
class ResultadosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Resultados->find();
        $resultados = $this->paginate($query);

        $this->set(compact('resultados'));
    }

    /**
     * View method
     *
     * @param string|null $id Resultado id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resultado = $this->Resultados->get($id, contain: []);
        $this->set(compact('resultado'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resultado = $this->Resultados->newEmptyEntity();
        if ($this->request->is('post')) {
            $resultado = $this->Resultados->patchEntity($resultado, $this->request->getData());
            if ($this->Resultados->save($resultado)) {
                $this->Flash->success(__('El resultado ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar el resultado. Inténtalo de nuevo.'));
        }
        $list_muestras = $this->Resultados->Muestras->find('list')->toArray();
        $this->set(compact('resultado', 'list_muestras'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Resultado id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resultado = $this->Resultados->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resultado = $this->Resultados->patchEntity($resultado, $this->request->getData());
            if ($this->Resultados->save($resultado)) {
                $this->Flash->success(__('El resultado {0} ha sido actualizado.', $id));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo actualizar el resultado {0}. Inténtalo de nuevo.', $id));
        }
        $this->set(compact('resultado'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Resultado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resultado = $this->Resultados->get($id);
        if ($this->Resultados->delete($resultado)) {
            $this->Flash->success(__('El resultado {0} ha sido borrado.', $id));
        } else {
            $this->Flash->error(__('No se pudo borrar el resultado {0}. Inténtalo de nuevo.', $id));
        }

        return $this->redirect(['action' => 'index']);
    }
}

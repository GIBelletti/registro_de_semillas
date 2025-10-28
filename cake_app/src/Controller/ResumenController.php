<?php
namespace App\Controller;

use App\Controller\AppController;

class ResumenController extends AppController
{
    public function index()
    {
        // Leer filtros desde query string
        $query = $this->request->getQuery();
        $conditions = [];

        // Filtros opcionales: nombre (contains)
        if (!empty($query['codigo_de_muestra'])) {
            $conditions['Muestras.codigo_de_muestra LIKE'] = '%' . $query['codigo_de_muestra'] . '%';
        }
        if (!empty($query['especie'])) {
            $conditions['Muestras.especie LIKE'] = '%' . $query['especie'] . '%';
        }
        if (!empty($query['start_date']) and !empty($query['end_date'])) {
            if ($query['start_date'] <= $query['end_date']) {
                $conditions['DATE(Muestras.fecha_resgistro) >= '] = $query['start_date'];
                $conditions['DATE(Muestras.fecha_resgistro) <= '] = $query['end_date'];
            } else {
                $this->Flash->error(__('El tiempo de inicio debe ser inferior al tiempo de fin.'));
                $muestras = $this->paginate($this->fetchTable('Muestras')->find());
                $this->set(compact('muestras', 'query'));
                $this->set('_serialize', ['muestras']);
                return;
            }
        } elseif (!empty($query['start_date'])) {
            $conditions['DATE(Muestras.fecha_resgistro) >= '] = $query['start_date'];
        } elseif (!empty($query['end_date'])) {
            $conditions['DATE(Muestras.fecha_resgistro) <= '] = $query['end_date'];
        }

        $muestrasQuery = $this->fetchTable('Muestras')->find()
            ->contain(['Resultados'])
            //->where(['Resultados.codigo_de_muestra IS NOT NULL'])
            ->where($conditions);
        
        $muestras = $this->paginate($muestrasQuery);

        $this->set(compact('muestras', 'query'));
        $this->set('_serialize', ['muestras']);

    }
}
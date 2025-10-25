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
        if (!empty($query['especie'])) {
            $conditions['Muestras.especie LIKE'] = '%' . $query['especie'] . '%';
        }

        $muestrasQuery = $this->fetchTable('Muestras')->find()
            ->contain(['Resultados'])
            ->where(['Resultados.codigo_de_muestra IS NOT NULL'])
            ->where($conditions);
        
        $muestras = $this->paginate($muestrasQuery);

        $this->set(compact('muestras', 'query'));
        $this->set('_serialize', ['muestras']);

    }
}
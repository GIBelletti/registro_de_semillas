


<div class="resumen-index">
    <h3>Resumen de Muestras y Resultados</h3>
    <?= $this->Form->create(null, ['type' => 'get', 'valueSources' => ['query']]) ?>
    <div style="margin-bottom:1rem;">
        <?= $this->Form->control('codigo_de_muestra', ['label' => 'Cod. de muestra', 'value' => $query['codigo_de_muestra'] ?? '']) ?>
        <?= $this->Form->control('especie', ['label' => 'Especie', 'value' => $query['especie'] ?? '']) ?>
        <tr>
            <?php
                echo 'Fecha de registro';
                echo $this->Form->control('start_date', ['label' => 'A partir de: ', 'value' => $query['start_date'] ?? '', 'type' => 'date']);
                echo $this->Form->control('end_date', ['label' => 'Hasta: ', 'value' => $query['end_date'] ?? '', 'type' => 'date']);
            ?>
        </tr>
        <?= $this->Form->button(__('Filtrar')) ?>
        <?= $this->Html->link('Limpiar filtros', ['action' => 'index']) ?>
    </div>
    <?= $this->Form->end() ?>
    
    <?php
        $time = $this->loadHelper('Time');
    ?>
    <table>
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Muestras.codigo_de_muestra', 'Cod. Muestra') ?></th>
                <th><?= $this->Paginator->sort('Muestras.empresa', 'Empresa') ?></th>
                <th><?= $this->Paginator->sort('Muestras.especie', 'Especie') ?></th>
                <th><?= $this->Paginator->sort('Resultados.poder_germinativo', 'Poder germinativo') ?></th>
                <th><?= $this->Paginator->sort('Resultados.pureza', 'Pureza') ?></th>
                <th>Materiales inertes</th>
                <th><?= $this->Paginator->sort('Muestras.fecha_resgistro', 'Fecha de registro') ?></th>
                <!--<th>Acciones</th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($muestras as $muestra): ?>
                <tr>
                    <td><?= h($muestra->codigo_de_muestra) ?></td>
                    <td><?= h($muestra->empresa) ?></td>
                    <td><?= h($muestra->especie) ?></td>
                    <td>
                        <?php
                        if (empty($muestra->resultado)) {
                            echo '-';
                        } else {
                            echo h($muestra->resultado->poder_germinativo);
                        };
                        ?>
                    </td>
                    <td>
                        <?php
                        if (empty($muestra->resultado)) {
                            echo '-';
                        } else {
                            echo h($muestra->resultado->pureza);
                        };
                        ?>
                    </td>
                    <td>
                        <?php
                        if (empty($muestra->resultado)) {
                            echo '-';
                        } else {
                            if (empty($muestra->resultado->materiales_inertes)) {
                                echo '-';
                            } else {
                                echo h($muestra->resultado->materiales_inertes);
                            }
                        };
                        ?>
                    </td>
                    <td><?= $time->format($muestra->fecha_resgistro, 'dd/MM/YYYY HH:mm') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registros (total {{count}})')) ?></p>
    </div>
</div>
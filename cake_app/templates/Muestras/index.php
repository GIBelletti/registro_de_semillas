<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Muestra> $muestras
 */
?>
<div class="muestras index content">
    <?= $this->Html->link(__('Registrar Muestra'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Muestras') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Codigo_de_muestra') ?></th>
                    <th><?= $this->Paginator->sort('Especie') ?></th>
                    <th><?= $this->Paginator->sort('Numero_de_presinto') ?></th>
                    <th><?= $this->Paginator->sort('Cantidad_de_semillas') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($muestras as $muestra): ?>
                <tr>
                    <td><?= h($muestra->codigo_de_muestra) ?></td>
                    <td><?= h($muestra->especie) ?></td>
                    <td><?= $this->Number->format($muestra->numero_de_presinto) ?></td>
                    <td><?= $muestra->cantidad_de_semillas === null ? '' : $this->Number->format($muestra->cantidad_de_semillas) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Detalles'), ['action' => 'view', $muestra->codigo_de_muestra]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $muestra->codigo_de_muestra]) ?>
                        <?= $this->Form->postLink(
                            __('Borrar'),
                            ['action' => 'delete', $muestra->codigo_de_muestra],
                            [
                                'method' => 'delete',
                                'confirm' => __('¿Estás seguro de que quieres borrar la muestra: {0}?', $muestra->codigo_de_muestra),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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
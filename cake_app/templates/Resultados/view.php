<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $resultado
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Resultado'), ['action' => 'edit', $resultado->codigo_de_muestra], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Borrar Resultado'), ['action' => 'delete', $resultado->codigo_de_muestra], ['confirm' => __('¿Estás seguro de que quieres borrar el resultado: {0}?', $resultado->codigo_de_muestra), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lista de Resultados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Agregar Resultado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="resultados view content">
            <h3><?= h($resultado->codigo_de_muestra) ?></h3>
            <table>
                <tr>
                    <th><?= __('Codigo De Muestra') ?></th>
                    <td><?= h($resultado->codigo_de_muestra) ?></td>
                </tr>
                <tr>
                    <th><?= __('Poder Germinativo') ?></th>
                    <td><?= number_format($resultado->poder_germinativo, 2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pureza') ?></th>
                    <td><?= number_format($resultado->pureza, 2) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Materiales Inertes') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($resultado->materiales_inertes)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
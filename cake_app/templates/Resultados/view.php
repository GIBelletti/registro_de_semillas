<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $resultado
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Resultado'), ['action' => 'edit', $resultado->codigo_de_muestra], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Resultado'), ['action' => 'delete', $resultado->codigo_de_muestra], ['confirm' => __('Are you sure you want to delete # {0}?', $resultado->codigo_de_muestra), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Resultados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Resultado'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="resultados view content">
            <h3><?= h($resultado->codigo_de_muestra) ?></h3>
            <table>
                <tr>
                    <th><?= __('Codigo De Muestra') ?></th>
                    <td><?= $this->Number->format($resultado->codigo_de_muestra) ?></td>
                </tr>
                <tr>
                    <th><?= __('Poder Germinativo') ?></th>
                    <td><?= $this->Number->format($resultado->poder_germinativo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pureza') ?></th>
                    <td><?= $this->Number->format($resultado->pureza) ?></td>
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
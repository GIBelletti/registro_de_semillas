<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Muestra $muestra
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Acciones') ?></h4>
            <?= $this->Html->link(__('Editar Muestra'), ['action' => 'edit', $muestra->codigo_de_muestra], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Borrar Muestra'), ['action' => 'delete', $muestra->codigo_de_muestra], ['confirm' => __('¿Estás seguro de que quieres borrar la muestra: {0}?', $muestra->codigo_de_muestra), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listado de Muestras'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Registrar nueva Muestra'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="muestras view content">
            <h3><?= h($muestra->especie) ?></h3>
            <table>
                <tr>
                    <th><?= __('Codigo De Muestra') ?></th>
                    <td><?= h($muestra->codigo_de_muestra) ?></td>
                </tr>
                <tr>
                    <th><?= __('Especie') ?></th>
                    <td><?= h($muestra->especie) ?></td>
                </tr>
                <tr>
                    <th><?= __('Numero De Presinto') ?></th>
                    <td><?= $this->Number->format($muestra->numero_de_presinto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cantidad De Semillas') ?></th>
                    <td><?= $muestra->cantidad_de_semillas === null ? '' : $this->Number->format($muestra->cantidad_de_semillas) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Empresa') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($muestra->empresa)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
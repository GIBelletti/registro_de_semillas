<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Muestra $muestra
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Muestra'), ['action' => 'edit', $muestra->codigo_de_muestra], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Muestra'), ['action' => 'delete', $muestra->codigo_de_muestra], ['confirm' => __('Are you sure you want to delete # {0}?', $muestra->codigo_de_muestra), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Muestras'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Muestra'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="muestras view content">
            <h3><?= h($muestra->especie) ?></h3>
            <table>
                <tr>
                    <th><?= __('Codigo De Muestra') ?></th>
                    <td><?= $this->Number->format($muestra->codigo_de_muestra) ?></td>
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
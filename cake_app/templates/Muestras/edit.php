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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $muestra->codigo_de_muestra],
                ['confirm' => __('Are you sure you want to delete # {0}?', $muestra->codigo_de_muestra), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Muestras'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="muestras form content">
            <?= $this->Form->create($muestra) ?>
            <fieldset>
                <legend><?= __('Edit Muestra') ?></legend>
                <?php
                    echo $this->Form->control('especie');
                    echo $this->Form->control('numero_de_presinto');
                    echo $this->Form->control('empresa');
                    echo $this->Form->control('cantidad_de_semillas');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

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
            <?= $this->Html->link(__('Lista Muestras'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="muestras form content">
            <?= $this->Form->create($muestra) ?>
            <fieldset>
                <legend><?= __('Registrar Muestra') ?></legend>
                <?php
                    echo $this->Form->control('especie');
                    echo $this->Form->control('numero_de_presinto');
                    echo $this->Form->control('empresa');
                    echo $this->Form->control('cantidad_de_semillas');
                    echo $this->Form->control('fecha_extraccion', [
                        'type' => 'date'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Registrar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

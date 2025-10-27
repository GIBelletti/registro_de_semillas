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
            <?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $resultado->codigo_de_muestra],
                ['confirm' => __('¿Estás seguro de que quieres borrar el resultado: {0}?', $resultado->codigo_de_muestra), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Resultados'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="resultados form content">
            <?= $this->Form->create($resultado) ?>
            <fieldset>
                <legend><?= __('Edit Resultado') ?></legend>
                <?php
                    echo $this->Form->control('poder_germinativo', [
                        'type' => 'number',
                        'step' => '0.01',
                        'min' => '0.0',
                        'max' => '1.0'
                    ]);
                    echo $this->Form->control('pureza', [
                        'type' => 'number',
                        'step' => '0.01',
                        'min' => '0.0',
                        'max' => '1.0'
                    ]);
                    echo $this->Form->control('materiales_inertes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Aplicar cambios')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

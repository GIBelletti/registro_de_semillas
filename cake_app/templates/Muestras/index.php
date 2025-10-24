<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Muestra> $muestras
 */
?>
<div class="muestras index content">
    <?= $this->Html->link(__('New Muestra'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Muestras') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('codigo_de_muestra') ?></th>
                    <th><?= $this->Paginator->sort('especie') ?></th>
                    <th><?= $this->Paginator->sort('numero_de_presinto') ?></th>
                    <th><?= $this->Paginator->sort('cantidad_de_semillas') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($muestras as $muestra): ?>
                <tr>
                    <td><?= $this->Number->format($muestra->codigo_de_muestra) ?></td>
                    <td><?= h($muestra->especie) ?></td>
                    <td><?= $this->Number->format($muestra->numero_de_presinto) ?></td>
                    <td><?= $muestra->cantidad_de_semillas === null ? '' : $this->Number->format($muestra->cantidad_de_semillas) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $muestra->codigo_de_muestra]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $muestra->codigo_de_muestra]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $muestra->codigo_de_muestra],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $muestra->codigo_de_muestra),
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
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
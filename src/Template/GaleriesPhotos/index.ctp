<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GaleriesPhoto[]|\Cake\Collection\CollectionInterface $galeriesPhotos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Galeries Photo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Galeries'), ['controller' => 'Galeries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Galery'), ['controller' => 'Galeries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="galeriesPhotos index large-9 medium-8 columns content">
    <h3><?= __('Galeries Photos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creted_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('galery_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('caption') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($galeriesPhotos as $galeriesPhoto): ?>
            <tr>
                <td><?= $this->Number->format($galeriesPhoto->id) ?></td>
                <td><?= h($galeriesPhoto->creted_at) ?></td>
                <td><?= h($galeriesPhoto->updated_at) ?></td>
                <td><?= $galeriesPhoto->has('galery') ? $this->Html->link($galeriesPhoto->galery->name, ['controller' => 'Galeries', 'action' => 'view', $galeriesPhoto->galery->id]) : '' ?></td>
                <td><?= h($galeriesPhoto->photo) ?></td>
                <td><?= h($galeriesPhoto->caption) ?></td>
                <td><?= h($galeriesPhoto->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $galeriesPhoto->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $galeriesPhoto->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $galeriesPhoto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galeriesPhoto->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GaleriesVideo[]|\Cake\Collection\CollectionInterface $galeriesVideos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Galeries Video'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Galeries'), ['controller' => 'Galeries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Galery'), ['controller' => 'Galeries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="galeriesVideos index large-9 medium-8 columns content">
    <h3><?= __('Galeries Videos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creted_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('galery_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('caption') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($galeriesVideos as $galeriesVideo): ?>
            <tr>
                <td><?= $this->Number->format($galeriesVideo->id) ?></td>
                <td><?= h($galeriesVideo->creted_at) ?></td>
                <td><?= h($galeriesVideo->updated_at) ?></td>
                <td><?= $galeriesVideo->has('galery') ? $this->Html->link($galeriesVideo->galery->name, ['controller' => 'Galeries', 'action' => 'view', $galeriesVideo->galery->id]) : '' ?></td>
                <td><?= h($galeriesVideo->link) ?></td>
                <td><?= h($galeriesVideo->caption) ?></td>
                <td><?= h($galeriesVideo->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $galeriesVideo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $galeriesVideo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $galeriesVideo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galeriesVideo->id)]) ?>
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

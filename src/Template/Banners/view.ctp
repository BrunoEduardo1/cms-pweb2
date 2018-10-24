<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Banner $banner
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Banner'), ['action' => 'edit', $banner->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Banner'), ['action' => 'delete', $banner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $banner->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Banners'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Banner'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="banners view large-9 medium-8 columns content">
    <h3><?= h($banner->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($banner->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subtitle') ?></th>
            <td><?= h($banner->subtitle) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($banner->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= h($banner->photo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($banner->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creted At') ?></th>
            <td><?= h($banner->creted_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated At') ?></th>
            <td><?= h($banner->updated_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $banner->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

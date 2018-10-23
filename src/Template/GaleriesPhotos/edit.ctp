<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GaleriesPhoto $galeriesPhoto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $galeriesPhoto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $galeriesPhoto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Galeries Photos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Galeries'), ['controller' => 'Galeries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Galery'), ['controller' => 'Galeries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="galeriesPhotos form large-9 medium-8 columns content">
    <?= $this->Form->create($galeriesPhoto) ?>
    <fieldset>
        <legend><?= __('Edit Galeries Photo') ?></legend>
        <?php
            echo $this->Form->control('creted_at');
            echo $this->Form->control('updated_at');
            echo $this->Form->control('galery_id', ['options' => $galeries]);
            echo $this->Form->control('photo');
            echo $this->Form->control('caption');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page $page
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $page->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pages Photos'), ['controller' => 'PagesPhotos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pages Photo'), ['controller' => 'PagesPhotos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pages form large-9 medium-8 columns content">
    <?= $this->Form->create($page) ?>
    <fieldset>
        <legend><?= __('Edit Page') ?></legend>
        <?php
            echo $this->Form->control('creted_at');
            echo $this->Form->control('updated_at');
            echo $this->Form->control('title');
            echo $this->Form->control('text');
            echo $this->Form->control('photo');
            echo $this->Form->control('slug');
            echo $this->Form->control('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

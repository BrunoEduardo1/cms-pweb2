<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page[]|\Cake\Collection\CollectionInterface $pages
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Page'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pages Photos'), ['controller' => 'PagesPhotos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pages Photo'), ['controller' => 'PagesPhotos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pages index large-9 medium-8 columns content">
    <h3><?= __('Pages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creted_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pages as $page): ?>
            <tr>
                <td><?= $this->Number->format($page->id) ?></td>
                <td><?= h($page->creted_at) ?></td>
                <td><?= h($page->updated_at) ?></td>
                <td><?= h($page->title) ?></td>
                <td><?= h($page->slug) ?></td>
                <td><?= h($page->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $page->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $page->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?>
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
<!-- Conteúdo da página -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Usuários</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
         <a class="btn btn-sm btn-outline-secondary" href="<?=$this->Url->build('/users/add')?>">Novo Usuário</a>
     </div>
</div>
</div>

<div class="row">
     <!-- Col table -->
    <div class="col-12 mx-auto mb-5 mt-5">
      <table class="table table-striped table-lg table-responsive-md">
        <thead>
          <tr>
            <th>Código</th>
            <th>Adicionado em</th>
            <th>Título</th>
            <th>Publica</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($pages as $page): ?>
            <tr>
                <td><?= $this->Number->format($page->id) ?></td>
                <td><?= h($page->creted_at) ?></td>
                <td><?= h($page->updated_at) ?></td>
                <td><?= h($page->title) ?></td>
                <td><?= h($page->slug) ?></td>
                <td><?= h($page->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fas fa-eye']), ['action' => 'view', $page->id], ['class' => 'btn btn-info btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom','title' => 'Preview', 'escape' => false]) ?>

                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fas fa-edit']), ['action' => 'edit', $page->id], ['class' => 'btn btn-primary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom','title' => 'Editar', 'escape' => false]) ?>

                    <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fas fa-trash']), ['action' => 'delete', $page->id],['class' => 'btn btn-danger btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom','title' => 'Excluir', 'escape' => false, 'confirm' => __('Deletar a página "{0}"?', $page->title)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
          <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('Primeira')) ?>
                <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('Próxima') . ' >') ?>
                <?= $this->Paginator->last(__('Última') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, exibindo {{current}} de {{count}} registro(s).')]) ?></p>
          </div>
    </div>
    <!-- /Col table -->
</div>
<!-- /row -->


</main>
<!-- FIM Conteúdo da página -->

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Galery $galery
 */
?>
<!-- Conteúdo da página -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= ucwords(strtolower(h($galery->name))) ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <a class="btn btn-sm btn-outline-secondary" href="<?=$this->Url->build('/galeries/edit/'.$galery->id)?>"><i class="fas fa-edit"></i> Editar</a>
    </div>
</div>
</div>
<?php if (empty(!$galery->content)): ?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body pb-2 pt-2">
               <div class="row">
                    <div class="col text-jutify my-auto">
                        <p class="text-jutify"><?= strtolower(h($galery->content)) ?></p>
                    </div>
                     <div class="text-right">
                    <a href="javascript:history.back(-1);" class="btn btn-outline-secondary btn-sm">Voltar </a>                   
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
<?php endif; ?>
<div class="row">
    <div class="col">
        <?php if (!empty($galery->galeries_videos)): ?>
            <div class="row">
            <?php foreach ($galery->galeries_videos as $galeriesVideos): ?>
                <div class="col-12 col-md-3">   
                <div class="card" style="width: 18rem;">
                  <div class="embed-responsive embed-responsive-16by9">
                    <?=$galeriesVideos->link?>
                  </div>
                  <div class="card-body">
                    <p class="card-text"><?= h($galeriesVideos->caption) ?><br>
                        <?= h($galeriesVideos->creted_at->format('d/m/Y H:i')) ?></p>
                    <?= $this->Html->link($this->Html->tag('i', '', ['class' => 'fas fa-edit']), ['controller' => 'GaleriesVideos','action' => 'edit', $galeriesVideos->id], ['class' => 'btn btn-primary btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom','title' => 'Editar', 'escape' => false]) ?>
                    <?= $this->Form->postLink($this->Html->tag('i', '', ['class' => 'fas fa-trash']), ['controller' => 'GaleriesVideos','action' => 'delete', $galeriesVideos->id],['class' => 'btn btn-danger btn-sm', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom','galeriesVideos' => 'Excluir', 'escape' => false, 'confirm' => __('deseja deletar o vídeo  "{0}"?', $galeriesVideos->caption)]) ?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- /row -->
<div class="row">
    <div class="col">
       
        <?php if (!empty($galery->galeries_photos)): ?>
        <h4><?= __('Related Galeries Photos') ?></h4>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Creted At') ?></th>
                <th scope="col"><?= __('Updated At') ?></th>
                <th scope="col"><?= __('Galery Id') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Caption') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($galery->galeries_photos as $galeriesPhotos): ?>
            <tr>
                <td><?= h($galeriesPhotos->id) ?></td>
                <td><?= h($galeriesPhotos->creted_at) ?></td>
                <td><?= h($galeriesPhotos->updated_at) ?></td>
                <td><?= h($galeriesPhotos->galery_id) ?></td>
                <td><?= h($galeriesPhotos->photo) ?></td>
                <td><?= h($galeriesPhotos->caption) ?></td>
                <td><?= h($galeriesPhotos->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'GaleriesPhotos', 'action' => 'view', $galeriesPhotos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'GaleriesPhotos', 'action' => 'edit', $galeriesPhotos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'GaleriesPhotos', 'action' => 'delete', $galeriesPhotos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galeriesPhotos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
<!-- /row -->
</main>
<!-- FIM Conteúdo da página -->

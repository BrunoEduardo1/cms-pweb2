<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
    <div class="row mt-5" style="margin: 0;">
        <div class="col-sm-10 col-md-6 col-lg-5 mx-auto my-5">
            <div class="card" id="loginPageCard">
                <div class="card-body">
                    <h4>Cadastro</h4>
                    <?= $this->Form->create() ?>
                        <?= $this->Form->control('login',[ 'label' => 'Usuário','class'=>'form-control', 'required' => 'required', 'placeholder' => 'Ex: hood2018'])?>
                        <div class="invalid-feedback text-center">Por favor insira o nome do usuário</div>
                        <?= $this->Form->control('password', ['label'=> 'Senha', 'class'=>'form-control', 'required' => 'required', 'placeholder' => 'Senha']) ?>
                        <div class="row mt-2">
                            <div class="col-12 my-2 text-right">
                                <?= $this->Form->button('Cadastrar', ['class' => 'btn btn-success btn-block']) ?>
                            </div>
                            <div class="col-12 my-2">
                                <a class="btn btn-secundary btn-block" href="<?= $this->url->build('/users/login'); ?>">Voltar<!--  para a Home --></a>
                            </div>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
<div class="container">
	<div class="row mt-5" style="margin: 0;">
		<div class="col-sm-10 col-md-6 col-lg-5 mx-auto my-5">
			<div class="card" id="loginPageCard">
				<div class="card-body">
					<h4>Login</h4>
					<?= $this->Form->create() ?>
						<?= $this->Form->control('login',[ 'label' => 'Usuário','class'=>'form-control', 'required' => 'required'])?>
						<div class="invalid-feedback text-center">Por favor insira o nome do usuário</div>
						<?= $this->Form->control('password', ['label'=> 'Senha', 'class'=>'form-control', 'required' => 'required']) ?>
						<div class="row">
							<div class="col-12">
								<a href="<?= $this->url->build('/'); ?>" style="font-size: 12px; color: #343434">Esqueceu a senha?</a>
							</div>
							<div class="col-12">
								<a href="<?= $this->url->build('/'); ?>" style="font-size: 12px; color: #343434">Cadastrar</a>
							</div>
							<div class="col-6 my-2">
								<a class="btn btn-outline-danger" href="<?= $this->url->build('/pages/inicial'); ?>">Voltar<!--  para a Home --></a>
							</div>
							<div class="col-6 my-2 text-right">
								<?= $this->Form->button('Entrar', ['class' => 'btn btn-outline-primary']) ?>
							</div>
						</div>
					<?= $this->Form->end() ?>
				</div>
			</div>
		</div>
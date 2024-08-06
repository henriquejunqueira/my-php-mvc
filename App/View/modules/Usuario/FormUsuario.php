
<!DOCTYPE>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE-edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Cadastro de Usuários</title>
		<?php include 'header.php'; ?>
	</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-4">
				<h3>Cadastro de Usuários</h3>
				<form method="post" action="/usuario/form/salvar">
					<input type="hidden" value="<?= $model->id; ?>" name="id" />
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div>
									<label for="nome">Nome:</label> <input type="text" id="nome"
										name="nome" value="<?= $model->nome ?>" class="form-control"
										placeholder="Digite o nome... " />
								</div>
							</div>
							<div class="col-md-6">
								<div>
									<label for="dataNascimento">Data Nascimento:</label> <input
										type="date" id="dataNascimento" name="dataNascimento"
										value="<?= isset($model->dataNascimento) ? $model->dataNascimento->format('d-m-Y') : ''; ?>"
										class="form-control" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div>
									<label for="telefone">Telefone:</label> <input type="text"
										id="telefone" name="telefone" value="<?= $model->telefone ?>"
										class="form-control" placeholder="Digite o telefone... " />
								</div>
							</div>
							<div class="col-md-6">
								<div>
									<label for="endereco">Endereço:</label> <input type="text"
										id="endereco" value="<?= $model->endereco ?>" name="endereco"
										class="form-control" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div>
									<label for="cidade">Cidade:</label> <input type="text"
										id="cidade" name="cidade" value="<?= $model->cidade ?>"
										class="form-control" placeholder="Digite a cidade... " />
								</div>
							</div>
							<div class="col-md-6">
								<div>
									<label for="data_nascimento">UF:</label> <select
										class="form-control" name="uf">
										<option>Selecione UF</option>
                        					<?php foreach ($ufs as $uf){
                        					$selecionado = $model->uf == $uf;
                        					    ?>
                        					<option value="<?= $uf ?>" <?php $selecionado ? "selected" : ""?>><?= $uf?></option>
                        					<?php }?>
                        				</select>
								</div>
							</div>
						</div>
					</div>

					<div class="mt-4">
						<button type="submit" class="btn btn-success">
							<i class="bi bi-check-circle"></i> Salvar
						</button>
						<a href="/usuario" class="btn btn-danger"><i
							class="bi bi-x-circle"></i> Cancelar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
	<?php include 'footer.php'; ?>
</html>
<!DOCTYPE>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE-edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Lista de Usuarios</title>
		<?php include 'header.php'; ?>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Lista de Usuarios</h1>
					<a class="btn btn-success" href="/usuario/form"><i class="bi bi-person-add"></i> Novo Usuário</a>
					<table class="table">
            			<thead>
            				<tr>
            					<th>Id</th>
            					<th>Nome</th>
            					<th>Data Nascimento</th>
            					<th>Telefone</th>
            					<th>Endereço</th>
            					<th>Cidade</th>
            					<th>UF</th>
            					<th>Ações</th>
            				</tr>
            			</thead>
            			<tbody>
            			<?php foreach($model->rows as $item): ?>
            				<tr>
            					<td><?= $item->id; ?></td>
            					<td><?= $item->nome; ?></td>
            					<td><?= $item->dataNascimento; ?></td>
            					<td><?= $item->telefone; ?></td>
            					<td><?= $item->endereco; ?></td>
            					<td><?= $item->cidade; ?></td>
            					<td><?= $item->uf; ?></td>
            					<td>
            						<a class="btn btn-primary" href="/usuario/form?id=<?= $item->id; ?>"><i class="bi bi-pencil-square"></i> Editar</a>
            						<a class="btn btn-danger" href="/usuario/delete?id=<?= $item->id; ?>"><i class="bi bi-trash3"></i> Excluir</a>
            					</td>
            				</tr>
            			<?php endforeach; ?>
            			
            			<?php if(count($model->rows) == 0): ?>
            				<tr>
            					<td colspan="5" class="alert alert-warning">Nenhum registro encontrado!</td>
            				</tr>
            			<?php endif; ?>
            			</tbody>
            		</table>
				</div>
			</div>
		</div>
	</body>
	<?php include 'footer.php'; ?>
</html>
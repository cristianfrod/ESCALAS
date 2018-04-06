<div class="container">
	<div class="content">
		<div class="center">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Reporte o Problema</h3>
					</div>
					<div class="panel-body">
						<form method="POST" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">

									<?php
                  echo form_error('type');
                  echo form_error('description');
									if ($message == 1) {

										echo '<div id="mensagem">';
										echo '<div class="alert alert-danger">';
										echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
										echo '<i class="fa fa-exclamation-circle"></i> Problema!!!</div>';
										echo '</div>';
									}
									if ($message == 2) {

										echo '<div id="mensagem">';
										echo '<div class="alert alert-success">';
										echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
										echo '<i class="fa fa-exclamation-circle"></i> Enviado!</div>';
										echo '</div>';
									}
									?>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="type">Tipo do Problema</label>

									<select class="form-control" name="type" required>
										<option value="0" disabled selected>Selecione o tipo</option>
										<option value="Trocas">Trocas</option>
                    <option value="Sistema">Sistema</option>
                    <option value="Ortográfico">Ortográfico</option>
									</select>
								</div>
							</div>
              <div class="row">
                <div class="col-md-12">
                  <label for="description">Descrição do problema</label>

                  <textarea name="description" rows="3" cols="40" class="form-control" maxlength="250"></textarea>
                </div>
              </div>
              <!-- MAX_FILE_SIZE deve preceder o campo input -->
              <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
              <!-- O Nome do elemento input determina o nome da array $_FILES -->
              Enviar imagem do erro: <input name="userfile" type="file" />
              <br>
							<div class="row">
								<div class="col-md-12">
									<input class="btn btn-sm btn-primary btn-block" type="submit" name="submit" value="CADASTRAR">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</div>

<?php 
$ip=$_SERVER['REMOTE_ADDR'];

echo $ip;

?>


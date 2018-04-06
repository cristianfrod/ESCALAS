<div class="container">
	<div class="content">
		<div class="center">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Exclua a escala de um Usuário</h3>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="row">
								<div class="col-md-12">
									<?php
									if ($message == 1) {

										echo '<div id="mensagem">';
										echo '<div class="alert alert-success">';
										echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
										echo '<i class="fa fa-exclamation-circle"></i> Exclusão efetuada!</div>';
										echo '</div>';
									}
									if ($message == 2) {

										echo '<div id="mensagem">';
										echo '<div class="alert alert-danger">';
										echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
										echo '<i class="fa fa-exclamation-circle"></i> Nenhuma entrada para o Usuário Selecionado!</div>';
										echo '</div>';
									}
									?>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<?php echo form_error('userSelection')?>
									<label for="userSelection">Usuário</label>
									<select class="form-control" name="userSelection" required>
										<option value="0" disabled selected>Selecione o Usuário</option>
										<?php
										foreach ($users->result() as $option) {
											echo '<option value="'.$option->idUser.'">'.$option->nickname.'</option>';
										}
										?>
									</select>
								</div>
								<div class="form-group col-md-6">
									<?php echo form_error('reason')?>
									<label for="reason">Motivo</label>
									<select type="text" name="reason" class="form-control">
										<option value="0" disabled selected>Selecione o motivo</option>
										<option value="Atestado">Atestado</option>
										<option value="Ferias">Férias</option>
										<option value="Outros">Outros</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-6">
									<label for="startDate">Data Inicial</label>
									<input type="date" name="startDate" class="form-control" id="startDate">
								</div>
								<div class="form-group col-md-6">
									<label for="endDate">Data Final</label>
									<input type="date" name="endDate" class="form-control" id="endDate">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<label for="idSchedule">Escala </label><span>  *Selecione somente se for para uma data específica.</span>
									<br>
									<div class="radio-inline">
										<input type="radio" name="idSchedule" value="1"> 07:00 - 13:00
									</div>
									<br>
									<div class="radio-inline">
										<input type="radio" name="idSchedule" value="2"> 13:00 - 18:00
									</div>
									<br>
									<div class="radio-inline">
										<input type="radio" name="idSchedule" value="3"> 18:00 - 23:00
									</div>
									<br>
									<div class="radio-inline">
										<input type="radio" name="idSchedule" value="4"> 23:00 - 07:00
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label for="text">Observações</label>
									<textarea name="text" rows="3" cols="40" class="form-control" maxlength="500"></textarea>
								</div>
							</div>
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


<script language="javascript">
	document.getElementById("startDate").valueAsDate = new Date();
	document.getElementById("endDate").valueAsDate = new Date();
	// new Date(new Date().setMonth(new Date().getMonth()+1));
</script>

<div class="container">
	<div class="content">
		<div class="center">
			<div class="col-md-4"></div>
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Adicione uma escala</h3>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="row">
								<div class="col-md-12">
									<?php
									if ($message == 1) {

										echo '<div id="mensagem">';
										echo '<div class="alert alert-danger">';
										echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
										echo '<i class="fa fa-exclamation-circle"></i> Entrada entre datas j� existente!</div>';
										echo '</div>';
									}
									if ($message == 2) {

										echo '<div id="mensagem">';
										echo '<div class="alert alert-success">';
										echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
										echo '<i class="fa fa-exclamation-circle"></i> Entrada efetuada!</div>';
										echo '</div>';
									}
									?>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<?php echo form_error('userSelection')?>
									<label for="groupSelection">Usu&aacute;rio</label>
									<select class="form-control" name="userSelection" required>
										<option value="0" disabled selected>Selecione o Usu&aacute;rio</option>
										<?php
										foreach ($users->result() as $option) {
											echo '<option value="'.$option->idUser.'">'.$option->nickname.'</option>';
										}
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<?php echo form_error('startDate')?>
									<label for="startDate">Data Inicial</label>
									<input type="date" name="startDate" class="form-control" id="startDate">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-12">
									<?php echo form_error('endDate')?>
									<label for="endDate">Data Final</label>
									<input type="date" name="endDate" class="form-control" id="endDate">
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<?php echo form_error('idSchedule')?>
									<label for="radio-inline">Escala</label>
								</div>
								<div class="form-group col-md-12">
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
									<input class="btn btn-sm btn-primary btn-block" type="submit" name="submit" value="ADICIONAR">
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









		<!-- <div class="form-group row">
			<div class="col-xs-12">
				<label class="col-form-label" for="groupSelection">Equipe</label>
				<select class="form-control col-xs-12" name="groupSelection" required>
					<option value="Selecione"></option>
					<!?php
						foreach ($groups->result() as $option) {
							echo '<option value="'.$option->idGroup.'">'.$option->groupName.'</option>';
						}
					?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-12">
				<label class="col-form-label" for="scheduleSelection">Escala</label>
				<select class="form-control col-xs-3" name="scheduleSelection">
					<option value="0" selected="selected">Seleccione a Escala...</option>
					<option value="1">Escala comum 0800</option> -->
					<!-- <option value="Selecione">Escala de final de ano</option> -->
					<!-- <!?php
					//ser� implementado posteriormente as escalas din�micas
					//	foreach ($nickname as $value) {
					//		echo '<option value="'.$value->nickname.'">'.$value->nickname.'</option>';
					//	}
					?>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-xs-6">
				<label class="col-form-label" for="startDate">Data Inicial</label>
				<input class="form-control"  name="startDate" id="startDate" type="date">
			</div>
			<div class="col-xs-6">
				<label class="col-form-label" for="endDate">Data Final</label>
				<input class="form-control"  name="endDate" id="endDate" type="date">
			</div>
		</div>
		<div class="form-group row">
			<center>
			<div class="col-xs-4">
				<label class="col-form-label">Escala para Data Inicial</label><br>
				<input type="radio" name="idSchedule" value="1"> 07:00 - 13:00 <br>
				<input type="radio" name="idSchedule" value="2"> 13:00 - 18:00 <br>
				<input type="radio" name="idSchedule" value="3"> 18:00 - 23:00 <br>
				<input type="radio" name="idSchedule" value="5"> Folga <br>
				<input type="radio" name="idSchedule" value="6"> Descanso <br>
				<input type="radio" name="idSchedule" value="7"> Sobreaviso <br>
				<input type="checkbox" name="check4" id="check4" value="4"> 23:00 - 07:00 <br>
			</div>
		</center>
		</div>
		<center>
		<div class="form-group row">
			<div class="col-xs-4">
				<input class="btn btn-sm btn-primary"type="submit" name="submit" value="CADASTRAR">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-4">
		<!?php
		if ($message == 1) {

		echo '<div id="mensagem">';
		echo '<div class="alert alert-danger">';
		echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
		echo '<i class="fa fa-exclamation-circle"></i> Entrada entre datas j� existente!</div>';
		echo '</div>';
		}
		if ($message == 2) {

		echo '<div id="mensagem">';
		echo '<div class="alert alert-success">';
		echo '<a class="close" data-dismiss="alert" aria-hidden="true">x</a>';
		echo '<i class="fa fa-exclamation-circle"></i> Entrada efetuada!</div>';
		echo '</div>';
		}
		?>
			</div>
		</div>
		</center>
	</form>
</div-->

<script language="javascript">
	document.getElementById("startDate").valueAsDate = new Date();
	document.getElementById("endDate").valueAsDate = new Date();
	//new Date(new Date().setMonth(new Date().getMonth()+1));
</script>


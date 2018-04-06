<div id="renderPDF" class="container">
	<div class="content">
		<div class="center">
      <div class="col-md-1">
      </div>
			<form method="post">
      <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-2">
					<label for=""><?php echo form_error('year'); ?></label>
          <select class="form-control" name="year" id="year">
						<option value=""  disabled>Selecione o Ano</option>
            <option value="2018" selected>2018</option>
          </select>
        </div>
	    <!-- </div>
			<div class="row"> -->
				<!-- <div class="col-md-4">
				</div> -->
        <div class="col-md-2">
					<label for=""><?php echo form_error('month'); ?></label>
          <select class="form-control" name="month" id="month">
						<option value="" selected disabled>Selecione um mês</option>
            <option value="01">Janeiro</option>
            <option value="02">Fevereiro</option>
            <option value="03">Março</option>
            <option value="04">Abril</option>
            <option value="05">Maio</option>
            <option value="06">Junho</option>
            <option value="07">Julho</option>
            <option value="08">Agosto</option>
            <option value="09">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
          </select>
        </div>
	    <!-- </div>
			<div class="row"> -->
				<!-- <div class="col-md-4">
				</div> -->
				<div class="col-md-2">
					<button type="submit" class="form-control btn btn-primary">
  					<i class="fas fa-file-pdf "></i> GERAR PDF
					</button>
				</div>
      </div>
			</form>
      <hr>
			<div id="print">
				<div class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-8" id="report">
						<table style="width:100%" >
							<tr>
								<th><img src=<?= base_url()."assets/img/sesp.jpg" ?> align="left" alt="" height="150" width="150"/></th>
								<th>
									<center>
										<div>
											<span style="font-size:15px; line-height: 100%">SECRETARIA DE ESTADO DA SEGURANÇA PÚBLICA E ADMINISTRAÇÃO PENITENCIÁRIA</span>
										</div>
										<div>&nbsp;</div>
										<div>
											<span style="font-size:12px;">CENTRO INTEGRADO DE COMANDO E CONTROLE REGIONAL</span>
										</div>
										<p>&nbsp;</p>
									</center>
								</th>
							</tr>
						</table>
						<br>
						<div style="text-align: center;">
							<div style="font-size:13px;"><strong>RELATÓRIO DE PRISÕES E ATENDIMENTOS</strong></div>
							<br>
							<div style="text-align: left;">
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Durante o mês de <span id="selectedmonth"></span> de <span id="selectedyear"></span>,
									com o apoio deste Centro Integrado de Comando e Controle - CICCR, foram realizadas prisões de pessoas monitoradas
									e não-monitoradas, da maneira que se segue:
							</div>
							<br>
							<div style="text-align: left;">
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O CICCR faz o atendimento de várias instituições, representado na tabela abaixo:
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
					</div>
					<div class="col-md-4">
						<div class="table-responsive">
							<table class="table-bordered" width="100%">
								<!-- <caption>Atendimentos Registrados em <span id="table1month"></span></caption> -->
								<thead>
									<tr class="bg-info">
										<th width="80%"> Instituição</th>
										<th width="20%"><center>Total</center></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="80%">Polícia Militar PR</td>
										<td width="20%" id="i0"></td>
									</tr>
									<tr>
										<td width="80%">Polícia Civil PR</td>
										<td width="20%" id="i1"></td>
									</tr>
									<tr>
										<td width="80%">Guarda Municipal</td>
										<td width="20%" id="i2"></td>
									</tr>
									<tr>
										<td width="80%">Polícia Rodoviária Federal</td>
										<td width="20%" id="i3"></td>
									</tr>
									<tr>
										<td width="80%">Polícia Federal</td>
										<td width="20%" id="i4"></td>
									</tr>
									<tr>
										<td width="80%">PM outros estados</td>
										<td width="20%" id="i5"></td>
									</tr>
									<tr>
										<td width="80%">PC outros estados</td>
										<td width="20%" id="i6"></td>
									</tr>
									<tr>
										<td width="80%">Depen</td>
										<td width="20%" id="i7"></td>
									</tr>
									<tr>
										<td width="80%">Outras Instituições</td>
										<td width="20%" id="i8"></td>
									</tr>
									<tr >
										<td width="80%"class="bg-info">Total</td>
										<td width="20%" id="total"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-8" style="text-align: left;">
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Os quadros a seguir mostram os dados divididos por pessoas monitoradas e não monitoradas:
					</div>
					<br>
				</div>
				<div class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-4">
						<div class="table-responsive">
							<table class="table-bordered" width="100%">
								<!-- <caption>Prisões de Monitorados em <span id="table2month"></span></caption> -->
								<thead>
								<tr class="bg-info">
									<th width="80%" >Total de prisões de monitorados</th>
									<th width="20%" id="totalmon"></th>
								</tr>
								</thead>
								<tbody>
									<tr>
										<td width="80%">Cumprimento de Mandado</td>
										<td width="20%" id="mpmon"></td>
									</tr>
									<tr>
										<td width="80%">Flagrante</td>
										<td width="20%" id="flagrantemon"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-4">
						<div class="table-responsive">
							<table class="table-bordered" width="100%">
								<!-- <caption>Prisões de Não Monitorados em <span id="table3month"></span></caption> -->
								<thead>
								<tr class="bg-info">
									<th width="80%">Total de prisões de não monitorados</th>
									<th width="20%" id="totalnaomon"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td width="80%">Cumprimento de Mandado</td>
									<td width="20%" id="mpnaomon"></td>
								</tr>
								<tr>
									<td width="80%">Flagrante</td>
									<td width="20%" id="flagrantenaomon"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8" style="text-align: left;">
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cada atendimento é registrado pelo 0800,
						quando um atendimento tem mais de uma natureza, ex: roubo e mandado de prisão, a natureza cadastrada é o flagrante.
						Nesta tabela temos a natureza que gerou os atendimentos feitos pelo 0800 do CICCR:
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<div class="table-responsive">
						<table class="table-bordered" width="100%">
							<!-- <caption>Natureza dos Atendimentos com Prisões em <span id="table4month"></span></caption> -->
							<thead>
								<tr class="bg-info">
									<th width="70%"> Natureza do Atendimento</th>
									<th width="15%"><center>Quantidade</center></th>
									<!-- <th width="15%"><center>% Prop.</center></th> -->
								</tr>
							</thead>
							<tbody>
								<tr>
									<td width="70%">Roubo</td>
									<td width="15%" id="roubo"></td>
									<!-- <td width="15%" id="proubo"></td> -->
								</tr>
								<tr>
									<td width="70%">Furto</td>
									<td width="15%" id="furto"></td>
									<!-- <td width="15%" id="pfurto"></td> -->
								</tr>
								<tr>
									<td width="70%">Tráfico</td>
									<td width="15%" id="trafico"></td>
									<!-- <td width="15%" id="ptrafico"></td> -->
								</tr>
								<tr>
									<td width="70%">Homicídio</td>
									<td width="15%" id="homicidio"></td>
									<!-- <td width="15%" id="phomicidio"></td> -->
								</tr>
								<tr>
									<td width="70%">Porte/Posse de arma de fogo</td>
									<td width="15%" id="porte"></td>
									<!-- <td width="15%" id="pporte"></td> -->
								</tr>
								<tr>
									<td width="70%">Receptação</td>
									<td width="15%" id="receptacao"></td>
									<!-- <td width="15%" id="preceptacao"></td> -->
								</tr>
								<tr>
									<td width="70%">Mandado de Prisão</td>
									<td width="15%" id="mp"></td>
									<!-- <td width="15%" id="pmp"></td> -->
								</tr>
								<tr>
									<td width="70%">Outros</td>
									<td width="15%" id="outros"></td>
									<!-- <td width="15%" id="poutros"></td> -->
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-8" style="text-align: left;">
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O plantão 0800 do CICCR visualiza cada ocorrência
						que é gerada no sistema SISCOP e faz a verificação junto ao Agente Penitenciário do Depen que por sua vez verifica
						se houve suspeita de envolvimento de algum monitorado na ocorrência. Caso seja verificado o envolvimento, o CICCR
						faz contato para averiguação,resultando em prisão ou não, são geradas as ocorrências que partiram do CICCR.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<div class="table-responsive">
						<table class="table-bordered" width="100%">
							<!-- <caption>Ocorrências que partiram do CICCR em <span id="table5month"></span></caption> -->
							<thead>
								<tr class="bg-info">
									<th width="80%"></th>
									<th width="20%"><center>Total</center></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td width="80%">Partiu do CICCR</td>
									<td width="20%" id="partiudociccr"></td>
								</tr>
								<tr>
									<td width="80%">Partiu do CICCR e resultou em prisão</td>
									<td width="20%" id="partiudociccrcomprisao"></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
  </div>
</div>
<br>
<br>


<!-- <script src="http://cdn.rawgit.com/MrRio/jsPDF/master/dist/jspdf.min.js"></script>
<script src="http://html2canvas.hertzen.com/build/html2canvas.js"></script> -->



<script type="text/javascript">

	var ocorrencia = '';


	$('#criaPdf').click(function () {
		// $.post("printReport",{ocorrencia : ocorrencia});
		window.open($.post("relatorio",{ocorrencia : ocorrencia}));
	});



	$('#month').change(function () {
		var months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
		var month = document.getElementById('month').value;
		var year = document.getElementById('year').value;
		var monthName = [months[month-1]];
		$('#selectedmonth').html(monthName);
		$('#selectedyear').html(year);
		$('#table1month').html(monthName);
		$('#table2month').html(monthName);
		$('#table3month').html(monthName);
		$('#table4month').html(monthName);
		$('#table5month').html(monthName);

		$.post("getAttendancePerMonth",{month:month, year:year},
			function(attendance){
				attendance = $.parseJSON(attendance);
				total = 0;
				for (var i = 0; i < attendance.length; i++) {
					$('#i'+i).html('<center>'+attendance[i]+'</center>');
					total = total + parseInt(attendance[i]);
				}
				$('#total').html('<center>'+total+'</center>');
			}
		);

		$.post("getPrisaoMon",{month:month, year:year},
		function(prisaomon){
			prisaomon = $.parseJSON(prisaomon);
			// console.log(prisaomon);
			mpprisaomon = parseInt(prisaomon[0]);
			flaprisaomon = parseInt(prisaomon[1]);

			totalmon = mpprisaomon + flaprisaomon;
			mpmon = (mpprisaomon*100/totalmon).toFixed(1);
			flagrantemon = (flaprisaomon*100/totalmon).toFixed(1);
			//  console.log(total,mpprisaomon,flaprisaomon);
			if (isNaN(mpmon)){
    		mpmon = 0;
			};
			if (isNaN(flagrantemon)){
    		flagrantemon = 0;
			};
			if (isNaN(totalmon)){
				totalmon = 0;
			};
			$('#mpmon').html('<center>'+ mpmon + '%</center>');
			$('#flagrantemon').html('<center>'+ flagrantemon + '%</center>');
			$('#totalmon').html('<center>'+totalmon+'</center>');
			}
		);

		$.post("getPrisaoNaoMon",{month:month, year:year},
		function(prisaonaomon){
			prisaonaomon = $.parseJSON(prisaonaomon);
			mpprisaonaomon = parseInt(prisaonaomon[0]);
			flaprisaonaomon = parseInt(prisaonaomon[1]);

			totalnaomon = mpprisaonaomon + flaprisaonaomon;
			mpprisaonaomon = (mpprisaonaomon*100/totalnaomon).toFixed(1);
			flagrantenaomon = (flaprisaonaomon*100/totalnaomon).toFixed(1);
			// console.log(mpprisaonaomon);
			if (isNaN(mpprisaonaomon)){
    		mpprisaonaomon = 0;
			};
			if (isNaN(flagrantenaomon)){
    		flagrantenaomon = 0;
			};
			if (isNaN(totalnaomon)){
				totalnaomon = 0;
			};
			$('#mpnaomon').html('<center>'+ mpprisaonaomon + '%</center>');
			$('#flagrantenaomon').html('<center>'+ flagrantenaomon + '%</center>');
			$('#totalnaomon').html('<center>'+totalnaomon+'</center>');
			}
		);


		$.post("getNaturezaAtendimento",{month:month, year:year},
			function(natureza){
				natureza = $.parseJSON(natureza);
				var totalsolicitacoes = 0;
	      for (var i = 0; i < natureza.length; i++) {
	        var totalsolicitacoes = totalsolicitacoes + parseInt(natureza[i]);
	      }
	      var porcentagem = new Array();
	      for (var i = 0; i < 8; i++) {
	        porcentagem.push((parseInt(natureza[i]) * 100 / totalsolicitacoes).toFixed(1) + '%');
	      }
				$('#roubo').html('<center>'+natureza[0]+'</center>');
				// $('#proubo').html('<center>'+porcentagem[0]+'</center>');
				$('#furto').html('<center>'+natureza[1]+'</center>');
				// $('#pfurto').html('<center>'+porcentagem[1]+'</center>');
				$('#trafico').html('<center>'+natureza[2]+'</center>');
				// $('#ptrafico').html('<center>'+porcentagem[2]+'</center>');
				$('#homicidio').html('<center>'+natureza[3]+'</center>');
				// $('#phomicidio').html('<center>'+porcentagem[3]+'</center>');
				$('#porte').html('<center>'+natureza[4]+'</center>');
				// $('#pporte').html('<center>'+porcentagem[4]+'</center>');
				$('#receptacao').html('<center>'+natureza[5]+'</center>');
				// $('#preceptacao').html('<center>'+porcentagem[5]+'</center>');
				$('#mp').html('<center>'+natureza[6]+'</center>');
				// $('#pmp').html('<center>'+porcentagem[6]+'</center>');
				$('#outros').html('<center>'+natureza[7]+'</center>');
				// $('#poutros').html('<center>'+porcentagem[7]+'</center>');
			}
		);

		$.post("getOcorrenciaCiccr",{month:month, year:year},
			function(ocorrencia){
				ocorrencia = $.parseJSON(ocorrencia);
				$('#partiudociccr').html('<center>'+ocorrencia[0]+'</center>');
				$('#partiudociccrcomprisao').html('<center>'+ocorrencia[1]+'</center>');
			}
		);
	});
</script>

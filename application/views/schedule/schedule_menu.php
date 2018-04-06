<div class="container"><!-- Conteúdo -->
  	<div class="starter-template">
        <center>
        <div class="list-group" style="text-align:left; ">
        	<?php
        	if ($idPermission == 1){
        		echo '
          	<a href="schedule_viewByMembers"  class="list-group-item"><i class="fa fa-search fa-2x pull-left"></i>
	            <h4 class="list-group-item-heading">Consulta de escalas</h4>
	            <p class="list-group-item-text">Consulta a escalas mensais </p>
          	</a>
            <a href="schedule_exchange"  class="list-group-item"><i class="fa fa-retweet fa-2x pull-left"></i>
            	<h4 class="list-group-item-heading">Trocas de Serviços </h4>
            	<p class="list-group-item-text">Trocas de serviços devem ser feitas com uma semana de antecedência </p>
          	</a>
          	';
            }
            if ($idPermission == 2){
        		echo '
            <a href="schedule_create"  class="list-group-item"><i class="fa fa-calendar fa-2x pull-left"></i>
	            <h4 class="list-group-item-heading">Escalar equipes</h4>
	            <p class="list-group-item-text">Criação de escala do 0800 </p>
          	</a>
            <a href="schedule_memberEntry"  class="list-group-item"><i class="fa fa-calendar-o fa-2x pull-left"></i>
              <h4 class="list-group-item-heading">Adicionar escalas de Membros </h4>
              <p class="list-group-item-text">Adicionar ou criar escalas por membros</p>
            </a>
            <a href="schedule_memberDeleteEntry"  class="list-group-item"><i class="fa fa-calendar-o fa-2x pull-left"></i>
              <h4 class="list-group-item-heading">Excluir escalas de Membros </h4>
              <p class="list-group-item-text">Excluir ou criar escalas por membros</p>
            </a>
            <a href="schedule_viewByGroups"  class="list-group-item"><i class="fa fa-desktop fa-2x pull-left"></i>
              <h4 class="list-group-item-heading">Visualizar Escalas por Grupo </h4>
              <p class="list-group-item-text">Visualização e impressão de escala do 0800 </p>
            </a>
            <a href="schedule_viewByMembers"  class="list-group-item"><i class="fa fa-desktop fa-2x pull-left"></i>
              <h4 class="list-group-item-heading">Visualizar Escalas por Membros </h4>
              <p class="list-group-item-text">Visualização e impressão de escala do 0800 </p>
            </a>
            <a href="schedule_newGroup"  class="list-group-item"><i class="fa fa-pencil-square-o fa-2x pull-left"></i>
            <h4 class="list-group-item-heading">Gerenciar Equipes </h4>
            <p class="list-group-item-text">Configuração de equipes do 0800 </p>
            </a>
            <a href="schedule_groups"  class="list-group-item"><i class="fa fa-user-plus fa-2x pull-left"></i>
            <h4 class="list-group-item-heading">Gerenciar Membros das Equipes </h4>
            <p class="list-group-item-text">Configuração de membros nas equipes do 0800 </p>
            </a>
            <a href="schedule_exchange"  class="list-group-item"><i class="fa fa-retweet fa-2x pull-left"></i>
	            <h4 class="list-group-item-heading">Troca de serviços Extraordinários </h4>
	            <p class="list-group-item-text">Troca de serviços pelo administrador </p>
          	</a>
            <a href="schedule_exchangeAdjustment"  class="list-group-item"><i class="fa fa-wrench fa-2x pull-left"></i>
              <h4 class="list-group-item-heading">Ajuste de Escalas </h4>
              <p class="list-group-item-text">Alteração na escala sem troca </p>
            </a>
          	<a href="#"  class="list-group-item"><i class="fa fa-file-text fa-2x pull-left"></i>
	            <h4 class="list-group-item-heading">Relatórios </h4>
	            <p class="list-group-item-text">Relatórios de trocas realizadas </p>
          	</a>
          	';
            }
            ?>
        </div>
      	</center>
      	<center>
      	<div class="list-group" style="text-align:left; ">
      		<a href="support" class="list-group-item"><i class="fa fa-info-circle fa-2x pull-left"></i>
            <h4 class="list-group-item-heading">Suporte</h4>
            <p class="list-group-item-text">Reportar algum erro ao suporte</p>
          	</a>
        </div>
  		</center>
	</div>
</div><!-- /.container -->

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <form class="form-signin text-center well" name="alterasenha" method="post" id="alterasenha" action="Inside/first_login">
    <h3>NOVA SENHA</h3>
    <br>
    <input type="password" name="newpassword" class="form-control" placeholder="Nova senha" id="newpassword" required autofocus value="">
    <br/>
    <input type="password" name="newpasswordconf" class="form-control" placeholder="Nova senha (confirmação)" id="newpasswordconf" required value="">
    <br/>

    <div class="form-group"><button type="submit" class="btn btn-primary btn-lg btn-block ">Alterar</button></div>
    <?php

    if ($message==1) {
      echo '<div id="mensagem">';
      echo '<div class="alert alert-danger">';
      echo '<a class="close" data-dismiss="alert" href="" aria-hidden="true">x</a>';
      echo '<i class="fa fa-exclamation-circle"></i> Confirmação Inválida!</div>';
      echo '</div>';
    }
    if ($message==2) {
      echo '<div id="mensagem">';
      echo '<div class="alert alert-danger">';
      echo '<a class="close" data-dismiss="alert" href="" aria-hidden="true">x</a>';
      echo '<i class="fa fa-exclamation-circle"></i> Insira uma senha diferente!</div>';
      echo '</div>';
    }
    if ($message==3) {
      echo '<div id="mensagem">';
      echo '<div class="alert alert-danger">';
      echo '<a class="close" data-dismiss="alert" href="" aria-hidden="true">x</a>';
      echo '<i class="fa fa-exclamation-circle"></i> Contacte o ADM!</div>';
      echo '</div>';
    }
    if ($message==4) {
      echo '<div id="mensagem">';
      echo '<div class="alert alert-success">';
      echo '<a class="close" data-dismiss="alert" href="" aria-hidden="true">x</a>';
      echo '<i class="fa fa-exclamation-circle"></i> Alterada!</div>';
      echo '</div>';
    }
    ?>
  </form>
</div>

<div class="modal fade " id="myModal2" role="dialog">
  <div class="form-signin text-center well" id="mensagem">
  <div class="alert alert-success">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  <i class="fa fa-exclamation-circle"></i> Senha Registrada!</div>
  </div>
</div>


<?php
if ($x == 'y'){

  echo  '<script type="text/javascript">';
  echo  "window.onload = function(){";
  if ($message==4){
    echo  "$('#myModal2').modal();";
  }else{
    echo  "$('#myModal').modal();";
  }
  echo  "}";
  echo  "</script>";
}
?>

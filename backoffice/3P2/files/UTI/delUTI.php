<br><br>
<?php
$c = $_REQUEST['cod'];
if ($c == 0) {
?>
  <center>
    <h1>Em 10 segundos a pagina será redirecionada para o listar utilizadores</h1>
    <br>
    <button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#myModal'>
      Razão do erro
    </button>
  </center>
  <div class='modal' id='myModal'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h4 class='modal-title'>Não é Possivel eliminar</h4>
          <button type='button' class='close' data-dismiss='modal'>&times;</button>
        </div>
        <div class='modal-body'>
          <p>O motivo de não ser possivel eliminar é o facto de estar a tentar eliminar o admin por defeito</p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
        </div>
      </div>
    </div>
  </div>
<?PHP
  echo "<meta http-equiv=refresh content=10;URL=index.php?cmd=UTIlist>";
} else {

  if ($_SESSION['codtipoUti'] == 13) {
    $sql = "select * from Utilizadores where codUti = $c";
    $res = $lig->query($sql);
    $lin = $res->fetch_array();

    $img = $lin['img'];
    if ($img != "./backoffice/3P2/files/IMG/defeito.png")
      unlink("../../" . $img);

    $sql3 = "delete from ListaDesejos where codigUti = $c";
    $lig->query($sql3) or die("ERRO:delete na tabela desejos");

    $sql1 = "delete from Utilizadores where codUti = $c";
    $lig->query($sql1) or die("ERRO:delete na tabela Utilizadores");

    echo "Registo eliminado";
    echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=UTIlist>";
  } else {
    echo "<meta http-equiv=refresh content=1;URL=index.php?cmd=home>";
  }
}
?>
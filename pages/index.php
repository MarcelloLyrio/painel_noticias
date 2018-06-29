<?php
session_start();

@include("header.php");
@include("body.php");
?>
<footer><div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4"><div class="center-block">Versão: 2.0</div></div>
    </div></footer>
<!-- Bootstrap core JavaScript
 ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jQuery-2.2.0.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../bower_components/holderjs/holder.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!--<script src="../assets/js/ie10-viewport-bug-workaround.js"></script>-->

<script>
       $(document).ready(function(){
        $('#example').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Desculpe, nada encontrado!",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro encontrado!",
                "search":         "Pesquisar:",
                "next":       "Próximo",
                "previous":   "Anterior",
                "infoFiltered": "(filtrado de um total de _MAX_ registros)"
            }
        });
    });
</script>
</body>
</html>
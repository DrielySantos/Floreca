<?php
    require_once './head.php';
    include_once './conexao.php';

    $sql = "SELECT * from cliente";
    $resultado=$conn->prepare($sql);
    $resultado->execute();

    $sql2 = "SELECT * from funcionario";
    $resultado2=$conn->prepare($sql2);
    $resultado2->execute();


?>

<form method="POST" action="control-serv.php" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Cadastro de serviço</h3>
                </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nome">Cliente</label>
                    <input type="text" class="form-control" name="nome">    
                </div>
            </div> 

            <div class="col-md-3">
                <div class="form-group">
                    <label for="valor">Preço</label>
                    <input type="text" name="valor" class="form-control" onchange="this.value = this.value.replace( /,/g, '.')">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="descricao">Procedimento</label>
                    <input type="text" name="descricao" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="categoria">Local do corpo</label>
                    <select name="categoria" class="form-control">                  
                       
                        <option value="facial">Facial </option>
                        <option value="corporal">Corporal </option>
                        <option value="ambos">Ambos </option>

                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="funcionario">Funcionário</label>
                    <select name="funcionario" class="form-control">
                         
                        <?php

                            if (($resultado2) and ($resultado2->rowCount() !=0)) {
                                while ($linha2 = $resultado2->fetch(PDO::FETCH_ASSOC)) {
                                  extract($linha2);
                            
                        ?>

                        <option value="<?php echo $idfuncionario;?>"> <?php echo $nome; ?> </option>

                        <?php
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">    
            <div class="col-md-12 text-center">
                <input type="submit" class="btn btn-primary" name="btncad" value="Enviar">
            </div>
        </div>
</form>

<?php
    require_once './footer-admin.php';
?>
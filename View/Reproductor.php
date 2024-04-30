<?php include_once "../Templates/header.php"; ?>
<?php include_once "../Class/Videos.php"; ?>
<?php include_once "../Class/Departamentos.php"; ?>
<div class="f-col br10 w100p h100p color8 overflow-auto border-box">
    <form action="" method="post" class="f-col p10">
        <div class="f-row">
            <input type="text" name="titulo" id="titulo" value="<?= Videos::Ver($_POST["ver"])->titulo ?>" class="center index100 color8 mayus white w100p negrita fz30" readonly>
            <div class="f-row jc-c a-c color3 br10 negrita mayus hp10 pointer" id="editar">
                Editar
            </div>
        </div>
        
        <!-- <small class="w100p white center">
            <?php // (Videos::Ver($_POST["ver"])->id_departamento == 1) ? "prensa" : "" ; ?>
            <?php // (Videos::Ver($_POST["ver"])->id_departamento == 2) ? "programacion" : "" ; ?>
        </small> -->
        <div class="f-col p20">
            <video class="w100p" controls controlsList="nodownload">
                <source src="<?= Videos::Ver($_POST["ver"])->ruta_apache?>" type="video/mp4">
            </video>
            <a href="<?= Videos::Ver($_POST["ver"])->ruta_apache ?>" download class="color2 p10 center white negrita mayus">Descargar</a>
        </div>
        <div class="f-row gap10 wrap">
            <textarea name="detalles" id="detalles" cols="30" rows="10" placeholder="Detalles" class="w100p p10 color7 white" readonly><?= Videos::Ver($_POST["ver"])->detalles ?></textarea>
        </div>
        <br>
        <div class="f-row gap10 wrap">
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="" class="white">Area de cobertura</label>
                <input type="search" name="area" id="area" placeholder="Area de coberutra" class="p10 br5" value="<?= Videos::Ver($_POST["ver"])->des_area ?>" readonly>
            </div>
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="" class="white">Tipo de cobertura</label>
                <input type="search" name="tipo" id="tipo" placeholder="Area de coberutra" class="p10 br5" value="<?= Videos::Ver($_POST["ver"])->des_tipo ?>" readonly>
            </div>
        </div>
    </form>
</div>
<script src="../Js/Edicion1.js"></script>
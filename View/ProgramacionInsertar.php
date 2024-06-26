<?php include_once "../Templates/header.php"; ?>
<div class="f-col br10 p10 w100p h100p color8 overflow-hidden border-box white">
    <div class="p10 center mayus negrota fz30">
        VideoTeca - AREA DE PROGRAMACION
    </div>
    <small class="text4 center w100p">
        llene de manera correcta el presente formulario
    </small><br>
    <form action="../Request/Programacion.php" method="post" class="f-col gap10 overflow-auto" enctype="multipart/form-data">
        <div class="f-row w100p jc-b gap10 wrap">
            <div class="f-col mayus negrita flex-1">
                <div class="f-col gap10">
                    <label for="">Area de cobertura</label>
                    <input type="search" name="area" id="area" placeholder="Area de cobertura" class="p10 br5" autocomplete="off">
                </div>
                <div class="relative">
                    <div class="absolute color7 f-col w100p v-hidden" id="g_area">
                        <?php foreach(Areas::Mostrar() as $item):?>
                            <label for="" class="p10 hover8" id="a_<?= $item->id_area?>" onclick="LabelToInput('area', 'a_<?= $item->id_area?>')"><?= $item->des_area?></label>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="f-col gap10 mayus negrita flex-1">
                <div class="f-col gap10">
                    <label for="">Tipo de cobertura</label>
                    <input type="search" name="tipo" id="tipo" placeholder="Tipo de cobertura" class="p10 br5" autocomplete="off">
                </div>
                <div class="relative">
                    <div class="absolute color7 f-col w100p v-hidden" id="g_tipo">
                        <?php foreach(Tipos::Mostrar() as $item):?>
                            <label for="" class="p10 hover8" id="t_<?= $item->id_tipo?>" onclick="LabelToInput('tipo', 't_<?= $item->id_tipo?>')"><?= $item->des_tipo?></label>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="">Fecha de subida</label>
                <input type="date" name="fecha" id="fecha" value="<?= date('Y-m-d')?>" class="p10 br5" max="<?= date('Y-m-d')?>">
            </div>
        </div>
        <div class="f-row w100p jc-b gap10 wrap">
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="">Titulo</label>
                <input type="search" name="titulo" id="titulo" placeholder="Area de coberutra" class="p10 br5">
            </div>
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="">Descripcion del evento</label>
                <textarea name="detalles" id="detalles" cols="30" rows="1" placeholder="Descripcion..." class="p10 br5"></textarea>
            </div>
        </div>
        <div class="center p10 mayus negrita fz20">
            CONTRATO
        </div>
        <div class="f-row w100p jc-b gap10 wrap">
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="">Nro. de contrato</label>
                <input type="search" name="nro_contrato" id="nro_contrato" placeholder="Nro. de contrato" class="p10 br5">
            </div>
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="">Contrato</label>
                <input type="search" name="contrato" id="contrato" placeholder="Contrato" class="p10 br5">
            </div>
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="">Fecha de vencimiento</label>
                <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" value="<?= date('Y-m-d')?>" class="p10 br5" min="<?= date('Y-m-d')?>">
            </div>
        </div>
        <br>
        <div class="f-row w100p jc-b gap10 wrap">
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="">Seleccionar Video</label>
                <input type="file" name="video" id="video" class="p10" accept=".mp4">
            </div>
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="">Seleccionar miniatura</label>
                <input type="file" name="miniatura" id="miniatura" class="p10" accept="">
            </div>
            <button type="submit" name="subir" value="2" class="color2 white negrita mayus br10 hp20 pointer">
                Subir archivo
            </button>
        </div>
    </form>
</div>

<script src="../Js/Select1.js"></script>
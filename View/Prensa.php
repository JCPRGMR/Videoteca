<?php include_once "../Templates/header.php"; ?>
<?php include_once "../Class/Videos.php"; ?>
<div class="br10 w100p h100p color8 overflow-hidden border-box">
    <div class="mayus center fz30 text6 color7 negrita p10 br10 m10">
        area de prensa - rtp
    </div>
    <div class="p10 br10 f-row wrap gap10">
        <a href="PrensaInsertar.php" class="text2 b1 p10 hover2 br10 negrita flex-1 center transition02">
            CREAR REGISTRO
        </a>
        <a href="ReportesFiltro.php?dp=dpa" class="b1 negrita text4 hover4 p10 br10 flex-1 f-row jc-c a-c transition02">
            REPORTES PDF - EXCEL
        </a>
    </div>
    <div class="p10 br10 f-row wrap jc-b">
        <div></div>
        <input type="search" name="" id="Buscador" placeholder="Buscador..." class="p10 br5">
    </div>
    <div class="color1 m10 overflow-auto">
        <table class="color7 w100p h100p collapse" border="1">
            <thead class="">
                <th class="center white p10">CODIGO</th>
                <th class="center white p10">AREA</th>
                <th class="center white p10">TIPO</th>
                <th class="center white p10">TITULO</th>
                <th class="center white p10">VIDEO</th>
            </thead>
            <tbody id="body">
                <?php foreach(Videos::Mostrar(1) as $item):?>
                    <tr class="white">
                        <td class="color8 p10 center"><?= $item->cod_video ?></td>
                        <td class="color8 p10 center"><?= $item->des_area ?></td>
                        <td class="color8 p10 center"><?= $item->des_tipo ?></td>
                        <td class="color8 p10 center"><?= $item->titulo ?></td>
                        <td class="color8 p10 center">
                            <form action="Reproductor.php" method="post">
                                <button type="submit" name="ver" value="<?= $item->id_video ?>" class="color1 negrita pointer p10 mayus white br30">
                                    Ver video
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<script src="../Js/Buscador.js"></script>
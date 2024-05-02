<?php include_once "../Templates/header.php"; ?>
<?php include_once "../Class/Videos.php"; ?>
<div class="br10 w100p h100p color8 overflow-hidden border-box">
    <div class="mayus center fz30 text6 color7 negrita p10 br10 m10">
        area de programacion - rtp
    </div>
    <div class="p10 br10 f-row wrap gap10">
        <a href="ProgramacionInsertar.php" class="negrita white color2 p10 br10 flex-1 f-row jc-c a-c">
            CREAR REGISTRO
        </a>
        <a href="" class="white negrita color4 p10 br10 flex-1 f-row jc-c a-c">
            REPORTES PDF - EXCEL
        </a>
    </div>
    <div class="color1 m10 overflow-auto">
        <table class="color7 w100p h100p collapse" border="1">
            <thead class="">
                <th classw="center white p10">CODIGO</th>
                <th class="center white p10">AREA</th>
                <th class="center white p10">TIPO</th>
                <th class="center white p10">TITULO</th>
                <th class="center white p10">VIDEO</th>
            </thead>
            <tbody>
                <?php foreach(Videos::Mostrar(2) as $item):?>
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
<?php include_once "../Templates/header.php"; ?>
<?php include_once "../Class/Videos.php"; ?>
<div class="br10 w100p h100p color8 overflow-hidden border-box">
    <div class="mayus center fz30 text6 color7 negrita p10 br10 m10">
        GALERIA DE Programacion
    </div>
    <div class="color1 m10 overflow-auto">
        <?php foreach(Videos::Mostrar(2) as $item):?>
            <form action="Reproductor.php" method="post">
                <button type="submit" name="ver" value="<?= $item->id_video?>">
                    <img src="/programacion/miniaturas/<?= $item->miniatura ?>" alt="">
                </button>
            </form>
        <?php endforeach;?>
    </div>
</div>
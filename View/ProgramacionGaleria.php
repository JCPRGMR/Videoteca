<?php include_once "../Templates/header.php"; ?>
<?php include_once "../Class/Videos.php"; ?>
<div class="br10 w100p h100p color8 overflow-hidden border-box">
    <div class="mayus center fz30 text6 color7 negrita p10 br10 m10">
        GALERIA DE Programacion
    </div>
    <style>
        .play:hover{
            transition: .2s;
            opacity: 1;
            color: #fff;
        }
    </style>
    <div class="color7 m10 overflow-auto f-row gap10 p10">
        <?php foreach(Videos::Mostrar(2) as $item):?>
            <form action="Reproductor.php" method="post" class="">
                <button type="submit" name="ver" value="<?= $item->id_video?>" class="pointer relative" style="background-color: transparent;">
                    <img src="/programacion/miniaturas/<?= $item->miniatura ?>" alt="" width="200" height="200">
                    <div class="opacity0 play absolute color2 w100p p0 top0 h100p f-row jc-c a-c" style="background-color: transparent;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-play-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"/>
                        </svg>
                    </div>
                </button>
            </form>
        <?php endforeach;?>
    </div>
</div>
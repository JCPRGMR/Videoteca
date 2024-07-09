<?php include_once "../Class/Areas.php" ?>
<?php include_once "../Class/Tipos.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Css/Style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="h100vh w100p m0 overflow-auto">
    <main class="f-col h100p color7">
        <div class="f-col br10 p10 w100p h100p color8 overflow-hidden border-box white">
            <div class="p10 center mayus negrota fz30">
                VideoTeca - AREA DE PRENSA
            </div>
            <small class="text4 center w100p">
                llene de manera correcta el presente formulario
            </small><br>
            <form action="../Request/Prensa.php" method="post" class="f-col gap10" enctype="multipart/form-data">
                <div class="f-row w100p jc-b gap10 wrap">
                    <div class="f-col mayus negrita flex-1">
                        <div class="f-col gap10">
                            <label for="">Area de cobertura</label>
                            <input type="search" name="area" id="area" placeholder="Area de cobertura" class="p10 br5" autocomplete="off">
                        </div>
                        <div class="relative">
                            <div class="absolute color7 f-col w100p v-hidden" id="g_area">
                                <?php foreach (Areas::Mostrar() as $item) : ?>
                                    <label for="" class="p10 hover8 area" id="a_<?= $item->id_area ?>" onclick="LabelToInput('area', 'a_<?= $item->id_area ?>')"><?= $item->des_area ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="f-col gap10 mayus negrita flex-1">
                        <div class="f-col gap10">
                            <label for="">Tipo de contenido</label>
                            <input type="search" name="tipo" id="tipo" placeholder="Tipo de contenido" class="p10 br5" autocomplete="off">
                        </div>
                        <div class="relative">
                            <div class="absolute color7 f-col w100p v-hidden" id="g_tipo">
                                <?php foreach (Tipos::Mostrar() as $item) : ?>
                                    <label for="" class="p10 hover8 tipo" id="t_<?= $item->id_tipo ?>" onclick="LabelToInput('tipo', 't_<?= $item->id_tipo ?>')"><?= $item->des_tipo ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="f-col gap10 mayus negrita flex-1">
                        <label for="">Fecha del evento</label>
                        <input type="date" name="fecha" id="fecha" value="<?= date('Y-m-d') ?>" class="p10 br5" max="<?= date('Y-m-d') ?>" autocomplete="off">
                    </div>
                </div>
                <div class="f-row w100p jc-b gap10 wrap">
                    <div class="f-col gap10 mayus negrita flex-1">
                        <label for="">Descripcion del evento</label>
                        <textarea name="detalles" id="detalles" cols="30" rows="1" placeholder="Descripcion..." class="p10 br5"></textarea>
                    </div>
                    <div class="f-col gap10 mayus negrita flex-1">
                        <label for="">DEtalle de Contenido</label>
                        <input type="search" name="titulo" id="titulo" placeholder="Detalle de contenido" class="p10 br5" autocomplete="off">
                    </div>
                </div>
                <br>
                <div class="f-row w100p jc-b gap10 wrap">
                    <input type="file" name="video" id="video" class="p10" accept=".mp4" autocomplete="off">
                    <button type="submit" name="subir" value="1" class="color2 white negrita mayus br10 hp20 pointer" onclick="localStorage.clear()">
                        Subir archivo
                    </button>
                    <a href="../" class="color4 white f-col jc-c a-c hp10 negrita mayus br10" onclick="localStorage.clear()">Volver atras</a>
                </div>
            </form>
        </div>
        <div class="f-row w100p jc-b gap10 wrap">
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="">Titulo</label>
                <input type="search" name="titulo" id="titulo" placeholder="Area de cobertura" class="p10 br5" autocomplete="off">
            </div>
            <div class="f-col gap10 mayus negrita flex-1">
                <label for="">Descripcion del evento</label>
                <textarea name="detalles" id="detalles" cols="30" rows="1" placeholder="Descripcion..." class="p10 br5"></textarea>
            </div>
        </div>
        <br>
        <div class="f-row w100p jc-b gap10 wrap">
            <input type="file" name="video" id="video" class="p10" accept=".mp4" autocomplete="off">
            <button type="submit" name="subir" value="1" class="color2 white negrita mayus br10 hp20 pointer" onclick="localStorage.clear()">
                Subir archivo
            </button>
            <a href="Prensa.php" class="color4 white mayus negrita hp10 f-col jc-c a-c br10" onclick="localStorage.clear()">
                Volver atras
            </a>
        </div>
    </form>
</div>
>>>>>>> bbb139a96bcfa5a7d2691ea02c6497666556494a
<script src="../Js/Select1.js"></script>
<script src="../Js/RecuperarValores.js"></script>
<script>
    document.getElementById("area").addEventListener('input', function() {
        var searchTerm = this.value.toLowerCase();
        var labels = document.querySelectorAll('#g_area label')
        labels.forEach(function(label) {
            var labelText = label.textContent.toLowerCase();
            if (labelText.includes(searchTerm)) {
                label.style.display = 'block';
            } else {
                label.style.display = 'none';
            }
        });
    });
    document.getElementById("tipo").addEventListener('input', function() {
        var searchTerm = this.value.toLowerCase();
        var labels = document.querySelectorAll('#g_tipo label')
        labels.forEach(function(label) {
            var labelText = label.textContent.toLowerCase();
            if (labelText.includes(searchTerm)) {
                label.style.display = 'block';
            } else {
                label.style.display = 'none';
            }
        });
    });
</script>
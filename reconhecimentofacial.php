<?php
include("protecao.php");
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/imagem1.png" rel="icon">
    <title>Registrar ponto</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        canvas {
            position: absolute;
        }
        #id{
            display: flex;
            justify-content: center;
            align-items: center;
            bottom: 25%;
            position: absolute;
        }
        #segundo, a{
            display: flex;
            justify-content: center;
            align-items: center;
            bottom: 20%;
            position: absolute;
        }
    </style>
</head>

<body>
    <div>
    <video id="camera" autoplay muted></video>
    <canvas id="canvas"></canvas>
    </div>
    <div id="id">
    </div>
    <a href="home.php"><input id="segundo" type='button' value='Voltar'></a>
</body>

</html>
<script language="JavaScript" src="face-api.min.js"></script>
<script language="JavaScript" src="jquery-3.6.0.js"></script>
<script>
    const camera = document.getElementById("camera")
    function startVideo() {
        navigator.getUserMedia({
                video: {}
            },
            stream => camera.srcObject = stream,
            erro => console.error(erro)
        )
    }

    const loadLabels = () => {
        <?php
        $caminho = './pasta';
        $x = array_diff(scandir($caminho), array('.', '..'));
        ?>
        const labels = [<?php foreach ($x as $labels) {
                            echo   "\"$labels\"" . ',';
                        }; ?>]
        return Promise.all(labels.map(async label => {
            const descriptions = []
            for (let i = 1; i <= 5; i++) {
                const img = await faceapi.fetchImage(`./pasta/${label}/${i}.png`)
                const detections = await faceapi.detectSingleFace(img).withFaceLandmarks().withFaceDescriptor()
                descriptions.push(detections.descriptor)
            }
            return new faceapi.LabeledFaceDescriptors(label, descriptions)
        }))
    }

    Promise.all([
        faceapi.nets.tinyFaceDetector.loadFromUri('./models'),
        faceapi.nets.faceLandmark68Net.loadFromUri('./models'),
        faceapi.nets.faceRecognitionNet.loadFromUri('./models'),
        faceapi.nets.ssdMobilenetv1.loadFromUri('./models')
    ]).then(startVideo())
    camera.addEventListener('play', async () => {
        const canvas = faceapi.createCanvasFromMedia(camera)
        document.body.append(canvas)
        camera.width = 450
        camera.height = 450
        const tamanho = {
            width: camera.width,
            height: camera.height
        }
        const labels = await loadLabels()
        faceapi.matchDimensions(canvas, tamanho)
        setInterval(async () => {
            const d = await faceapi.detectAllFaces(camera, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceDescriptors()
            const a = faceapi.resizeResults(d, tamanho)
            const faceMatcher = new faceapi.FaceMatcher(labels, 0.43)
            const results = a.map(d => faceMatcher.findBestMatch(d.descriptor))
            canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
            faceapi.draw.drawDetections(canvas, a)
            results.forEach((result, index) => {
            const box = a[index].detection.box
            const {label} = result
            const drawBox = new faceapi.draw.DrawBox(box, {label})
            drawBox.draw(canvas)
             $.ajax({
                 url: 'ponto.php',
                 type: 'POST',
                 data: {data: label}
                 }).done(function(resultado) {
                alert(resultado);
                })
                var inserir = document.getElementById("id");
                  if(label=="Rosto desconhecido"||label==""){
                    inserir.innerHTML="";
                  }else{
                    inserir.innerHTML = "Ponto realizado!";
                  }
                  clearTimeout(myTimeout);
                  myTimeout = setTimeout(myStopFunction, 3000);
                  function myStopFunction() {
                    inserir.innerHTML =""
                    }
            })
        }, 100)
    })
</script>
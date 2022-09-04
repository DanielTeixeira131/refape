
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cadastro</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/imagem1.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">Cadastro</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Criar uma conta</h5>
                    <p class="text-center small"> Insira seus dados para a criação da conta</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="POST" action="c1.php" name="cadastro">
                    <div class="col-12">
                      <label for="nome" class="form-label">Nome da empresa</label>
                      <input type="text" name="nome" class="form-control" placeholder="Informe o nome da sua empresa" id="nome" required>
                      <div class="invalid-feedback">Por favor, coloque o nome da sua empresa.</div>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">E-mail</label>
                      <div class="input-group has-validation">
                      <input type="email" name="email" class="form-control" placeholder="Informe seu e-mail" id="email" required>
                      <div class="invalid-feedback">Por favor, coloque um e-mail válido!</div>
                    </div>
                    </div>

                    <div class="col-12">
                      <label for="cnpj" class="form-label">CNPJ</label>
                        <input type="number" name="cnpj" placeholder="Informe seu CNPJ" class="form-control" id="cnpj" required>
                        <div class="invalid-feedback">Por favor, coloque seu CNPJ.</div>
                      </div>
                  

                    <div class="col-12">
                      <label for="senha" class="form-label">Senha</label>
                      <input type="password" name="senha" placeholder="Informe sua senha" class="form-control" id="senha" required>
                      <div class="invalid-feedback">Por favor, coloque sua senha.</div>
                    </div>

                    <div class="col-12">
                      <label for="cartao" class="form-label">Número do cartão de crédito</label>
                      <input type="number" name="cartao" placeholder="Informe o número do seu cartão" class="form-control" id="cartao" required>
                      <div class="invalid-feedback">Por favor, coloque o número do seu cartão.</div>
                    </div>

                    <div class="col-12">
                      <label for="cvv" class="form-label"> CVV do cartão</label>
                      <input type="number" name="cvv" class="form-control" placeholder="Informe o CVV do seu cartão" id="cvv" required>
                      <div class="invalid-feedback">Por favor, coloque o CVV do seu cartão.</div>
                    </div>

                    <div class="col-12">
                      <label for="data" class="form-label"> Data de vencimento do cartão</label>
                      <input type="text" name="data" class="form-control" placeholder="Data de vencimento do cartão" id="data" required>
                      <div class="invalid-feedback">Por favor, coloque a data de vencimento do seu cartão.</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" onclick="document.frmc1.submit();">Criar conta</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Já possui uma conta? <a href="login.php">Login</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                  <p class="small mb-0"> Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> </p>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main1.js"></script>

</body>

</html>





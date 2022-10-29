<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CINETEC - Cinema</title>

    <link rel="stylesheet" href="./assets/css/styles.css">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- slick js -->
    <link rel="stylesheet" type=" text/css " href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css" />
    <link rel="stylesheet" type=" text/css " href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">
</head>

<body>
    <?php
    include_once('header.php');
    ?>

    <!-- <button class="btn btn-primary" onclick="toggleCart()">Toggle Cart</button> -->

    <div class="sidecart bg-dark text-center">

        <ul class="nav flex-column">
            <div class="text-light h4 m-0 px-4 text-center">
                Carrinho
                <div class="d-inline" onclick="toggleCart()"><i class="far text-success float-right fa-arrow-alt-circle-right mt-1"></i></div>
            </div>
            <li class="nav-link d-flex flex-wrap flex-row">
                <div class="col-12 text-light h5 text-center p-0">Lorem Productos</div>
                <div class="col-4 p-0">
                    <img class="img-fluid" src="https://2.bp.blogspot.com/-TOCRLYBV3N4/UsbbAXBZmkI/AAAAAAAAPuM/DbPHOcuv6HA/s1600/A-Menina-Que-Roubava-Livros-capa-filme-1.jpg" alt="">
                </div>
                <div class="col-2 bg-primary text-light justify-content-around d-flex flex-column">
                    <div class="product-quantity m-0 p-0 h5" style="display: flex;">Poltronas: a2, b7, 9d</div>
                </div>
                <div class="sidecart-price pl-0 col-6 bg-primary text-right d-flex flex-wrap text-light">
                    <div class="text-right text-dark d-flex flex-row justify-content-end align-items-center h6 m-0 p-0">
                        Remover <span class="h5 ml-2 m-0 p-0 "><b>X</b></span></div>
                    <div class=""><span class="text-dark"><b>Total</b></span>
                     <span class="product-price-total">R$2400,00</span>
                    </div>
                </div>
            </li>
        </ul>
        <div class="text-light h5 text-left mx-3">Valor Final: <span class="text-success" id="sidecart-total">R$
                7.220,00</span></div>
        <a href="selecao-pagamento.php" class="p-2">
            <button type="button" class="btn btn-success w-100">Finalizar Compra</button>
        </a>
    </div>

</body>

<script>
    function toggleCart() {
        document.querySelector('.sidecart').classList.toggle('open-cart');
    }
    toggleCart();
</script>
</body>

</html>
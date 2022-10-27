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
            include_once('films-cartaz.php');
            include_once('newsletter.php');
        ?>

        <!--scripts bootstrap  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- slick | jquery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>

        <script>
            $(function() {
                $('.container-films').slick({
                    dots: false,
                    infinite: true,
                    slidesToShow: 5,
                    slidesToScroll: 2,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    pauseOnHover: true,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow:4,
                                slidesToScroll: 4,
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        }
        
                    ]        
                });
            })
        </script>
    </body>
</html>
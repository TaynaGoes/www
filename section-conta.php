
<section class="section_account">
    <div class="box_account-container">
        <!-- Box Options Signup/Login -->
        <div class="box_option-account">
            <div class="box_info-account">
                <h2 class="title_option-account">Não possui registro?</h2>
                <p class="text_option-account">Clique no botão abaixo para efetuar seu registro.</p>
                <button class="btn_option-account" id="signup-button">Criar Conta</button>
            </div>

            <div class="box_info-account">
                <h2 class="title_option-account">Já possui registro ?</h2>
                <p class="text_option-account">Efetue seu login clicando no botão abaixo e boas compras!</p>
                <button class="btn_option-account" id="login-button">Login</button>
            </div>
        </div>

        <div class="container_forms" id="user_options-forms">
            <!-- Form Login -->
            <?php include_once("section-login.php") ?> 
            <!-- Form Registrar -->
            <?php include_once("section-create-user.php") ?>
        </div>
    </div>
</section>

<script src="jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/43cf1f1d5c.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js    "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js    " />
</script>

<script>
    $(document).ready(function() {
        $("#cpf").mask("999.999.999-99");
    });

    // jQuery(function($) {
    //     $("#celular").mask("9999-9999?9");
    //     $("#celular").blur(function(event) {
    //         if ($(this).val().length == 15) {
    //             $('#celular').mask('99999-9999');
    //         } else {
    //             $('#celular').mask('9999-9999?9');
    //         }
    //     });
    // });


    $(document).ready(function() {
        $("#showHide").click(function() {
            if ($("#senha").attr("type") == "password") {
                $("#senha").attr("type", "text");

            } else {
                $("#senha").attr("type", "password");
            }
        });
    });

    
    const signupButton = document.getElementById('signup-button'),
        loginButton = document.getElementById('login-button'),
        userForms = document.getElementById('user_options-forms')


    signupButton.addEventListener('click', () => {
        userForms.classList.remove('bounceRight')
        userForms.classList.add('bounceLeft')
    }, false)

    loginButton.addEventListener('click', () => {
        userForms.classList.remove('bounceLeft')
        userForms.classList.add('bounceRight')
    }, false)
</script>
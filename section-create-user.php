<style>
    .teste-form {
        display: flex;
    }

    .teste-form>input:nth-child(1) {
        max-width: 60px;
    }

    .teste-form>input:nth-child(2) {
        width: 100%;
    }
</style>

<?php
include_once('./app/controllers/conexao.php');

// ##################################################
// Verifica se um email já está cadastrado.
function existeEmail($conexao, $email) {
    $query = "SELECT EMAIL FROM CLIENTES WHERE EMAIL = '". $email . "'";

    $check_mail = $conexao->prepare($query);
    $check_mail->execute();

    return $check_mail->rowCount();
}
// ##################################################
 
 
// Receber dados do formul�rio
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Verificar se cliente clicou no bot�o
if (!empty($dados['btnCadCliente'])) {
    $empty_input = false;
    $errorMessage = NULL;

    $dados = array_map('trim', $dados);

    if (in_array("", $dados)) {
        $empty_input = true;
        echo "<script>alert('Necessário preencher todos os campos);</script>";
    }

    if (!$empty_input) {
        if (existeEmail($conexao, $dados['email'])) {
            $errorMessage = 'Este email já está cadastrado!';
        }
        else {
            $query_cliente = "INSERT INTO clientes 
                        (cpf, nome, sobrenome, email, ddd_celular, numero_celular, senha)
                    VALUES
                        ('" . $dados['cpf'] . "',
                        '" . $dados['nome'] . "',
                        '" . $dados['sobrenome'] . "',
                        '" . $dados['email'] . "',
                        '" . $dados['ddd'] . "',
                        '" . $dados['numero_celular'] . "',
                        '" . $dados['senha'] . "')";

            $cad_cliente = $conexao->prepare($query_cliente);
            $cad_cliente->execute();

            if ($cad_cliente->rowCount()) {
                $errorMessage = 'Cadastro realizado com sucesso';

                unset($dados);
            } 
            else {
                $errorMessage = 'Não foi possível realizar o cadastro. Entre em contato com um administrador.';
            }
        }
    }
}
?>

<div class="user_forms-signup">
    <h2 class="forms_title">Criar Conta</h2>
    <form class="forms_form" name="dadosPessoa" action="" method="POST" id="form-cad-cliente">
        <div class="forms_field">
            <input type="text" placeholder="Nome" class="forms_field-input" id="nome" name="nome" />
        </div>
        <div class="forms_field">
            <input type="text" placeholder="Sobrenome" class="forms_field-input" id="sobrenome" name="sobrenome" />
        </div>
        <div class="forms_field teste-form">
            <input type="text" placeholder="DDD" class="forms_field-input " id="ddd_celular" name="ddd" maxlength="2" />
            <input type="text" placeholder="Número" class="forms_field-input " id="celular" name="numero_celular" />
        </div>
        <div class="forms_field">
            <input type="text" placeholder="CPF" class="forms_field-input" id="cpf" name="cpf" />
        </div>
        <div class="forms_field">
            <input type="email" placeholder="Email" class="forms_field-input" id="email" name="email" />
        </div>
        <div class="forms_field forms_field-password">
            <input type="password" placeholder="Password" id="senha" class="forms_field-input" name="senha" />
            <input type="checkbox" id="showHide" />
            <label for="showHide" id="showHideLabel"><svg width="20px" height="20px" viewBox="0 0 56 56" version="1.1">
                    <g id="Icons-56/hide_outline_56" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="hide_outline_56" fill-rule="nonzero">
                            <rect x="0" y="0" width="56" height="56"></rect>
                            <path d="M12.4393398,10.4393398 C13.0251263,9.85355339 13.9748737,9.85355339 14.5606602,10.4393398 L14.5606602,10.4393398 L45.5606602,41.4393398 C46.1464466,42.0251263 46.1464466,42.9748737 45.5606602,43.5606602 C44.9748737,44.1464466 44.0251263,44.1464466 43.4393398,43.5606602 L43.4393398,43.5606602 L40.9247657,41.0466902 C37.030077,43.5725074 32.6516214,45 28,45 C21.7442091,45 15.9962672,42.4168475 11.3614131,38.1682312 C7.64442043,34.760988 5,30.4844643 5,28 C5,24.650874 9.36211258,18.7444745 14.932023,15.0528343 L12.4393398,12.5606602 C11.8535534,11.9748737 11.8535534,11.0251263 12.4393398,10.4393398 Z M17.1020933,17.2236559 C12.0528567,20.3865454 8,25.7324034 8,28 C8,29.4540123 10.2315089,33.0627806 13.3885869,35.9567688 C17.5045289,39.7297156 22.5562876,42 28,42 C31.8275742,42 35.4602469,40.8815752 38.750022,38.8711571 L34.3042095,34.4254963 C32.6452768,36.0538736 30.4008086,37 28.001903,37 C23.0313403,37 19.001903,32.9705627 19.001903,28 C19.001903,25.6006377 19.9484542,23.3562614 21.5761956,21.6978694 Z M28,11 C34.2557909,11 40.0037328,13.5831525 44.6385869,17.8317688 C48.3555796,21.239012 51,25.5155357 51,28 C51,29.9897781 49.2855697,33.1711493 46.6689883,36.1094808 C46.118055,36.72816 45.1698967,36.783079 44.5512175,36.2321457 C43.9325382,35.6812124 43.8776193,34.7330541 44.4285525,34.1143749 C46.6002481,31.675635 48,29.0781946 48,28 C48,26.5459877 45.7684911,22.9372194 42.6114131,20.0432312 C38.4954711,16.2702844 33.4437124,14 28,14 C26.5572958,14 25.1401937,14.1589935 23.7524085,14.4680283 C22.9437875,14.6480937 22.1422988,14.1385487 21.9622334,13.3299276 C21.7821681,12.5213066 22.2917131,11.7198179 23.1003341,11.5397526 C24.700109,11.1835115 26.3357384,11 28,11 Z M23.6981568,23.8188062 C22.624113,24.9229899 22.001903,26.4088874 22.001903,28 C22.001903,31.3137085 24.6881945,34 28.001903,34 C29.5924171,34 31.0780003,33.3783598 32.1824966,32.3042913 Z M29.6274305,20.5235204 C29.959115,19.7643914 30.8433941,19.4178791 31.6025232,19.7495636 C33.6794807,20.6570439 35.3460137,22.3239086 36.2530719,24.4010568 C36.5846012,25.1602536 36.2379083,26.0444619 35.4787115,26.3759912 C34.7195147,26.7075206 33.8353065,26.3608277 33.5037771,25.6016309 C32.8992457,24.2172642 31.7856304,23.1034272 30.4013873,22.4986131 C29.6422583,22.1669286 29.295746,21.2826495 29.6274305,20.5235204 Z" id="↳-Icon-Color" fill="currentColor"></path>
                        </g>
                    </g>
                </svg></label>
        </div>
        <div class="forms_buttons">
            <input type="submit" value="Registrar" name="btnCadCliente" class="forms_buttons-action">
        </div>
    </form>
</div>

<?php
    if (isset($errorMessage)) {
        if ($errorMessage != NULL) {
            echo "<script>alert('" . $errorMessage . "');</script>";
        }
    }
?>
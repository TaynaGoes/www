<div class="user_forms-login">
    <h2 class="forms_title">Login</h2>
    <form class="forms_form" method="post" action="./bd-login.php">
        <input type="hidden" name="nome" value="<?php if (isset($dados_formulario['nome'])) {
                                                    echo $dados_formulario['nome'];
                                                } ?>">
        <div class="forms_field">
            <input type="email" placeholder="Email" name="email" class="forms_field-input" required autofocus value="<?php if (isset($dados_formulario['email'])) {
                                                                                                                            echo $dados_formulario['email'];
                                                                                                                        } ?>" />
        </div>
        <div class="forms_field">
            <input type="password" placeholder="Senha" name="senha" class="forms_field-input" required />
        </div>
        <div class="forms_buttons">
            <input type="submit" value="Login" name="input-submit-login" class="forms_buttons-action">
        </div>
    </form>
</div>
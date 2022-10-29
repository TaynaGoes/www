<div class="content-section-pagamento">
    <div class="box-info-pedido">
        <h4 style="color: red">Informações do pedido</h4>
        <span>Nome Filme: XXXXXX</span>
        <img style=" width: 100px; heigth: 100px; display: block;" src="https://2.bp.blogspot.com/-TOCRLYBV3N4/UsbbAXBZmkI/AAAAAAAAPuM/DbPHOcuv6HA/s1600/A-Menina-Que-Roubava-Livros-capa-filme-1.jpg" alt="">
        
        <!-- aqui qnd mostrar as poltronas ai sim vai pedir pra falar qual e inteira e qual e meia (o modal que tem la em poltronas "ver poltronas selecionadas")
        ele sai de la e depois que ja confirmou na hora de pagar e onde vai apagar se e meia ou inteira -->
        <span>Poltronas Selecionadas </span>
        <br> <br>
        <span>Pipoca 3</span>
        <span>Refrigerante 2</span>
    </div>
    <div class="checkout">
        <div class="credit-card-box">
            <div class="flip">
                <div class="front">
                    <div class="chip"></div>
                    <div class="number"></div>
                    <div class="card-holder">
                        <label>Titular do Cartão</label>
                        <div></div>
                    </div>
                    <div class="card-expiration-date">
                        <label>Validadee</label>
                        <div></div>
                    </div>
                </div>
                <div class="back">
                    <div class="strip"></div>
                    <div class="ccv">
                        <label>CCV</label>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-card" autocomplete="off" novalidate>
            <fieldset>
                <label for="card-number">N° Cartão</label>
                <input type="num" id="card-number" class="input-cart-number" maxlength="4" />
                <input type="num" id="card-number-1" class="input-cart-number" maxlength="4" />
                <input type="num" id="card-number-2" class="input-cart-number" maxlength="4" />
                <input type="num" id="card-number-3" class="input-cart-number" maxlength="4" />
            </fieldset>
            <fieldset>
                <label for="card-holder">Nome Titular</label>
                <input type="text" id="card-holder" />
            </fieldset>
            <fieldset class="fieldset-expiration">
                <label for="card-expiration-month">Validade</label>
                <div class="select">
                    <select id="card-expiration-month">
                        <option></option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                </div>
                <div class="select">
                    <select id="card-expiration-year">
                        <option></option>
                        <option>2022</option>
                        <option>2023</option>
                        <option>2024</option>
                        <option>2025</option>
                        <option>2026</option>
                        <option>2027</option>
                        <option>2028</option>
                        <option>2029</option>
                        <option>2030</option>
                    </select>
                </div>
            </fieldset>
            <fieldset class="fieldset-ccv">
                <label for="card-ccv">CCV</label>
                <input type="text" id="card-ccv" maxlength="3" />
            </fieldset>
            <div class="btn-payment btn-payment-finish">Finalizar Pagamento</div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-migrate-3.4.0.js" integrity="sha256-0Nkb10Hnhm4EJZ0QDpvInc3bRp77wQIbIQmWYH3Y7Vw=" crossorigin="anonymous"></script>
<script>
    $('.input-cart-number').on('keyup change', function() {
        $this = $(this);

        if ($this.val().length > 3) {
            $this.next().focus();
        }

        var card_number = '';
        $('.input-cart-number').each(function() {
            card_number += $(this).val() + ' ';
            if ($(this).val().length == 4) {
                $(this).next().focus();
            }
        })

        $('.credit-card-box .number').html(card_number);
    });

    $('#card-holder').on('keyup change', function() {
        $this = $(this);
        $('.credit-card-box .card-holder div').html($this.val());
    });

    $('#card-holder').on('keyup change', function() {
        $this = $(this);
        $('.credit-card-box .card-holder div').html($this.val());
    });

    $('#card-expiration-month, #card-expiration-year').change(function() {
        m = $('#card-expiration-month option').index($('#card-expiration-month option:selected'));
        m = (m < 10) ? '0' + m : m;
        y = $('#card-expiration-year').val().substr(2, 2);
        $('.card-expiration-date div').html(m + '/' + y);
    })

    $('#card-ccv').on('focus', function() {
        $('.credit-card-box').addClass('hover');
    }).on('blur', function() {
        $('.credit-card-box').removeClass('hover');
    }).on('keyup change', function() {
        $('.ccv div').html($(this).val());
    });


    /*--------------------
    CodePen Tile Preview
    --------------------*/
    setTimeout(function() {
        $('#card-ccv').focus().delay(1000).queue(function() {
            $(this).blur().dequeue();
        });
    }, 800);
</script>
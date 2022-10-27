<style>
    .box_newsletter-container{
        width: 100%;
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .box_newsletter-container h3{
        font-size: 3rem;
        font-weight: 600;
        color: #fff;
    }

    .box_newsletter-container p{
        text-transform: uppercase;
        font-size: 1.2rem;
    }

    .section-newsletter{
        background-color: var(--background-main);
        padding: 30px;
    }

    .newsletter-form{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .newsletter-input{
        text-indent: 10px;
        font-size: 18px;
        border: 1px solid var(--color-red);
        color: var(--white);
        width: 560px;
        background-color: transparent;
        height: 55px;
    }

    .newsletter-submit{
        margin-left: -1px;
        text-transform: uppercase;
        width: 150px;
        font-size: 18px;
        font-weight: 800;
        color: var(--white);
        padding: 10px;
        background-color:  var(--color-red);
        height: 55px;
    }

    .newsletter-submit:hover{
        color: var(--color-red);
        background-color:var(--white) ;
    }
</style>



<section class="section-newsletter">
    <div class="container">
        <div class="row">
            <div class="col-12">
               <div class="box_newsletter-container">
                   <h3>Inscreva-se na nossa Newsletter </h3>
                   <p>Receba emails diários com nossa progoramação!</p>
                    <form action="" class="newsletter-form">
                        <input type="email" name="" id="" class="newsletter-input">
                        <input type="submit" value="enviar" class="newsletter-submit" onclick="alertFunction">
                    </form>
               </div>
            </div>
        </div>
    </div>
</section>
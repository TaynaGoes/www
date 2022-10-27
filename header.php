<nav>
    <div class="nav-center">
        <!-- nav header -->
        <div class="nav-header">
            <a href="./index.php">
                <img src="./imagens/logo/logo.png" alt="" class="logo" alt="logo" />
            </a>
            <button class="nav-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <!-- links menu -->
        <ul class="links">
            <li>
                <a href="./index.php">Home</a>
            </li>
            <li>
                <a href="#">Fale Conosco</a>
            </li>
        </ul>
        <!-- account -->
        <div class="account-menu">
                <div class="account-item">
                    <a href="./page-conta.php">
                        <?php 
                            session_start();
                        ?> 
                        
                        <?php if (isset($_SESSION['nome'])) { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>

                            <?php echo 'Olá, ' . $_SESSION['nome']; ?>

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                            </svg>

                            <div class="account-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                </svg>
                                <span class="cart-qty">1</span>
                            </div>
                        <?php }
                        else { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
                           
                            Entrar
                        <?php } ?>
                    </a>
                </div>  
            </div>
        </div>
    </div>
</nav>
<header class="header">
        <div class="logo">
        <i class="icofont-attachment"></i>

            <span class="font-weight-bold bg-success text-white">Agenda Diaria</span>
        
        </div>

        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu"></i>
        </div>

        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">
            <span id="usuario"><?= $_SESSION['usuario'] ?></span> 
                <img class="avatar" src="<?= "http://www.gravatar.com/avatar.php?gravatar_id="
                                                . md5(strtolower(trim($_SESSION['user']->email))) ?>" alt="user">
                <span class="ml-3">
                    <?= $_SESSION['user']->name ?>

                </span>
                <i class="icofont-simple-down mx-2"></i>
            </div>
            <div class="dropdown-content">
                <ul class="nav-list">
                    
                       
                    
                    <li class="nav-item">
                        <a href="logout.php">
                            <i class="icofont-logout mr-2"></i>
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
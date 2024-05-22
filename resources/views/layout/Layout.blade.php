<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('titulo')</title>

        <link rel="stylesheet" type="text/css" href="/css/global.css"/>
        <link rel="stylesheet" type="text/css" href="/css/header.css"/>
        <link rel="stylesheet" type="text/css" href="/css/footer.css"/>
        <link rel="icon" type="image/x-icon" href="/images/icons/favicon.ico">

        @yield('scripts')
    </head>
    <body>
        <header>
            <section>
                <img src="/images/logos/logo_atual.png" alt="Logo EFM-SYSTEM" width="130px" height="130px">
            </section>

            <section>
                <nav class="container-menu">
                    <!--<ul class="lista-menu">
                        <li>
                            <a href="../controller/home/home.controller.php" class="menu-item">
                                <img src="../images/icons/home.png" alt="Icon Home"> Página Inicial
                            </a>
                        </li>
                        <li>
                            <a href="../controller/processo/processos.controller.php" class="menu-item"><img src="../images/icons/processos.png" alt="Icon Processos">Processos</a>
                        </li>
                        <li>
                            <a href="../controller/usuario/usuario.controller.php" class="menu-item"><img src="../images/icons/user.png" alt="Icon User">Usuário</a>
                        </li>
                    </ul>-->
                </nav>
            </section>

            @yield('conteudo')

            <section class="container-info">
                <!--<span><strong>Usuário:</strong> <= $usuario->getNome(); ?></span>
                <span><strong>OAB:</strong> <= $usuario->getOab(); ?></span>
                <a href="../controller/login/logout.php" class="logout">Logout</a>-->
            </section>
        </header>
        <footer>
            <p>&copy; Copyright - EMF System LTDA - ME - 2024</p>
            <p>Atualizado em 16/04/2024</p>
            <p>Versão: 0.0.1</p>
        </footer>
    </body>
</html>
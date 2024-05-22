<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="/css/global.css" />
        <link rel="stylesheet" href="/css/login.css" />
        <link rel="icon" href="/images/icons/favicon.ico" />
    </head>
    <body>
        <section>
            <div class="login-container">
                <h1>Realize o seu Login</h1>
                <form class="login-form" action="/" method="POST">
                    @csrf
                    @if($erro)
                        <div class="container-msg-erro">
                            <p class="msg-erro">Usuário ou Senha inválidos! Tente novamente.</p>
                        </div>
                    @endif
                    <label>
                        Número OAB
                        <input type="text" id="oab" name="oab" placeholder="Informe seu número OAB">
                    </label>
                    <label>
                        Senha
                        <input type="password" id="password" name="senha" placeholder="Informe a sua senha">
                    </label>
                    <button type="submit" name="entrar">Entrar</button>
                </form>
            </div>
        </section>
    </body>
</html>
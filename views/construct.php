<style>
    /* reset */
    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;

        min-height: 100vh;
        padding: 20px;

        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }


    /* other */
    .info {
        margin: 20px 0;
        text-align: center;
    }

    p {
        color: #2e2e2e;
        margin-bottom: 20px;
    }


    /* block-$ */
    .block-effect {
        font-size: calc(8px + 6vw);
    }

    .block-reveal {
        --t: calc(var(--td) + var(--d));

        color: transparent;
        padding: 4px;

        position: relative;
        overflow: hidden;

        animation: revealBlock 0s var(--t) forwards;
    }

    .block-reveal::after {
        content: '';

        width: 0%;
        height: 100%;
        padding-bottom: 4px;

        position: absolute;
        top: 0;
        left: 0;

        background: var(--bc);
        animation: revealingIn var(--td) var(--d) forwards, revealingOut var(--td) var(--t) forwards;
    }


    /* animations */
    @keyframes revealBlock {
        100% {
            color: #0f0f0f;
        }
    }

    @keyframes revealingIn {

        0% {
            width: 0;
        }

        100% {
            width: 100%;
        }
    }

    @keyframes revealingOut {

        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(100%);
        }

    }

    .abs-site-link {
        position: fixed;
        bottom: 20px;
        left: 20px;
        color: hsla(0, 0%, 0%, .6);
        font-size: 16px;
    }
</style>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <title>En construction</title>
</head>

<body>

    <h1 class="block-effect" style="--td: 1.2s">
        <div class="block-reveal" style="--bc: #030303; --d: .1s">En cours</div>
        <div class="block-reveal" style="--bc: #ff5703; --d: .5s">de construction</div>
    </h1>



    <a class="text-center buttondark" href="admincontrol.php" class="abs-site-link" rel="nofollow noreferrer">Retour</a>

</body>

</html>
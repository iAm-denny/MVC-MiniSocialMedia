<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Mini Social Media</title>
</head>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-around">
    <div>
        <a class="navbar-brand" href="#">Logo</a>
    </div>
    <ul class="navbar-nav">


        <?php if (isset($_COOKIE['userid'])) : ?>

            <li class="nav-item">
                <a class="nav-link" href="#"><strong>Hello! <?= $_COOKIE['name'] ?></strong></a>
            </li>
            <li class="ml-5 nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/signout?id=<?= $_COOKIE['userid'] ?>">Logout</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/sign-in">Sign in</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/sign-up">Sign up</a>
            </li>
        <?php endif ?>
    </ul>
</nav>




<body>
    <?php echo $content; ?>

    <script>
        const deleteModals = document.querySelectorAll('.delete-modal');
        const screamId = document.querySelector('.delete-modal').getAttribute('data-screamid');
        const modalId = document.querySelector('.modalId')
        deleteModals.forEach(modal => {
            modal.addEventListener('click', (e) => {
                const getScreamid = e.target.getAttribute('data-screamid');
                modalId.value = getScreamid;
            })
        })
    </script>
</body>


</html>
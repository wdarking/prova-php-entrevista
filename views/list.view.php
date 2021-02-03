<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Usuários</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <main style="margin-left: 5em; margin-right: 5em; margin-top: 1em;">
            <?php if (isset($_GET['status']) && ($status = $_GET['status'])) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $status ?>
                    <a href="/" class="btn-close"></a>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col m-auto">
                            <h4>Usuários</h4>
                        </div>
                        <div class="col">
                            <div class="float-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    Adicionar Usuário
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Cores</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <th scope="row"><?php echo $user->id ?></th>
                                    <td><?php echo $user->name ?></td>
                                    <td><?php echo $user->email ?></td>
                                    <td>
                                        <?php foreach ($userRepository->getColors($user->id) as $color) : ?>
                                            <span style="color: <?php echo $color['name'] ?>;"><?php echo $color['name'] ?></span>
                                        <?php endforeach ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="/?action=colors&user_id=<?php echo $user->id ?>">Cores</a> |
                                        <a class="btn btn-sm btn-secondary" href="/?action=update&user_id=<?php echo $user->id ?>">Editar</a> |
                                        <a class="btn btn-sm btn-danger" href="/?action=delete&user_id=<?php echo $user->id ?>">Excluir</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <?php include 'partials/create-modal.view.php' ?>

    <?php if ($_GET['action'] == 'colors' && $_GET['user_id']) : ?>
        <?php include 'partials/colors-modal.view.php' ?>
    <?php endif; ?>

    <?php if ($_GET['action'] == 'update' && $_GET['user_id']) : ?>
        <?php include 'partials/update-modal.view.php' ?>
    <?php endif; ?>

    <?php if ($_GET['action'] == 'delete' && $_GET['user_id']) : ?>
        <?php include 'partials/delete-modal.view.php' ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>

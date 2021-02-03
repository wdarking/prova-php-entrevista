<?php

require 'bootstrap.php';
require 'repositories/user.repository.php';

(new UserRepository())->attachColors($_POST['user_id'], $_POST['colors']);

header('Location: /?status=Cores Atualizadas');

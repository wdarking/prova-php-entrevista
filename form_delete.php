<?php

require 'bootstrap.php';
require 'repositories/user.repository.php';

(new UserRepository())->performDelete($_POST['user_id']);

header('Location: /?status=Usuario Excluido');

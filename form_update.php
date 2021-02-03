<?php

require 'bootstrap.php';
require 'repositories/user.repository.php';

(new UserRepository())->performUpdate($_POST);

header('Location: /?status=Usuario Atualizado');

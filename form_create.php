<?php

require 'bootstrap.php';
require 'repositories/user.repository.php';

(new UserRepository())->performInsert($_POST);

header('Location: /?status=Usuario Criado');

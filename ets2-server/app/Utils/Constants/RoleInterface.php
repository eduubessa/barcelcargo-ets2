<?php

namespace App\Utils\Constants;

interface RoleInterface {

    const BARCEL_ROLES = [
        "developer" => "Desenvolvedor da empresa",
        "founder" => "Fundador da empresa",
        "administrator" => "Administrador da empresa",
        "manager" => "Gerente da empresa",
        "driver" => "Motorista da empresa",
    ];

    const BARCEL_ROLE_FOUNDER = "bc_role_founder";
    const BARCEL_ROLE_DEVELOPER = "bc_role_developer";
    const BARCEL_ROLE_ADMINISTRATOR = "bc_role_administrator";
    const BARCEL_ROLE_MANAGER = "bc_role_manager";
    const BARCEL_ROLE_DRIVER = "bc_role_driver";

    const BARCEL_ROLE_TITLE_FOUNDER = "Fundador";
    const BARCEL_ROLE_TITLE_DEVELOPER = "Desenvolvedor";
    const BARCEL_ROLE_TITLE_ADMINISTRATOR = "Administrador";
    const BARCEL_ROLE_TITLE_MANAGER = "Gerente";
    const BARCEL_ROLE_TITLE_DRIVER = "Motorista";

    const BARCEL_ROLE_LEVEL_FOUNDER = 7;
    const BARCEL_ROLE_LEVEL_DEVELOPER = 7;
    const BARCEL_ROLE_LEVEL_ADMINISTRATOR = 7;
    const BARCEL_ROLE_LEVEL_MANAGER = 5;
    const BARCEL_ROLE_LEVEL_DRIVER = 0;

}

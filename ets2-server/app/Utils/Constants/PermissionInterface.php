<?php

namespace App\Utils\Constants;

interface PermissionInterface {

    const BARCEL_PERMISSION_LIST = [
        'posts',
        'users',
        'events',
        'extracts'
    ];

    const BARCEL_PERMISSION_CRUD = [
        'create',
        'read',
        'update',
        'delete',
        'show'
    ];

    // Posts permissions
    const BARCEL_PERMISSION_TITLE_CREATE_POSTS  = "Criar posts";
    const BARCEL_PERMISSION_TITLE_READ_POSTS  = "Ler posts";
    const BARCEL_PERMISSION_TITLE_SHOW_POSTS  = "Ler post";
    const BARCEL_PERMISSION_TITLE_UPDATE_POSTS = "Atualizar posts";
    const BARCEL_PERMISSION_TITLE_DELETE_POSTS = "Apagar posts";

    const BARCEL_PERMISSION_CREATE_POSTS  = "bc_permission_create_posts";
    const BARCEL_PERMISSION_READ_POSTS  = "bc_permission_read_posts";
    const BARCEL_PERMISSION_SHOW_POSTS  = "bc_permission_show_post";
    const BARCEL_PERMISSION_UPDATE_POSTS = "bc_permission_update_posts";
    const BARCEL_PERMISSION_DELETE_POSTS = "bc_permission_delete_posts";

    // Users permissions
    const BARCEL_PERMISSION_TITLE_CREATE_USERS  = "Criar utilizadores";
    const BARCEL_PERMISSION_TITLE_READ_USERS  = "Ler utilizadores";
    const BARCEL_PERMISSION_TITLE_SHOW_USERS  = "Ler utilizador";
    const BARCEL_PERMISSION_TITLE_UPDATE_USERS = "Atualizar utilizadores";
    const BARCEL_PERMISSION_TITLE_DELETE_USERS = "Apagar utilizadores";

    const BARCEL_PERMISSION_CREATE_USERS  = "bc_permission_create_users";
    const BARCEL_PERMISSION_READ_USERS  = "bc_permission_read_users";
    const BARCEL_PERMISSION_SHOW_USERS  = "bc_permission_show_user";
    const BARCEL_PERMISSION_UPDATE_USERS = "bc_permission_update_users";
    const BARCEL_PERMISSION_DELETE_USERS = "bc_permission_delete_users";

    // Events permissions
    const BARCEL_PERMISSION_TITLE_CREATE_EVENTS  = "Criar eventos";
    const BARCEL_PERMISSION_TITLE_READ_EVENTS  = "Ler eventos";
    const BARCEL_PERMISSION_TITLE_SHOW_EVENTS  = "Ler evento";
    const BARCEL_PERMISSION_TITLE_UPDATE_EVENTS = "Atualizar eventos";
    const BARCEL_PERMISSION_TITLE_DELETE_EVENTS = "Apagar eventos";

    const BARCEL_PERMISSION_CREATE_EVENTS  = "bc_permission_create_events";
    const BARCEL_PERMISSION_READ_EVENTS  = "bc_permission_read_events";
    const BARCEL_PERMISSION_SHOW_EVENTS  = "bc_permission_show_event";
    const BARCEL_PERMISSION_UPDATE_EVENTS = "bc_permission_update_events";
    const BARCEL_PERMISSION_DELETE_EVENTS = "bc_permission_delete_events";

    // Extract permissions
    const BARCEL_PERMISSION_TITLE_CREATE_EXTRACTS  = "Criar extractos";
    const BARCEL_PERMISSION_TITLE_READ_EXTRACTS  = "Ler extractos";
    const BARCEL_PERMISSION_TITLE_SHOW_EXTRACTS  = "Ler extracto";
    const BARCEL_PERMISSION_TITLE_UPDATE_EXTRACTS = "Atualizar extractos";
    const BARCEL_PERMISSION_TITLE_DELETE_EXTRACTS = "Apagar extractos";

    const BARCEL_PERMISSION_CREATE_EXTRACTS = "bc_permission_create_extracts";
    const BARCEL_PERMISSION_READ_EXTRACTS  = "bc_permission_read_extracts";
    const BARCEL_PERMISSION_SHOW_EXTRACTS  = "bc_permission_show_extract";
    const BARCEL_PERMISSION_UPDATE_EXTRACTS = "bc_permission_update_extracts";
    const BARCEL_PERMISSION_DELETE_EXTRACTS = "bc_permission_delete_extracts";

}

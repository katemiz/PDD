<?php

return [

    "roles" => [
        "r" => ['admin'],
        "w" => ['admin'],
        "x" => ['admin']
    ],

    "list" => [
        "title" => "Users",
        "subtitle" => "List of all Users",
        "addButton" => [
            "text"=>"Add User",
            "route"=>"/admin/user/form"
        ],
        "filterText" => "Search ...",
        "listCaption" => false,

        "headers" => [

            "id"=> [
                "title" => "#",
                "sortable" => true,
                "align" => "left",
                "direction" => "asc"
            ],


            "name"=> [
                "title" => "Name",
                "sortable" => true,
                "align" => "left",
                "direction" => "asc"
            ],

            "lastname"=> [
                "title" => "Lastname",
                "sortable" => true,
                "align" => "left",
                "direction" => "asc"
            ],

            "email"=> [
                "title" => "E-Mail",
                "sortable" => true,
                "align" => "left",
                "direction" => "asc"
            ],

            "created_at"=> [
                "title" => "Created On",
                "sortable" => true,
                "align" => "left",
                "direction" => "asc"
            ]

        ],
        "actions" => [
            "r" => "/admin/users/view/",
            "w" => "/admin/users/form/",
            "x" => "/admin/users/delete/"
        ],
        "noitem" => "No witnesses found in database yet!",
        "delete_confirm" => [
            "question" => "Do you want to delete this witnesses from database?",
            "last_warning" => "When done, it is not possible to revert back."
        ]
    ],

    "create" => [
        "title" => "Users",
        "subtitle" => "Create a User",
        "submitText" => "Add User",
    ],

    "read" => [
        "title" => "Users",
        "subtitle" => "View User Parameters",
        "submitText" => "Add User",
    ],

    "update" => [
        "title" => "Users",
        "subtitle" => "Edit User Properties",
        "submitText" => "Update User",
    ],

    "cu_route" => "/admin/users/store/",

    "form" => [

        "name" => [
            "label" => "Name",
            "name" => "name",
            "placeholder" => "Enter name",
            "value" => ""
        ],


        "lastname" => [
            "label" => "Lastname",
            "name" => "lastname",
            "placeholder" => "Enter lastname",
            "value" => ""
        ],

        "email" => [
            "label" => "E-Mail",
            "name" => "email",
            "placeholder" => "Enter e-mail",
            "value" => ""
        ]
    ]
];



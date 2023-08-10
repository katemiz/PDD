<?php

return [

    "roles" => [
        "r" => ['admin'],
        "w" => ['admin'],
        "x" => ['admin']
    ],

    "list" => [
        "title" => "Permissions",
        "subtitle" => "List of all Permissions",
        "addButton" => [
            "text"=>"Add Permission",
            "route"=>"/admin/permissions/form"
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

            "created_at"=> [
                "title" => "Created On",
                "sortable" => true,
                "align" => "left",
                "direction" => "asc"
            ]

        ],
        "actions" => [
            "r" => "/admin/permissions/view/",
            "w" => "/admin/permissions/form/",
            "x" => "/admin/permissions/delete/"
        ],
        "noitem" => "No permissions found in database yet!",
        "delete_confirm" => [
            "question" => "Do you want to delete this permission from database?",
            "last_warning" => "When done, it is not possible to revert back."
        ]
    ],


    "create" => [
        "title" => "Permissions",
        "subtitle" => "Create a Permission",
        "submitText" => "Add Permission",
    ],

    "read" => [
        "title" => "Permissions",
        "subtitle" => "View Permission Parameters",
        "submitText" => "Add Permission",
    ],

    "update" => [
        "title" => "Permissions",
        "subtitle" => "Edit Permission Properties",
        "submitText" => "Update Permission",
    ],

    "cu_route" => "/admin/permissions/store/",

    "form" => [

        "name" => [
            "label" => "Permission Name",
            "name" => "name",
            "placeholder" => "eg Edit Articles",
            "value" => ""
        ],

        "description" => [
            "label" => "Description/Remarks/Notes",
            "name" => "description",
            "placeholder" => "Enter remarks/notes",
            "value" => ""
        ]
    ]
];
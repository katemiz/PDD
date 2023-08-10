<?php

return [

    "roles" => [
        "r" => [],
        "w" => ['requirement_engineer'],
        "x" => ['requirement_engineer'],
    ],


    "list" => [
        "title" => "Witnesses",
        "subtitle" => "List of all Witnesses",
        "addButton" => [
            "text"=>"Add Witness",
            "route"=>"/witness/form"
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

            "project_name"=> [
                "title" => "Project",
                "sortable" => true,
                "align" => "left",
                "direction" => "asc"
            ],

            "code"=> [
                "title" => "Code",
                "sortable" => true,
                "align" => "left",
                "direction" => "asc"
            ],
            "name"=> [
                "title" => "Title",
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
            "r" => "/witness/view/",
            "w" => "/witness/form/",
            "x" => "/witness/delete/"
        ],
        "noitem" => "No witnesses found in database yet!",
        "delete_confirm" => [
            "question" => "Do you want to delete this witnesses from database?",
            "last_warning" => "When done, it is not possible to revert back."
        ]
    ],

    // "select_current" => [
    //     "title" => "Projects",
    //     "subtitle" => "Select current project",
    // ],

    "create" => [
        "title" => "Witnesses",
        "subtitle" => "Create a Witnesses",
        "submitText" => "Add Witnesses",
    ],

    "read" => [
        "title" => "Witnesses",
        "subtitle" => "View Witnesses Parameters",
        "submitText" => "Add Witnesses",
    ],

    "update" => [
        "title" => "Witnesses",
        "subtitle" => "Edit Witnesses Properties",
        "submitText" => "Update Witnesses",
    ],

    "cu_route" => "/witness/store/",

    "form" => [

        "project"=> [
            "label" => "Project",
            "name" => "project",
            "options" => ""
        ],

        "code" => [
            "label" => "Witnesses",
            "name" => "code",
            "placeholder" => "Enter Witnesses Code",
            "value" => ""
        ],

        "title" => [
            "label" => "Witnesses Title",
            "name" => "name",
            "placeholder" => "Enter Witnesses title/description",
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



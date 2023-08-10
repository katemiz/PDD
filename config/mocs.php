<?php

return [

    "roles" => [
        "r" => [],
        "w" => ['requirement_engineer'],
        "x" => ['requirement_engineer'],
    ],

    "list" => [
        "title" => "Means of Compliances (MOC) / Validation Methods",
        "subtitle" => "List of all Means of Compliances (MOC) / Validation Methods",
        "addButton" => [
            "text"=>"Add Means of Compliances (MOC)",
            "route"=>"/mocs/form"
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
                "sortable" => false,
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
            "r" => "/mocs/view/",
            "w" => "/mocs/form/",
            "x" => "/mocs/delete/"
        ],
        "noitem" => "No MOC/Means of Compliance found in database yet!",
        "delete_confirm" => [
            "question" => "Do you want to delete this MOC from database?",
            "last_warning" => "When done, it is not possible to revert back."
        ]
    ],

    // "select_current" => [
    //     "title" => "Projects",
    //     "subtitle" => "Select current project",
    // ],

    "create" => [
        "title" => "MOC - Means of Compliance",
        "subtitle" => "Create a New MOC - Means of Compliance",
        "submitText" => "Add MOC - Means of Compliance",
    ],

    "read" => [
        "title" => "MOC - Means of Compliance",
        "subtitle" => "View MOC - Means of Compliance Parameters",
        "submitText" => "Add MOC - Means of Compliance",
    ],

    "update" => [
        "title" => "MOC - Means of Compliance",
        "subtitle" => "Edit MOC - Means of Compliance Properties",
        "submitText" => "Update MOC - Means of Compliance",
    ],

    "cu_route" => "/mocs/store/",

    "form" => [

        "project"=> [
            "label" => "Project",
            "name" => "project",
            "options" => ""
        ],

        "code" => [
            "label" => "MOC - Means of Compliance Code",
            "name" => "code",
            "placeholder" => "Enter MOC - Means of Compliance Code",
            "value" => ""
        ],

        "title" => [
            "label" => "MOC - Means of Compliance Title",
            "name" => "name",
            "placeholder" => "Enter MOC - Means of Compliance title/description",
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



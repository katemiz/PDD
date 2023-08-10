<?php

return [

    "roles" => [
        "r" => [],
        "w" => ['requirement_engineer'],
        "x" => ['requirement_engineer'],
    ],

    "list" => [
        "title" => "Proof of Compliances (POC)",
        "subtitle" => "List of all Proof of Compliances (POC)",
        "addButton" => [
            "text"=>"Add Proof of Compliances (POC)",
            "route"=>"/pocs/form"
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
            "r" => "/pocs/view/",
            "w" => "/pocs/form/",
            "x" => "/pocs/delete/"
        ],
        "noitem" => "No POC/Proof of Compliance found in database yet!",
        "delete_confirm" => [
            "question" => "Do you want to delete this POC from database?",
            "last_warning" => "When done, it is not possible to revert back."
        ]
    ],

    // "select_current" => [
    //     "title" => "Projects",
    //     "subtitle" => "Select current project",
    // ],

    "create" => [
        "title" => "POC - Proof of Compliance",
        "subtitle" => "Create a New POC - Proof of Compliance",
        "submitText" => "Add POC - Proof of Compliance",
    ],

    "read" => [
        "title" => "POC - Proof of Compliance",
        "subtitle" => "View POC - Proof of Compliance Parameters",
        "submitText" => "Add POC - Proof of Compliance",
    ],

    "update" => [
        "title" => "POC - Proof of Compliance",
        "subtitle" => "Edit POC - Proof of Compliance Properties",
        "submitText" => "Update POC - Proof of Compliance",
    ],

    "cu_route" => "/pocs/store/",

    "form" => [

        "project"=> [
            "label" => "Project",
            "name" => "project",
            "options" => ""
        ],

        "code" => [
            "label" => "POC - Proof of Compliance Code",
            "name" => "code",
            "placeholder" => "Enter POC - Means of Compliance Code",
            "value" => ""
        ],

        "title" => [
            "label" => "POC - Proof of Compliance Title",
            "name" => "name",
            "placeholder" => "Enter POC - Proof of Compliance title/description",
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



<?php

return [

    "roles" => [
        "r" => [],
        "w" => ['requirement_engineer'],
        "x" => ['requirement_engineer'],
    ],


    "list" => [
        "title" => "Decision Gates / Meetings",
        "subtitle" => "List of all Decision Gates",
        "addButton" => [
            "text"=>"Add Decision Gates",
            "route"=>"/dgates/form"
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
            "r" => "/dgates/view/",
            "w" => "/dgates/form/",
            "x" => "/dgates/delete/"
        ],
        "noitem" => "No Decision Gates found in database yet!",
        "delete_confirm" => [
            "question" => "Do you want to delete this decision gate from database?",
            "last_warning" => "When done, it is not possible to revert back."
        ]
    ],

    "select_current" => [
        "title" => "Projects",
        "subtitle" => "Select current project",
    ],

    "create" => [
        "title" => "Decision Gates",
        "subtitle" => "Create a New Decision Gate",
        "submitText" => "Add Decision Gate",
    ],

    "read" => [
        "title" => "Decision Gates",
        "subtitle" => "View Decision Gate Parameters",
        "submitText" => "Add Decision Gate",
    ],

    "update" => [
        "title" => "Decision Gates",
        "subtitle" => "Edit Decision Gate Properties",
        "submitText" => "Update Decision Gate",
    ],

    "cu_route" => "/dgates/store/",

    "form" => [

        "project"=> [
            "label" => "Project",
            "name" => "project",
            "options" => ""
        ],

        "code" => [
            "label" => "Decision Gate/ Meeting Code",
            "name" => "code",
            "placeholder" => "Enter Decision Gate Code",
            "value" => ""
        ],

        "title" => [
            "label" => "Decision Gate Title",
            "name" => "name",
            "placeholder" => "Enter decision gate title/description",
            "value" => ""
        ]
    ]
];



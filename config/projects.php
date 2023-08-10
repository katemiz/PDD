<?php

return [

    "roles" => [
        "r" => ['admin'],
        "w" => ['admin'],
        "x" => ['admin']
    ],

    "list" => [
        "title" => "Projects",
        "subtitle" => "List of all projects",
        "addButton" => [
            "text"=>"Add Project",
            "route"=>"/projects/form"
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
    
            "company_name"=> [
                "title" => "Company",
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
            "title"=> [
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
            "r" => "/projects/view/",
            "w" => "/projects/form/",
            "x" => "/projects/delete/"
        ],
        "noitem" => "No projects found in database yet!",
        "delete_confirm" => [
            "question" => "Do you want to delete this project from database?",
            "last_warning" => "When done, it is not possible to revert back."
        ]
    ],

    "select_current" => [

        "title" => "Projects",
        "subtitle" => "Select current project",

    ],

    "create" => [
        "title" => "Projects",
        "subtitle" => "Create a New Project",
        "submitText" => "Add Project",
    ],

    "read" => [
        "title" => "Projects",
        "subtitle" => "View Project Parameters",
        "submitText" => "Add Project",
    ],

    "update" => [
        "title" => "Projects",
        "subtitle" => "Edit Project Properties",
        "submitText" => "Update Project",
    ],

    "cu_route" => "/projects/store/",


    "form" => [

        "company"=> [
            "label" => "Company",
            "name" => "company",
            "options" => ""
        ],

        "code" => [
            "label" => "Project Code",
            "name" => "code",
            "placeholder" => "Enter project code eg RLS",
            "value" => ""
        ],

        "title" => [
            "label" => "Project Title",
            "name" => "title",
            "placeholder" => "Enter project title/description",
            "value" => ""
        ]
    ]
];



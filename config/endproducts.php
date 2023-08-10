<?php

return [

    "roles" => [
        "r" => [],
        "w" => ['requirement_engineer'],
        "x" => ['requirement_engineer'],
    ],


    "list" => [
        "title" => "End Products",
        "subtitle" => "List of all End Products",
        "addButton" => [
            "text"=>"Add End Products",
            "route"=>"/endproducts/form"
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
    
            "project_code"=> [
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
            "r" => "/endproducts/view/",
            "w" => "/endproducts/form/",
            "x" => "/endproducts/delete/"
        ],
        "noitem" => "No End Products found for this project in database yet!",
        "delete_confirm" => [
            "question" => "Do you want to delete this end product from database?",
            "last_warning" => "When done, it is not possible to revert back."
        ]
    ],

    "create" => [
        "title" => "End Products",
        "subtitle" => "Create a New End Product",
        "submitText" => "Add End Product",
    ],

    "read" => [
        "title" => "End Products",
        "subtitle" => "View End Product Parameters",
        "submitText" => "Add End Product",
    ],

    "update" => [
        "title" => "End Products",
        "subtitle" => "Edit Project Properties",
        "submitText" => "Update Project",
    ],

    "cu_route" => "/endproducts/store/",

    "form" => [

        "project"=> [
            "label" => "Project",
            "name" => "project",
            "options" => ""
        ],

        "code" => [
            "label" => "End Product Code/Acronym",
            "name" => "code",
            "placeholder" => "Enter end product code eg RLS",
            "value" => ""
        ],

        "title" => [
            "label" => "End Product Title",
            "name" => "title",
            "placeholder" => "Enter end product title/description",
            "value" => ""
        ]
    ]
];
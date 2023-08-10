<?php

return [

    "list" => [
        "title" => "Companies",
        "subtitle" => "List of all companies",
        "addButton" => [
            "text"=>"Add Company",
            "route"=>"/companies/form"
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
            "fullname"=> [
                "title" => "Fullname",
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
            "r" => "/companies/view/",
            "w" => "/companies/form/",
            "x" => "/companies/delete/"
        ],
        "noitem" => "No companies found in database yet!",
        "delete_confirm" => [
            "question" => "Do you want to delete this company from database?",
            "last_warning" => "When done, it is not possible to revert back."
        ]
    ],

    "create" => [
        "title" => "Companies",
        "subtitle" => "Create a New Company",
        "submitText" => "Add Company",
    ],

    "read" => [
        "title" => "Companies",
        "subtitle" => "View Company Parameters",
        "submitText" => "Add Company",
    ],

    "update" => [
        "title" => "Companies",
        "subtitle" => "Edit Company Properties",
        "submitText" => "Update Company",
    ],

    "cu_route" => "/companies/store/",

    "form" => [
        "name" => [
            "label" => "Company Short Name",
            "name" => "name",
            "placeholder" => "Enter company short name",
            "value" => ""
        ],

        "fullname" => [
            "label" => "Full Official Company Name",
            "name" => "fullname",
            "placeholder" => "Enter official full company name",
            "value" => ""
        ]
    ]
];



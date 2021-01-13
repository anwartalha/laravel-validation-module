<?php
return [
    'Admin' => [
        'AdminEditForm' => [
            'rules' => [
                'name'              => ['required', 'string', 'max:191'],
                'password'          => ['nullable', 'string', 'min:10']
            ],
            'messages' => [
                'name.required' => 'Name Likho.'
            ]
        ]
    ]
];

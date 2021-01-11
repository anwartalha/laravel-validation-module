<?php
return [
    'Admin' => [
        'AdminEditForm' => [
            'rules' => [
                'name'              => [ 'required', 'string', 'max:191' ],
                'password'          => [ 'nullable', 'string', 'min:10' ]
            ],
            'messages' => [
                'name.required' => 'Name Likho.'
            ]
        ]
    ],
    'General' => [
        'EditGeneralSettings' => [
            'logo'              => [ 'nullable', 'file', 'mimes:jpg,jpeg,png' ]
        ]
    ],
    'AdminClass' => [
        'AddClass' => [
            'name'              => [ 'required', 'string', 'max:191' ],
            'day'               => [ 'required', 'array' ],
            'day.*'             => [ 'required', 'in:monday,tuesday,wednesday,thursday,friday,saturday', 'string' ],
            'start_time'        => [ 'required', 'array' ],
            'start_time.*'        => [ 'required', 'date_format:'.env('DATE_TIME_STRING') ],
            'end_time'        => [ 'required', 'array' ],
            'end_time.*'        => [ 'required', 'date_format:'.env('DATE_TIME_STRING') ]
        ],
        'EditClass' => [
            'name'              => [ 'required', 'string', 'max:191' ],
            'day'               => [ 'required', 'array' ],
            'day.*'             => [ 'required', 'in:monday,tuesday,wednesday,thursday,friday,saturday', 'string' ],
            'start_time'        => [ 'required', 'array' ],
            'start_time.*'        => [ 'required', 'date_format:'.env('DATE_TIME_STRING') ],
            'end_time'        => [ 'required', 'array' ],
            'end_time.*'        => [ 'required', 'date_format:'.env('DATE_TIME_STRING') ]
        ]
    ],
    'User' => [
        'AddUser' => [
            'admin_class_id'    => [ 'required', 'exists:admin_classes,id', 'integer' ],
            'roll_no'           => [ 'required', 'unique:users,roll_no', 'string', 'max:191' ],
            'email'             => [ 'required', 'unique:users,email', 'email' ],
            'name'              => [ 'required', 'string', 'max:191' ],
            'password'          => [ 'required', 'string', 'max:191' ]
        ],
        'EditUser' => [
            'admin_class_id'    => [ 'required', 'exists:admin_classes,id', 'integer' ],
            'roll_no'           => [ 'required', 'string', 'max:191' ],
            'email'             => [ 'required', 'email', 'max:191' ],
            'name'              => [ 'required', 'string', 'max:191' ],
            'password'          => [ 'nullable', 'string', 'max:191' ]
        ]
    ],
    'Quiz' => [
        'AddQuiz' => [
            'title'             => [ 'required', 'string', 'max:191'],
            'admin_class_id'    => [ 'required', 'exists:admin_classes,id', 'integer' ],
            'time_in_minutes'   => [ 'required', 'integer' ],
            'max_limit'         => [ 'required', 'integer' ],
            'start_date'        => [ 'required', 'date_format:'.env('DATE_TIME_STRING') ],
            'mcq'               => [ 'required_without:question', 'array' ],
            'mcq.*'             => [ 'string', 'required' ],
            'option1'           => [ 'required_without:question', 'array' ],
            'option1.*'         => [ 'string', 'required' ],
            'option2'           => [ 'required_without:question', 'array' ],
            'option2.*'         => [ 'string', 'required' ],
            'option3'           => [ 'required_without:question', 'array' ],
            'option3.*'         => [ 'string', 'required' ],
            'option4'           => [ 'required_without:question', 'array' ],
            'option4.*'         => [ 'string', 'required' ],
            'mcqAnswer'         => [ 'required_without:question', 'array' ],
            'mcqAnswer.*'       => [ 'in:1,2,3,4', 'required', 'integer' ],
            'mcqMarks'          => [ 'required_without:question', 'array' ],
            'mcqMarks.*'        => [ 'integer', 'required', 'min:1' ],
            'question'          => [ 'required_without:mcq', 'array' ],
            'question.*'        => [ 'string', 'required' ],
            'questionMarks'     => [ 'required_without:mcq', 'array' ],
            'questionMarks.*'   => [ 'integer', 'required', 'min:1' ],
        ],
        'EditQuiz' => [
            'title'             => [ 'required', 'string', 'max:191'],
            'admin_class_id'    => [ 'required', 'exists:admin_classes,id', 'integer' ],
            'time_in_minutes'   => [ 'required', 'integer' ],
            'max_limit'         => [ 'required', 'integer' ],
            'start_date'        => [ 'required', 'date_format:'.env('DATE_TIME_STRING') ],
            'mcq'               => [ 'required_without:question', 'array' ],
            'mcq.*'             => [ 'string', 'required' ],
            'option1'           => [ 'required_without:question', 'array' ],
            'option1.*'         => [ 'string', 'required' ],
            'option2'           => [ 'required_without:question', 'array' ],
            'option2.*'         => [ 'string', 'required' ],
            'option3'           => [ 'required_without:question', 'array' ],
            'option3.*'         => [ 'string', 'required' ],
            'option4'           => [ 'required_without:question', 'array' ],
            'option4.*'         => [ 'string', 'required' ],
            'mcqAnswer'         => [ 'required_without:question', 'array' ],
            'mcqAnswer.*'       => [ 'in:1,2,3,4', 'required', 'integer' ],
            'mcqMarks'          => [ 'required_without:question', 'array' ],
            'mcqMarks.*'        => [ 'integer', 'required', 'min:1' ],
            'question'          => [ 'required_without:mcq', 'array' ],
            'question.*'        => [ 'string', 'required' ],
            'questionMarks'     => [ 'required_without:mcq', 'array' ],
            'questionMarks.*'   => [ 'integer', 'required', 'min:1' ],
        ],
        'SubmitQuiz' => [
            'mcqs'              => [ 'required_without:questions', 'array' ],
            'mcqs.*'             => [ 'in:1,2,3,4', 'required', 'integer' ],
            'questions'         => [ 'required_without:mcqs', 'array' ],
            'questions.*'       => [ 'string', 'required' ],
        ]
    ],
    'Gallery' => [
        'AddGallery' => [
            'image'             => [ 'required', 'file', 'mimes:jpg,jpeg,png' ],
            'title'             => [ 'required', 'string', 'max:191' ],
        ],
        'EditGallery' => [
            'image'             => [ 'nullable', 'file', 'mimes:jpg,jpeg,png' ],
            'title'             => [ 'required', 'string', 'max:191' ],
        ]
    ],
    'Event' => [
        'AddEvent' => [
            'name'              => [ 'required', 'string', 'max:191' ],
            'description'       => [ 'required', 'string' ],
            'image'             => [ 'required', 'file', 'mimes:jpg,jpeg,png' ],
            'time'              => [ 'required', 'date_format:'.env('DATE_TIME_STRING') ],
            'link'              => [ 'required', 'string' ],
            'images'            => [ 'nullable', 'array' ],
            'images.*'          => [ 'required', 'file', 'mimes:jpg,jpeg,png' ],
        ],
        'EditEvent' => [
            'name'              => [ 'required', 'string', 'max:191' ],
            'description'       => [ 'required', 'string' ],
            'image'             => [ 'nullable', 'file', 'mimes:jpg,jpeg,png' ],
            'time'              => [ 'required', 'date_format:'.env('DATE_TIME_STRING') ],
            'link'              => [ 'required', 'string' ],
            'images'            => [ 'nullable', 'array' ],
            'images.*'          => [ 'required', 'file', 'mimes:jpg,jpeg,png' ],
        ]
    ],
    'Assignment' => [
        'AddAssignment' => [
            'admin_class_id'    => [ 'required', 'exists:admin_classes,id', 'integer' ],
            'name'              => [ 'required', 'string', 'max:191' ],
            'title'             => [ 'required', 'string', 'max:191' ],
            'description'       => [ 'required', 'string' ],
            'ppt_name'          => [ 'required', 'string', 'max:191' ],
            'type'              => [ 'required', 'string', 'in:answer,file' ],
            'file'              => [ 'required', 'file' ],
        ],
        'EditAssignment' => [
            'admin_class_id'    => [ 'required', 'exists:admin_classes,id', 'integer' ],
            'name'              => [ 'required', 'string', 'max:191' ],
            'title'             => [ 'required', 'string', 'max:191' ],
            'description'       => [ 'required', 'string' ],
            'ppt_name'          => [ 'required', 'string', 'max:191' ],
            'type'              => [ 'required', 'string', 'in:answer,file' ],
            'file'              => [ 'nullable', 'file' ],
        ]
    ],
    'Attendance' => [
        'AddAttendance' => [
            'attendance'        => [ 'required', 'string', 'in:present,absent,leave' ],
        ],
    ],
    'AssignmentSubmission' => [
        'SubmitAssignment' => [  
            'answer'        => [ 'required' ],
        ]
    ]
];

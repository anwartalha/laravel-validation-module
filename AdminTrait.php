<?php

namespace App\Http\Traits;

use App\Admin;
use App\Http\Traits\HelperTrait;

trait AdminTrait
{

    use HelperTrait;

    public function updateAdmin(Admin $admin)
    {
        $validated = $this->validation(['Admin.AdminEditForm'], [
            [
                'key' => 'name',
                'value' => ['max:191'],
                'messages' => [
                    'password.string' => 'Password shi likho.',
                    'password.min' => 'itna bra password....'
                ]
            ]
        ]);
        if (!is_array($validated)) :
            return $validated;
        endif;
        $admin->name = $validated['name'];
    }
}

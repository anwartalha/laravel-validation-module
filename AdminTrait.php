<?php
namespace App\Http\Traits;

use App\Admin;
use App\Http\Traits\HelperTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

trait AdminTrait {
    
    use HelperTrait;
    
    public function updateAdmin(Admin $admin)
    {
        $validated = $this->validation(['Admin','AdminEditForm'],[
            [
                'key' =>'name' , 
                'value' => [ 'max:191' ],
                'messages' => [
                    'password.string' => 'Password shi likho.',
                    'password.min' => 'itna bra password....'
                ]
            ]
        ]);
        if(!is_array($validated)):
            return $validated;
        endif;
        $admin->name = $validated['name'];
        if(!empty($validated['password'])):
        $admin->password = Hash::make($validated['password']);
        endif;
        DB::beginTransaction();
        if($admin->save()):
            DB::commit();
            return $this->jsonResponse('Profile Edited Successfully.', 'success');
        endif;
        DB::rollback();
        return $this->jsonResponse();
    }
   
}
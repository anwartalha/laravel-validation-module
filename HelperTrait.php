<?php
namespace App\Http\Traits;

trait HelperTrait {
 
    public function validation($rules,$extraFields = [],$flag2 = false)
    {
        $ruleStr = [];
        foreach ($rules as $value) :
            $ruleStr[]=$value;
        endforeach;
        $rules = config('formValidation.'.implode('.',$ruleStr).'.rules');
        $messages = [];
        if(config('formValidation.'.implode('.',$ruleStr).'.messages')):
            $messages = config('formValidation.'.implode('.',$ruleStr).'.messages');
        endif;
        foreach ($extraFields as $extra) :
            $flag = true;
            foreach ($rules as $key => &$rule) :
                if($extra['key'] == $key):
                    foreach ($extra['value'] as $val) :
                        $rule[] = $val;
                    endforeach;
                    $flag = false;
                    $rules[$key] = $rule;
                    break;
                endif;
            endforeach;  
            if($flag):
                $rules[$extra['key']] = $extra['value'];
            endif;  
            if(isset($extra['messages'])):
                $messages = array_merge($messages,$extra['messages']);
            endif;                
        endforeach;
        $validator = validator(request()->all(),$rules,$messages);
        if($validator->fails()):
            if($flag2):
                return $validator;
            else:
                return response()->json(['errors' => $validator->errors()]);
            endif;
        endif;
        return $validator->validated();
    }

    public function jsonResponse($msg = null,$type = null,$reload = false)
    {   
        if($msg == null && $type == null):
            return response()->json([
                'msg' => [
                    'msg' => 'Something went wrong.' ,
                    'type' => 'error'
                ]
            ]);
        endif;
        if(is_array($msg)):
            return response()->json($msg);
        endif;
        if($reload):
            return response()->json([
                'msg' => [
                    'msg' => $msg ,
                    'type' => $type,
                    'reload' => true
                ]
            ]);    
        endif;
        return response()->json([
            'msg' => [
                'msg' => $msg ,
                'type' => $type
            ]
        ]);
    }

    public function simpleResponse($msg = null,$type = null)
    {   
        if($msg != null && $type != null):
            return back()->with( $type , $msg);
        endif;
        if(is_array($msg)):
            return back()->with($msg);
        endif;
        return back()->with(['error' => 'Something Went Wrong.']);
    }
   
}
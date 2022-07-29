<?php 
namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidator extends Validator
{
    /**
     * 偶数なら許可、奇数なら不許可
     */
    public function validateHello($attribute, $value, $parameters) 
    {
        return $value % 2 == 0;
    }
}

?>
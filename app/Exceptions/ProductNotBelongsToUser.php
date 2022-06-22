<?php

namespace App\Exceptions;

use Exception;
class ProductNotBelongsToUser extends Exception
{
    //
    public function render(){
        # code
        return [
            'errors'=>'Product do not belongs to user'
        ];
    }
}

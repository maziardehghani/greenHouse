<?php
namespace App\Http\Controllers\Admin\helpers;
class messages
{
    public function Error($messageText)
    {
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><i class="zmdi zmdi-info"></i>'.$messageText.' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return $message ;
    }
}

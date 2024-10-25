<?php 
namespace Traits;

trait Responseformatter{
    public function responseFormatter($code, $message, $data = null){
        return json_encode([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ]);
    }
} 
{
    
}

?>
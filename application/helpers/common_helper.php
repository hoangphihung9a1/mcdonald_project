<?php
class common_helper{
    public function public_url($string = ''){
        return base_url('public/'.$string);
    }
}
?>
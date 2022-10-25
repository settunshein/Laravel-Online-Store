<?php

namespace App\Traits;

trait ButtonBuilder
{
    public function generateButton(object $object, string $route_segment, array $btn_arr)
    {   

        $info_btn = $edit_btn = $del_btn = '';

        if( in_array('show', $btn_arr) ){
            $info_btn = '
                <a href="'.route('admin.'.$route_segment.'.show', $object->id).'" class="btn btn-outline-dark btn-sm rounded-0">
                    <i class="fa fa-list"></i>
                </a>
            ';
        }

        if( in_array('edit', $btn_arr) ){
            $edit_btn = '
                <a href="'.route('admin.'.$route_segment.'.edit', $object->id).'" class="btn btn-outline-dark btn-sm rounded-0">
                    <i class="fa fa-edit"></i>
                </a>
            ';
        }   

        if( in_array('delete', $btn_arr) ){
            $del_btn  = '
                <a href="#" class="btn btn-outline-dark btn-sm del-btn rounded-0 del-'.$route_segment.'-btn" data-id="'.$object->id.'">
                    <i class="fa fa-trash-alt"></i>
                </a>
            ';
        }
        
        return '<div class="action-btn-group">' . $info_btn  . $edit_btn . $del_btn . '</div>';
    }
}
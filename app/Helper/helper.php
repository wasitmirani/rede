<?php

use Illuminate\Support\Str;
use App\Helper\HelperComponent;

function sideBarMenu(){
    return HelperComponent::sideBar();
}
function setSingleLink($title,$icon,$route=null){
    return [
        "title"=>$title,
        "icon"=>$icon,
        "route"=>$route
    ];
}

function setSubMenu($title,$icon,$route=null){
    return [
        "title"=>$title,
        "icon"=>$icon,
        "route"=>$route
    ];
 }

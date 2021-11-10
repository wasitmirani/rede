<?php
namespace App\Helper;

class HelperComponent {

    public static function SideBar(){
        return [

                [
                    "single_link" => setSingleLink( "Profile","home","index"),
                ],



                // [
                //     "single_link" => setSingleLink("Applications", "file-text", null, "/customer/applications"),
                // ],
                // [
                //     "single_link" => setSingleLink( "Approved Apps","file-text",null,"/assigned/apps"),
                // ],
                // [
                //     "single_link" => setSingleLink( "My Apps","file-text",null,"/my/apps"),
                // ],
                // [
                //     "single_link" => setSingleLink( "Assign App","file-text",null,"/assign/apps"),
                // ],
                // [
                //     "single_link" => setSingleLink("Logout","arrow",null,"logout"),
                // ],
                [
                    "single_link" => setSingleLink( "Notify","bell","group.list"),
                ],
                [
                    "heading" => "Config",
                ],
                [
                    "single_link" => setSingleLink("Settings", "settings","events.list"),
                ],
                // [
                //     "single_link" => setSingleLink("Logs", "bullseye", null, "/logs/activities"),
                // ],

             

     ];
    }
}

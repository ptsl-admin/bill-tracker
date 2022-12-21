<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller {
    public static function get_user_data () {
        return [
            "first_name" => "Charles",
            "last_name" => "Darwin",
            "books" => [
                "On the Origin of Species",
                "The Voyager of the Beagle",
                "Evolution",
                "The expression of the Emotion in man and animals"
            ]
        ];
    }
}

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use DateTime;

if (!function_exists('dateFormat')) {
    function dateFormat($date)
    {
        if (!empty($date)) {
            return date('d/m/Y', strtotime($date));
        } else {
            return '';
        }
    }
}
if (!function_exists('dateFormatdatabase')) {
    function dateFormatdatabase($date)
    {
        if (!empty($date)) {
            return date('Y/m/d', strtotime($date));
        } else {
            return '';
        }
    }
}
if (!function_exists('dateDayTimeFormat')) {
    function dateDayTimeFormat($date)
    {
        if (!empty($date)) {
            return date('d F Y - h:i A', strtotime($date));
        } else {
            return '';
        }
    }
}
if (!function_exists('dateTimeFormat')) {
    function dateTimeFormat($date)
    {
        if (!empty($date)) {
            return date('m/d/Y h:i A', strtotime($date));
        } else {
            return '';
        }
    }
}
if (!function_exists('countDayFormat')) {
    function countDayFormat($date)
    {
        if (!empty($date)) {
            $givenDate = date('Y-m-d', strtotime($date));
            $currentDate = date('Y-m-d');
            $givenDateTime = new DateTime($givenDate);
            $currentDateTime = new DateTime($currentDate);
            $interval = $givenDateTime->diff($currentDateTime);
            return $daysDifference = $interval->format('%a');
        } else {
            return '';
        }
    }
}
if (!function_exists('timeAgo')) {
    function timeAgo($time_ago, $timezone = 'UTC')
    {
        // Create a Carbon instance from the input time and set the timezone
        $time_ago = \Carbon\Carbon::parse($time_ago)->setTimezone($timezone);

        $cur_time   = \Carbon\Carbon::now();
        $time_elapsed   = $cur_time->diffInSeconds($time_ago);
        $seconds    = $time_elapsed;
        $minutes    = round($time_elapsed / 60);
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400);
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640);
        $years      = round($time_elapsed / 31207680);

        // Seconds
        if ($seconds <= 60) {
            return "just now";
        }
        // Minutes
        else if ($minutes <= 60) {
            return "$minutes minutes ago";
        }
        // Hours
        else if ($hours <= 24) {
            return "$hours hours ago";
        }
        // Days
        else if ($days <= 7) {
            return "$days days ago";
        }
        // Weeks
        else if ($weeks <= 4.3) {
            return "$weeks weeks ago";
        }
        // Months
        else if ($months <= 12) {
            return "$months months ago";
        }
        // Years
        else {
            return "$years years ago";
        }
    }
}

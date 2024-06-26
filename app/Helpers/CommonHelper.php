<?php

use Illuminate\Support\Facades\Cache;
//use App\Models\Award;
//use App\Models\Blog;
//use App\Models\BlogCategory;
//use App\Models\BlogComment;
use App\Models\BusinessSetting;
use App\Models\ContactSetting;
//use App\Models\Contact;
//use App\Models\Faq;
//use App\Models\MediaCoverage;
//use App\Models\PracticeArea;
//use App\Models\Publication;
//use App\Models\Team;
use Illuminate\Support\Facades\Mail;


    if (!function_exists('datetimeFormatter')) {
        function datetimeFormatter($value)
        {
            return date('d M Y H:iA', strtotime($value));
        }
    }

    //sensSMS function for OTP
    if (!function_exists('get_settings')) {
        function get_settings($type)
        {
            $cacheKey = "business_setting_{$type}";
        
            // Check if the value is already in the cache
            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }
        
            // If not in the cache, retrieve the value from the database
            $businessSetting = BusinessSetting::where('type', $type)->first();
        
            if ($businessSetting) {
                $value = $businessSetting->value;
        
                // Store the value in the cache with a specific lifetime (e.g., 60 minutes)
                Cache::put($cacheKey, $value, now()->addMinutes(60));
        
                return $value;
            }
        
            // Handle the case where no record is found
            return null; // or any default value or error handling you prefer
        }
    }

    if (!function_exists('get_contactpage')) {
        function get_contactpage($type)
        {
            $cacheKey = "contact_page_setting_{$type}";
        
            // Check if the value is already in the cache
            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }
        
            // If not in the cache, retrieve the value from the database
            $ContactSetting = ContactSetting::where('type', $type)->first();
        
            if ($ContactSetting) {
                $value = $ContactSetting->value;
        
                // Store the value in the cache with a specific lifetime (e.g., 60 minutes)
                Cache::put($cacheKey, $value, now()->addMinutes(60));
        
                return $value;
            }
        
            // Handle the case where no record is found
            return null; // or any default value or error handling you prefer
        }
    }

    if(!function_exists('sendEmail')){
        function sendEmail($to, $subject, $body, $attachments = [])
        {
            return \Illuminate\Support\Facades\Mail::raw($body, function ($message) use ($to, $subject, $attachments) {
                $message->to($to)
                //$message->to('khanfaisal.makent@gmail.com')
                        ->subject($subject);
        
                // Attachments
                foreach ($attachments as $attachment) {
                    $message->attach($attachment['path'], ['as' => $attachment['name']]);
                }
            });
        }  
    }

    if(!function_exists('ip_info')){
        function ip_info(){
            
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = $_SERVER['REMOTE_ADDR'] ?  $_SERVER['REMOTE_ADDR'] : '';
            }
            $ip = explode(',', $ip);
            $ip = $ip[0];
            //$ip = '103.175.61.38111';
            		
            //$info = file_get_contents("http://ipinfo.io/{$ip}/geo");
            
            $curl = curl_init();
            
            curl_setopt($curl, CURLOPT_URL, 'ipinfo.io/'.$ip.'?token='.env('IPINFO_API_TOKEN'));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_ENCODING, '');
            curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
            curl_setopt($curl, CURLOPT_TIMEOUT, 0);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            
            $info = curl_exec($curl);
            curl_close($curl);
            
            if(!empty($info)){
                return $info; //return in json
            }else{
                $info = '{ "ip": "none", "city": "none", "region": "none", "country": "none", "loc": "none", "postal": "none", "timezone": "none", "readme": "none" }';
                return $info; //return in json
            }
        }
    }

    if(!function_exists('ulp_id')){
        function ulp_id($number){
            
            // Ensure the length of $ulp_id is exactly 12 digits
            if (strlen($number) < 7) {
                $padding_length = 7 - strlen($number);
                $ulp_number = str_pad($number, 7, '0', STR_PAD_LEFT); // Pad with leading zeros if necessary
            } elseif (strlen($number) > 7) {
                $ulp_number = substr($number, 0, 7); // Trim if longer than 12 digits
            }

            $ulp_number = 'U-'.$ulp_number;

            return $ulp_number;

        }
    }

    if(!function_exists('application_no')){
        function application_no($number){
            
            // Ensure the length of $ulp_id is exactly 12 digits
            if (strlen($number) < 7) {
                $padding_length = 7 - strlen($number);
                $application_no = str_pad($number, 7, '0', STR_PAD_LEFT); // Pad with leading zeros if necessary
            } elseif (strlen($number) > 7) {
                $application_no = substr($number, 0, 7); // Trim if longer than 12 digits
            }

            $application_no = 'A-'.$application_no;

            return $application_no;

        }
    }

    if(!function_exists('account_no')){
        function account_no($number){
            
            // Ensure the length of $ulp_id is exactly 12 digits
            if (strlen($number) < 12) {
                $padding_length = 12 - strlen($number);
                $account_no = str_pad($number, 12, '0', STR_PAD_LEFT); // Pad with leading zeros if necessary
            } elseif (strlen($number) > 12) {
                $account_no = substr($number, 0, 12); // Trim if longer than 12 digits
            }

            $account_no = 'AC-'.$account_no;

            return $account_no;

        }
    }


    if(!function_exists('custom_date_change')){
        function custom_date_change($date){
            
            // Create a DateTime object
            $date = new DateTime($date);

            // Get the day, month, and year
            $day = $date->format('j'); // Day without leading zeros
            $month = $date->format('M'); // Short month name
            $year = $date->format('Y'); // Full year

            // Anonymous function to add ordinal suffix to the day
            $addOrdinalSuffix = function ($num) {
                $num = intval($num);
                if (!in_array(($num % 100), [11, 12, 13])) {
                    switch ($num % 10) {
                        case 1: return $num . 'st';
                        case 2: return $num . 'nd';
                        case 3: return $num . 'rd';
                    }
                }
                return $num . 'th';
            };

            // Format the date string
            $formattedDate = $addOrdinalSuffix($day) . ' ' . $month . ' ' . $year;

            return $formattedDate;

        }
    }


    if (!function_exists('full_url')) {
        function full_url() {
            // Determine if the request is secure
            $isSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;
    
            // Get the HTTP or HTTPS part of the URL
            $protocol = $isSecure ? 'https://' : 'http://';
    
            // Build the full URL
            $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
            return $url;
        }
    }

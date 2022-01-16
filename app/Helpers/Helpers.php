<?php

use App\Models\Center;
use App\Models\StaticOption;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\Mail;
// use GuzzleHttp\Client;



if (!function_exists('random_code')) {

    function set_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function get_static_option($key)
    {
        if (StaticOption::where('option_name', $key)->first()) {
            $return_val = StaticOption::where('option_name', $key)->first();
            return $return_val->option_value;
        }
        return null;
    }

    function update_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        } else {
            StaticOption::where('option_name', $key)->update([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function send_sms($message, $phone)
    {

        // app name given in here
        $app_name = env('APP_NAME');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => env('SMS_API_URL'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(

                'api_key' => env('SMS_API_KEY'),
                'msg' => nl2br($message . ". Regards from " . $app_name),
                'to' => $phone
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);
    }

    function set_env_value(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }

    function get_total_trusted_medical_assistants()
    {
        $trustedMedicalAssistants = User::where('user_type', 'trusted-medical-assistant')->where('center_id', Auth::user()->center_id)->count();
        return $trustedMedicalAssistants;
    }

    function get_total_rapid_pcr_trusted_medical_assistants()
    {
        return User::where('user_type', 'rapid-prc-center-trusted-medical-assistant')->where('rapid_pcr_center_id', Auth::user()->rapid_pcr_center_id)->count();
    }

    function get_max_service_per_day($totalDayMinutes, $per_precess_minute, $number_of_trusted_medical_assistants)
    {
        $man_power_minute_for_precess = $number_of_trusted_medical_assistants * $totalDayMinutes;
        return intval($man_power_minute_for_precess / $per_precess_minute);
    }

    function get_available_service_at_a_time($centerArea)
    {
        $person_sft_cal = get_static_option('sft_per_person');
        $other_sft = get_static_option('others_sft');

        $after_minus_space = $centerArea->maximum_space - $other_sft;
        $available_person = $after_minus_space / $person_sft_cal;
        return intval($available_person);
    }

    function get_available_service_at_a_time_in_rtpcr_center($centerArea)
    {
        $person_sft_cal = get_static_option('sft_per_person');
        $other_sft = get_static_option('others_sft');

        $after_minus_space = $centerArea->maximum_space - $other_sft;
        $available_person = $after_minus_space / $person_sft_cal;
        return intval($available_person);
    }

    function get_pending_center_list()
    {
       $centers = Center::where('status','!=','1')->count();
       return $centers;
    }
}

<?php

namespace App\Models;

use App\Traits\RequestHelper;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class APIModel
{
    protected $client;
    protected $kairos_client;
    protected $kairos_url;
    protected $app_key;
    protected $app_id;

    public function __construct(){
        $this->kairos_url = rtrim(env('KAIROS_URL') , '/');
        $this->kairos_client = new Client;
        $this->app_key = env('KAIROS_APP_KEY');
        $this->app_id = env('KAIROS_APP_ID');
    }

    public function addImageToGallery($image_url, $subject_id, $gallery_name){
        $url = $this->kairos_url . '/enroll';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS,"{
        \"image\": " . '"' . $image_url . '"' . ","
        ." \"subject_id\": " .  '"' .$subject_id . '"' . ","
        ."\"gallery_name\": " . '"' . $gallery_name . '"'
        ."}"  );

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "app_id: " . $this->app_id,
        "app_key: " . $this->app_key
        ));

        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        
        return $response;
    }

    public function verifyUserFromGallery($image_url, $gallery_name, $subject_id){
        $url = $this->kairos_url . '/enroll';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS,"{
        \"image\": " . '"' . $image_url . '"' . ","
        ." \"subject_id\": " .  '"' .$subject_id . '"' . ","
        ."\"gallery_name\": " . '"' . $gallery_name . '"'
        ."}" );

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "app_id: " . $this->app_id,
        "app_key: " . $this->app_key
        ));

        $response = json_decode(curl_exec($ch));
        curl_close($ch);

        return $response;
    }
}

<?php

namespace App\Models;

use App\Traits\RequestHelper;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Google\Cloud\Storage\StorageClient;



class StorageModel
{
    protected $app_bucketname;
    protected $project_id;
    protected $storage;
    protected $gs_baseurl;

    public function __construct(){
        $this->app_bucketname =env('BUCKET_NAME');
        $this->project_id = env('GOOGLE_PROJECT_ID');
        $this->storage = new StorageClient([
            'projectId' => $this->project_id,
            'keyFilePath' => env('GOOGLE_APPLICATION_CREDENTIALS'),
        ]);
        $this->gs_baseurl = env('PUBLIC_GS_BASEURL');
    }
    /**
    * Upload a file.
    *
    * @param string $bucketName the name of your Google Cloud bucket. (specified in the construct)
    * @param string $objectName the name of the object.
    * @param string $sourceImage the path to the file to upload.
    *
    * @return string $file_link - the publicly accessible link to the uploaded image
    */
    function upload_object($objectName, $sourceImage)
    {
        $file = fopen($sourceImage, 'r');
        $bucket = $this->storage->bucket($this->app_bucketname, true);
        
        $object = $bucket->upload($file, [
            'name' => $objectName,
            'predefinedAcl' => 'publicRead',
        ]);
        // at this point. the object has been uploaded to GCS
        $file_link = rtrim( $this->gs_baseurl , '/') . '/' . $this->app_bucketname . '/' . $objectName;
        return $file_link;
    }
}

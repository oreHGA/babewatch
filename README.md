<p align=“center”><a href=“LICENSE”><img alt=“GitHub license” src="https://img.shields.io/github/license/laravelnigeria/website.svg"></a></p>

# 👶🏾 BabeWatch 

BabeWatch is a [Laravel](https://laravel.com/) application that uses Machine Learning algorithms to protect a baby. This is done by ensuring that only authorized people are allowed to move the baby from its location.

## Tech

BabeWatch uses a number of APIs/Technologies to work properly:

* [PHP](http://php.net/) - General-purpose scripting language used for web development.
* [Laravel](https://laravel.com/) - The PHP Framework For Web Artisans
* [mySQL](https://www.mysql.com/) - Open-source relational database management system
* [Kairos](https://www.kairos.com/) - Facial recognition company. With face analysis algorithms that recognize &amp; understand how people feel in video, photos &amp; the real-world!
* [webcam.js](https://github.com/jhuckaby/webcamjs) - HTML5 Webcam Image Capture Library with Flash Fallback
* [Google Cloud Storage](https://cloud.google.com/storage/) - Google Cloud Storage is unified object storage for developers and enterprises, from live applications data to cloud archival.
* [Twitter Bootstrap](http://twitter.github.com/bootstrap/)- great UI boilerplate for modern web apps
* [jQuery](http://jquery.com) - Makes it much easier to use JavaScript on your website.

Note: The use of Google Cloud Storage was optional. You could store data on your local machine instead

## Development

Want to contribute? Great!
Babewatch uses [Laravel](https://laravel.com/) v5.4+ for development. 

### Step 1: Clone the repository and change directory into it
```sh
$ git clone https://github.com/oreHGA/babewatch.git  && cd babewatch
```

### Step 2: Create your env file
```sh
$ cp .env.example .env
```

### Step 3: Generate a key
```sh
$ php artisan key:generate
```

### Step 4: Create a database ( remember the values used )
```sh
$ mysql -u $username -p $password
mysql> CREATE DATABASE $dbname;
mysql> USE $dbname;
```

### Step 5: Run Migrations
```sh
$ php artisan migrate
```

### Step 6: Editing environment variables 
Now you need to edit your environment variables in your `.env` file
The following would need to be changed :
Note : `$database`, `$username`, `$password` refer to the values you set when you were setting up your databasea earlier
``` 
DB_CONNECTION='database connection eg mysql'
DB_HOST='database host eg 127.0.0.1'
DB_PORT='3306'
DB_DATABASE=$database
DB_USERNAME=$username
DB_PASSWORD=$password
```

[Kairos](https://www.kairos.com/) is free for personal use. Head to their website, register and create your application. 
Once this is done, you will be given `app_id` and `app_key`. Use these as the values for the variables below 

```
KAIROS_APP_ID=$app_id
KAIROS_APP_KEY=$app_key
KAIROS_URL=https://api.kairos.com
```

(optional) Using Google Cloud Storage
You will need to do a few things before performing the next step
- Head to [GCS Website](https://cloud.google.com/storage/)
- Go to the console [link](https://console.cloud.google.com)
- Create a new project [link](https://console.cloud.google.com/projectcreate), remember the `project_id`
- Create a new storage bucket  [link](https://console.cloud.google.com/storage/create-bucket), remember the `bucket_name`
- Create google application credentials [link](https://developers.google.com/identity/protocols/application-default-credentials), dowload the credentials - `*.json` and remember the `path` to the file
```
BUCKET_NAME=$bucket_name
GOOGLE_PROJECT_ID=$project_id
GOOGLE_APPLICATION_CREDENTIALS=$path-to-file/'credentials.json'
PUBLIC_GS_BASEURL=https://storage.googleapis.com/
```

### Step 7: Install Dependecies
If you already have [Laravel](https://laravel.com/) installed then you have `composer` setup on your development environment. If not go [here](https://laravel.com/) to setup `Laravel`. Once that's done, run
```sh
$ composer install
```

And now you should be all set!
Verify the deployment by navigating to your server address in your preferred browser.

```sh
127.0.0.1:8000
```

Once you're done, make a pull request and once it's reviewed it would be merged if it passes build.
### Todos

 - Show a list of 'added friends' on dashboard
 - Deleting friends from 'added friends' list
 - Using [Raspberry PIs](https://www.raspberrypi.org/) cameras  to perfom verification and send results to the main server

License
----

MIT

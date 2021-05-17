![cover](https://raw.githubusercontent.com/mlab817/ipms-rest/main/cover.png)

## About IPMS

The Investment Programming and Management System (or simply IPMS) is a 
web application built using the PHP Laravel Framework (v.8.*). 
We believe that Public Investment Programming (PIP) formulation and updating
should focus on identification and prioritization of programs and projects
rather than merely encoding entries into a collection system (be it MS 
Excel, Google Sheets or any other platform). The IPMS is built as RESTful API
to make development more flexible and easy to build on.

The objectives of the IPMS are as follows:

1. To be a one-stop shop for all programs and projects to be submitted to the NEDA PIPOL System;
2. To build a bridge from the plan (or the AFMP/NAFMIP) to the budget (annual plan and budget);
3. To provide a list of potential projects for official development assistance financing;
4. To monitor the progress of implementation of programs and projects supportive to achieving 
   the goals of the Philippine agriculture and fisheries sector.
   
## Deployment

* The preferred approach for deployment is by linking the hosting to the Github repository which can be found at https://github.com/mlab817/ipms-v2.
* Once linked and the repo and hosting has synced, in the console, run `composer install` to install all dependencies.
* Once composer completes, run `cp .env.example .env`. This will create a copy of the `.env` example file. The `.env` file is where you can modify the app configuration.
* Run `php artisan key:generate` to generate the unique app key. The application will fail to run if this is not done.
* Update the relevant settings:

| Variable * | Description | Default |
|-----|-----|-----|
|APP_NAME | The name of the app | IPMSv2 |
|APP_ENV| The environment of the app. Change to production on deployment to disable debug mode | local |
|APP_KEY| The app key - run `php artisan key:generate` to create one | null |
|APP_DEBUG| Determines if debug messages are shown. Set to false to disable | true|
|APP_URL| Set to the actual URL of the app as this will be appended to emails, etc. | http://localhost |
|LOG_CHANNEL | Determines how the app logs events, errors, etc | stack |
|LOG_LEVEL | Determines lowest level of log is logged | debug |
|DB_CONNECTION | What database driver to use | mysql |
|DB_HOST | What host the database is found | 127.0.0.1 | 
|DB_PORT | What host the database is found | 3306 |
|DB_DATABASE | Name of the database | ${APP_NAME} |
|DB_USERNAME | Username used to access the database | null |
|DB_PASSWORD | Password to use | null |
|BROADCAST_DRIVER | Determine how events are broadcasted | pusher |
|QUEUE_CONNECTION | Determines how queues are run. Change to database on deployment | sync |
|MAIL_* | This group of config determines how emails from the system are sent | (multiple) |
|WKHTML_PDF_BINARY | Location of the executable to generate pdf. Used by datatables | null |
|WKHTML_IMG_BINARY | Location of the executable to generate image. Used by datatables | null |
|GOOGLE_* | These settings are used by the Google Login. Please visit google developer console to get the keys | (multiple) |
|IPMS_EMAIL | Email of the IPD. This will be displayed in contact email | null |
|IPMS_CONTACT_INFO | Contact number/s of the IPD. This will be displayed in contact number/s | null |
|ALLOW_GOOGLE_LOGIN | Determine if the system allow google login | false |
    * These are the settings used by the app.
* Run `php artisan migrate:fresh --seed`. This will create the tables in the database and insert the initial data needed to run the app.
* Next is to set up CRON job to run queues in the hosting. Although you may set the `QUEUE_DRIVER` to `sync`, this is not preferred as this could potentially slow down the system. For the CRON job, the only command needed to be run is `php artisan schedule:run`.
* You may now use the application.

## Bug Report

If you found any feature that is not behaving as expected, please send an e-mail to Lester Bolotaolo via [mlab817@gmail.com](mailto:mlab817@gmail.com). You may also file an `Issue` in this [Github repo](#https://github.com/mlab817/ipms-v2/issues). 

## Security Vulnerabilities

If you discover a security vulnerability within IPMS, please send an e-mail to Lester Bolotaolo via [mlab817@gmail.com](mailto:mlab817@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The IPMS is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

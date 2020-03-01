# Tiny URL

Generate a tiny url of any long url in the internet.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
Server Configuration

Nginx Server
```
location / {
        try_files $uri $uri/ = /index.php$query_string;
    }
```

### Database Configuration

location
```
config/database.php
```

Set your database credentials

```
$capsule->addConnection([

    "driver" => "mysql",

    "host" => "127.0.0.1",

    "database" => "tiny-url",

    "username" => "admin",

    "password" => "root"

]);
```
Migration
```
http://domain/migration/Url.php

example: http://tinyurl.local/migration/Url.php
```

Navigate the "Url.php" page in your browser to migrate the required table to your database.

Now you're up and ready to go.

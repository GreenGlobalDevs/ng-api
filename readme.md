# ng-api 

RESTFul API using for AngularJS Training. Build with Laravel 5.

## Developer guide

Base URL : http://ng-api.techpush.net/

#### Get all players by default order

http://ng-api.techpush.net/players

Return a collection of Player object

The following parameters are available:

- _search : String, optional
- _key : String, optional. Must be a valid property of Player object.
- _sort : String, optional. Must be a valid property of Player object.
- _order : ['desc' | 'asc'], optional.  Default : 'asc'
- _start : Interger, optional. Default : 0
- _end : Interger, optional.  Default : 30

Example requests:

Get all players who are playing for Valencia:

```
http://ng-api.techpush.net/players?_search=Valencia&_key=club
```

Get all Argentine players:

```
http://ng-api.techpush.net/players?_search=Argentina&_key=nationality
```

Get 5 most expensive English players:
```
http://ng-api.techpush.net/players?_search=England&_key=nationality&_sort=price&_order=desc&_end=5
```

Get all players who have the phrase "ph" in name:

```
http://ng-api.techpush.net/players?_search=ph&_key=name
```

Get all players who have the phrase "ph" in name, then extract only from 5 to 10:

```
http://ng-api.techpush.net/players?_search=ph&_key=name&_start=5&_end=10
```

Get all players who have the phrase "ph" in name, and sort them by age from old to young:

```
http://ng-api.techpush.net/players?_search=ph&_key=name&_sort=age&_order=desc
```

#### Get a specified player

http://ng-api.techpush.net/players/{PLAYER_ID}

Return a Player object.

Example: 

```
http://ng-api.techpush.net/players/dPe0oMSQQ1YC
```

Result:
```
{
  player: {
    id: "dPe0oMSQQ1YC",
    name: "Jonathan Castro",
    avatar: "http://eightbitavatar.herokuapp.com/?id=dPe0oMSQQ1YC&s=male&size=120",
    birthday: "4/27/1991",
    age: 24,
    height: 178,
    weight: 86,
    nationality: "Netherlands",
    club: "Lyon",
    position: "RB",
    rating: 59,
    level: "Professional",
    price: 10000000
  }
}
```

If there is not any player found, it will return 'false'.


## Run as local server

If you want to install this REST API on your local machine, please follow the instructions below.

####1. Clone source code:

```
git clone git@github.com:GreenGlobalDevs/ng-api.git
```

####2. Install Laravel dependencies:

With Terminal, move the cursor into "ng-api" folder. Then:

```
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install
```

Composer will retrieve the needed modules specified by /composer.json file.

For more info about Composer: https://getcomposer.org/

####3. Set permission

Please make sure two directories /ng-api/storage and /ng-api//vendor are writable.

For more info about Laravel's installation: http://laravel.com/docs/5.0

####4. Localhost settings

If you are using .nix system, edit /etc/hosts (no extension). Append a line to specify the domain you want to handle as local server.

```
127.0.0.1   localhost
127.0.1.1   bella-mint.com  bella-mint

# The following lines are desirable for IPv6 capable hosts
::1     ip6-localhost ip6-loopback
fe00::0 ip6-localnet
ff00::0 ip6-mcastprefix
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters

127.0.0.1 ng-api.angularjs.me
```

You also need to add a new config file into your nginx/site-enabled folder, for example:

```
server {
    listen       80;
    server_name  ng-api.angularjs.me;

    charset      utf-8;

    root /var/www/html/ng-api/public/;
    index index.php index.htm index.html;

    location / {
        index  index.php index.html index.htm;
    }

}
```

For the case you are using Apache server:

```
Listen 80

NameVirtualHost *:80

<VirtualHost *:80>
    DocumentRoot /var/www/html/ng-api/public/;
    ServerName ng-api.angularjs.me
</VirtualHost>
```

If everything is OK, it would work for you.


### Author by:

- @GreenGlobal.vn
- @ndaidong at Twitter

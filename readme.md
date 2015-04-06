## ng-api 

RESTFul API for AngularJS Training. Build with Laravel 5.

### Developer guide

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

#### Get a specified player

https://ng-api-ndaidong.c9.io/players/PLAYER_ID

Return a Player object.

For example: http://ng-api.techpush.net/players/dPe0oMSQQ1YC

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


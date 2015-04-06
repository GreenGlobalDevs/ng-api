## ng-api RESTFul API for AngularJS Training

Build with Laravel 5

### Developer guide

Base URL : https://ng-api-ndaidong.c9.io/

#### Get all players by default order

https://ng-api-ndaidong.c9.io/players

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

Return a Player object


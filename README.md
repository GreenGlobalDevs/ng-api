# ng-api

CORS RESTFull API for test AngularJS

Base URL: https://ng-api-ndaidong.c9.io/

###Parameters

- _search
- _key
- _sort
- _order
- _start
- _end

Examples:

https://ng-api-ndaidong.c9.io/?_search=cob&_key=name 
--> Returns all entries those have name contains "cob" string.


https://ng-api-ndaidong.c9.io/?_start=10&_end=20 
--> Returns a sub collection from 10 to 20

https://ng-api-ndaidong.c9.io/?_sort=age&_order=desc 
--> Sort by "age" and order the entries from higher to lower

All the above parametes are optional and can be combined together.

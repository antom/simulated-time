Simulated Time (PHP/JS) by [@antom](http://github.com/antom)
=============================================================

Calculates a unix timestamp based on based on the difference between a starting time and a current time with a multiplier to accelerate if required. Provides a simple but effective way of modelling time based on existing date functionality in PHP/JS, which could be used, for example, in a simulation game.

For example, by setting 1 second = 7 seconds of simulated time, it would take 24 hours to simulate a week.

Optional Query Parameters
=========================

| Query Parameter | What It Sets                            | Default Value |
| --------------- | --------------------------------------- | ------------- |
| y               | Start year (eg. 2014)                   | Current Year  |
| m               | Start month (1-12)                      | 1             | 
| d               | Start date (1-31)                       | 1             |
| h               | Start hour (0-23)                       | 0             |
| i               | Start minute (0-59)                     | 0             |
| p               | Initial year (eg. Year 1)               | 1             |
| x               | Multiplier (1 second equals)            | 3             |
| t               | Current time (timestamp or date string) | PHP time()    |

Issues
======

The JS is limited by the Date object's range (100,000,000 days relative to 1st Jan, 1970 UTC) so it will stop working when the simulated timestamp reaches 8640000000000. If the initial year is at it's default of 1, this works out at Year 275760, Day 256 - 13th Sep @ 12:00am.

License
=======

Licensed under the MIT license. (http://opensource.org/licenses/MIT)

For demonstration purposes, a copy of the date function from the php.js project has been included (see http://phpjs.org/functions/date/).
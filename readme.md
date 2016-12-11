## Webclock
Laravel implementation of a clockin/clockout system. Ideally it should be installed on a LAN and not made accessible on the internet else people will login remotely and checkin even when they are not at the premises. Maybe if you keep track of the ipaddress they use, then you can catch such cases.

##Feature to add
1. Reports - run some stats on who are late and who are not, and show performance over time.
2. Export - Maybe export the data to excel or csv, i don't know what for.

## Installation
1. Clone the repository into your project folder
        `git clone https://github.com/skapeyi/webclock.git`
2. Run `composer install` from cmd to install all project dependencies
3. Update the values in `.env` file
4. Run ```php artisan migrate``` to install the database migration

### Stack
      * PHP/Laravel
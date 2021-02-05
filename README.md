# Laravel Test
Using the Laravel Boilerplate, I could easily scaffold everything required including CoreUI Admin panel and authentication.
The boilerplate already comes served with everything required to easily and quickly initialize this project.

The database relationships are pretty straight forward, with no complicated morphologies. 
A cinema has many theatres, but a theatre can only have one cinema.
A theatre can have multiple showings, but a showing can only be linked to a single theatre.
Each showing can have multiple bookings, but a booking can only be linked to a single Showing.

You will notice that the application uses livewire in the back-end, but uses vue components+axios in the front end. 
I would personally normally incorporate echo/websockets for instant feedback, but that takes significantly more time to implement.

I have left comments in the code that a developer might enjoy, and purposefully left a few things out of the procedure.

## Installation

`npm i`

**Take note** it seems to have a problem installing on linux because of fs-events. I'm currently using a windows/laragon environment.

`composer i`

`cp .env.exmaple .env`

`php artisan key:generate`

`php artisan migrate --seed`

`php artisan storage:link`

`npm run dev`


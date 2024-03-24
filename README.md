# Sunne-Hotel-Yrgopelag
Assignment to create a hotel website

https://sputnik.zone/school/Sunne-Hotel/

The database used contains two tables, one for room data and one for bookings. The data table stores names, descriptions, rent, etc. of the three rooms. The booking table stores room id, start and end date, name of customer, etc. as rows, also used by the website to display already booked dates.

# Code review
First of all: Great job completing this assignment! It was fun to review your code, and I have learned alot since we have done things completely different. I am definetely taking some of your methods with me in the future.

1. The repo doesn't seem to be created from the Yrgopelago template.
2. No LICENSE file. A comment in the README.md but no seperate file.
3. Maybe there's bit too much javascript? Since it is an PHP assignment.
4. There are barely any comments in the code which makes it hard do follow and understand.
5. If main.php and room.php are not used you should remove them from the project.
6. In my opinion the database could be bigger. For example a Guests table, so that each specific guest has an id that can be referred to. And maybe a Features table so you can easily change names, pricing etc and don't have to change it manually in the the code.
7. index.php: 58-63 -  The footer in the middle of the page is a bit confusing. I understand that it's because of the page structure but maybe it would make more sense for it to be in the end, and hide on the roomPage section i not wanted there?
8. Booking.js: 134-144 - I can't find any validation or sanitazion of the user input. Neither in the php files.
9. authUpdate.php:8 - API-key in the code. Information such as a secret API code could be stored in a .env file and retrieved by getenv('API-KEY').
10. fetchData.php: Could be put in a functions.php page instead?
11. authUpdate.php: 21-34 - Could also be put in a functions.php.




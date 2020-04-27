Overview
In this assignment, we have improved the functionality of our app. 
Our project's GitHub can be found here: https://github.com/UHM-Weathering/outdoor-discovery
Our project's wiki page can be found here:
https://github.com/UHM-Weathering/outdoor-discovery/wiki

INSTALLATION
To install Outdoor Discovery, you must first have a web server with MySQL and PHP installed.  We recommend using a LAMP stack on Ubuntu 18.04.
Next, download the latest release of Outdoor Discovery and upload it to the parent directory of the web root.  The web root will vary depending on the system, but is usually /var/www/html by default on Linux.  For example, if your web root is /var/www/html, upload Outdoor Discovery to /var/www.  Note that you may have to change the name of the /html directory in the Outdoor Discovery source to match that of your web root.  It is important that you upload 
Next, create a database in MySQL for the project.  We recommend using phpMyAdmin for this, however, you can use other tools.  Once the database is created, load the SQL schema and data provided in /outdoor_discovery.sql.  We recommend that you also create a non-root MySQL user with access only to this database.
Next, modify line 9 of /includes/database.php to the database connection settings of your setup, using the template provided as a reference.
At this point, your installation of Outdoor Discovery is complete!  You can access the website by navigating to the server's IP address in your web browser.




PENDING
Functional calendar that displays the events that the user signed up for
Notifications for the user whenever an event is coming up

Emily
NEW COMPLETIONS
Created GitHub wiki page
Added footer
Added password specifications to sign-up page which changes to show which specifications are still not met
CURRENT
Notifications for the user whenever an event is coming up
NEXT
Implement user information
Adding payment processing
Enable email updates for future events


John
NEW COMPLETIONS
Created entries for events from https://manoa.hawaii.edu/studentrec/outdoored/classes.html
Added installation and security notes & disclaimers to wiki page
CURRENT


PENDING
Automatic geolocations for easier finding of event locations
Map display of all events currently going on.
FAQs page https://manoa.hawaii.edu/studentrec/outdoored/faq.html

Kahlin
NEW COMPLETIONS
Linking add event page to the SQL database allowing the creation of an event
CURRENT


PENDING
Switch calendar system
Registering for events
Populating event page fields
Contact Us page https://manoa.hawaii.edu/studentrec/outdoored/contact.html

Matt
NEW COMPLETIONS
Event listing functionality
Event Page functionality
CURRENT
Register event functionality (Matt)
PENDING
Delete event functionality
Admin Page to manage users 
How To Pay page https://manoa.hawaii.edu/studentrec/outdoored/register.html 
About Us page https://manoa.hawaii.edu/studentrec/outdoored/about.html
Program/Refund Policies page https://manoa.hawaii.edu/studentrec/outdoored/policies.html




Closing Thoughts:
	One challenge involved actually using a language to its full potential. Only John had extensive experience with PHP and SQL Databases. The rest of the team had minimal exposure, especially in a web app development since. From that challenge, the team had to spend time learning and applying what John taught us into our respective dev scenarios. 
	One of the biggest surprises was really how easy it was to integrate the PHP database once you wrapped your head around the core of the language. After banging your head against and looking at the sometimes ugly formatting it made a lot of sense and was easy to integrate.
	Important achievements we are proud of is understanding how to handle user information for logging in and logging out. As well as properly managing passwords through salting and storing on our SQL database.

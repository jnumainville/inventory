This is a task management project utilizing a WAMP server. It is also a WIP.   
init.php initializes the database.  
add.php runs the user interface.  
init.php should run once and should return an error after.  
table.php should then be ran to create the necessary table within the database.  
add.php adds the entries to the database and style.css provides the style.  
On the Bitnami WAMP server specifically the files were moved to htdocs under the apache2 directory. The scripts can then be accessed by going to localhost/init.php, localhost/table.php, etc.  
Other setups are not, at this time, directly supported, but should still work, as long as they support MySQLi Object-Oriented.  
Please note that this application, at this time, is NOT intended to be deployed over the internet as there is very little security.

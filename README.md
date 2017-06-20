This is as inventory management project utilizing a WAMP server. It is also a WIP.   
init.php initializes the database.  
inv.php runs the user interface.  
init.php should run once and should return an error after.  
inv.php can then be accessed.  
On the Bitnami WAMP server specifically the files were moved to htdocs under the apache2 directory. The scripts can then be accessed by going to localhost/init.php or localhost/inv.php.  
Other setups are not, at this time, directly supported, but should still work, as long as they support MySQLi Object-Oriented.  

Run application using internal php web-server:
   1. Pull original files
   2. Run php -S 127.0.0.1:8080 -t /PATH/TO/FILES
   
API features

 Using Apache:
  
  GET - URL/items   - to get all elements

  GET - URL/items/1 - to get element '1'

  POST - URL/items  - create element '1'

  PUT - URL/items/1 - update element '1'

  DELETE - URL/items/1 - delete element '1'

 Using internal php web-server:
  
  GET - URL/items.php   - to get all elements

  GET - URL/items.php/1 - to get element '1'

  POST - URL/items.php  - create element '1'

  PUT - URL/items.php/1 - update element '1'

  DELETE - URL/items.php/1 - delete element '1'


Create a single page application that doesn’t do anything except allowing to manage a list of tasks. Interface of the application might look like this. Tasks must be stored in the database. User should be able to manage (create, read, update, delete) tasks without page refresh.

Note: A task is able to have unlimited quantity of subtasks, a subtask is able to have unlimited subtasks on its own and so on.

Back-end requirements:
 - PHP with built-in server (pick most preferable version)
 - SQLite
 - No frameworks
 - Libraries are allowed
 - RESTful API for tasks

Front-end requirements:
 - No frameworks
 - No jQuery
 - Any other libraries allowed

# Overall Introduction
This assignment is an individual project from utm csc309, copyright owned by the course instructor. My role as a full-stack engineer was to develop this website, both front-end (HTML, CSS) and back-end (PHP) components, along with database management using PostgreSQL.

# php-website functionalities
The PHP website is implemented by MVC (Model-View-Controller) framework, the architecture responsibilities are: the index.php file serves as the controller, files within the view folder represent views, and those within the model folder function as models.

- Controller: The controller is for user interaction, guiding visitors through the website's functionalities. It integrates with view files to present content to users.
- Views: Files in the view folder render the website's visual interface, ensuring a dynamic and engaging user experience.
- Models: The core business logic, such as game mechanics and data processing, resides in model files. These PHP classes encapsulate the application's functionality, facilitating modular design and maintainability.

## Compile and run the project
```bash
git clone https://github.com/DavisDongMZ/php-website
```
Place the file in any folder(e.g /var/www) where you can access a server
```bash
cd games/dev/
(vim/nano/...) dbconnect_string_template.php
(Or run ./setup.sh $DB_NAME $DB_USER password=$DB_PASSWORD host=$DB_HOST)
```
Remenber change the permission if needed :).

### Functionality details on this website:


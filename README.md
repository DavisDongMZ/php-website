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
- login page
<img width="960" alt="login" src="https://github.com/DavisDongMZ/php-website/assets/106778621/e3881663-342d-46c5-88b3-2360db1f5429">

- registration page
<img width="400" alt="registration" src="https://github.com/DavisDongMZ/php-website/assets/106778621/a5a079d8-d4e1-492e-8ab1-a49326bb1827">

- allstats page
<img width="960" alt="allstats" src="https://github.com/DavisDongMZ/php-website/assets/106778621/39211f90-179c-4e00-aa51-7b9bb4993191">

- guessNumber page
<img width="960" alt="guessnumber" src="https://github.com/DavisDongMZ/php-website/assets/106778621/7e9ba8d2-6808-4e29-adab-ec8b22ce938f">

- rockpaperscissor page
<img width="960" alt="rockpaperscissor" src="https://github.com/DavisDongMZ/php-website/assets/106778621/723c78d5-1f4f-4465-8d82-111e2cbc2d9a">

- frogpuzzle page
<img width="960" alt="frogpuzzle" src="https://github.com/DavisDongMZ/php-website/assets/106778621/2f9589a1-bbf2-4b22-b153-40458161d3aa">

- profile page
<img width="960" alt="profile" src="https://github.com/DavisDongMZ/php-website/assets/106778621/7c1d0099-a820-46ca-bbf4-8d19a10ffcab">




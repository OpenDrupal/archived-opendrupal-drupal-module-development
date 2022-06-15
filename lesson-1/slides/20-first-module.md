# My first module

--vv--

# Drupal root directory
- index.php
- core, sites directory
- modules, themes, profiles directories

![Module directories](lesson-1/slides/images/files-drupal-root.png) <!-- .element: style="width: 18%;" -->

--vv--

# Module directory
- Custom modules in `modules/custom`
- Module directory = module name

![Module directories](lesson-1/slides/images/files-root-modules.png) <!-- .element: style="width: 25%;" -->

--vv--

# Module directory
- MODULE.info.yml, *.yml
- MODULE.install, .module
- src, config

![Module directory content](lesson-1/slides/images/files-module.png) <!-- .element: style="width: 22%;" -->

--vv--

# Namespace
- module name = namespace
- Configuration
- Routes
- Services
- Content entity
- URLs
- CSS classes/id's 
- Procedural function names

--vv--

# Exercise
Create a new Drupal module in which we will collect some general helpers that can be used in different projects.

- Create a new Drupal module.
- More exercise details in: <br>_lesson-1/exercises/1 first module/exercises.txt_

--vv--

# Tips
- Use the project or customer name as prefix of all your custom modules (e.g. od_ for OpenDrupal).
- Use the Drush generate command to generate a module: <br>http://www.drush.org/index.html

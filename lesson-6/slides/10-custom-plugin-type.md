# Custom plugin type

--vv--

# User story
A as site owner I want a feature that gathers HTML data my competitors sites. I want it to be configurable in which sites and pages it crawls and what data it collects per page.

As a developer I want to write the code using all the Drupal 8 tools I've learned. I want to use services, plugins and perhaps even custom entities to store the collected data.

--vv--

# Proof of Concept
A as site owner I want a feature that gathers HTML data my competitors sites.

- Fetch HTML from a webpage and display it on a page.
- More details in: exercises/1 custom plugin type/exercise-1.md.

--vv--

# Custom services
As a developer I want to structure my code to be loosly coupled and maintainable.

- Create separate two services: for loading HTML, and for parsing the data.
- More details in: exercises/1 custom plugin type/exercise-2.md.

--vv--

# A custom plugin
As site owner I want to gather various types of data from the sites. And I forsee in the near future that I need more of these data types.

- Create a DOM data parser plugin type. Each plugin returns one type of data.
- More details in: exercises/1 custom plugin type/exercise-3.md.

--vv--

# Configuration entity per URL
As site owner I want to gather data from various URLs. From each URL I want different types data to be collected.

- Create a configuration entity that stores per URL which types of data are collected.
- More details in: exercises/2 custom configuration entity/exercise-1.md and exercise-2.md.


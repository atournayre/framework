API Reference
============

This section provides detailed information about the Framework's API.

Core Components
--------------

Application
~~~~~~~~~~

The ``Application`` class is the main entry point for your application.

.. code-block:: php

    use Framework\Application;
    
    $app = new Application();

Methods:

* ``get($route, $handler)`` - Register a GET route
* ``post($route, $handler)`` - Register a POST route
* ``put($route, $handler)`` - Register a PUT route
* ``delete($route, $handler)`` - Register a DELETE route
* ``run()`` - Run the application

Router
~~~~~

The ``Router`` class handles routing for the application.

.. code-block:: php

    use Framework\Routing\Router;
    
    $router = new Router();

Methods:

* ``addRoute($method, $route, $handler)`` - Add a route
* ``match($method, $uri)`` - Match a request to a route

Controller
~~~~~~~~~

The ``AbstractController`` class provides base functionality for controllers.

.. code-block:: php

    use Framework\Controller\AbstractController;
    
    class MyController extends AbstractController
    {
        // Your controller methods
    }

Methods:

* ``render($template, $data = [])`` - Render a template
* ``redirect($url)`` - Redirect to a URL
* ``json($data)`` - Return JSON response

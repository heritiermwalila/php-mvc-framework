<?php
defined("DEBUG") || define("DEBUG", false);
defined("DEFAULT_CONTROLLER") || define("DEFAULT_CONTROLLER", 'home'); //default controller if there is not one defined in the url
defined("DEFAULT_LAYOUT") || define("DEFAULT_LAYOUT", 'default'); // if not layout in the controller use this layout
defined("SITE_TITLE") || define("SITE_TITLE", 'Divine Creativity MVC Framework'); //Display the site title if one is not set
defined("PROOT") || define("PROOT", '/divine-framework/'); // set to '/' for live server
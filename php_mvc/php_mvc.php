<?php

/* MVC Architecture (Model–View–Controller)

MVC = Model, View, Controller
A design pattern that separates logic, UI, and data handling so your app is:

- Easier to scale 🧱
- Easier to maintain 🔄
- Framework-ready ⚙️

 MVC Breakdown:

 Part	        Role	                                Example
------         -------                                 ---------
Model	        Handles data, DB, logic	                User.php, Post.php
View	        HTML templates / output	                register.view.php, login.view.php
Controller	    Middle layer – processes requests	    AuthController.php, UserController.php



/AgentApp-MVC
├── index.php                  ← App entry point
├── controllers/
│   └── AuthController.php     ← Handles login/register
├── models/
│   └── User.php               ← DB logic
├── views/
│   ├── login.view.php
│   ├── register.view.php
├── core/
│   └── Router.php             ← (optional routing class)
├── pdo_connect.php



*/
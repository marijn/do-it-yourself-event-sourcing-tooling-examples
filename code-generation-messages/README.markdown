Event Sourcing in practice
==========================

First and foremost, the goal of the exercises is to practice modelling and design using the event sourcing paradigm. 
The exercises will teach you *a way* of applying event sourcing to domain models and systems. 
This does not mean that it is the only way of doing so. All roads lead to Rome, also in this repository :wink:

How to run it?
--------------

You can boot the [web application](http://localhost:8888) by running `bin/boot.sh`.

You can compile the message classes by running `bin/compile.sh`. 

What is with this Acme stuff?!
------------------------------

Welcome to the real world: there is legacy in place. This project is an adaptation of another workshop that I've run in 
the past. As such, feel free to ignore the *Acme* stuff. 
However, if you must know what it is about: An Online Shop for buying products from Acme, Inc. 

How to run the tests?
---------------------

In your IDE! Additionally, you can run the tests from the command line by running `bin/test.sh`.

Why is the generated code so ugly?
----------------------------------

Our IDE will make it beautiful before we commit to the repo. 

Installation
------------

All required dependencies have been committed to the repository. However, you can use `bin/install.sh` in the event you wish to re-install the third-
party dependencies.

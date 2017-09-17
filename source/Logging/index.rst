.. _logging:

Logging
=======

TYPO3 provides a fine grained logging system. The configuration is explained at
:ref:`t3coreapi:logging-configuration` and integration into own PHP code at
:ref:`t3coreapi:logging-quickstart`.

The logging consists of loggers, processors and writers.

In the following sections you will see how to implement an ansi console writer, as provided by Neos
Flow and how and why to configure it for command controllers.

.. toctree::
   :maxdepth: 2
   :hidden:

   ConsoleWriter
   AnsiConsoleWriter
   CommandController

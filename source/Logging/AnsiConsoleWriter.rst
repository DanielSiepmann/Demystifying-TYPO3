.. _logging_ansiConsoleWriter:

Ansi Console Writer
===================

Once we are able to log to console, we can provide another class to color the output:

.. literalinclude:: /Code/Php/Logger/AnsiConsole.php
   :language: php
   :linenos:
   :lines: 1-3,23-

We inherit the possibility to log to streams like ``stdout`` by extending our ``Console`` log
writer. We just add formats for coloring each entry based on severity.

The above code is a custom backport for TYPO3 of Neos Flow implementation.

.. _logging_consoleWriter:

Console Writer
==============

It's possible to implement custom logger writers, e.g. to log to AWS or any other system. This way
it's possible to back port console loggers of Neos Flow into TYPO3.

All you need is to implement a new class extending :ref:`t3api:TYPO3\\CMS\\Core\\Log\\Writer\\AbstractWriter`.

We will split the functionality into two classes, ``Console`` and ``AnsiConsole``. This way you are
able to switch between formatted colored output, e.g. for interactive execution and for non
interactive like deployment.

.. literalinclude:: /Code/Php/Logger/Console.php
   :language: php
   :linenos:
   :lines: 1-3,23-

In our ``__construct`` we receive possible options from logger configuration, making it possible to
write to a file instead. As default we will write back to ``stdout``.

.. tip::
    A helpful feature would be to configure severity levels which should be written to ``stderr``
    instead.

``writeLog`` is public API which gets called by TYPO3. We will append the log entry with formatted
prefix to our output.

The above code is a custom backport for TYPO3 of Neos Flow implementation.

.. _logging_commandController:

Command controller
==================

With our console log writers in place, we gain flexibility in our command controller. They no longer
need to use the relation to a console using ``$this->output`` but can use the logging mechanism.

This way we can configure whether we want ansi or non ansi output, or directly log to any other
implemented backend, like files, AWS or databases. By using :file:`AdditionalConfiguration.php` we
can switch our configuration depending on our *ApplicationContext* or environment variables.

Executing scheduler might only log entries with a specific severity, while calling a command
manually will log all entries colored.

This way we do not need any knowledge about the OS, unix or windows, but only about TYPO3 to
configure where to log our information.

Here is an example configuration:

.. code-block:: php
   :linenos:

   $GLOBALS['TYPO3_CONF_VARS']['LOG']['Vendor']['ExtName']['Command']['writerConfiguration'] = [
       \TYPO3\CMS\Core\Log\LogLevel::INFO => [
           \Codappix\CdxCore\Log\Writer\AnsiConsole::class => [],
       ],
   ];

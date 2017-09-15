.. _executingPhp:

Executing PHP
=============

TypoScript itself is not enough, we need PHP to execute custom code and plugins. This is done using
:ref:`tsref:cobj-user`. Which will execute a so called ``userFunc`` which is a "user defined
function", just a PHP function or method.

.. _executingPhp_plugins:

Plugins
-------

Most plugins are following Extbase nowadays. An example definition to render a plugin using Extbase
looks like:

.. literalinclude:: /Code/TypoScript/ExtbasePlugin.typoscript
   :language: typoscript
   :linenos:

We define the ``userFunc`` to call, which is the TYPO3 extension framework *Extbase*. All provided
options on same level are passed to the function. This way you can insert custom PHP code nearly
everywhere. And that's how Extbase is started and decides to run a specific plugin.

.. _executingPhp_stdWrap:

StdWrap
-------

As :ref:`tsref:stdwrap` provides :ref:`tsref:stdwrap-preuserfunc` and
:ref:`tsref:stdwrap-postuserfunc`, it's also possible to manipulate incoming configuration before
processing, or result after processing with custom PHP.

This way you get fine grained control to manipulate everything in TypoScript via PHP.

.. _highlight: php
.. _defaultTypoScript:

TYPO3 default TypoScript
========================

TYPO3 already provides TypoScript without adding any TypoScript template. This is provided by the
system extension *frontend* and is the following TypoScript:

.. literalinclude:: /Code/TypoScript/FrontendDefault.typoscript
   :language: typoscript
   :linenos:

The default TypoScript is added inside of :file:`ext_localconf.php` using
:ref:`t3api:TYPO3\\CMS\\Core\\Utility\\ExtensionManagementUtility::addTypoScriptSetup`.

.. _defaultTypoScript_custom:

Custom default TypoScript
-------------------------

You can provide custom default TypoScript the same way as the core, just add the following to your
:file:`ext_localconf.php`::

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup('
        lib.customLib = COA
        lib.customLib {
            // ...
        }
    ');

Another way is to use the special files :file:`ext_typoscript_setup.txt` and
:file:`ext_typoscript_constants.txt`, which are documented at
:ref:`t3coreapi:extension-reserved-filenames`.

There is also a PHP API to add *User TS Config*:
:ref:`t3api:TYPO3\\CMS\\Core\\Utility\\ExtensionManagementUtility::addUserTSConfig` and *Page TS
Config* :ref:`t3api:TYPO3\\CMS\\Core\\Utility\\ExtensionManagementUtility::addPageTSConfig`.

All three work the same way, they are just wrapper to add the string to configuration in
``$GLOBALS['TYPO3_CONF_VARS']``. This way you can inspect the total defaults within the
*Configuration* module.

.. _defaultTypoScript:

TYPO3 default TypoScript
========================

TYPO3 already provides TypoScript without adding any TypoScript template. This is possible through
API :ref:`t3api:TYPO3\\CMS\\Core\\Utility\\ExtensionManagementUtility::addTypoScriptSetup`. This way
the TYPO3 system extension *frontend* already provides the following TypoScript:

.. literalinclude:: /Code/TypoScript/FrontendDefault.typoscript
   :language: typoscript
   :linenos:

The same way, you can add TypoScript via PHP inside of any :file:`ext_localconf.php`.

Another way is to use the special file :file:`ext_typoscript_setup.txt`, which is configured at
:ref:`t3coreapi:extension-reserved-filenames`.

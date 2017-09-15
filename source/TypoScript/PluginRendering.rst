.. _pluginRendering:

Plugin rendering
================

Expecting a setup using *fluid_styled_content* with included static TypoScript template, you should
have the necessary setup to render plugins. The definition in TypoScript will look like this for an
extbase plugin:

.. code-block:: typoscript
   :linenos:

   tt_content = CASE
   tt_content {
       list <= lib.contentElement
       list {
           20 {
               searchcore_search = USER
               searchcore_search {
                   extensionName = SearchCore
                   pluginName = search
                   userFunc = TYPO3\CMS\Extbase\Core\Bootstrap->run
                   vendorName = Codappix
               }
           }
       }
   }

The setup is shorten but all important parts are shown.

The used fluidtemplate for plugins is the following:

.. code-block:: html

   {f:cObject(
       typoscriptObjectPath: 'tt_content.list.20.{data.list_type}',
       data: data,
       table: 'tt_content'
   )}

Which will render the according TypoScript path as shown above.

As a plugin is nothing but custom PHP code, which by default is using the Extbase framework
delivered with TYPO3, take a look at the next section to understand what's going on.

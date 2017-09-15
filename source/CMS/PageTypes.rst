.. _pageTypes:

Page Types
==========

TYPO3 already has different page types with different meaning and behaviour. The following list is
defined in :ref:`t3api:TYPO3\\CMS\\Frontend\\Page\\PageRepository`:

.. code-block:: php
   :linenos:

   const DOKTYPE_DEFAULT = 1;
   const DOKTYPE_LINK = 3;
   const DOKTYPE_SHORTCUT = 4;
   const DOKTYPE_BE_USER_SECTION = 6;
   const DOKTYPE_MOUNTPOINT = 7;
   const DOKTYPE_SPACER = 199;
   const DOKTYPE_SYSFOLDER = 254;
   const DOKTYPE_RECYCLER = 255;

Even if the mapping of doktypes is mapped to PHP constants in system extension *frontend*, the page
types them selfs, are currently configured in system extension *frontend*.

.. code-block:: php
   :linenos:

   /**
    * $GLOBALS['PAGES_TYPES'] defines the various types of pages (field: doktype) the system
    * can handle and what restrictions may apply to them.
    * Here you can define which tables are allowed on a certain pagetype (doktype)
    * NOTE: The 'default' entry in the $GLOBALS['PAGES_TYPES'] array is the 'base' for all
    * types, and for every type the entries simply overrides the entries in the 'default' type!
    */
   $GLOBALS['PAGES_TYPES'] = [
       (string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_BE_USER_SECTION => [
           'allowedTables' => '*'
       ],
       (string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_SYSFOLDER => [
           //  Doktype 254 is a 'Folder' - a general purpose storage folder for whatever you like.
           // In CMS context it's NOT a viewable page. Can contain any element.
           'allowedTables' => '*'
       ],
       (string)\TYPO3\CMS\Frontend\Page\PageRepository::DOKTYPE_RECYCLER => [
           // Doktype 255 is a recycle-bin.
           'allowedTables' => '*'
       ],
       'default' => [
           'allowedTables' => 'pages,sys_category,sys_file_reference,sys_file_collection',
           'onlyAllowedTables' => false
       ],
   ];

This global array is also available for inspection inside of the *Configuration* backend module.

.. _pageTypes_addingCustomPageType:

Adding custom page type
-----------------------

The whole process is documented at :ref:`t3coreapi:page-types`, and will not be repeated here.

TYPO3 already knows how to handle pages and translation. If you need a new page type, e.g. *News*,
just define it. Restrict the allowed records and you are set. Your editor already knows how to
create pages and manage content, no need for extra training.

You are ready to build menus using TypoScript or Fluid content elements. You can make use of
categorization and their menus. You have all backend permissions and access restrictions.

.. todo:: Add reference to creating custom content elements, once it's written.

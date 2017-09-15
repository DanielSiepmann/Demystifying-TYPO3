.. _objectBrowser:

TypoScript Object Browser
=========================

The *TypoScript Object Browser* is one of the most important tools for integrators and developers.
It allows to inspect the current TypoScript of a page. Also it will show parsing errors.

.. _objectBrowser_displayOptions:

Display options
---------------

Below the tree you can configure the browser. I recommend the following setup to get all benefits:

Display comments
    Enable this option to see comments from TypoScript. This allows documentation inside of
    TypoScript and provide hints.

Sort alphabetically
    Enable this option to find entries much faster, as they are organized by alphabet instead of
    order of definition.

Crop lines
    Disable this option to see whole lines. Also disabling this option will enable the next option.

Display constants
    This option is only available if *Crop lines* is disabled. Selecting *Substituted constants in
    green* will instantly show whether a value is a constant or inline value.

.. _objectBrowser_objectList:

Object List
-----------

It's possible to save shortcuts to specific parts in an object list. E.g. you are working inside of
a plugin setting most of the time, you might want to setup a shortcut to not open and collapse the
tree all the time.  Therefore open the tree to the node and click the node. A new view will open
where will see a button:

    Add key "plugin.tx_searchcore.settings" to Object List

Where *plugin.tx_searchcore* is the path to your current node. Once set, the *Object list* will show
up in the *TypoScript Object Browser* next to the drop down to switch between *Setup* and
*Constants*. Selecting an entry will reduce the *Object Browser* to this node and all sub nodes:

.. figure:: /Images/TypoScript/ObjectBrowser.png
    :align: center

    Figure 1-1: The configured object browser, with selectd object list item.

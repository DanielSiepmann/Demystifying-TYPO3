.. _contentRendering:

Content Rendering
=================

TYPO3 persists content in a database table ``tt_content``. Rendering is done through TypoScript with
already provided code from :ref:`defaultTypoScript`:

.. literalinclude:: /Code/TypoScript/FrontendDefault.typoscript
   :language: typoscript
   :linenos:
   :lines: -9

By using :ref:`tsref:cobj-content` we will fetch records from database and render them in place. Rendering is defined through subproperty ``renderObj``.

As mentioned in docs, if nothing is defined, the ``table`` is used as definition. Which in our
example is ``tt_content``. The "definition" for a table is looked up at the top level of TypoScript
tree. Which is, thanks once more to :ref:`defaultTypoScript` the following:

.. literalinclude:: /Code/TypoScript/FrontendDefault.typoscript
   :language: typoscript
   :linenos:
   :lines: 13-

Which will check the selected content type, which is persisted in the database column ``CType``.
Depending on the value the TypoScript entry will be used. Bu default only the default exists, which
is a yellow error message:

.. figure:: /Images/TypoScript/NoContentElementDefinition.png
    :align: center

    Figure 1-2: The default result for undefined content element definitions.

.. todo:: Document section "Adding custom content element"

.. _contentRendering_customRecordRendering:

Custom record rendering
-----------------------

As :ref:`tsref:cobj-content` can be configured with different database tables, it's possible to use
it to render custom record types. E.g. it's possible to render ``fe_users`` with the following
TypoScript:

.. literalinclude:: /Code/TypoScript/CustomRecordRendering.typoscript
   :language: typoscript
   :linenos:
   :lines: -4

We assume *fluid_styled_content* is included, otherwise ``lib.contentElement`` is undefined.

Assuming we link to a page where we want to show a single user, e.g. a profile, we can add a
parameter with his uid. We then can render the profile using this additional TypoScript:

.. literalinclude:: /Code/TypoScript/CustomRecordRendering.typoscript
   :language: typoscript
   :linenos:
   :lines: 6-

The example assumes we detail page is shown on page ``53`` and our users are saved on page ``140``.

This way we will not need any plugin with controller and actions. We have a very small TypoScript
setup which is pure configuration, and define rendering inside of Fluid.

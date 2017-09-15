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

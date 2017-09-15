.. _fluidStyledContentRendering:

Fluid Styled Content Rendering
==============================

Adding *Fluid styled content* or *CSS styled content* will just add entries for
all known content elements. In case of *Fluid styled content* this is done with
the following TypoScript, which is shortened to not use to much space:

.. literalinclude:: /Code/TypoScript/FluidStyledContent.typoscript
   :language: typoscript
   :linenos:
   :lines: -17,36-40

This is the basic setup for all content elements. All definitions for concrete
content elements will inherit this configuration and specify the
``templateName`` to use. Like the plugin content element, which is saved as
``list`` to the database.

.. literalinclude:: /Code/TypoScript/FluidStyledContent.typoscript
   :language: typoscript
   :linenos:
   :lines: 43-50,57

In this case rendering is done through :ref:`tsref:cobj-fluidtemplate`. Each
content element has one fluid template defining the rendering.

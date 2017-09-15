# Minimal makefile for Sphinx documentation
#

# You can set these variables from the command line.
SPHINXOPTS    =
SPHINXBUILD   = sphinx-build
SPHINXPROJ    = TYPO3Concepts
SOURCEDIR     = source
BUILDDIR      = build

# Internal variables.
SPHINX_LIVE_PORT = 8002

DEPLOY_HOST   = daniel-siepmann.de
DEPLOY_PATH   = htdocs/concepts.daniel-siepmann.de/typo3/

# Put it first so that "make" without argument is like "make help".
help:
	@$(SPHINXBUILD) -M help "$(SOURCEDIR)" "$(BUILDDIR)" $(SPHINXOPTS) $(O)

.PHONY: help Makefile

.PHONY: install
install:
	pip install --upgrade -r requirements.txt

.PHONY: clean
clean:
	rm -rf $(BUILDDIR)/*

.PHONY: optimize
optimize:
	pngquant -v source/Images/**/*.png --ext .png -f
	optipng source/Images/**/*.png

.PHONY: deploy
deploy: clean html
	rsync --delete -vaz $(BUILDDIR)/html/* $(DEPLOY_HOST):$(DEPLOY_PATH)

.PHONY: livehtml
livehtml:
	# Ignore some folders and define port
	sphinx-autobuild -H 0.0.0.0 -b html \
		-i '*.sw[pmnox]' \
		-i '.git*' \
		-i '*~' \
		-p $(SPHINX_LIVE_PORT) $(SPHINXOPTS) $(SOURCEDIR) $(BUILDDIR)/html

# Catch-all target: route all unknown targets to Sphinx using the new
# "make mode" option.  $(O) is meant as a shortcut for $(SPHINXOPTS).
%: Makefile
	@$(SPHINXBUILD) -M $@ "$(SOURCEDIR)" "$(BUILDDIR)" $(SPHINXOPTS) $(O)

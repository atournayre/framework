import os
import sys
sys.path.insert(0, os.path.abspath('../../src'))  # si ton code est dans /src

project = 'Framework'
author = 'Aurélien Tournayre'
release = '2.7.0'

extensions = [
    'sphinx.ext.autodoc',
    'sphinx.ext.napoleon',  # support Google-style docstrings
    'sphinx.ext.viewcode',
]

html_theme = 'sphinx_rtd_theme'

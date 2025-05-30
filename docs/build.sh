#!/bin/bash

# Install MkDocs and required packages if not already installed
pip install -r docs/requirements.txt

# Build the documentation
mkdocs build

echo "Documentation built successfully in the 'site' directory."
echo "To view the documentation, run: mkdocs serve"
echo "Then open http://127.0.0.1:8000/ in your browser."

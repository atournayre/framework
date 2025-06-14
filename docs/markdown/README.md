# Framework Documentation

This directory contains the Markdown files for the Framework documentation. The documentation is built using [MkDocs](https://www.mkdocs.org/) with the [Material theme](https://squidfunk.github.io/mkdocs-material/), which provides a modern, responsive design with dark mode support.

## Structure

The documentation is organized into the following files:

- `index.md`: The main landing page
- `introduction.md`: Introduction to the Framework
- `installation.md`: Installation instructions
- `usage.md`: Usage examples for the Framework's components
- `interfaces.md`: Documentation for the Framework's interfaces
- `null.md`: Documentation for the Null components
- `symfony.md`: Documentation for the Symfony integration components
- `try-catch.md`: Documentation for the TryCatch pattern implementation with generic type support

## Building the Documentation

To build the documentation locally, you can use the provided build script:

```bash
./docs/build.sh
```

This will install the necessary dependencies and build the documentation in the `site` directory.

To view the documentation locally, run:

```bash
mkdocs serve
```

Then open http://127.0.0.1:8000/ in your browser.

## Contributing

To contribute to the documentation:

1. Make your changes to the Markdown files in this directory
2. Build and preview the documentation locally to ensure your changes look correct
3. Submit a pull request with your changes

## Dark Mode

The documentation now supports dark mode through the Material theme. Users can toggle between light and dark mode using the switch in the top navigation bar.

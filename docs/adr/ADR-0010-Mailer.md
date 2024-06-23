# ADR 0010: Mailer

## Status
Accepted

## Context
In our project, we need to send emails to users for various purposes, such as account verification, password reset, and notifications.

## Decision
We have decided to create or refactor the following classes to implement the mailer component.

### Common
#### Assert
- `Assert` to validate values.

#### Collection
- `TemplateContextCollection` to represent a collection of template variables.
- `ValidationCollection` to represent a collection of validation violations.

#### Types
- `Domain` a domain name.
- `HtmlTemplatePath` to represent the path to an HTML template.
- `TextTemplatePath` to represent the path to a text template.

### Mailer Component
#### Collection
- `EmailAddressCollection` to represent a collection of email addresses.
- `EmailContactCollection` to represent a collection of email contacts.
- `TagCollection` to represent a collection of tags.

#### Configuration
- `MailerConfiguration` to represent the configuration of the mailer.

#### Service
- `MailService` to send emails using the `SendMailInterface`.

#### Types
- `AttachmentMaxSize` to represent the maximum size of an attachment.
- `EmailAddress` to represent an email address.
- `EmailHtml` to represent the HTML content of an email.
- `EmailName` to represent the name of a sender or recipient.
- `EmailSubject` to represent the subject of an email.
- `EmailText` to represent the text content of an email.
- `EmailUserName` the first part of an email address.

#### Value Objects
- `Email` to represent an email.
- `EmailContact` to wrap an email address and name.
- `TemplatedEmail` to represent a templated email.

### Contracts
- `SendMailInterface` to define methods for sending emails.

### Primitives
- `NumericTrait` to help create numeric types.
- `StringTypeTrait` add `equalsTo()` method.

#### Collection
- `AbstractCollection` add `set()` method and update `add()` method to make them conditional.
- `FileCollection` make it loggable.
- `NumericCollection` add `set()` method and update `add()` method to make them conditional.
- `TypedCollection` replace forbidden methods.

### Symfony
- `Filesystem` will be refactored to use the `FileCollection` class.
- Adapters like `EmailAdapter` and `TemplatedEmailAdapter` will be created to send emails using different methods.
- `SendMailService` will be created to send emails using the `SendMailInterface`.

### Implementation Details
1. **Assert**:
    - Provides methods for validating values.
2. **TemplateContextCollection**:
    - Represents a collection of template variables.
    - Uses the `TypedCollection`.
    - Provides methods for adding and retrieving template variables.
3. **ValidationCollection**:
    - Represents a collection of validation violations.
    - Uses the `TypedCollection`.
    - Provides methods for adding and retrieving validation violations.
4. **Domain**:
    - Represents a domain name.
    - Uses the `StringType`.
    - Provides methods for validating domain names.
    - Provides methods for comparing domain names.
5. **HtmlTemplatePath**:
    - Represents the path to an HTML template.
    - Uses the `StringType`.
    - Provides methods for validating HTML template paths.
6. **TextTemplatePath**:
    - Represents the path to a text template.
    - Uses the `StringType`.
    - Provides methods for validating text template paths.
7. **EmailAddressCollection**:
    - Represents a collection of email addresses.
    - Uses the `TypedCollection`.
    - Provides methods for adding and retrieving email addresses.
8. **EmailContactCollection**:
    - Represents a collection of email contacts.
    - Uses the `TypedCollection`.
    - Provides methods for adding and retrieving email contacts.
9. **TagCollection**:
    - Represents a collection of tags.
    - Uses the `TypedCollection`.
    - Provides methods for adding and retrieving tags.
10. **MailerConfiguration**:
    - Represents the configuration of the mailer.
    - Provides methods for setting and retrieving mailer configuration values.
11. **MailService**:
    - Sends emails using the `SendMailInterface`.
    - Provides methods for sending emails.
12. **AttachmentMaxSize**:
    - Represents the maximum size of an attachment.
    - Uses the `NumericType`.
    - Provides methods for validating attachment sizes.
13. **EmailAddress**:
    - Represents an email address.
    - Uses the `StringType`.
    - Provides methods for validating email addresses.
14. **EmailHtml**:
    - Represents the HTML content of an email.
    - Uses the `StringType`.
    - Provides methods for validating HTML content.
15. **EmailName**:
    - Represents the name of a sender or recipient.
    - Uses the `StringType`.
    - Provides methods for validating names.
16. **EmailSubject**:
    - Represents the subject of an email.
    - Uses the `StringType`.
    - Provides methods for validating email subjects.
17. **EmailText**:
    - Represents the text content of an email.
    - Uses the `StringType`.
    - Provides methods for validating text content.
18. **EmailUserName**:
    - Represents the first part of an email address.
    - Uses the `StringType`.
    - Provides methods for validating email usernames.
19. **Email**:
    - Represents an email.
    - Provides methods for setting and retrieving email values.
20. **EmailContact**:
    - Value object to wrap an email address and name.
    - Provides methods for setting and retrieving email contact values.
21. **TemplatedEmail**:
    - Represents a templated email.
    - Provides methods for setting and retrieving templated email values.
22. **SendMailInterface**:
    - Defines methods for sending emails.
23. **NumericTrait**:
    - Provides methods for creating numeric types.
24. **StringTypeTrait**:
    - Provides methods for creating string types.
    - Adds an `equalsTo()` method.
25. **AbstractCollection**:
    - Provides methods for adding and retrieving collection items.
    - Adds a `set()` method and updates the `add()` method to make it conditional.
26. **FileCollection**:
    - Makes the collection loggable.
27. **NumericCollection**:
    - Provides methods for adding and retrieving numeric collection items.
    - Adds a `set()` method and updates the `add()` method to make it conditional.
28. **TypedCollection**:
    - Replaces forbidden methods.
29. **Filesystem**:
    - Refactored to use the `FileCollection` class.
30. **EmailAdapter**:
    - Transforms an email into a Symfony email.
31. **TemplatedAdapter**:
    - Transforms a templated email into a Symfony templated email.
32. **SendMailService**:
    - Sends emails using the `SendMailInterface`.
    - Provides methods for sending emails.

## Consequences

- **Benefits**:
    - Provides a consistent and reusable approach to sending emails.
    - Enhances code readability and maintainability by separating concerns.
    - Facilitates testing by providing interfaces for mocking email behavior.
    - Provides types to represent email addresses, email contacts, email content, and email subjects.
    - Uses the `StringType` to represent email addresses, names, and email content.
    - Uses the `NumericType` to represent attachment sizes.
    - Uses the `TypedCollection` to represent collections of email addresses, email contacts, tags, and validation violations.
    - Uses the `FileCollection` to represent collections of files.
    - Uses the `SendMailInterface` to define methods for sending emails.
    - Uses the `EmailAdapter` and `TemplatedEmailAdapter` to transform emails into Symfony emails.
    - Uses the `SendMailService` to send emails using the `SendMailInterface`.
    - Uses the `NumericTrait` to create numeric types.
    - Uses the `StringTypeTrait` to create string types.

- **Drawbacks**:
    - Requires additional development effort to implement and test the mailer component.
    - May introduce complexity to the codebase if not implemented correctly.
    - May require changes to existing code to integrate the mailer component.
    - May require additional dependencies or libraries to send emails.
    - May require additional configuration to set up the mailer component.

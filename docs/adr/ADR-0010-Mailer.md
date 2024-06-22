# ADR 0010: Mailer

## Status
Accepted

## Context
In our project, we need to send emails to users for various purposes, such as account verification, password reset, and notifications.

## Decision
We have decided to create an interface to decouple the mailer logic from the rest of the application.

`EmailAddressCollection` to represent a collection of email addresses.

`MailerConfiguration` to represent the configuration of the mailer.

`SendMailInterface` to define methods for sending emails.

`MailService` to send emails using the `SendMailInterface`.

`CreateEmailAddressCollectionTrait` to create an email address collection.

`EmailBody` to represent the body of an email.

`Email` to represent an email.

`TemplatedEmail` to represent a templated email.

`EmailName` to represent the name of a sender or recipient.

`EmailUserName` the first part of an email address.

`Domain` a domain name.

`EmailAddress` to represent an email address.

`AttachmentMaxSize` to represent the maximum size of an attachment.

### Implementation Details
1. **EmailAddressCollection**

2. **MailerConfiguration**

3. **SendMailInterface**
    - Provides methods for sending emails.
    - Requires implementing classes to provide methods for sending emails.

4. **MailService**

5. **CreateEmailAddressCollectionTrait**

6. **EmailBody**

7. **Email**

8. **TemplatedEmail**

9. **EmailName**

10. **EmailAddress**

11. **AttachmentMaxSize**


## Consequences

- **Benefits**:

- **Drawbacks**:


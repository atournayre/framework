# Component

The Component package provides high-level business components. Currently: Mailer.

## Mailer Component

Email sending system with Value Objects and strict validation.

### Types

#### EmailAddress

Email address wrapper with validation via StringTypeTrait.

```php
use Atournayre\Component\Mailer\Types\EmailAddress;

// Creation with validation
$email = EmailAddress::of(value: 'user@example.com');

// Access (via StringTypeTrait)
$address = $email->value(); // StringType "user@example.com"

// Email-specific methods
$username = $email->username(); // EmailUserName
$isUsername = $email->usernameIs(username: 'user'); // BoolEnum
$domain = $email->domain(); // Domain object
$isDomain = $email->domainIs(domain: 'example.com'); // BoolEnum
$deliverable = $email->isDeliverable(); // BoolEnum
$canonical = $email->toCanonical(); // Canonical form

// Comparison
$is = $email->is(email: 'user@example.com'); // BoolEnum
$equals = $email->equalsTo(string: $otherEmail); // BoolEnum (via StringTypeTrait)
```

#### EmailName

Name wrapper for email contacts.

```php
use Atournayre\Component\Mailer\Types\EmailName;

$name = EmailName::of(value: 'John Doe');

// StringTypeTrait methods available
$value = $name->value(); // StringType
```

#### EmailSubject

Email subject wrapper.

```php
use Atournayre\Component\Mailer\Types\EmailSubject;

$subject = EmailSubject::of(value: 'Welcome to our app');

// StringTypeTrait methods available
$value = $subject->value(); // StringType
$length = $subject->length(); // Numeric
```

#### EmailText & EmailHtml

Plain text and HTML content wrappers.

```php
use Atournayre\Component\Mailer\Types\EmailText;
use Atournayre\Component\Mailer\Types\EmailHtml;

$text = EmailText::of(value: 'Plain text email content');
$html = EmailHtml::of(value: '<p>HTML email content</p>');

// StringTypeTrait methods available
```

#### AttachmentMaxSize

Maximum attachment size wrapper using NumericTrait.

```php
use Atournayre\Component\Mailer\Types\AttachmentMaxSize;

// Creation (via NumericTrait - expects bytes as numeric value)
$maxSize = AttachmentMaxSize::of(value: 10485760, precision: 0); // 10 MB in bytes

// Access (via NumericTrait)
$value = $maxSize->value(); // float (10485760.0)
$intValue = $maxSize->intValue(); // int (10485760)

// Convert to Memory object for human-readable format
$memory = $maxSize->memory(); // Memory object
$readable = $memory->humanReadable(); // "10.00 MB"
$bytes = $memory->asIs(); // 10485760
```

### Value Objects

#### EmailContact

Represents an email contact (address + name).

```php
use Atournayre\Component\Mailer\VO\EmailContact;
use Atournayre\Component\Mailer\Types\EmailAddress;
use Atournayre\Component\Mailer\Types\EmailName;

// Creation
$contact = EmailContact::create(
    emailAddress: EmailAddress::of(value: 'user@example.com'),
    emailName: EmailName::of(value: 'John Doe')
);

// Access
$email = $contact->email(); // EmailAddress
$name = $contact->name(); // EmailName

// Comparison
$equals = $contact->equalsTo(emailContact: $otherContact); // BoolEnum

// Logging
$logData = $contact->toLog(); // array
```

#### Email

Full email message value object.

```php
use Atournayre\Component\Mailer\VO\Email;
use Atournayre\Component\Mailer\Types\EmailSubject;
use Atournayre\Component\Mailer\Collection\EmailContactCollection;
use Atournayre\Primitives\Collection\FileCollection;

// Creation (minimal)
$email = Email::create(
    subject: EmailSubject::of(value: 'Test email'),
    from: $senderContact
);

// Access
$subject = $email->subject(); // EmailSubject
$from = $email->from(); // EmailContact
$to = $email->to(); // EmailContactCollection
$cc = $email->cc(); // EmailContactCollection
$bcc = $email->bcc(); // EmailContactCollection
$replyTo = $email->replyTo(); // EmailContactCollection
$attachments = $email->attachments(); // FileCollection
$text = $email->text(); // EmailText
$html = $email->html(); // EmailHtml
$tags = $email->tags(); // TagCollection

// Validation
$validation = $email->validate(); // ValidationCollection
$isValid = $email->isValid(); // BoolEnum

// Immutable modifications
$withRecipients = $email->withTo(to: EmailContactCollection::of(collection: [$recipient]));
$withCc = $email->withCc(cc: EmailContactCollection::of(collection: [$ccContact]));
$withBcc = $email->withBcc(bcc: EmailContactCollection::of(collection: [$bccContact]));
$withReply = $email->withReplyTo(replyTo: EmailContactCollection::of(collection: [$replyContact]));
$withAttachments = $email->withAttachments(attachments: FileCollection::of(collection: ['/path/to/file.pdf']));
$withText = $email->withText(text: 'Plain text content');
$withHtml = $email->withHtml(html: '<p>HTML content</p>');
$withTags = $email->withTags(tags: TagCollection::of(collection: ['newsletter', 'marketing']));
```

#### TemplatedEmail

Email with Twig template.

```php
use Atournayre\Component\Mailer\VO\TemplatedEmail;

// Creation
$templatedEmail = TemplatedEmail::create(
    subject: EmailSubject::of(value: 'Welcome!'),
    from: $senderContact,
    template: 'emails/welcome.html.twig',
    context: ['username' => 'John', 'activationLink' => 'https://...']
);

// Access (same as Email, plus:)
$template = $templatedEmail->template(); // string
$context = $templatedEmail->context(); // array

// Immutable modifications (same as Email)
```

### Collections

#### EmailContactCollection

Collection of EmailContact objects.

```php
use Atournayre\Component\Mailer\Collection\EmailContactCollection;

// Creation
$contacts = EmailContactCollection::of(collection: [
    EmailContact::create(
        emailAddress: EmailAddress::of(value: 'user1@example.com'),
        emailName: EmailName::of(value: 'User 1')
    ),
    EmailContact::create(
        emailAddress: EmailAddress::of(value: 'user2@example.com'),
        emailName: EmailName::of(value: 'User 2')
    ),
]);

// All Collection/Aimeos Map methods available
$first = $contacts->first();
$filtered = $contacts->filter(callback: fn($c) => $c->email()->domainIs(domain: 'example.com')->yes());
```

#### EmailAddressCollection

Collection of EmailAddress objects.

```php
use Atournayre\Component\Mailer\Collection\EmailAddressCollection;

$addresses = EmailAddressCollection::of(collection: [
    EmailAddress::of(value: 'user1@example.com'),
    EmailAddress::of(value: 'user2@example.com'),
]);

// All Collection/Aimeos Map methods available
```

#### TagCollection

Collection of email tags (strings).

```php
use Atournayre\Component\Mailer\Collection\TagCollection;

$tags = TagCollection::of(collection: ['newsletter', 'marketing', 'customer']);

// All Collection/Aimeos Map methods available
```

### Configuration

```php
use Atournayre\Component\Mailer\Configuration\MailerConfiguration;

// Note: MailerConfiguration structure depends on implementation
// Check the actual class for available methods
```

### Service

#### MailService

Service for sending emails.

```php
use Atournayre\Component\Mailer\Service\MailService;

// Note: Check actual implementation for available methods
// Typically wraps Symfony Mailer adapters
```

## Symfony Integration

The Mailer component integrates with Symfony via adapters in `src/Symfony/Mailer/`:

- `EmailAdapter`: Converts Email VO to Symfony Email
- `TemplatedEmailAdapter`: Converts TemplatedEmail VO to Symfony TemplatedEmail
- `SendMailService`: Service for sending via Symfony Mailer

See [Symfony Integration](symfony.md) for details.

## Usage Patterns

### Simple Email

```php
// Create sender
$from = EmailContact::create(
    emailAddress: EmailAddress::of(value: 'noreply@example.com'),
    emailName: EmailName::of(value: 'My App')
);

// Create recipient
$to = EmailContact::create(
    emailAddress: EmailAddress::of(value: 'user@example.com'),
    emailName: EmailName::of(value: 'John Doe')
);

// Create email
$email = Email::create(
    subject: EmailSubject::of(value: 'Your order confirmation'),
    from: $from
)
    ->withTo(to: EmailContactCollection::of(collection: [$to]))
    ->withText(text: 'Thank you for your order');

// Validate before sending
if ($email->isValid()->yes()) {
    $mailService->send(email: $email);
}
```

### Templated Email

```php
$email = TemplatedEmail::create(
    subject: EmailSubject::of(value: 'Welcome!'),
    from: $from,
    template: 'emails/welcome.html.twig',
    context: [
        'user' => $user,
        'activationToken' => $token,
    ]
)
    ->withTo(to: EmailContactCollection::of(collection: [$to]));

$mailService->sendTemplated(email: $email);
```

### With Attachments

```php
$email = $email->withAttachments(
    attachments: FileCollection::of(collection: [
        '/path/to/invoice.pdf',
        '/path/to/terms.pdf',
    ])
);
```

## Tests

```php
use PHPUnit\Framework\TestCase;
use Atournayre\Component\Mailer\Types\EmailAddress;

class EmailAddressTest extends TestCase
{
    public function testValidEmail(): void
    {
        $email = EmailAddress::of(value: 'test@example.com');

        $this->assertEquals('test@example.com', $email->value()->toString());
        $this->assertEquals('example.com', $email->domain()->toString());
        $this->assertEquals('test', $email->username()->value()->toString());
    }

    public function testInvalidEmail(): void
    {
        $this->expectException(InvalidArgumentException::class);
        EmailAddress::of(value: 'invalid-email');
    }
}
```

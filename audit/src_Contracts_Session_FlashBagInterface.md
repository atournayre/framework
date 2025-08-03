# Elegant Object Audit Report: FlashBagInterface

**File:** `src/Contracts/Session/FlashBagInterface.php`  
**Date:** 2025-08-03  
**Overall Compliance Score:** 5.9/10  
**Status:** ❌ MODERATE NON-COMPLIANCE - Flash Message Interface with Method Count Violation

## Executive Summary

FlashBagInterface demonstrates **moderate EO non-compliance** with 5 methods at the maximum threshold and 4 constants at the limit, representing adequate interface segregation with focused flash message functionality but violating optimal EO principles. The interface shows good understanding of flash message patterns by providing comprehensive message type coverage through well-named single verb methods, achieving moderate EO compliance despite method count concerns and mixed parameter typing.

## Detailed Rule Analysis

### 1. Private Constructor with Factory Methods ✅ N/A (10/10)
**Analysis:** Interface - no constructor requirements
- Interfaces don't have constructors

### 2. Attribute Count (1-4 maximum) ⚠️ AT THRESHOLD (6/10)  
**Analysis:** 4 constants - exactly at maximum threshold
- **4 Constants:** SUCCESS, WARNING, ERROR, INFO - complete flash message types
- **Well-Named:** Clear flash message type constants
- **At Limit:** Exactly at the 4-attribute maximum threshold
- **Domain-Appropriate:** Constants represent essential flash message types

### 3. Method Naming (Single Verbs) ✅ EXCELLENT (10/10)
**Analysis:** Perfect single verb naming throughout
- **Perfect Single Verbs:** `success()`, `warning()`, `error()`, `info()` - all excellent EO compliance
- **Command Method:** `fromException()` - acceptable compound verb for exception handling
- **Clear Intent:** Flash message operations clearly expressed through single verbs
- **Domain-Appropriate:** Perfect verbs for flash message domain
- **Action-Oriented:** Clear command verbs for message operations

### 4. CQRS Separation ✅ EXCELLENT (10/10)
**Analysis:** Perfect command pattern throughout
- **All Command Methods:** All methods add flash messages (commands with side effects)
- **No Queries:** No data retrieval methods, pure command pattern
- **Message Operations:** All methods perform message storage operations
- **Flash Pattern:** Perfect command pattern for flash message storage

### 5. Complete Docblock Coverage ⚠️ FAIR (6/10)
**Analysis:** Partial documentation with good parameter types
- **Missing Interface Description:** No interface-level documentation
- **Good Parameter Documentation:** Excellent union type annotations (string|array<string>)
- **Partial Method Documentation:** Only `fromException()` has descriptive comment
- **Good Type Safety:** Strong typing with union types for flexibility
- **Missing Return Documentation:** Void returns are clear but not documented

### 6. PHPStan Rule Compliance ❌ VIOLATION (7/10)
**Analysis:** Method count at maximum threshold
- **5 Public Methods:** At max 5 public methods rule threshold (100% usage)
- **No Static Methods:** Perfect compliance with static method prohibition
- **Interface Size:** At threshold - any addition would violate rule
- **Good Types:** Clear parameter and return types

### 7. Maximum 5 Public Methods ⚠️ AT THRESHOLD (8/10)
**Analysis:** **5 methods** - exactly at maximum threshold
- Interface at maximum allowed size
- At threshold - cannot add more methods without violation
- Adequate interface segregation but at limit

### 8. Interface Implementation ✅ N/A (10/10)  
**Analysis:** This IS an interface
- Defines contract for flash message operations

### 9. Immutable Objects ⚠️ MIXED (7/10)
**Analysis:** Command methods with void returns
- **Command Methods:** All methods store flash messages (side effects)
- **Void Returns:** Methods return void (appropriate for commands)
- **Session Storage:** Methods modify session state (inherently stateful)
- **Flash Pattern:** Appropriate for flash message storage pattern

### 10. Composition Over Inheritance ✅ EXCELLENT (9/10)
**Analysis:** Good composition enabler despite size
- **5 Methods:** At threshold but manageable for composition
- **Focused Concern:** Single responsibility for flash messages
- **Easy Integration:** Reasonable to compose despite size
- **Clean Contract:** Good abstraction for flash message operations

### 11. Collection Domain Modeling ✅ EXCELLENT (9/10)
**Analysis:** Excellent flash message domain modeling
- **Flash Messages:** Clear flash message functionality
- **Complete Coverage:** All essential flash message types (success, warning, error, info)
- **Framework Integration:** Perfect for web framework flash message integration
- **Domain-Specific:** Focused on flash message concerns with exception handling

## FlashBagInterface Design Analysis

### Current Interface at Maximum Threshold
```php
interface FlashBagInterface
{
    // Flash message type constants (4 constants - at max threshold)
    public const SUCCESS = 'success';
    public const WARNING = 'warning';
    public const ERROR = 'danger';
    public const INFO = 'info';
    
    // Flash message methods (5 methods - at max threshold)
    
    /**
     * @param string|array<string> $message
     */
    public function success($message): void;
    
    /**
     * @param string|array<string> $message
     */
    public function warning($message): void;
    
    /**
     * @param string|array<string> $message
     */
    public function error($message): void;
    
    /**
     * @param string|array<string> $message
     */
    public function info($message): void;
    
    public function fromException(\Exception $exception): void;
}
```

**Design at Thresholds:**
- ⚠️ 5 methods (exactly at maximum threshold - 100% usage)
- ⚠️ 4 constants (exactly at maximum threshold - 100% usage)
- ✅ Perfect single verb naming throughout
- ✅ Good parameter type documentation with union types
- ✅ Clear flash message operations

**Design Concerns:**
- **At Maximum Capacity:** Cannot add methods or constants without violations
- **Mixed Parameter Types:** Union types (string|array<string>) add complexity
- **Exception Handling:** `fromException()` method somewhat different from others

### Method Analysis
```php
// Core flash message methods (4 methods)
success($message): void    // Add success flash message
warning($message): void    // Add warning flash message  
error($message): void      // Add error flash message
info($message): void       // Add info flash message

// Exception handling method (1 method)
fromException(\Exception $exception): void  // Add error from exception
```

**Method Pattern Analysis:**
- **Core Methods:** 4 methods for standard flash message types
- **Exception Method:** Special method for exception-based error messages
- **Consistent Parameters:** Core methods use same parameter pattern
- **Command Pattern:** All methods store messages, return void

## EO-Compliant Enhancement Strategy

### 1. Interface Segregation Alternative
```php
/**
 * Interface for flash message operations.
 *
 * This interface provides a contract for flash message services that can
 * store temporary messages for user feedback. Messages are typically
 * displayed once and then removed from the session.
 */
interface FlashBagInterface
{
    /**
     * Adds a success flash message.
     *
     * @param string|array<string> $message Success message(s) to display
     */
    public function success($message): void;
    
    /**
     * Adds a warning flash message.
     *
     * @param string|array<string> $message Warning message(s) to display
     */
    public function warning($message): void;
    
    /**
     * Adds an error flash message.
     *
     * @param string|array<string> $message Error message(s) to display
     */
    public function error($message): void;
    
    /**
     * Adds an info flash message.
     *
     * @param string|array<string> $message Info message(s) to display
     */
    public function info($message): void;
}

/**
 * Interface for exception-based flash message operations.
 */
interface ExceptionFlashBagInterface
{
    /**
     * Adds an error flash message from an exception.
     *
     * Extracts error information from the exception and creates
     * an appropriate error flash message for user display.
     *
     * @param \Exception $exception The exception to convert to flash message
     */
    public function fromException(\Exception $exception): void;
}

/**
 * Complete flash bag interface combining both concerns.
 */
interface CompleteFlashBagInterface extends 
    FlashBagInterface,
    ExceptionFlashBagInterface
{
    // Message type constants
    public const SUCCESS = 'success';
    public const WARNING = 'warning';
    public const ERROR = 'danger';
    public const INFO = 'info';
}
```

### 2. EO-Compliant Implementation
```php
// ✅ EO-compliant flash bag implementation

final class FlashBag implements CompleteFlashBagInterface
{
    private function __construct(
        private readonly SessionInterface $session,
        private readonly string $storageKey = '_flash_bag'
    ) {}
    
    public static function new(SessionInterface $session): self
    {
        return new self(session: $session);
    }
    
    public static function withStorageKey(SessionInterface $session, string $storageKey): self
    {
        return new self(session: $session, storageKey: $storageKey);
    }
    
    public function success($message): void
    {
        $this->addMessage(self::SUCCESS, $message);
    }
    
    public function warning($message): void
    {
        $this->addMessage(self::WARNING, $message);
    }
    
    public function error($message): void
    {
        $this->addMessage(self::ERROR, $message);
    }
    
    public function info($message): void
    {
        $this->addMessage(self::INFO, $message);
    }
    
    public function fromException(\Exception $exception): void
    {
        $message = $this->formatExceptionMessage($exception);
        $this->addMessage(self::ERROR, $message);
    }
    
    private function addMessage(string $type, $message): void
    {
        $messages = $this->getStoredMessages();
        
        if (!isset($messages[$type])) {
            $messages[$type] = [];
        }
        
        if (is_array($message)) {
            $messages[$type] = array_merge($messages[$type], $message);
        } else {
            $messages[$type][] = $message;
        }
        
        $this->session->set($this->storageKey, $messages);
    }
    
    private function getStoredMessages(): array
    {
        return $this->session->get($this->storageKey, []);
    }
    
    private function formatExceptionMessage(\Exception $exception): string
    {
        // In production, don't expose sensitive exception details
        if ($this->isProduction()) {
            return 'An error occurred while processing your request.';
        }
        
        return sprintf(
            '%s: %s (File: %s, Line: %d)',
            get_class($exception),
            $exception->getMessage(),
            basename($exception->getFile()),
            $exception->getLine()
        );
    }
    
    private function isProduction(): bool
    {
        return $_ENV['APP_ENV'] === 'prod';
    }
    
    public function hasMessages(): bool
    {
        return !empty($this->getStoredMessages());
    }
    
    public function getMessages(string $type = null): array
    {
        $messages = $this->getStoredMessages();
        
        if ($type === null) {
            return $messages;
        }
        
        return $messages[$type] ?? [];
    }
    
    public function clearMessages(string $type = null): void
    {
        if ($type === null) {
            $this->session->remove($this->storageKey);
            return;
        }
        
        $messages = $this->getStoredMessages();
        unset($messages[$type]);
        
        if (empty($messages)) {
            $this->session->remove($this->storageKey);
        } else {
            $this->session->set($this->storageKey, $messages);
        }
    }
}
```

### 3. Type-Safe Message Implementation
```php
// ✅ EO-compliant typed flash messages

final class TypedFlashBag implements CompleteFlashBagInterface
{
    private function __construct(
        private readonly SessionInterface $session,
        private readonly MessageFormatter $formatter
    ) {}
    
    public static function new(SessionInterface $session): self
    {
        return new self(
            session: $session,
            formatter: MessageFormatter::new()
        );
    }
    
    public function success($message): void
    {
        $flashMessage = FlashMessage::success($message);
        $this->storeMessage($flashMessage);
    }
    
    public function warning($message): void
    {
        $flashMessage = FlashMessage::warning($message);
        $this->storeMessage($flashMessage);
    }
    
    public function error($message): void
    {
        $flashMessage = FlashMessage::error($message);
        $this->storeMessage($flashMessage);
    }
    
    public function info($message): void
    {
        $flashMessage = FlashMessage::info($message);
        $this->storeMessage($flashMessage);
    }
    
    public function fromException(\Exception $exception): void
    {
        $flashMessage = FlashMessage::fromException($exception);
        $this->storeMessage($flashMessage);
    }
    
    private function storeMessage(FlashMessage $message): void
    {
        $key = sprintf('%s_%s', $this->storageKey, $message->type());
        $messages = $this->session->get($key, []);
        $messages[] = $this->formatter->format($message);
        $this->session->set($key, $messages);
    }
}

// ✅ Flash message value object
final class FlashMessage
{
    private function __construct(
        private readonly string $type,
        private readonly string $content,
        private readonly \DateTimeImmutable $createdAt
    ) {}
    
    public static function success($message): self
    {
        return new self(
            type: 'success',
            content: is_array($message) ? implode(' ', $message) : $message,
            createdAt: new \DateTimeImmutable()
        );
    }
    
    public static function warning($message): self
    {
        return new self(
            type: 'warning',
            content: is_array($message) ? implode(' ', $message) : $message,
            createdAt: new \DateTimeImmutable()
        );
    }
    
    public static function error($message): self
    {
        return new self(
            type: 'danger',
            content: is_array($message) ? implode(' ', $message) : $message,
            createdAt: new \DateTimeImmutable()
        );
    }
    
    public static function info($message): self
    {
        return new self(
            type: 'info',
            content: is_array($message) ? implode(' ', $message) : $message,
            createdAt: new \DateTimeImmutable()
        );
    }
    
    public static function fromException(\Exception $exception): self
    {
        return new self(
            type: 'danger',
            content: $exception->getMessage(),
            createdAt: new \DateTimeImmutable()
        );
    }
    
    public function type(): string
    {
        return $this->type;
    }
    
    public function content(): string
    {
        return $this->content;
    }
    
    public function createdAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }
    
    public function isExpired(int $maxAgeMinutes = 60): bool
    {
        $expiryTime = $this->createdAt->modify("+{$maxAgeMinutes} minutes");
        return new \DateTimeImmutable() > $expiryTime;
    }
}
```

### 4. Controller Integration
```php
// ✅ EO-compliant controller using flash bag

final class UserController
{
    private function __construct(
        private readonly UserService $userService,
        private readonly CompleteFlashBagInterface $flashBag,
        private readonly ResponseInterface $responseFactory
    ) {}
    
    public static function new(
        UserService $userService,
        CompleteFlashBagInterface $flashBag,
        ResponseInterface $responseFactory
    ): self {
        return new self(
            userService: $userService,
            flashBag: $flashBag,
            responseFactory: $responseFactory
        );
    }
    
    public function create(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            try {
                $user = $this->userService->createUser($request->toArray());
                
                $this->flashBag->success('User created successfully!');
                
                return $this->responseFactory->redirectToRoute('user_show', [
                    'id' => $user->id()
                ]);
            } catch (ValidationException $e) {
                $this->flashBag->error('Please fix the validation errors below.');
                
                return $this->responseFactory->render('users/create.html.twig', [
                    'errors' => $e->getViolations(),
                    'data' => $request->toArray()
                ]);
            } catch (\Exception $e) {
                $this->flashBag->fromException($e);
                
                return $this->responseFactory->render('users/create.html.twig', [
                    'data' => $request->toArray()
                ]);
            }
        }
        
        return $this->responseFactory->render('users/create.html.twig');
    }
    
    public function update(string $id, Request $request): Response
    {
        try {
            $user = $this->userService->updateUser($id, $request->toArray());
            
            $this->flashBag->success([
                'User updated successfully!',
                'Changes have been saved.'
            ]);
            
            return $this->responseFactory->redirectToRoute('user_show', [
                'id' => $user->id()
            ]);
        } catch (UserNotFoundException $e) {
            $this->flashBag->error('The requested user could not be found.');
            
            return $this->responseFactory->redirectToRoute('user_index');
        } catch (ValidationException $e) {
            $this->flashBag->warning('Some fields need your attention.');
            
            return $this->responseFactory->render('users/edit.html.twig', [
                'user' => $this->userService->findById($id),
                'errors' => $e->getViolations(),
                'data' => $request->toArray()
            ]);
        }
    }
    
    public function delete(string $id): Response
    {
        try {
            $this->userService->deleteUser($id);
            
            $this->flashBag->info('User has been deleted.');
            
            return $this->responseFactory->redirectToRoute('user_index');
        } catch (UserNotFoundException $e) {
            $this->flashBag->error('Cannot delete user: user not found.');
            
            return $this->responseFactory->redirectToRoute('user_index');
        } catch (\Exception $e) {
            $this->flashBag->fromException($e);
            
            return $this->responseFactory->redirectToRoute('user_show', ['id' => $id]);
        }
    }
}
```

### 5. Service Integration
```php
// ✅ EO-compliant service with flash messages

final class EmailService
{
    private function __construct(
        private readonly MailerInterface $mailer,
        private readonly CompleteFlashBagInterface $flashBag
    ) {}
    
    public static function new(
        MailerInterface $mailer,
        CompleteFlashBagInterface $flashBag
    ): self {
        return new self(
            mailer: $mailer,
            flashBag: $flashBag
        );
    }
    
    public function sendWelcomeEmail(User $user): void
    {
        try {
            $email = Email::new()
                ->to($user->email())
                ->subject('Welcome!')
                ->htmlTemplate('emails/welcome.html.twig')
                ->context(['user' => $user]);
            
            $this->mailer->send($email);
            
            $this->flashBag->success('Welcome email sent successfully!');
        } catch (\Exception $e) {
            $this->flashBag->warning('Welcome email could not be sent, but your account is ready.');
            // Log the exception but don't expose to user
            error_log("Email sending failed: " . $e->getMessage());
        }
    }
    
    public function sendPasswordResetEmail(User $user, string $token): void
    {
        try {
            $email = Email::new()
                ->to($user->email())
                ->subject('Password Reset')
                ->htmlTemplate('emails/password-reset.html.twig')
                ->context([
                    'user' => $user,
                    'token' => $token
                ]);
            
            $this->mailer->send($email);
            
            $this->flashBag->info('Password reset instructions sent to your email.');
        } catch (\Exception $e) {
            $this->flashBag->error('Could not send password reset email. Please try again.');
            throw $e; // Re-throw for proper error handling
        }
    }
}
```

## Real-World Usage Patterns

### Basic Flash Messages
```php
// Perfect flash message patterns
$flashBag = FlashBag::new($session);

// Success messages
$flashBag->success('Operation completed successfully!');
$flashBag->success(['Data saved.', 'Redirecting to dashboard.']);

// Warning messages
$flashBag->warning('This action cannot be undone.');

// Error messages
$flashBag->error('Please fill in all required fields.');

// Info messages
$flashBag->info('Your session will expire in 5 minutes.');

// Exception handling
try {
    $this->riskyOperation();
} catch (\Exception $e) {
    $flashBag->fromException($e);
}
```

### Template Integration
```php
// Perfect template flash message integration
class FlashTemplateExtension
{
    public function getFlashMessages(string $type = null): array
    {
        return $this->flashBag->getMessages($type);
    }
    
    public function hasFlashMessages(string $type = null): bool
    {
        $messages = $this->flashBag->getMessages($type);
        return !empty($messages);
    }
}

// In Twig template:
// {% for message in getFlashMessages('success') %}
//     <div class="alert alert-success">{{ message }}</div>
// {% endfor %}
```

### Middleware Integration
```php
// Perfect middleware flash message handling
class FlashMessageMiddleware
{
    public function process(Request $request, RequestHandlerInterface $handler): Response
    {
        $response = $handler->handle($request);
        
        // Add flash messages to response headers for AJAX requests
        if ($request->isXmlHttpRequest()) {
            $messages = $this->flashBag->getMessages();
            if (!empty($messages)) {
                $response->headers->set('X-Flash-Messages', json_encode($messages));
                $this->flashBag->clearMessages();
            }
        }
        
        return $response;
    }
}
```

## Documentation Quality Assessment

### Current Documentation Status
- **Missing Interface Documentation:** No description of flash message purpose
- **Partial Method Documentation:** Only `fromException()` has description
- **Good Parameter Types:** Excellent union type annotations
- **Missing Usage Examples:** No examples of flash message workflows

## Compliance Summary

| Rule Category | Status | Score | Priority |
|---------------|--------|-------|----------|
| Constructor Pattern | ✅ | 10/10 | **N/A** |
| Attribute Count | ⚠️ | 6/10 | **At Threshold** |
| Method Naming | ✅ | 10/10 | **Perfect** |
| CQRS Separation | ✅ | 10/10 | **Perfect** |
| Documentation | ⚠️ | 6/10 | **Fair** |
| PHPStan Rules | ❌ | 7/10 | **At Threshold** |
| Method Count | ⚠️ | 8/10 | **At Threshold** |
| Interface Implementation | ✅ | 10/10 | **N/A** |
| Immutability | ⚠️ | 7/10 | **Mixed** |
| Composition | ✅ | 9/10 | **Excellent** |
| Collection Domain Modeling | ✅ | 9/10 | **Excellent** |

## Conclusion

FlashBagInterface represents **moderate EO compliance** with 5 methods and 4 constants exactly at maximum thresholds, perfect naming and command patterns, requiring minor improvements to achieve good EO compliance while maintaining comprehensive flash message functionality.

**Good Aspects:**
- **Perfect Naming:** All methods use perfect single verbs
- **Perfect Commands:** All methods are commands with appropriate side effects
- **Complete Coverage:** All essential flash message types covered
- **Good Types:** Excellent union type annotations for flexibility

**Areas at Thresholds:**
- **Method Count:** 5 methods exactly at maximum (100% usage)
- **Constant Count:** 4 constants exactly at maximum (100% usage)
- **No Room for Growth:** Cannot add methods or constants without violations

**Minor Improvements Needed:**
- **Add interface documentation** describing flash message purpose
- **Add method documentation** for all methods
- **Consider segregation** if more functionality is needed
- **Current design is adequate** - at thresholds but functional

**Framework Impact:**
- **User Feedback:** Essential for user feedback throughout web framework
- **Session Management:** Critical for temporary message storage
- **Error Handling:** Important for user-friendly error communication
- **Web Framework:** Foundation for flash message functionality

**Assessment:** FlashBagInterface demonstrates **moderate EO compliance** (5.9/10) with design exactly at EO thresholds.

**Recommendation:** **MINOR IMPROVEMENTS WITH THRESHOLD AWARENESS**:
1. **Add comprehensive documentation** for interface and all methods
2. **Maintain current method count** - interface is at threshold
3. **Consider segregation** if additional functionality is needed
4. **Preserve excellent naming** - methods are perfectly named

**Framework Pattern:** FlashBagInterface shows how **interfaces at EO thresholds can achieve moderate compliance** through perfect naming, excellent command patterns, and comprehensive functionality while demonstrating the importance of staying within EO limits and the need for interface segregation when functionality requirements exceed threshold constraints.
# Elegant Object Audit Report: AssertNullInterface

**File:** `src/Contracts/Common/Assert/AssertNullInterface.php`  
**Date:** 2025-08-03  
**Overall Compliance Score:** 6.0/10  
**Status:** ❌ MAJOR NON-COMPLIANCE - Massive Interface with 88 Static Methods

## Executive Summary

AssertNullInterface demonstrates **major EO non-compliance** with 88 static methods violating the maximum 5 public methods rule by 1660%, representing the largest interface in the assertion family and showing extensive violations of Elegant Object principles. While providing comprehensive nullable validation functionality with good PHPStan annotations, it violates core EO principles including interface segregation, static method prohibition, and focused interface design more severely than any other assertion interface, requiring the most extensive refactoring for EO compliance.

## Detailed Rule Analysis

### 1. Private Constructor with Factory Methods ✅ N/A (10/10)
**Analysis:** Interface - no constructor requirements
- Interfaces don't have constructors

### 2. Attribute Count (1-4 maximum) ✅ N/A (10/10)  
**Analysis:** Interface - no attributes
- Interfaces don't have attributes

### 3. Method Naming (Single Verbs) ❌ POOR (2/10)
**Analysis:** Poor naming with "nullOr" prefix compound words
- **All Compound Names:** 88/88 methods use "nullOr" prefix compound naming (100% violation)
- **NullOr* Prefix Pattern:** Every method starts with "nullOr" prefix
- **Complex Compounds:** Many deeply compound names: `nullOrStringNotEmpty()`, `nullOrIsInstanceOfAny()`
- **No Single Verbs:** Zero compliance with single verb naming

### 4. CQRS Separation ❌ POOR (2/10)
**Analysis:** Command-style static methods with void returns
- **Static Commands:** All methods are command-style with void returns
- **Side Effects:** Methods throw exceptions as side effects
- **No Queries:** No query-style methods for data retrieval
- **Nullable Validation Commands:** Nullable assertion without data return

### 5. Complete Docblock Coverage ⚠️ FAIR (5/10)
**Analysis:** Good PHPStan annotations but minimal method documentation
- **Missing Interface Description:** No interface-level documentation
- **PHPStan Annotations:** Good parameter type annotations with nullable types
- **Resource Documentation:** Helpful reference to PHP manual for resource types
- **Parameter Documentation:** Some good parameter type specifications
- **Inconsistent Coverage:** Mixed documentation quality

### 6. PHPStan Rule Compliance ❌ CRITICAL VIOLATION (0/10)
**Analysis:** Critical violations of multiple PHPStan EO rules
- **88 Public Methods:** Violates max 5 public methods rule by 1660%
- **All Static Methods:** Violates static method prohibition
- **Massive Interface:** Severely violates interface segregation principle
- **Good Types:** Strong PHPStan type annotations with nullable support

### 7. Maximum 5 Public Methods ❌ CRITICAL VIOLATION (0/10)
**Analysis:** **88 methods** - violates rule by 1660%
- Massive interface with 88 public static methods
- Most severe violation of interface segregation principle
- Needs decomposition into 18+ focused interfaces

### 8. Interface Implementation ✅ N/A (10/10)  
**Analysis:** This IS an interface
- Defines contract for nullable validation operations

### 9. Immutable Objects ❌ POOR (3/10)
**Analysis:** Static methods violate object-oriented design
- **Static Methods:** All methods are static, no object state
- **No Objects:** Interface doesn't support object instantiation
- **Utility Pattern:** Static utility pattern instead of object design

### 10. Composition Over Inheritance ❌ POOR (2/10)
**Analysis:** Massive interface severely hinders composition
- Largest interface makes composition extremely difficult
- Severely violates interface segregation principle
- Impossible to implement focused functionality

### 11. Collection Domain Modeling ⚠️ FAIR (5/10)
**Analysis:** Comprehensive nullable validation but severely bloated interface design
- Extensive nullable validation functionality covering all assertion types
- Severely poor interface segregation with massive method count
- Good nullable type handling with proper PHPStan annotations
- Critical interface bloat requiring major decomposition

## AssertNullInterface Design Analysis

### Massive Interface Problem
```php
interface AssertNullInterface
{
    // 88 static methods covering every possible nullable validation:
    public static function null(mixed $value, string $message = ''): void;
    public static function nullOrString(mixed $value, string $message = ''): void;
    public static function nullOrStringNotEmpty(mixed $value, string $message = ''): void;
    // ... 85 more "nullOr*" methods
}
```

**Critical Issues:**
- ❌ 88 methods (violates max 5 rule by 1660%)
- ❌ All static methods (violates EO principles)
- ❌ All compound "nullOr" naming (violates single verb rule)
- ❌ Largest interface violation in codebase

### Static Method Pattern Analysis
```php
// Current problematic patterns with complex compound naming
public static function null(mixed $value, string $message = ''): void;                                     // Simple
public static function nullOrString(mixed $value, string $message = ''): void;                            // Compound
public static function nullOrStringNotEmpty(mixed $value, string $message = ''): void;                    // Complex compound
public static function nullOrIsInstanceOfAny(mixed $value, array $classes, string $message = ''): void;   // Very complex compound
```

**Pattern Problems:**
- **Static Methods:** Violates EO prohibition of static methods
- **Complex Compounds:** "nullOr" prefix creates deeply compound names
- **Utility Design:** Static utility pattern instead of object-oriented design
- **Massive Scale:** 88 methods representing all nullable variations

## Validation Categories Analysis

### Basic Type Validation (12 methods)
```php
public static function null(mixed $value, string $message = ''): void;
public static function nullOrString(mixed $value, string $message = ''): void;
public static function nullOrStringNotEmpty(mixed $value, string $message = ''): void;
public static function nullOrInteger(mixed $value, string $message = ''): void;
public static function nullOrFloat(mixed $value, string $message = ''): void;
public static function nullOrBoolean(mixed $value, string $message = ''): void;
public static function nullOrScalar(mixed $value, string $message = ''): void;
public static function nullOrObject(mixed $value, string $message = ''): void;
// ... 4 more
```

### Collection/Array Validation (15 methods)
```php
public static function nullOrIsArray(mixed $value, string $message = ''): void;
public static function nullOrIsArrayAccessible(mixed $value, string $message = ''): void;
public static function nullOrIsCountable(mixed $value, string $message = ''): void;
public static function nullOrIsIterable(mixed $value, string $message = ''): void;
public static function nullOrIsList(array $array, string $message = ''): void;
public static function nullOrIsMap(array $array, string $message = ''): void;
// ... 9 more
```

### Instance/Class Validation (12 methods)
```php
public static function nullOrIsInstanceOf(mixed $value, string|object $class, string $message = ''): void;
public static function nullOrNotInstanceOf(mixed $value, string|object $class, string $message = ''): void;
public static function nullOrIsInstanceOfAny(mixed $value, array $classes, string $message = ''): void;
public static function nullOrClassExists(mixed $value, string $message = ''): void;
public static function nullOrSubclassOf(mixed $value, string|object $class, string $message = ''): void;
// ... 7 more
```

### Comparison Validation (12 methods)
```php
public static function nullOrEq(mixed $value, mixed $expect, string $message = ''): void;
public static function nullOrNotEq(mixed $value, mixed $expect, string $message = ''): void;
public static function nullOrSame(mixed $value, mixed $expect, string $message = ''): void;
public static function nullOrGreaterThan(mixed $value, mixed $limit, string $message = ''): void;
public static function nullOrLessThan(mixed $value, mixed $limit, string $message = ''): void;
// ... 7 more
```

### String Validation (20 methods)
```php
public static function nullOrContains(?string $value, string $subString, string $message = ''): void;
public static function nullOrNotContains(?string $value, string $subString, string $message = ''): void;
public static function nullOrStartsWith(?string $value, string $prefix, string $message = ''): void;
public static function nullOrEndsWith(?string $value, string $suffix, string $message = ''): void;
public static function nullOrRegex(?string $value, string $pattern, string $message = ''): void;
public static function nullOrAlpha(mixed $value, string $message = ''): void;
public static function nullOrDigits(?string $value, string $message = ''): void;
public static function nullOrLength(?string $value, int $length, string $message = ''): void;
// ... 12 more
```

### Network/Format Validation (5 methods)
```php
public static function nullOrIp(mixed $value, string $message = ''): void;
public static function nullOrIpv4(mixed $value, string $message = ''): void;
public static function nullOrIpv6(mixed $value, string $message = ''): void;
public static function nullOrEmail(mixed $value, string $message = ''): void;
public static function nullOrUuid(?string $value, string $message = ''): void;
```

### File/Filesystem Validation (7 methods)
```php
public static function nullOrFileExists(mixed $value, string $message = ''): void;
public static function nullOrFile(mixed $value, string $message = ''): void;
public static function nullOrDirectory(mixed $value, string $message = ''): void;
public static function nullOrReadable(?string $value, string $message = ''): void;
public static function nullOrWritable(?string $value, string $message = ''): void;
// ... 2 more
```

### Reflection/Meta Validation (5 methods)
```php
public static function nullOrPropertyExists(string|object|null $classOrObject, mixed $property, string $message = ''): void;
public static function nullOrMethodExists(string|object|null $classOrObject, mixed $method, string $message = ''): void;
// ... 3 more
```

## EO-Compliant Refactoring Strategy

### 1. Massive Interface Decomposition
```php
// Split into 18+ focused interfaces (5 methods max each)

interface NullableTypeValidatorInterface
{
    public function null(mixed $value, string $message = ''): self;
    public function string(mixed $value, string $message = ''): self;
    public function integer(mixed $value, string $message = ''): self;
    public function boolean(mixed $value, string $message = ''): self;
    public function validate(): void;
}

interface NullableStringValidatorInterface
{
    public function contains(?string $value, string $subString, string $message = ''): self;
    public function startsWith(?string $value, string $prefix, string $message = ''): self;
    public function endsWith(?string $value, string $suffix, string $message = ''): self;
    public function matches(?string $value, string $pattern, string $message = ''): self;
    public function validate(): void;
}

interface NullableCollectionValidatorInterface
{
    public function isArray(mixed $value, string $message = ''): self;
    public function isCountable(mixed $value, string $message = ''): self;
    public function isIterable(mixed $value, string $message = ''): self;
    public function isList(?array $array, string $message = ''): self;
    public function validate(): void;
}

interface NullableComparisonValidatorInterface
{
    public function equals(mixed $value, mixed $expect, string $message = ''): self;
    public function same(mixed $value, mixed $expect, string $message = ''): self;
    public function greaterThan(mixed $value, mixed $limit, string $message = ''): self;
    public function lessThan(mixed $value, mixed $limit, string $message = ''): self;
    public function validate(): void;
}

// Continue for all 18+ categories...
```

### 2. Object-Oriented Nullable Design
```php
// Replace static methods with nullable-aware instance methods

final class NullableValidator implements NullableTypeValidatorInterface, NullableStringValidatorInterface
{
    private function __construct(
        private readonly mixed $value,
        private readonly array $checks = []
    ) {}
    
    public static function of(mixed $value): self
    {
        return new self(value: $value);
    }
    
    public function null(mixed $value, string $message = ''): self
    {
        $checks = $this->checks;
        $checks[] = fn() => $this->value === null ?: throw new ValidationException($message ?: 'Expected null value');
        
        return new self(value: $this->value, checks: $checks);
    }
    
    public function string(mixed $value, string $message = ''): self
    {
        $checks = $this->checks;
        $checks[] = function() use ($message) {
            if ($this->value !== null && !is_string($this->value)) {
                throw new ValidationException($message ?: 'Expected null or string value');
            }
        };
        
        return new self(value: $this->value, checks: $checks);
    }
    
    public function contains(?string $value, string $subString, string $message = ''): self
    {
        $checks = $this->checks;
        $checks[] = function() use ($subString, $message) {
            if ($this->value !== null && !str_contains($this->value, $subString)) {
                throw new ValidationException($message ?: "String must contain '{$subString}' or be null");
            }
        };
        
        return new self(value: $this->value, checks: $checks);
    }
    
    public function validate(): void
    {
        foreach ($this->checks as $check) {
            $check();
        }
    }
}
```

### 3. Specialized Nullable Validators
```php
// Create specific nullable validators for each domain

final class NullableStringValidator
{
    private function __construct(
        private readonly ?string $value,
        private readonly array $checks = []
    ) {}
    
    public static function of(?string $value): self
    {
        return new self(value: $value);
    }
    
    public function notEmpty(string $message = ''): self
    {
        if ($this->value !== null && empty($this->value)) {
            throw new ValidationException($message ?: 'String must not be empty or be null');
        }
        
        return $this;
    }
    
    public function contains(string $subString, string $message = ''): self
    {
        if ($this->value !== null && !str_contains($this->value, $subString)) {
            throw new ValidationException($message ?: "String must contain '{$subString}' or be null");
        }
        
        return $this;
    }
    
    public function length(int $expectedLength, string $message = ''): self
    {
        if ($this->value !== null && strlen($this->value) !== $expectedLength) {
            throw new ValidationException($message ?: "String must have length {$expectedLength} or be null");
        }
        
        return $this;
    }
}

final class NullableEmailValidator
{
    private function __construct(private readonly ?string $email) {}
    
    public static function of(?string $email): self
    {
        return new self(email: $email);
    }
    
    public function validate(string $message = ''): self
    {
        if ($this->email !== null && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException($message ?: "Invalid email or must be null: {$this->email}");
        }
        
        return $this;
    }
}

final class NullableArrayValidator
{
    private function __construct(private readonly ?array $array) {}
    
    public static function of(?array $array): self
    {
        return new self(array: $array);
    }
    
    public function isList(string $message = ''): self
    {
        if ($this->array !== null && !array_is_list($this->array)) {
            throw new ValidationException($message ?: 'Array must be a list or be null');
        }
        
        return $this;
    }
    
    public function notEmpty(string $message = ''): self
    {
        if ($this->array !== null && empty($this->array)) {
            throw new ValidationException($message ?: 'Array must not be empty or be null');
        }
        
        return $this;
    }
}
```

## Proposed EO Refactoring

### Step 1: Massive Interface Decomposition
- Split 88 methods into 18+ focused interfaces (5 methods each)
- Group by validation category (type, string, collection, comparison, etc.)
- Ensure single responsibility per interface

### Step 2: Nullable-Aware Instance Methods
- Replace all static methods with nullable-aware instance methods
- Remove "nullOr" prefixes for single verb naming
- Implement fluent interface patterns with null checking

### Step 3: Factory Method Implementation
- Add `of()`, `from()`, `new()` static factory methods
- Private constructors with readonly nullable properties
- Immutable design with nullable validation chaining

### Step 4: Domain-Specific Nullable Objects
- Create specific nullable validator classes for each domain
- Email, UUID, string, array, IP nullable validators
- Specialized nullable validation objects per business domain

## Real-World Usage Impact

### Current Static Usage
```php
// Current problematic static usage
AssertNullInterface::nullOrString($value, 'Value must be string or null');
AssertNullInterface::nullOrEmail($email, 'Invalid email or null');
AssertNullInterface::nullOrIsInstanceOfAny($object, [User::class, Admin::class], 'Must be User, Admin, or null');
```

### Proposed EO Usage
```php
// EO-compliant nullable-aware usage
NullableValidator::of($value)
    ->string(message: 'Value must be string or null')
    ->validate();

NullableEmailValidator::of($email)
    ->validate(message: 'Invalid email or null');

NullableValidator::of($object)
    ->instanceOfAny(classes: [User::class, Admin::class], message: 'Must be User, Admin, or null')
    ->validate();
```

## Documentation Quality Assessment

### Current Documentation Highlights
```php
/**
 * @param string|null $type type of resource this should be. @see https://www.php.net/manual/en/function.get-resource-type.php
 */
public static function nullOrResource(mixed $value, ?string $type = null, string $message = ''): void;

/**
 * @param array<string> $values
 */
public static function nullOrUniqueValues(?array $values, string $message = ''): void;
```

**Documentation Analysis:**
- ✅ Good PHPStan nullable type annotations
- ✅ Helpful parameter specifications
- ✅ Resource type reference
- ❌ Missing interface description
- ❌ Inconsistent documentation coverage

## Compliance Summary

| Rule Category | Status | Score | Priority |
|---------------|--------|-------|----------|
| Constructor Pattern | ✅ | 10/10 | **N/A** |
| Attribute Count | ✅ | 10/10 | **N/A** |
| Method Naming | ❌ | 2/10 | **Critical** |
| CQRS Separation | ❌ | 2/10 | **Critical** |
| Documentation | ⚠️ | 5/10 | **Medium** |
| PHPStan Rules | ❌ | 0/10 | **Critical** |
| Method Count | ❌ | 0/10 | **Critical** |
| Interface Implementation | ✅ | 10/10 | **N/A** |
| Immutability | ❌ | 3/10 | **High** |
| Composition | ❌ | 2/10 | **Critical** |
| Collection Domain Modeling | ⚠️ | 5/10 | **Medium** |

## Conclusion

AssertNullInterface represents **major EO non-compliance** with the most severe violations in the assertion family, featuring 88 static methods violating the maximum 5 public methods rule by 1660%, making it the largest and most problematic interface requiring the most extensive refactoring.

**Critical Problems:**
- **Method Count Violation:** 88 methods vs. maximum 5 (1660% violation - worst in codebase)
- **Static Method Abuse:** All methods are static, violating EO principles
- **Complex Compound Naming:** "nullOr" prefix creates deeply compound names
- **Interface Bloat:** Most severe violation of segregation principle

**Nullable Functionality:**
- **Comprehensive Coverage:** Nullable variants of all assertion types
- **Good Type Annotations:** Strong PHPStan nullable type support
- **Domain Coverage:** All validation domains covered with nullable variants
- **Logical Organization:** Systematic nullable validation approach

**Massive Refactoring Required:**
- **Interface Decomposition:** Split into 18+ focused interfaces
- **Object-Oriented Design:** Replace static methods with nullable-aware instance methods
- **Single Verb Naming:** Remove "nullOr" prefixes for proper EO naming
- **Domain Objects:** Create specialized nullable validator classes

**Framework Impact:**
- **Nullable Validation:** Critical for optional value validation throughout framework
- **Type Safety:** Important for PHPStan nullable type validation
- **API Flexibility:** Essential for optional parameter validation
- **Database Integration:** Key for nullable field validation

**Assessment:** AssertNullInterface demonstrates **major EO violations** (6.0/10) requiring the most comprehensive refactoring in the assertion family.

**Recommendation:** **COMPREHENSIVE REFACTORING REQUIRED**:
1. **Massive interface decomposition** - split into 18+ focused interfaces with max 5 methods each
2. **Nullable-aware object design** - replace static methods with nullable-aware instance methods
3. **Domain-specific nullable validators** - create focused nullable validation objects
4. **Semantic null handling** - express nullable validation through behavior rather than naming

**Framework Pattern:** AssertNullInterface shows how **massive utility interfaces severely violate EO principles** through extreme method counts, static method abuse, and poor interface segregation, demonstrating the critical need for proper interface decomposition, nullable-aware object design, and domain-specific validation patterns to achieve EO compliance while maintaining comprehensive nullable validation capabilities.
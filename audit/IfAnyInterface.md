# Elegant Object Audit Report: IfAnyInterface

**File Path**: `src/Contracts/Collection/IfAnyInterface.php`  
**Date**: 2025-08-02  
**Auditor**: Elegant Object Auditor  

## Executive Summary

✅ **Overall Compliance Score**: 5.5/10  
**Status**: PARTIELLEMENT CONFORME

Interface avec des problèmes majeurs de conception. Utilisation de paramètres nullables et violation du principe CQRS avec un mélange query/command dans une seule méthode.

## Analyse Détaillée

### 1. Constructeur Privé avec Factory Methods
**Score**: N/A  
**Status**: ✅ NON APPLICABLE (Interface)
- Les interfaces ne peuvent pas avoir de constructeurs

### 2. Nombre d'Attributs (1-4 maximum)
**Score**: 10/10  
**Status**: ✅ CONFORME
- Les interfaces ne peuvent pas avoir d'attributs

### 3. Nommage des Méthodes (Verbes Simples)
**Score**: 8/10  
**Status**: ✅ CONFORME
- La méthode `ifAny` utilise un nom conditionnel approprié
- Pattern "if" clair pour une opération conditionnelle

### 4. Séparation CQRS (Queries vs Commands)
**Score**: 2/10  
**Status**: ❌ NON CONFORME
- La méthode retourne `self` (command-like) mais prend des callbacks (mixed behavior)
- Mélange de responsabilités : condition ET exécution
- Pattern de branchement conditionnel difficile à tester

### 5. Documentation Complète (Docblocks)
**Score**: 4/10  
**Status**: ⚠️ PARTIELLEMENT CONFORME
**Problèmes identifiés**:
- Documentation d'interface générique (ligne 7-9)
- Documentation de méthode incomplète (ligne 12-16)
- Pas de @param documentés pour les Closures
- Pas de @return documenté
- Manque d'exemples d'utilisation

### 6. Règles PHPStan
**Score**: 3/10  
**Status**: ❌ NON CONFORME
- Utilisation de paramètres nullables (anti-pattern EO)
- Type de retour `self` mais comportement ambigu
- Deux paramètres optionnels (complexité excessive)

## Problèmes Identifiés

### 1. Paramètres Nullables (Ligne 17)
```php
public function ifAny(?\Closure $then = null, ?\Closure $else = null): self;
```
**Problème**: Utilisation de types nullables contraire aux principes EO
**Impact**: Complexité accrue, logique conditionnelle interne

### 2. Pattern de Branchement
**Problème**: La méthode implémente un if/else dans l'API
**Impact**: Violation du principe de responsabilité unique, difficile à tester

### 3. Documentation Incomplète
```php
/**
 * Executes callbacks if the map contains elements.
 *
 * @api
 */
```
**Problèmes**:
- Pas de documentation des paramètres
- Pas d'explication du comportement avec null
- Référence à "map" alors que c'est une interface de collection

## Anti-Patterns Identifiés

### Pattern If/Else dans l'API
Cette interface expose directement la logique conditionnelle dans son API, ce qui est contraire aux principes OO :
- Force les clients à penser en termes procéduraux
- Difficile à composer
- Difficile à tester unitairement

### Alternative EO-Compliant
```php
// Au lieu de :
$collection->ifAny($thenCallback, $elseCallback);

// Préférer :
if ($collection->hasAny()) {
    $result = $collection->apply($thenCallback);
} else {
    $result = $collection->apply($elseCallback);
}
```

## Recommandations

### 1. Refactoring Suggéré
Séparer les responsabilités :
```php
interface HasAnyInterface
{
    public function hasAny(): BoolEnum;
}

interface ApplyInterface  
{
    public function apply(\Closure $callback): self;
}
```

### 2. Documentation Améliorée
```php
/**
 * Contract for conditional callback execution on collections.
 * 
 * Provides branching logic based on collection state.
 */
interface IfAnyInterface
{
    /**
     * Executes callbacks conditionally based on collection content.
     * 
     * @param \Closure|null $then Callback to execute if collection has elements
     * @param \Closure|null $else Callback to execute if collection is empty
     * @return self Modified collection after callback execution
     * 
     * @api
     */
    public function ifAny(?\Closure $then = null, ?\Closure $else = null): self;
}
```

## Scores par Catégorie

| Règle | Score | Status |
|-------|-------|--------|
| Constructeur Privé | N/A | ✅ Non Applicable |
| Nombre d'Attributs | 10/10 | ✅ Conforme |
| Nommage des Méthodes | 8/10 | ✅ Conforme |
| Séparation CQRS | 2/10 | ❌ Non Conforme |
| Documentation | 4/10 | ⚠️ Partiel |
| Règles PHPStan | 3/10 | ❌ Non Conforme |

## Conclusion

IfAnyInterface présente des violations importantes des principes Elegant Object, notamment l'utilisation de paramètres nullables et le mélange de responsabilités query/command. L'interface implémente un pattern de branchement conditionnel qui est contraire aux principes de la programmation orientée objet pure.

La conception actuelle force une approche procédurale et rend le code difficile à tester et à composer. Une refactorisation majeure est recommandée pour séparer les responsabilités de vérification d'état et d'application de callbacks.
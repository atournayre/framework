# Elegant Object Audit TodoList

This todolist contains **ALL** 481 PHP files from the framework (`src/`) that need to be audited according to Elegant Object principles.

## 📋 Status Legend

- [ ] **To audit** - Not yet analyzed according to Elegant Object principles
- [ ] **[AUDITED]** - Audit completed, report available in audit/ directory
- [ ] **Minor refactoring** - Small adjustments needed (post-audit)
- [ ] **Major refactoring** - Significant restructuring required (post-audit)
- [ ] **In progress** - Currently being refactored
- [x] **Completed** - Fully compliant with Elegant Object principles

## 📊 Statistics

- **Total files**: **481 PHP files**
- **Audited**: 0 file
- **Remaining to audit**: 481 files

---

## 📁 Comprehensive File List (481 files)

### Common (37 files)
- [ ] `src/Common/AbstractCommandEvent.php` [AUDITED]
- [ ] `src/Common/AbstractQueryEvent.php` [AUDITED]
- [ ] `src/Common/Assert/Assert.php` [AUDITED]
- [ ] `src/Common/Collection/EventCollection.php` [AUDITED]
- [ ] `src/Common/Collection/TemplateContextCollection.php` [AUDITED]
- [ ] `src/Common/Collection/Validation/ValidationCollection.php` [AUDITED]
- [ ] `src/Common/Exception/BadMethodCallException.php` [AUDITED]
- [ ] `src/Common/Exception/InvalidArgumentException.php` [AUDITED]
- [ ] `src/Common/Exception/MutableException.php` [AUDITED]
- [ ] `src/Common/Exception/NullException.php` [AUDITED]
- [ ] `src/Common/Exception/RuntimeException.php` [AUDITED]
- [ ] `src/Common/Exception/ThrowableTrait.php` [AUDITED]
- [ ] `src/Common/Exception/UnexpectedValueException.php` [AUDITED]
- [ ] `src/Common/Factory/Context/ContextFactory.php` [AUDITED]
- [ ] `src/Common/Log/AbstractLogger.php` [AUDITED]
- [ ] `src/Common/Log/DefaultLogger.php` [AUDITED]
- [ ] `src/Common/Log/NullLogger.php` [AUDITED]
- [ ] `src/Common/Model/AbstractUser.php` [AUDITED]
- [ ] `src/Common/Model/DefaultUser.php` [AUDITED]
- [ ] `src/Common/Persistance/Database.php` [AUDITED]
- [ ] `src/Common/Persistance/DatabaseTrait.php` [AUDITED]
- [ ] `src/Common/Traits/ContextTrait.php` [AUDITED]
- [ ] `src/Common/Traits/EventsTrait.php` [AUDITED]
- [ ] `src/Common/Traits/IsTrait.php` [AUDITED]
- [ ] `src/Common/Types/DirectoryOrFile.php` [AUDITED]
- [ ] `src/Common/Types/Domain.php` [AUDITED]
- [ ] `src/Common/Types/File/Content.php` [AUDITED]
- [ ] `src/Common/Types/File/Extension.php` [AUDITED]
- [ ] `src/Common/Types/File/Filename.php` [AUDITED]
- [ ] `src/Common/Types/File/Path.php` [AUDITED]
- [ ] `src/Common/Types/HtmlTemplatePath.php` [AUDITED]
- [ ] `src/Common/Types/TextTemplatePath.php` [AUDITED]
- [ ] `src/Common/VO/Context/Context.php` [AUDITED]
- [ ] `src/Common/VO/Duration.php` [AUDITED]
- [ ] `src/Common/VO/Event.php` [AUDITED]
- [ ] `src/Common/VO/Memory.php` [AUDITED]
- [ ] `src/Common/VO/Security/PlainPassword.php` [AUDITED]
- [ ] `src/Common/VO/Uri.php` [AUDITED]

### Component/Mailer (12 files)
- [ ] `src/Component/Mailer/Collection/EmailAddressCollection.php` [AUDITED]
- [ ] `src/Component/Mailer/Collection/EmailContactCollection.php` [AUDITED]
- [ ] `src/Component/Mailer/Collection/TagCollection.php` [AUDITED]
- [ ] `src/Component/Mailer/Configuration/MailerConfiguration.php` [AUDITED]
- [ ] `src/Component/Mailer/Service/MailService.php` [AUDITED]
- [ ] `src/Component/Mailer/Types/AttachmentMaxSize.php` [AUDITED]
- [ ] `src/Component/Mailer/Types/EmailAddress.php` [AUDITED]
- [ ] `src/Component/Mailer/Types/EmailHtml.php` [AUDITED]
- [ ] `src/Component/Mailer/Types/EmailName.php` [AUDITED]
- [ ] `src/Component/Mailer/Types/EmailSubject.php` [AUDITED]
- [ ] `src/Component/Mailer/Types/EmailText.php` [AUDITED]
- [ ] `src/Component/Mailer/Types/EmailUserName.php` [AUDITED]
- [ ] `src/Component/Mailer/VO/Email.php` [AUDITED]
- [ ] `src/Component/Mailer/VO/EmailContact.php` [AUDITED]
- [ ] `src/Component/Mailer/VO/TemplatedEmail.php` [AUDITED]

### Contracts (163 files)

#### Collection Interfaces (135 files)
- [ ] `src/Contracts/Collection/AddInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/AfterInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/AllInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/ArsortInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/AsListInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/AsMapInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/AsortInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/AsReadOnlyListInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/AsReadOnlyMapInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/AtInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/AtLeastOneElementInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/AvgInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/BeforeInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/BoolInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/CallInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/CastInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/ChunkInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/ClearInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/CloneInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/ColInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/CollapseInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/CollectionValidationInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/CombineInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/CompareInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/ConcatInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/ContainsInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/CopyInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/CountByInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/CountInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/DdInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/DelimiterInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/DiffAssocInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/DiffInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/DiffKeysInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/DumpInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/DuplicatesInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/EachInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/EmptyInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/EqualsInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/EveryInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ExceptInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ExplodeInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/FilterInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/FindInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/FirstInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/FirstKeyInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/FlatInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/FlipInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/FloatInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/FromInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/FromJsonInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/GetInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/GetIteratorInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/GrepInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/GroupByInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/HasInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/HasNoElementInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/HasOneElementInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/HasSeveralElementsInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/HasXElementsInterface.php` [AUDITED]
- [ ] `src/Contracts/Collection/IfAnyInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IfEmptyInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IfInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ImplementsInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IncludesInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IndexInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/InInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/InsertAfterInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/InsertAtInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/InsertBeforeInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IntersectAssocInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IntersectInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IntersectKeysInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IntInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IsEmptyInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IsInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IsNumericInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IsObjectInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/IsScalarInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/JoinInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/JsonSerializeInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/KeysInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/KrsortInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/KsortInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/LastInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/LastKeyInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/LtrimInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/MapInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/MaxInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/MergeInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/MinInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/NoneInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/NthInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/NumericListInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/NumericMapInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/OffsetExistsInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/OffsetGetInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/OffsetSetInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/OffsetUnsetInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/OnlyInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/OrderInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/PadInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/PartitionInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/PipeInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/PluckInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/PopInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/PosInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/PrefixInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/PrependInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/PullInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/PushInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/PutInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/RandomInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ReduceInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/RejectInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/RekeyInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/RemoveInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ReplaceInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ReverseInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/RsortInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/RtrimInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/SearchInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/SepInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/SetInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ShiftInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ShuffleInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/SkipInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/SliceInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/SomeInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/SortInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/SpliceInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StrAfterInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StrBeforeInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StrContainsAllInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StrContainsInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StrEndsAllInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StrEndsInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StringInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StrLowerInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StrReplaceInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StrStartsAllInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StrStartsInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/StrUpperInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/SuffixInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/SumInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/TakeInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/TapInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ToArrayInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ToJsonInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ToUrlInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/TransposeInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/TraverseInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/TreeInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/TrimInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/UasortInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/UksortInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/UnionInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/UniqueInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/UnshiftInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/UsortInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ValuesInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/WalkInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/WhereInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/WithInterface.php` [AUDITED]
- [x] `src/Contracts/Collection/ZipInterface.php` [AUDITED]

#### Other Contracts (28 files)
- [x] `src/Contracts/CommandBus/CommandBusInterface.php` [AUDITED]
- [x] `src/Contracts/CommandBus/CommandInterface.php` [AUDITED]
- [x] `src/Contracts/CommandBus/QueryBusInterface.php` [AUDITED]
- [x] `src/Contracts/CommandBus/QueryInterface.php` [AUDITED]
- [x] `src/Contracts/Common/Assert/AssertAllInterface.php` [AUDITED]
- [x] `src/Contracts/Common/Assert/AssertInterface.php` [AUDITED]
- [x] `src/Contracts/Common/Assert/AssertIsInterface.php` [AUDITED]
- [x] `src/Contracts/Common/Assert/AssertMiscInterface.php` [AUDITED]
- [x] `src/Contracts/Common/Assert/AssertNotInterface.php` [AUDITED]
- [x] `src/Contracts/Common/Assert/AssertNullInterface.php` [AUDITED]
- [x] `src/Contracts/Common/Assert/AssertNumericInterface.php` [AUDITED]
- [x] `src/Contracts/Common/Assert/AssertStringInterface.php` [AUDITED]
- [x] `src/Contracts/Context/ContextInterface.php` [AUDITED]
- [x] `src/Contracts/Context/HasContextInterface.php` [AUDITED]
- [x] `src/Contracts/DateTime/DateTimeInterface.php` [AUDITED]
- [x] `src/Contracts/DependencyInjection/DependencyInjectionAwareInterface.php` [AUDITED]
- [x] `src/Contracts/DependencyInjection/DependencyInjectionInterface.php` [AUDITED]
- [x] `src/Contracts/DependencyInjection/PostLoadHandlerInterface.php` [AUDITED]
- [x] `src/Contracts/Dispatcher/EntityEventDispatcher.php` [AUDITED]
- [ ] `src/Contracts/Event/EntityEventDispatcherInterface.php`
- [ ] `src/Contracts/Event/HasEventsInterface.php`
- [ ] `src/Contracts/Exception/ThrowableInterface.php`
- [ ] `src/Contracts/Filesystem/FilesystemInterface.php`
- [ ] `src/Contracts/Json/ToJsonInterface.php`
- [ ] `src/Contracts/Log/LoggableInterface.php`
- [ ] `src/Contracts/Log/LoggerInterface.php`
- [ ] `src/Contracts/Mailer/SendMailInterface.php`
- [ ] `src/Contracts/Null/NullableInterface.php`
- [ ] `src/Contracts/Persistance/AllowFlushInterface.php`
- [ ] `src/Contracts/Persistance/DatabaseEntityInterface.php`
- [ ] `src/Contracts/Persistance/DatabasePersistenceInterface.php`
- [ ] `src/Contracts/Response/ResponseInterface.php`
- [ ] `src/Contracts/Routing/RoutingInterface.php`
- [ ] `src/Contracts/Security/SecurityInterface.php`
- [ ] `src/Contracts/Security/UserInterface.php`
- [ ] `src/Contracts/Session/FlashBagInterface.php`
- [ ] `src/Contracts/Templating/TemplatingInterface.php`
- [ ] `src/Contracts/TryCatch/ExecutableTryCatchInterface.php`
- [ ] `src/Contracts/TryCatch/ThrowableHandlerCollectionInterface.php`
- [ ] `src/Contracts/TryCatch/ThrowableHandlerInterface.php`
- [ ] `src/Contracts/Types/TypeValidationInterface.php`
- [ ] `src/Contracts/Uri/UriInterface.php`

### DependencyInjection (2 files)
- [ ] `src/DependencyInjection/DependencyInjectionPostLoad.php`
- [ ] `src/DependencyInjection/EntityDependencyInjection.php`

### Null (2 files)
- [ ] `src/Null/NullEnum.php`
- [ ] `src/Null/NullTrait.php`

### PHPStan (1 file)
- [ ] `src/PHPStan/Extension/AssertTypeSpecifyingExtension.php`

### Primitives (193 files)

#### Core Primitives (12 files)
- [ ] `src/Primitives/BoolEnum.php`
- [ ] `src/Primitives/Collection.php`
- [ ] `src/Primitives/Collection/DateTimeCollection.php`
- [ ] `src/Primitives/Collection/FileCollection.php`
- [ ] `src/Primitives/DateTime.php`
- [ ] `src/Primitives/Int_.php`
- [ ] `src/Primitives/Locale.php`
- [ ] `src/Primitives/Numeric.php`
- [ ] `src/Primitives/Primitive.php`
- [ ] `src/Primitives/StringType.php`
- [ ] `src/Primitives/Ulid.php`
- [ ] `src/Primitives/Uuid.php`

#### Base Traits (11 files)
- [ ] `src/Primitives/Traits/Collection.php`
- [ ] `src/Primitives/Traits/CollectionCommonTrait.php`
- [ ] `src/Primitives/Traits/CollectionTrait.php`
- [ ] `src/Primitives/Traits/DateTimeTrait.php`
- [ ] `src/Primitives/Traits/IntegerTrait.php`
- [ ] `src/Primitives/Traits/NumericCollectionTrait.php`
- [ ] `src/Primitives/Traits/NumericTrait.php`
- [ ] `src/Primitives/Traits/StaticCollectionTrait.php`
- [ ] `src/Primitives/Traits/StringTypeTrait.php`
- [ ] `src/Primitives/Traits/UlidTrait.php`
- [ ] `src/Primitives/Traits/UuidTrait.php`

#### Collection Traits (170 files)
- [ ] `src/Primitives/Traits/Collection/Access.php`
- [ ] `src/Primitives/Traits/Collection/Add.php`
- [ ] `src/Primitives/Traits/Collection/After.php`
- [ ] `src/Primitives/Traits/Collection/Aggregate.php`
- [ ] `src/Primitives/Traits/Collection/All.php`
- [ ] `src/Primitives/Traits/Collection/Arsort.php`
- [ ] `src/Primitives/Traits/Collection/Asort.php`
- [ ] `src/Primitives/Traits/Collection/At.php`
- [ ] `src/Primitives/Traits/Collection/AtLeastOneElement.php`
- [ ] `src/Primitives/Traits/Collection/Avg.php`
- [ ] `src/Primitives/Traits/Collection/Before.php`
- [ ] `src/Primitives/Traits/Collection/Bool_.php`
- [ ] `src/Primitives/Traits/Collection/Call.php`
- [ ] `src/Primitives/Traits/Collection/Cast.php`
- [ ] `src/Primitives/Traits/Collection/Chunk.php`
- [ ] `src/Primitives/Traits/Collection/Clear.php`
- [ ] `src/Primitives/Traits/Collection/Clone_.php`
- [ ] `src/Primitives/Traits/Collection/Col.php`
- [ ] `src/Primitives/Traits/Collection/Collapse.php`
- [ ] `src/Primitives/Traits/Collection/Combine.php`
- [ ] `src/Primitives/Traits/Collection/Compare.php`
- [ ] `src/Primitives/Traits/Collection/Concat.php`
- [ ] `src/Primitives/Traits/Collection/Contains.php`
- [ ] `src/Primitives/Traits/Collection/Copy.php`
- [ ] `src/Primitives/Traits/Collection/Count.php`
- [ ] `src/Primitives/Traits/Collection/CountBy.php`
- [ ] `src/Primitives/Traits/Collection/Countable.php`
- [ ] `src/Primitives/Traits/Collection/Create.php`
- [ ] `src/Primitives/Traits/Collection/Dd.php`
- [ ] `src/Primitives/Traits/Collection/Debug.php`
- [ ] `src/Primitives/Traits/Collection/Delimiter.php`
- [ ] `src/Primitives/Traits/Collection/Diff.php`
- [ ] `src/Primitives/Traits/Collection/DiffAssoc.php`
- [ ] `src/Primitives/Traits/Collection/DiffKeys.php`
- [ ] `src/Primitives/Traits/Collection/Dump.php`
- [ ] `src/Primitives/Traits/Collection/Duplicates.php`
- [ ] `src/Primitives/Traits/Collection/Each.php`
- [ ] `src/Primitives/Traits/Collection/Empty_.php`
- [ ] `src/Primitives/Traits/Collection/Equals.php`
- [ ] `src/Primitives/Traits/Collection/Every.php`
- [ ] `src/Primitives/Traits/Collection/Except.php`
- [ ] `src/Primitives/Traits/Collection/Explode.php`
- [ ] `src/Primitives/Traits/Collection/Filter.php`
- [ ] `src/Primitives/Traits/Collection/Find.php`
- [ ] `src/Primitives/Traits/Collection/First.php`
- [ ] `src/Primitives/Traits/Collection/FirstKey.php`
- [ ] `src/Primitives/Traits/Collection/Flat.php`
- [ ] `src/Primitives/Traits/Collection/Flip.php`
- [ ] `src/Primitives/Traits/Collection/Float_.php`
- [ ] `src/Primitives/Traits/Collection/From.php`
- [ ] `src/Primitives/Traits/Collection/FromJson.php`
- [ ] `src/Primitives/Traits/Collection/Get.php`
- [ ] `src/Primitives/Traits/Collection/GetIterator.php`
- [ ] `src/Primitives/Traits/Collection/Grep.php`
- [ ] `src/Primitives/Traits/Collection/GroupBy.php`
- [ ] `src/Primitives/Traits/Collection/Has.php`
- [ ] `src/Primitives/Traits/Collection/HasNoElement.php`
- [ ] `src/Primitives/Traits/Collection/HasOneElement.php`
- [ ] `src/Primitives/Traits/Collection/HasSeveralElements.php`
- [ ] `src/Primitives/Traits/Collection/HasXElements.php`
- [ ] `src/Primitives/Traits/Collection/If_.php`
- [ ] `src/Primitives/Traits/Collection/IfAny.php`
- [ ] `src/Primitives/Traits/Collection/IfEmpty.php`
- [ ] `src/Primitives/Traits/Collection/Implements_.php`
- [ ] `src/Primitives/Traits/Collection/In.php`
- [ ] `src/Primitives/Traits/Collection/Includes.php`
- [ ] `src/Primitives/Traits/Collection/Index.php`
- [ ] `src/Primitives/Traits/Collection/InsertAfter.php`
- [ ] `src/Primitives/Traits/Collection/InsertAt.php`
- [ ] `src/Primitives/Traits/Collection/InsertBefore.php`
- [ ] `src/Primitives/Traits/Collection/Int_.php`
- [ ] `src/Primitives/Traits/Collection/Intersect.php`
- [ ] `src/Primitives/Traits/Collection/IntersectAssoc.php`
- [ ] `src/Primitives/Traits/Collection/IntersectKeys.php`
- [ ] `src/Primitives/Traits/Collection/Is.php`
- [ ] `src/Primitives/Traits/Collection/IsEmpty.php`
- [ ] `src/Primitives/Traits/Collection/IsNumeric.php`
- [ ] `src/Primitives/Traits/Collection/IsObject.php`
- [ ] `src/Primitives/Traits/Collection/IsScalar.php`
- [ ] `src/Primitives/Traits/Collection/Join.php`
- [ ] `src/Primitives/Traits/Collection/JsonSerialize.php`
- [ ] `src/Primitives/Traits/Collection/Keys.php`
- [ ] `src/Primitives/Traits/Collection/Krsort.php`
- [ ] `src/Primitives/Traits/Collection/Ksort.php`
- [ ] `src/Primitives/Traits/Collection/Last.php`
- [ ] `src/Primitives/Traits/Collection/LastKey.php`
- [ ] `src/Primitives/Traits/Collection/Ltrim.php`
- [ ] `src/Primitives/Traits/Collection/Map.php`
- [ ] `src/Primitives/Traits/Collection/Max.php`
- [ ] `src/Primitives/Traits/Collection/Merge.php`
- [ ] `src/Primitives/Traits/Collection/Min.php`
- [ ] `src/Primitives/Traits/Collection/Misc.php`
- [ ] `src/Primitives/Traits/Collection/None.php`
- [ ] `src/Primitives/Traits/Collection/Nth.php`
- [ ] `src/Primitives/Traits/Collection/OffsetExists.php`
- [ ] `src/Primitives/Traits/Collection/OffsetGet.php`
- [ ] `src/Primitives/Traits/Collection/OffsetSet.php`
- [ ] `src/Primitives/Traits/Collection/OffsetUnset.php`
- [ ] `src/Primitives/Traits/Collection/Only.php`
- [ ] `src/Primitives/Traits/Collection/Order.php`
- [ ] `src/Primitives/Traits/Collection/Ordering.php`
- [ ] `src/Primitives/Traits/Collection/Pad.php`
- [ ] `src/Primitives/Traits/Collection/Partition.php`
- [ ] `src/Primitives/Traits/Collection/Pipe.php`
- [ ] `src/Primitives/Traits/Collection/Pluck.php`
- [ ] `src/Primitives/Traits/Collection/Pop.php`
- [ ] `src/Primitives/Traits/Collection/Pos.php`
- [ ] `src/Primitives/Traits/Collection/Prefix.php`
- [ ] `src/Primitives/Traits/Collection/Prepend.php`
- [ ] `src/Primitives/Traits/Collection/Pull.php`
- [ ] `src/Primitives/Traits/Collection/Push.php`
- [ ] `src/Primitives/Traits/Collection/Put.php`
- [ ] `src/Primitives/Traits/Collection/Random.php`
- [ ] `src/Primitives/Traits/Collection/Reduce.php`
- [ ] `src/Primitives/Traits/Collection/Reject.php`
- [ ] `src/Primitives/Traits/Collection/Rekey.php`
- [ ] `src/Primitives/Traits/Collection/Remove.php`
- [ ] `src/Primitives/Traits/Collection/Replace.php`
- [ ] `src/Primitives/Traits/Collection/Reverse.php`
- [ ] `src/Primitives/Traits/Collection/Rsort.php`
- [ ] `src/Primitives/Traits/Collection/Rtrim.php`
- [ ] `src/Primitives/Traits/Collection/Search.php`
- [ ] `src/Primitives/Traits/Collection/Sep.php`
- [ ] `src/Primitives/Traits/Collection/Set.php`
- [ ] `src/Primitives/Traits/Collection/Shift.php`
- [ ] `src/Primitives/Traits/Collection/Shorten.php`
- [ ] `src/Primitives/Traits/Collection/Shuffle.php`
- [ ] `src/Primitives/Traits/Collection/Skip.php`
- [ ] `src/Primitives/Traits/Collection/Slice.php`
- [ ] `src/Primitives/Traits/Collection/Some.php`
- [ ] `src/Primitives/Traits/Collection/Sort.php`
- [ ] `src/Primitives/Traits/Collection/Splice.php`
- [ ] `src/Primitives/Traits/Collection/StrAfter.php`
- [ ] `src/Primitives/Traits/Collection/StrBefore.php`
- [ ] `src/Primitives/Traits/Collection/StrContains.php`
- [ ] `src/Primitives/Traits/Collection/StrContainsAll.php`
- [ ] `src/Primitives/Traits/Collection/StrEnds.php`
- [ ] `src/Primitives/Traits/Collection/StrEndsAll.php`
- [ ] `src/Primitives/Traits/Collection/String_.php`
- [ ] `src/Primitives/Traits/Collection/StrLower.php`
- [ ] `src/Primitives/Traits/Collection/StrReplace.php`
- [ ] `src/Primitives/Traits/Collection/StrStarts.php`
- [ ] `src/Primitives/Traits/Collection/StrStartsAll.php`
- [ ] `src/Primitives/Traits/Collection/StrUpper.php`
- [ ] `src/Primitives/Traits/Collection/Suffix.php`
- [ ] `src/Primitives/Traits/Collection/Sum.php`
- [ ] `src/Primitives/Traits/Collection/Take.php`
- [ ] `src/Primitives/Traits/Collection/Tap.php`
- [ ] `src/Primitives/Traits/Collection/Test.php`
- [ ] `src/Primitives/Traits/Collection/ToArray.php`
- [ ] `src/Primitives/Traits/Collection/ToJson.php`
- [ ] `src/Primitives/Traits/Collection/ToUrl.php`
- [ ] `src/Primitives/Traits/Collection/Transform.php`
- [ ] `src/Primitives/Traits/Collection/Transpose.php`
- [ ] `src/Primitives/Traits/Collection/Traverse.php`
- [ ] `src/Primitives/Traits/Collection/Tree.php`
- [ ] `src/Primitives/Traits/Collection/Trim.php`
- [ ] `src/Primitives/Traits/Collection/Uasort.php`
- [ ] `src/Primitives/Traits/Collection/Uksort.php`
- [ ] `src/Primitives/Traits/Collection/Union.php`
- [ ] `src/Primitives/Traits/Collection/Unique.php`
- [ ] `src/Primitives/Traits/Collection/Unshift.php`
- [ ] `src/Primitives/Traits/Collection/Usort.php`
- [ ] `src/Primitives/Traits/Collection/Values.php`
- [ ] `src/Primitives/Traits/Collection/Walk.php`
- [ ] `src/Primitives/Traits/Collection/Where.php`
- [ ] `src/Primitives/Traits/Collection/With.php`
- [ ] `src/Primitives/Traits/Collection/Zip.php`

### Rector (2 files)
- [ ] `src/Rector/Rules/ReplaceTraitUseByAliasNameRector.php`
- [ ] `src/Rector/Sets.php`

### Symfony (14 files)
- [ ] `src/Symfony/CommandBus/SymfonyCommandBusAdapter.php`
- [ ] `src/Symfony/CommandBus/SymfonyQueryBusAdapter.php`
- [ ] `src/Symfony/Filesystem/Filesystem.php`
- [ ] `src/Symfony/Mailer/Adapter/EmailAdapter.php`
- [ ] `src/Symfony/Mailer/Adapter/TemplatedEmailAdapter.php`
- [ ] `src/Symfony/Mailer/Service/SendMailService.php`
- [ ] `src/Symfony/Middleware/DoctrineTransactionMiddleware.php`
- [ ] `src/Symfony/Response/ResponseService.php`
- [ ] `src/Symfony/Routing/RoutingService.php`
- [ ] `src/Symfony/Session/FlashBagService.php`
- [ ] `src/Symfony/Subscriber/DoctrineCommandTransactionSubscriber.php`
- [ ] `src/Symfony/Subscriber/DoctrineTransactionSubscriber.php`
- [ ] `src/Symfony/Templating/TwigTemplatingService.php`
- [ ] `src/Symfony/VO/Uri.php`

### Traits (4 files)
- [ ] `src/Traits/CommandMessageTrait.php`
- [ ] `src/Traits/DependencyInjectionTrait.php`
- [ ] `src/Traits/EnumTrait.php`
- [ ] `src/Traits/QueryMessageTrait.php`

### TryCatch (4 files)
- [ ] `src/TryCatch/NullThrowableHandler.php`
- [ ] `src/TryCatch/ThrowableHandler.php`
- [ ] `src/TryCatch/ThrowableHandlerCollection.php`
- [ ] `src/TryCatch/TryCatch.php`

### Wrapper (1 file)
- [ ] `src/Wrapper/SplFileInfo.php`

---

## 🎯 Audit Priorities

1. **HIGH**: Business classes (Common/, Primitives/ core, Symfony/ adapters)
2. **MEDIUM**: Collection implementations, Services 
3. **LOW**: Interfaces (generally compliant by nature), Collection traits (repetitive)

## 🚀 Using Specialized Agents

```bash
# Audit a file
Task(subagent_type: "elegant-object-auditor", description: "Audit file", prompt: "Audit src/path/to/file.php")

# Conservative refactoring  
Task(subagent_type: "elegant-object-refactor", description: "Refactor file", prompt: "Refactor src/path/to/file.php with minimal breaking changes")

# Create Rector rules if needed
Task(subagent_type: "rector-agent", description: "Migration rule", prompt: "Create migration rule for...")
```

---

## 📝 Important Notes

- **481 files** total confirmed
- **Interfaces** (Contracts/) are generally compliant by nature
- Focus on **concrete classes** that implement business logic
- Many **collection traits** are repetitive - group audit possible

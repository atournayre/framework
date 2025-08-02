# Elegant Object Audit TodoList

This todolist contains **ALL** 481 PHP files from the framework (`src/`) that need to be audited according to Elegant Object principles.

## 📋 Status Legend

- [ ] **To audit** - Not yet analyzed according to Elegant Object principles
- [x] **Compliant** - Already follows Elegant Object principles
- [ ] **Minor refactoring** - Small adjustments needed
- [ ] **Major refactoring** - Significant restructuring required
- [ ] **In progress** - Currently being refactored
- [x] **Completed** - Compliant with Elegant Object principles

## 📊 Statistics

- **Total files**: **481 PHP files**
- **Audited**: 1 file (Assert.php)
- **Remaining to audit**: 480 files

---

## 📁 Comprehensive File List (481 files)

### Common (37 files)
- [ ] `src/Common/AbstractCommandEvent.php`
- [ ] `src/Common/AbstractQueryEvent.php`
- [ ] `src/Common/Assert/Assert.php`
- [ ] `src/Common/Collection/EventCollection.php`
- [ ] `src/Common/Collection/TemplateContextCollection.php`
- [ ] `src/Common/Collection/Validation/ValidationCollection.php`
- [ ] `src/Common/Exception/BadMethodCallException.php`
- [ ] `src/Common/Exception/InvalidArgumentException.php`
- [ ] `src/Common/Exception/MutableException.php`
- [ ] `src/Common/Exception/NullException.php`
- [ ] `src/Common/Exception/RuntimeException.php`
- [ ] `src/Common/Exception/ThrowableTrait.php`
- [ ] `src/Common/Exception/UnexpectedValueException.php`
- [ ] `src/Common/Factory/Context/ContextFactory.php`
- [ ] `src/Common/Log/AbstractLogger.php`
- [ ] `src/Common/Log/DefaultLogger.php`
- [ ] `src/Common/Log/NullLogger.php`
- [ ] `src/Common/Model/AbstractUser.php`
- [ ] `src/Common/Model/DefaultUser.php`
- [ ] `src/Common/Persistance/Database.php`
- [ ] `src/Common/Persistance/DatabaseTrait.php`
- [ ] `src/Common/Traits/ContextTrait.php`
- [ ] `src/Common/Traits/EventsTrait.php`
- [ ] `src/Common/Traits/IsTrait.php`
- [ ] `src/Common/Types/DirectoryOrFile.php`
- [ ] `src/Common/Types/Domain.php`
- [ ] `src/Common/Types/File/Content.php`
- [ ] `src/Common/Types/File/Extension.php`
- [ ] `src/Common/Types/File/Filename.php`
- [ ] `src/Common/Types/File/Path.php`
- [ ] `src/Common/Types/HtmlTemplatePath.php`
- [ ] `src/Common/Types/TextTemplatePath.php`
- [ ] `src/Common/VO/Context/Context.php`
- [ ] `src/Common/VO/Duration.php`
- [ ] `src/Common/VO/Event.php`
- [ ] `src/Common/VO/Memory.php`
- [ ] `src/Common/VO/Security/PlainPassword.php`
- [ ] `src/Common/VO/Uri.php`

### Component/Mailer (12 files)
- [ ] `src/Component/Mailer/Collection/EmailAddressCollection.php`
- [ ] `src/Component/Mailer/Collection/EmailContactCollection.php`
- [ ] `src/Component/Mailer/Collection/TagCollection.php`
- [ ] `src/Component/Mailer/Configuration/MailerConfiguration.php`
- [ ] `src/Component/Mailer/Service/MailService.php`
- [ ] `src/Component/Mailer/Types/AttachmentMaxSize.php`
- [ ] `src/Component/Mailer/Types/EmailAddress.php`
- [ ] `src/Component/Mailer/Types/EmailHtml.php`
- [ ] `src/Component/Mailer/Types/EmailName.php`
- [ ] `src/Component/Mailer/Types/EmailSubject.php`
- [ ] `src/Component/Mailer/Types/EmailText.php`
- [ ] `src/Component/Mailer/Types/EmailUserName.php`
- [ ] `src/Component/Mailer/VO/Email.php`
- [ ] `src/Component/Mailer/VO/EmailContact.php`
- [ ] `src/Component/Mailer/VO/TemplatedEmail.php`

### Contracts (163 files)

#### Collection Interfaces (135 files)
- [ ] `src/Contracts/Collection/AddInterface.php`
- [ ] `src/Contracts/Collection/AfterInterface.php`
- [ ] `src/Contracts/Collection/AllInterface.php`
- [ ] `src/Contracts/Collection/ArsortInterface.php`
- [ ] `src/Contracts/Collection/AsListInterface.php`
- [ ] `src/Contracts/Collection/AsMapInterface.php`
- [ ] `src/Contracts/Collection/AsortInterface.php`
- [ ] `src/Contracts/Collection/AsReadOnlyListInterface.php`
- [ ] `src/Contracts/Collection/AsReadOnlyMapInterface.php`
- [ ] `src/Contracts/Collection/AtInterface.php`
- [ ] `src/Contracts/Collection/AtLeastOneElementInterface.php`
- [ ] `src/Contracts/Collection/AvgInterface.php`
- [ ] `src/Contracts/Collection/BeforeInterface.php`
- [ ] `src/Contracts/Collection/BoolInterface.php`
- [ ] `src/Contracts/Collection/CallInterface.php`
- [ ] `src/Contracts/Collection/CastInterface.php`
- [ ] `src/Contracts/Collection/ChunkInterface.php`
- [ ] `src/Contracts/Collection/ClearInterface.php`
- [ ] `src/Contracts/Collection/CloneInterface.php`
- [ ] `src/Contracts/Collection/ColInterface.php`
- [ ] `src/Contracts/Collection/CollapseInterface.php`
- [ ] `src/Contracts/Collection/CollectionValidationInterface.php`
- [ ] `src/Contracts/Collection/CombineInterface.php`
- [ ] `src/Contracts/Collection/CompareInterface.php`
- [ ] `src/Contracts/Collection/ConcatInterface.php`
- [ ] `src/Contracts/Collection/ContainsInterface.php`
- [ ] `src/Contracts/Collection/CopyInterface.php`
- [ ] `src/Contracts/Collection/CountByInterface.php`
- [ ] `src/Contracts/Collection/CountInterface.php`
- [ ] `src/Contracts/Collection/DdInterface.php`
- [ ] `src/Contracts/Collection/DelimiterInterface.php`
- [ ] `src/Contracts/Collection/DiffAssocInterface.php`
- [ ] `src/Contracts/Collection/DiffInterface.php`
- [ ] `src/Contracts/Collection/DiffKeysInterface.php`
- [ ] `src/Contracts/Collection/DumpInterface.php`
- [ ] `src/Contracts/Collection/DuplicatesInterface.php`
- [ ] `src/Contracts/Collection/EachInterface.php`
- [ ] `src/Contracts/Collection/EmptyInterface.php`
- [ ] `src/Contracts/Collection/EqualsInterface.php`
- [ ] `src/Contracts/Collection/EveryInterface.php`
- [ ] `src/Contracts/Collection/ExceptInterface.php`
- [ ] `src/Contracts/Collection/ExplodeInterface.php`
- [ ] `src/Contracts/Collection/FilterInterface.php`
- [ ] `src/Contracts/Collection/FindInterface.php`
- [ ] `src/Contracts/Collection/FirstInterface.php`
- [ ] `src/Contracts/Collection/FirstKeyInterface.php`
- [ ] `src/Contracts/Collection/FlatInterface.php`
- [ ] `src/Contracts/Collection/FlipInterface.php`
- [ ] `src/Contracts/Collection/FloatInterface.php`
- [ ] `src/Contracts/Collection/FromInterface.php`
- [ ] `src/Contracts/Collection/FromJsonInterface.php`
- [ ] `src/Contracts/Collection/GetInterface.php`
- [ ] `src/Contracts/Collection/GetIteratorInterface.php`
- [ ] `src/Contracts/Collection/GrepInterface.php`
- [ ] `src/Contracts/Collection/GroupByInterface.php`
- [ ] `src/Contracts/Collection/HasInterface.php`
- [ ] `src/Contracts/Collection/HasNoElementInterface.php`
- [ ] `src/Contracts/Collection/HasOneElementInterface.php`
- [ ] `src/Contracts/Collection/HasSeveralElementsInterface.php`
- [ ] `src/Contracts/Collection/HasXElementsInterface.php`
- [ ] `src/Contracts/Collection/IfAnyInterface.php`
- [ ] `src/Contracts/Collection/IfEmptyInterface.php`
- [ ] `src/Contracts/Collection/IfInterface.php`
- [ ] `src/Contracts/Collection/ImplementsInterface.php`
- [ ] `src/Contracts/Collection/IncludesInterface.php`
- [ ] `src/Contracts/Collection/IndexInterface.php`
- [ ] `src/Contracts/Collection/InInterface.php`
- [ ] `src/Contracts/Collection/InsertAfterInterface.php`
- [ ] `src/Contracts/Collection/InsertAtInterface.php`
- [ ] `src/Contracts/Collection/InsertBeforeInterface.php`
- [ ] `src/Contracts/Collection/IntersectAssocInterface.php`
- [ ] `src/Contracts/Collection/IntersectInterface.php`
- [ ] `src/Contracts/Collection/IntersectKeysInterface.php`
- [ ] `src/Contracts/Collection/IntInterface.php`
- [ ] `src/Contracts/Collection/IsEmptyInterface.php`
- [ ] `src/Contracts/Collection/IsInterface.php`
- [ ] `src/Contracts/Collection/IsNumericInterface.php`
- [ ] `src/Contracts/Collection/IsObjectInterface.php`
- [ ] `src/Contracts/Collection/IsScalarInterface.php`
- [ ] `src/Contracts/Collection/JoinInterface.php`
- [ ] `src/Contracts/Collection/JsonSerializeInterface.php`
- [ ] `src/Contracts/Collection/KeysInterface.php`
- [ ] `src/Contracts/Collection/KrsortInterface.php`
- [ ] `src/Contracts/Collection/KsortInterface.php`
- [ ] `src/Contracts/Collection/LastInterface.php`
- [ ] `src/Contracts/Collection/LastKeyInterface.php`
- [ ] `src/Contracts/Collection/LtrimInterface.php`
- [ ] `src/Contracts/Collection/MapInterface.php`
- [ ] `src/Contracts/Collection/MaxInterface.php`
- [ ] `src/Contracts/Collection/MergeInterface.php`
- [ ] `src/Contracts/Collection/MinInterface.php`
- [ ] `src/Contracts/Collection/NoneInterface.php`
- [ ] `src/Contracts/Collection/NthInterface.php`
- [ ] `src/Contracts/Collection/NumericListInterface.php`
- [ ] `src/Contracts/Collection/NumericMapInterface.php`
- [ ] `src/Contracts/Collection/OffsetExistsInterface.php`
- [ ] `src/Contracts/Collection/OffsetGetInterface.php`
- [ ] `src/Contracts/Collection/OffsetSetInterface.php`
- [ ] `src/Contracts/Collection/OffsetUnsetInterface.php`
- [ ] `src/Contracts/Collection/OnlyInterface.php`
- [ ] `src/Contracts/Collection/OrderInterface.php`
- [ ] `src/Contracts/Collection/PadInterface.php`
- [ ] `src/Contracts/Collection/PartitionInterface.php`
- [ ] `src/Contracts/Collection/PipeInterface.php`
- [ ] `src/Contracts/Collection/PluckInterface.php`
- [ ] `src/Contracts/Collection/PopInterface.php`
- [ ] `src/Contracts/Collection/PosInterface.php`
- [ ] `src/Contracts/Collection/PrefixInterface.php`
- [ ] `src/Contracts/Collection/PrependInterface.php`
- [ ] `src/Contracts/Collection/PullInterface.php`
- [ ] `src/Contracts/Collection/PushInterface.php`
- [ ] `src/Contracts/Collection/PutInterface.php`
- [ ] `src/Contracts/Collection/RandomInterface.php`
- [ ] `src/Contracts/Collection/ReduceInterface.php`
- [ ] `src/Contracts/Collection/RejectInterface.php`
- [ ] `src/Contracts/Collection/RekeyInterface.php`
- [ ] `src/Contracts/Collection/RemoveInterface.php`
- [ ] `src/Contracts/Collection/ReplaceInterface.php`
- [ ] `src/Contracts/Collection/ReverseInterface.php`
- [ ] `src/Contracts/Collection/RsortInterface.php`
- [ ] `src/Contracts/Collection/RtrimInterface.php`
- [ ] `src/Contracts/Collection/SearchInterface.php`
- [ ] `src/Contracts/Collection/SepInterface.php`
- [ ] `src/Contracts/Collection/SetInterface.php`
- [ ] `src/Contracts/Collection/ShiftInterface.php`
- [ ] `src/Contracts/Collection/ShuffleInterface.php`
- [ ] `src/Contracts/Collection/SkipInterface.php`
- [ ] `src/Contracts/Collection/SliceInterface.php`
- [ ] `src/Contracts/Collection/SomeInterface.php`
- [ ] `src/Contracts/Collection/SortInterface.php`
- [ ] `src/Contracts/Collection/SpliceInterface.php`
- [ ] `src/Contracts/Collection/StrAfterInterface.php`
- [ ] `src/Contracts/Collection/StrBeforeInterface.php`
- [ ] `src/Contracts/Collection/StrContainsAllInterface.php`
- [ ] `src/Contracts/Collection/StrContainsInterface.php`
- [ ] `src/Contracts/Collection/StrEndsAllInterface.php`
- [ ] `src/Contracts/Collection/StrEndsInterface.php`
- [ ] `src/Contracts/Collection/StringInterface.php`
- [ ] `src/Contracts/Collection/StrLowerInterface.php`
- [ ] `src/Contracts/Collection/StrReplaceInterface.php`
- [ ] `src/Contracts/Collection/StrStartsAllInterface.php`
- [ ] `src/Contracts/Collection/StrStartsInterface.php`
- [ ] `src/Contracts/Collection/StrUpperInterface.php`
- [ ] `src/Contracts/Collection/SuffixInterface.php`
- [ ] `src/Contracts/Collection/SumInterface.php`
- [ ] `src/Contracts/Collection/TakeInterface.php`
- [ ] `src/Contracts/Collection/TapInterface.php`
- [ ] `src/Contracts/Collection/ToArrayInterface.php`
- [ ] `src/Contracts/Collection/ToJsonInterface.php`
- [ ] `src/Contracts/Collection/ToUrlInterface.php`
- [ ] `src/Contracts/Collection/TransposeInterface.php`
- [ ] `src/Contracts/Collection/TraverseInterface.php`
- [ ] `src/Contracts/Collection/TreeInterface.php`
- [ ] `src/Contracts/Collection/TrimInterface.php`
- [ ] `src/Contracts/Collection/UasortInterface.php`
- [ ] `src/Contracts/Collection/UksortInterface.php`
- [ ] `src/Contracts/Collection/UnionInterface.php`
- [ ] `src/Contracts/Collection/UniqueInterface.php`
- [ ] `src/Contracts/Collection/UnshiftInterface.php`
- [ ] `src/Contracts/Collection/UsortInterface.php`
- [ ] `src/Contracts/Collection/ValuesInterface.php`
- [ ] `src/Contracts/Collection/WalkInterface.php`
- [ ] `src/Contracts/Collection/WhereInterface.php`
- [ ] `src/Contracts/Collection/WithInterface.php`
- [ ] `src/Contracts/Collection/ZipInterface.php`

#### Other Contracts (28 files)
- [ ] `src/Contracts/CommandBus/CommandBusInterface.php`
- [ ] `src/Contracts/CommandBus/CommandInterface.php`
- [ ] `src/Contracts/CommandBus/QueryBusInterface.php`
- [ ] `src/Contracts/CommandBus/QueryInterface.php`
- [ ] `src/Contracts/Common/Assert/AssertAllInterface.php`
- [ ] `src/Contracts/Common/Assert/AssertInterface.php`
- [ ] `src/Contracts/Common/Assert/AssertIsInterface.php`
- [ ] `src/Contracts/Common/Assert/AssertMiscInterface.php`
- [ ] `src/Contracts/Common/Assert/AssertNotInterface.php`
- [ ] `src/Contracts/Common/Assert/AssertNullInterface.php`
- [ ] `src/Contracts/Common/Assert/AssertNumericInterface.php`
- [ ] `src/Contracts/Common/Assert/AssertStringInterface.php`
- [ ] `src/Contracts/Context/ContextInterface.php`
- [ ] `src/Contracts/Context/HasContextInterface.php`
- [ ] `src/Contracts/DateTime/DateTimeInterface.php`
- [ ] `src/Contracts/DependencyInjection/DependencyInjectionAwareInterface.php`
- [ ] `src/Contracts/DependencyInjection/DependencyInjectionInterface.php`
- [ ] `src/Contracts/DependencyInjection/PostLoadHandlerInterface.php`
- [ ] `src/Contracts/Dispatcher/EntityEventDispatcher.php`
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

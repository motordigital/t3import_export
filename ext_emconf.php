<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "t3import_export".
 *
 * Auto generated 17-10-2017 09:19
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'Import & Export',
  'description' => 'General import and export tool for the TYPO3 CMS',
  'category' => 'module',
  'author' => 'Dirk Wenzel',
  'author_email' => 'dirk.wenzel@cps-it.de',
  'author_company' => '',
  'state' => 'beta',
  'uploadfolder' => '0',
  'createDirs' => '',
  'clearCacheOnLoad' => 1,
  'version' => '0.12.0',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '6.2.0-8.99.99',
      'php' => '5.4.0-0.0.0',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
  '_md5_values_when_last_written' => 'a:261:{s:9:"ChangeLog";s:4:"71cb";s:9:"README.md";s:4:"7cc8";s:13:"composer.json";s:4:"310f";s:12:"ext_icon.gif";s:4:"0fdd";s:17:"ext_localconf.php";s:4:"cc0f";s:14:"ext_tables.php";s:4:"5c1c";s:14:"ext_tables.sql";s:4:"ac98";s:24:"ext_typoscript_setup.txt";s:4:"4e80";s:33:"Classes/ConfigurableInterface.php";s:4:"a625";s:29:"Classes/ConfigurableTrait.php";s:4:"6d36";s:25:"Classes/DatabaseTrait.php";s:4:"6dbd";s:33:"Classes/IdentifiableInterface.php";s:4:"2db0";s:29:"Classes/IdentifiableTrait.php";s:4:"f67e";s:41:"Classes/InvalidConfigurationException.php";s:4:"bdec";s:28:"Classes/LoggingInterface.php";s:4:"0e13";s:24:"Classes/LoggingTrait.php";s:4:"61d7";s:33:"Classes/MissingClassException.php";s:4:"8c2f";s:36:"Classes/MissingDatabaseException.php";s:4:"b23d";s:37:"Classes/MissingInterfaceException.php";s:4:"d656";s:30:"Classes/ObjectManagerTrait.php";s:4:"9905";s:34:"Classes/RenderContentInterface.php";s:4:"e392";s:30:"Classes/RenderContentTrait.php";s:4:"4ac4";s:43:"Classes/Command/ImportCommandController.php";s:4:"dc95";s:39:"Classes/Component/AbstractComponent.php";s:4:"c043";s:49:"Classes/Component/Converter/AbstractConverter.php";s:4:"2699";s:51:"Classes/Component/Converter/ArrayToDomainObject.php";s:4:"ef88";s:48:"Classes/Component/Converter/ArrayToXMLStream.php";s:4:"18eb";s:50:"Classes/Component/Converter/ConverterInterface.php";s:4:"8aca";s:46:"Classes/Component/Factory/ConverterFactory.php";s:4:"d1aa";s:45:"Classes/Component/Factory/FinisherFactory.php";s:4:"3af7";s:48:"Classes/Component/Factory/InitializerFactory.php";s:4:"2045";s:50:"Classes/Component/Factory/PostProcessorFactory.php";s:4:"0183";s:49:"Classes/Component/Factory/PreProcessorFactory.php";s:4:"c2b0";s:47:"Classes/Component/Finisher/AbstractFinisher.php";s:4:"a92e";s:41:"Classes/Component/Finisher/ClearCache.php";s:4:"e713";s:49:"Classes/Component/Finisher/DownloadFileStream.php";s:4:"daaa";s:48:"Classes/Component/Finisher/FinisherInterface.php";s:4:"b214";s:53:"Classes/Component/Initializer/AbstractInitializer.php";s:4:"b8ea";s:49:"Classes/Component/Initializer/DeleteFromTable.php";s:4:"2b44";s:54:"Classes/Component/Initializer/InitializerInterface.php";s:4:"f2e7";s:48:"Classes/Component/Initializer/InsertMultiple.php";s:4:"871f";s:48:"Classes/Component/Initializer/TruncateTables.php";s:4:"6556";s:45:"Classes/Component/Initializer/UpdateTable.php";s:4:"1d1d";s:57:"Classes/Component/PostProcessor/AbstractPostProcessor.php";s:4:"1891";s:58:"Classes/Component/PostProcessor/PostProcessorInterface.php";s:4:"8ac4";s:55:"Classes/Component/PostProcessor/SetHiddenProperties.php";s:4:"5b79";s:51:"Classes/Component/PostProcessor/TranslateObject.php";s:4:"3057";s:55:"Classes/Component/PreProcessor/AbstractPreProcessor.php";s:4:"8da9";s:44:"Classes/Component/PreProcessor/AddArrays.php";s:4:"dc0c";s:40:"Classes/Component/PreProcessor/Clean.php";s:4:"a19b";s:52:"Classes/Component/PreProcessor/ConcatenateFields.php";s:4:"3347";s:55:"Classes/Component/PreProcessor/GenerateFileResource.php";s:4:"6c6f";s:52:"Classes/Component/PreProcessor/GenerateFileTrait.php";s:4:"93fe";s:53:"Classes/Component/PreProcessor/GenerateUploadFile.php";s:4:"51e7";s:47:"Classes/Component/PreProcessor/ImplodeArray.php";s:4:"91c0";s:43:"Classes/Component/PreProcessor/LookUpDB.php";s:4:"aea8";s:49:"Classes/Component/PreProcessor/MapFieldValues.php";s:4:"8f2b";s:44:"Classes/Component/PreProcessor/MapFields.php";s:4:"2904";s:56:"Classes/Component/PreProcessor/PreProcessorInterface.php";s:4:"c021";s:47:"Classes/Component/PreProcessor/RemoveFields.php";s:4:"f8b8";s:48:"Classes/Component/PreProcessor/RenderContent.php";s:4:"3321";s:48:"Classes/Component/PreProcessor/SetFieldValue.php";s:4:"14ee";s:47:"Classes/Component/PreProcessor/StringToTime.php";s:4:"4751";s:51:"Classes/Component/PreProcessor/UnsetEmptyFields.php";s:4:"e401";s:44:"Classes/Component/PreProcessor/XMLMapper.php";s:4:"ca9c";s:37:"Classes/Controller/BaseController.php";s:4:"4929";s:39:"Classes/Controller/ExportController.php";s:4:"479d";s:39:"Classes/Controller/ImportController.php";s:4:"f626";s:50:"Classes/Controller/TransferControllerInterface.php";s:4:"d7be";s:45:"Classes/Domain/Factory/TransferSetFactory.php";s:4:"3ca3";s:46:"Classes/Domain/Factory/TransferTaskFactory.php";s:4:"5712";s:35:"Classes/Domain/Model/DataStream.php";s:4:"3c1e";s:44:"Classes/Domain/Model/DataStreamInterface.php";s:4:"889c";s:37:"Classes/Domain/Model/ExportTarget.php";s:4:"ce27";s:35:"Classes/Domain/Model/TaskResult.php";s:4:"90da";s:36:"Classes/Domain/Model/TransferSet.php";s:4:"74c4";s:37:"Classes/Domain/Model/TransferTask.php";s:4:"6d2d";s:44:"Classes/Domain/Model/Dto/DemandInterface.php";s:4:"a79e";s:39:"Classes/Domain/Model/Dto/TaskDemand.php";s:4:"832d";s:35:"Classes/Factory/AbstractFactory.php";s:4:"ee55";s:35:"Classes/Factory/FilePathFactory.php";s:4:"138d";s:29:"Classes/Messaging/Message.php";s:4:"a138";s:38:"Classes/Messaging/MessageContainer.php";s:4:"435b";s:43:"Classes/Messaging/MessageContainerTrait.php";s:4:"ef37";s:37:"Classes/Persistence/DataSourceCSV.php";s:4:"efba";s:36:"Classes/Persistence/DataSourceDB.php";s:4:"fafb";s:51:"Classes/Persistence/DataSourceDynamicRepository.php";s:4:"fc66";s:43:"Classes/Persistence/DataSourceInterface.php";s:4:"6d82";s:37:"Classes/Persistence/DataSourceXML.php";s:4:"07c3";s:36:"Classes/Persistence/DataTargetDB.php";s:4:"4943";s:44:"Classes/Persistence/DataTargetFileStream.php";s:4:"e87b";s:43:"Classes/Persistence/DataTargetInterface.php";s:4:"d191";s:44:"Classes/Persistence/DataTargetRepository.php";s:4:"2eb4";s:43:"Classes/Persistence/DataTargetXMLStream.php";s:4:"2167";s:49:"Classes/Persistence/Factory/DataSourceFactory.php";s:4:"4e3b";s:49:"Classes/Persistence/Factory/DataTargetFactory.php";s:4:"b327";s:52:"Classes/Persistence/Factory/FileReferenceFactory.php";s:4:"9bf7";s:56:"Classes/Property/PropertyMappingConfigurationBuilder.php";s:4:"8971";s:60:"Classes/Property/TypeConverter/PersistentObjectConverter.php";s:4:"15ba";s:45:"Classes/Resource/FileIndexRepositoryTrait.php";s:4:"72ef";s:46:"Classes/Resource/FileReferenceFactoryTrait.php";s:4:"1791";s:41:"Classes/Resource/ResourceFactoryTrait.php";s:4:"1677";s:41:"Classes/Resource/ResourceStorageTrait.php";s:4:"e7ed";s:34:"Classes/Resource/ResourceTrait.php";s:4:"0da8";s:43:"Classes/Resource/StorageRepositoryTrait.php";s:4:"74e6";s:41:"Classes/Service/DataTransferProcessor.php";s:4:"c53f";s:45:"Classes/Service/DatabaseConnectionService.php";s:4:"3378";s:51:"Classes/Service/DomainObjectTranslatorInterface.php";s:4:"5425";s:38:"Classes/Service/TranslationService.php";s:4:"bc06";s:68:"Classes/Validation/Configuration/ConfigurationValidatorInterface.php";s:4:"b982";s:66:"Classes/Validation/Configuration/MappingConfigurationValidator.php";s:4:"f241";s:71:"Classes/Validation/Configuration/ResourcePathConfigurationValidator.php";s:4:"1f1c";s:70:"Classes/Validation/Configuration/TargetClassConfigurationValidator.php";s:4:"fea8";s:65:"Configuration/TCA/tx_t3importexport_domain_model_exporttarget.php";s:4:"97ae";s:42:"Configuration/TypoScript/Examples/setup.ts";s:4:"0bce";s:26:"Documentation/COMPONENT.md";s:4:"4335";s:30:"Documentation/CONFIGURATION.md";s:4:"471c";s:24:"Documentation/INSTALL.md";s:4:"9fd7";s:25:"Documentation/OVERVIEW.md";s:4:"c28e";s:28:"Documentation/Persistence.md";s:4:"fa36";s:23:"Documentation/README.md";s:4:"66a2";s:31:"Documentation/exporter_doku.odt";s:4:"c98f";s:31:"Documentation/exporter_doku.txt";s:4:"c8f5";s:40:"Documentation/t3events_ihk_aue___map.xml";s:4:"65bb";s:37:"Documentation/Components/CONVERTER.md";s:4:"80a2";s:36:"Documentation/Components/FINISHER.md";s:4:"b772";s:39:"Documentation/Components/INITIALIZER.md";s:4:"bc00";s:41:"Documentation/Components/POSTPROCESSOR.md";s:4:"6b6f";s:40:"Documentation/Components/PREPROCESSOR.md";s:4:"96dc";s:58:"Documentation/Components/Converters/ArrayToDomainObject.md";s:4:"0774";s:48:"Documentation/Components/Finishers/ClearCache.md";s:4:"75ef";s:56:"Documentation/Components/Finishers/DownloadFileStream.md";s:4:"eee1";s:56:"Documentation/Components/Initializers/DeleteFromTable.md";s:4:"e389";s:55:"Documentation/Components/Initializers/InsertMultiple.md";s:4:"7289";s:55:"Documentation/Components/Initializers/TruncateTables.md";s:4:"edce";s:52:"Documentation/Components/Initializers/UpdateTable.md";s:4:"90aa";s:52:"Documentation/Components/PreProcessors/ADD_ARRAYS.md";s:4:"d337";s:47:"Documentation/Components/PreProcessors/CLEAN.md";s:4:"c964";s:60:"Documentation/Components/PreProcessors/CONCATENATE_FIELDS.md";s:4:"0e7e";s:55:"Documentation/Components/PreProcessors/IMPLODE_ARRAY.md";s:4:"cfdc";s:52:"Documentation/Components/PreProcessors/LOOK_UP_DB.md";s:4:"befd";s:52:"Documentation/Components/PreProcessors/MAP_FIELDS.md";s:4:"7fd7";s:58:"Documentation/Components/PreProcessors/MAP_FIELD_VALUES.md";s:4:"b735";s:55:"Documentation/Components/PreProcessors/REMOVE_FIELDS.md";s:4:"91a6";s:56:"Documentation/Components/PreProcessors/RENDER_CONTENT.md";s:4:"8e2d";s:57:"Documentation/Components/PreProcessors/SET_FIELD_VALUE.md";s:4:"d793";s:56:"Documentation/Components/PreProcessors/STRING_TO_TIME.md";s:4:"4e79";s:58:"Documentation/Components/PreProcessors/UnsetEmptyFields.md";s:4:"14c7";s:52:"Documentation/Components/PreProcessors/XML_MAPPER.md";s:4:"6b81";s:42:"Documentation/Persistence/DataSourceCSV.md";s:4:"1274";s:42:"Documentation/Persistence/DataSourceXML.md";s:4:"9981";s:41:"Documentation/Persistence/DataTargetDB.md";s:4:"5397";s:50:"Documentation/Service/DatabaseConnectionService.md";s:4:"918b";s:37:"Documentation/UML/t3import_export.mdj";s:4:"5871";s:37:"Documentation/UML/t3import_export.xmi";s:4:"bafe";s:43:"Resources/Private/Language/de.locallang.xlf";s:4:"1973";s:46:"Resources/Private/Language/de.locallang_db.xlf";s:4:"dc1e";s:50:"Resources/Private/Language/de.locallang_import.xlf";s:4:"134e";s:47:"Resources/Private/Language/de.locallang_mod.xlf";s:4:"db79";s:40:"Resources/Private/Language/locallang.xlf";s:4:"446f";s:43:"Resources/Private/Language/locallang_db.xlf";s:4:"d80d";s:47:"Resources/Private/Language/locallang_import.xlf";s:4:"4d8d";s:44:"Resources/Private/Language/locallang_mod.xlf";s:4:"d1c9";s:38:"Resources/Private/Layouts/Backend.html";s:4:"9a9c";s:38:"Resources/Private/Layouts/Default.html";s:4:"9a9c";s:44:"Resources/Private/Partials/Set/ListItem.html";s:4:"5236";s:51:"Resources/Private/Partials/Task/ExportListItem.html";s:4:"f053";s:51:"Resources/Private/Partials/Task/ImportListItem.html";s:4:"3896";s:49:"Resources/Private/Templates/Export/ExportSet.html";s:4:"3d21";s:50:"Resources/Private/Templates/Export/ExportTask.html";s:4:"d958";s:45:"Resources/Private/Templates/Export/Index.html";s:4:"953b";s:49:"Resources/Private/Templates/Import/ImportSet.html";s:4:"1b9a";s:50:"Resources/Private/Templates/Import/ImportTask.html";s:4:"7401";s:45:"Resources/Private/Templates/Import/Index.html";s:4:"64b2";s:47:"Resources/Public/Examples/CSV/csv2ttContent.csv";s:4:"f486";s:53:"Resources/Public/Examples/TypoScript/csv2ttContent.ts";s:4:"faf2";s:44:"Resources/Public/Examples/TypoScript/sets.ts";s:4:"cd14";s:35:"Resources/Public/Icons/ext_icon.svg";s:4:"b143";s:40:"Resources/Public/Icons/module_export.svg";s:4:"62df";s:40:"Resources/Public/Icons/module_import.svg";s:4:"5a55";s:35:"Resources/Public/Icons/relation.gif";s:4:"e615";s:25:"Tests/Build/UnitTests.xml";s:4:"31c1";s:55:"Tests/Functional/Fixtures/importProcessorBuildQueue.xml";s:4:"18f7";s:48:"Tests/Functional/Service/ImportProcessorTest.php";s:4:"ad82";s:36:"Tests/Unit/ConfigurableTraitTest.php";s:4:"1630";s:32:"Tests/Unit/DatabaseTraitTest.php";s:4:"151c";s:43:"Tests/Unit/FileIndexRepositoryTraitTest.php";s:4:"89f1";s:34:"Tests/Unit/FilePathFactoryTest.php";s:4:"b955";s:44:"Tests/Unit/FileReferenceFactoryTraitTest.php";s:4:"a718";s:36:"Tests/Unit/IdentifiableTraitTest.php";s:4:"bc91";s:31:"Tests/Unit/LoggingTraitTest.php";s:4:"9adf";s:40:"Tests/Unit/MessageContainerTraitTest.php";s:4:"a8ba";s:37:"Tests/Unit/ObjectManagerTraitTest.php";s:4:"5bca";s:37:"Tests/Unit/RenderContentTraitTest.php";s:4:"4630";s:39:"Tests/Unit/ResourceFactoryTraitTest.php";s:4:"f35b";s:39:"Tests/Unit/ResourceStorageTraitTest.php";s:4:"5d6c";s:32:"Tests/Unit/ResourceTraitTest.php";s:4:"5833";s:41:"Tests/Unit/StorageRepositoryTraitTest.php";s:4:"5be9";s:50:"Tests/Unit/Command/ImportCommandControllerTest.php";s:4:"0a63";s:46:"Tests/Unit/Component/AbstractComponentTest.php";s:4:"576b";s:56:"Tests/Unit/Component/Converter/AbstractConverterTest.php";s:4:"2cef";s:58:"Tests/Unit/Component/Converter/ArrayToDomainObjectTest.php";s:4:"49da";s:55:"Tests/Unit/Component/Converter/ArrayToXMLStreamTest.php";s:4:"3cbc";s:53:"Tests/Unit/Component/Factory/ConverterFactoryTest.php";s:4:"ea82";s:52:"Tests/Unit/Component/Factory/FinisherFactoryTest.php";s:4:"0000";s:55:"Tests/Unit/Component/Factory/InitializerFactoryTest.php";s:4:"e756";s:57:"Tests/Unit/Component/Factory/PostProcessorFactoryTest.php";s:4:"3cc5";s:56:"Tests/Unit/Component/Factory/PreProcessorFactoryTest.php";s:4:"b98b";s:54:"Tests/Unit/Component/Finisher/AbstractFinisherTest.php";s:4:"63a5";s:48:"Tests/Unit/Component/Finisher/ClearCacheTest.php";s:4:"6f0b";s:60:"Tests/Unit/Component/Initializer/AbstractInitializerTest.php";s:4:"bc8d";s:56:"Tests/Unit/Component/Initializer/DeleteFromTableTest.php";s:4:"85da";s:55:"Tests/Unit/Component/Initializer/InsertMultipleTest.php";s:4:"585e";s:55:"Tests/Unit/Component/Initializer/TruncateTablesTest.php";s:4:"b44f";s:64:"Tests/Unit/Component/PostProcessor/AbstractPostProcessorTest.php";s:4:"bfc7";s:62:"Tests/Unit/Component/PostProcessor/SetHiddenPropertiesTest.php";s:4:"47b6";s:58:"Tests/Unit/Component/PostProcessor/TranslateObjectTest.php";s:4:"e1f1";s:62:"Tests/Unit/Component/PreProcessor/AbstractPreProcessorTest.php";s:4:"1976";s:51:"Tests/Unit/Component/PreProcessor/AddArraysTest.php";s:4:"a787";s:59:"Tests/Unit/Component/PreProcessor/ConcatenateFieldsTest.php";s:4:"ca05";s:62:"Tests/Unit/Component/PreProcessor/GenerateFileResourceTest.php";s:4:"7682";s:59:"Tests/Unit/Component/PreProcessor/GenerateFileTraitTest.php";s:4:"2aa5";s:60:"Tests/Unit/Component/PreProcessor/GenerateUploadFileTest.php";s:4:"1227";s:50:"Tests/Unit/Component/PreProcessor/LookUpDBTest.php";s:4:"0233";s:56:"Tests/Unit/Component/PreProcessor/MapFieldValuesTest.php";s:4:"18e3";s:51:"Tests/Unit/Component/PreProcessor/MapFieldsTest.php";s:4:"ad69";s:54:"Tests/Unit/Component/PreProcessor/RemoveFieldsTest.php";s:4:"f34d";s:55:"Tests/Unit/Component/PreProcessor/RenderContentTest.php";s:4:"b552";s:55:"Tests/Unit/Component/PreProcessor/SetFieldValueTest.php";s:4:"8b37";s:54:"Tests/Unit/Component/PreProcessor/StringToTimeTest.php";s:4:"f58c";s:58:"Tests/Unit/Component/PreProcessor/UnsetEmptyFieldsTest.php";s:4:"d89c";s:51:"Tests/Unit/Component/PreProcessor/XMLMapperTest.php";s:4:"e591";s:46:"Tests/Unit/Controller/ExportControllerTest.php";s:4:"96b4";s:46:"Tests/Unit/Controller/ImportControllerTest.php";s:4:"ce64";s:49:"Tests/Unit/Domain/Factory/AbstractFactoryTest.php";s:4:"8287";s:50:"Tests/Unit/Domain/Factory/ImportSetFactoryTest.php";s:4:"b6e1";s:51:"Tests/Unit/Domain/Factory/ImportTaskFactoryTest.php";s:4:"d6cc";s:44:"Tests/Unit/Domain/Model/ExportTargetTest.php";s:4:"1afb";s:42:"Tests/Unit/Domain/Model/TaskResultTest.php";s:4:"0769";s:43:"Tests/Unit/Domain/Model/TransferSetTest.php";s:4:"34e5";s:44:"Tests/Unit/Domain/Model/TransferTaskTest.php";s:4:"c508";s:46:"Tests/Unit/Domain/Model/Dto/TaskDemandTest.php";s:4:"d473";s:45:"Tests/Unit/Messaging/MessageContainerTest.php";s:4:"b419";s:36:"Tests/Unit/Messaging/MessageTest.php";s:4:"b137";s:44:"Tests/Unit/Persistence/DataSourceCSVTest.php";s:4:"1c88";s:43:"Tests/Unit/Persistence/DataSourceDBTest.php";s:4:"e8a6";s:44:"Tests/Unit/Persistence/DataSourceXMLTest.php";s:4:"9f05";s:43:"Tests/Unit/Persistence/DataTargetDBTest.php";s:4:"2c58";s:51:"Tests/Unit/Persistence/DataTargetFileStreamTest.php";s:4:"da87";s:51:"Tests/Unit/Persistence/DataTargetRepositoryTest.php";s:4:"1e3c";s:50:"Tests/Unit/Persistence/DataTargetXMLStreamTest.php";s:4:"5f73";s:56:"Tests/Unit/Persistence/Factory/DataSourceFactoryTest.php";s:4:"9d1a";s:56:"Tests/Unit/Persistence/Factory/DataTargetFactoryTest.php";s:4:"164c";s:59:"Tests/Unit/Persistence/Factory/FileReferenceFactoryTest.php";s:4:"2647";s:63:"Tests/Unit/Property/PropertyMappingConfigurationBuilderTest.php";s:4:"e7a1";s:48:"Tests/Unit/Service/DataTransferProcessorTest.php";s:4:"bd71";s:52:"Tests/Unit/Service/DatabaseConnectionServiceTest.php";s:4:"cdf6";s:45:"Tests/Unit/Service/TranslationServiceTest.php";s:4:"e7a9";s:73:"Tests/Unit/Validation/Configuration/MappingConfigurationValidatorTest.php";s:4:"1984";s:78:"Tests/Unit/Validation/Configuration/ResourcePathConfigurationValidatorTest.php";s:4:"d1de";s:77:"Tests/Unit/Validation/Configuration/TargetClassConfigurationValidatorTest.php";s:4:"0d88";}',
);


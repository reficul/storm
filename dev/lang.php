<?php

$lang = [
    '__app_storm' => "Storm",
    'menu__storm_configuration' => "Storm",
    'menu__storm_configuration_settings' => "Settings",
    'menu__storm_configuration_apps' => "Dev Folder: Applications",
    'menu__storm_configuration_proxyclass' => "Proxy Classes Generator",
    'menu__storm_configuration_plugins' => "Dev Folder: Plugins",
    'dev_class' => "Sources",
    'storm_settings_headerdoc__tabbed' => "Headerdoc",
    'storm_settings_headerdoc_enabled' => "Enabled",
    'storm_settings_headerdoc_enabled_desc' => 'If enabled, will add a file header to each php class.',
    'storm_settings_headerdoc_allowed_apps' => "Allowed Apps",
    'storm_settings_headerdoc_allowed_apps_desc' => "Select Apps to execute Header doc generation on 'build' and on 'download'.",
    'storm_settings_headerdoc__sidebar' => "If enabled, will add a temporary header doc to each php class file when app is built. On download, will replace the temp header doc with a permanent one, container @brief (class name), @author (app author), @copyright (current year with author name from app), @package (IPS Social Suite), @subpackage (App's name), @since (which version file was added in), @version (current version of app). Excluded folders: 3rdparty, vendor, dev, hooks, data (these are case sensitive).",
    'storm_proxyclass_progress' => "Processing %s of %s",
    'storm_proxyclass_done' => "Proxy Classes have been Generated",
    'storm_proxyclass_title' => "Proxy Classes",
    'storm_proxyclass_button' => "Generate Proxy Classes",
    'storm_apps_apps_select' => "Select Application",
    'storm_apps_app' => "Application",
    'storm_apps_app_desc' => "Select which application to generate the Dev Folder for.",
    'storm_apps_type' => "Type",
    'storm_apps_type_desc' => "Choose everything to recreate the entire Dev Folder, or select which part of the Dev folder you wish to recreate.",
    'storm_apps_type_lang' => "Language",
    'storm_apps_type_js' => "Javascript",
    'storm_apps_type_template' => "Templates",
    'storm_apps_type_email' => "Email Templates",
    'storm_apps_type_all' => "Everything",
    'storm_apps_type_select' => "Select Type",
    'storm_apps_return_javascript' => "Javascript Files Generated",
    'storm_apps_return_templates' => "Template Files Generated",
    'storm_apps_return_email' => "Email Template Files Generated",
    'storm_apps_return_lang' => "Language Strings Generated",
    'storm_apps_queue_title' => "Generating Dev Files",
    'storm_apps_total_done' => "Processing %s of %s",
    'storm_apps_completed' => "Dev folder generated for %s",
    'storm_plugins_done' => "The Dev Folder for %s has been generated!",
    'storm_plugin_upload' => "Plugin XML",
    'storm_plugin_upload_desc' => "Upload the plugin's xml file here. Will install the plugin if its not already installed (this will overwrite if a dev folder is already there).",
    'storm_plugins_title' => "Plugins Dev Folder Generator",
    'storm_apps_title' => "Applications Dev Folder Generator",
    'storm_settings_title' => "Settings",
    'storm_proxyclass_sidebar' => "Generates proxy classes for IPS/IPS Apps/3rd party apps, This is useful for IDE's, so useful features such as autocomplete and hinting can be used, since IPS's framework is uniuque.",
    'storm_class_type' => "Class Type",
    'storm_class_type_desc' => "Class type, Class for a regular class. Node for a \\IPS\\Node\\Model class. Content Item for a \\IPS\\Content\\Item class. Content Item Comment Class for a \\IPS\\Content\\Comment class.",
    'storm_class_namespace' => "Namespace",
    'storm_class_namespace_desc' => "Namespace for the class, leave blank if not a subclass. Class: \\IPS\\myapp, SubClass: \\IPS\\myapp\\ParentClass",
    'storm_class_className' => "Class Name",
    'storm_class_className_desc' => "do not include the underscore( _ ). This will also be the file's name.",
    'storm_class_extends' => "Extends",
    'storm_class_extends_desc' => "Does this class extend another class? if yes, please use the FQN here.",
    'storm_class_implements' => "Implements",
    'storm_class_implements_desc' => "will this class implement any interface classes? Use the FQN.",
    'storm_classes_class_no_exist' => "This class already exist in this namespace.",
    'storm_classes_extended_class_no_exist' => "The extended class does not exist!",
    'storm_classes_implemented_no_interface' => "One of your implemented interface classes does not exist!",
    'storm_classes_type_no_selection' => "Please select a type!",
    'storm_settings_general__tabbed' => "General",
    'storm_settings_enable_debug' => "Enable",
    'storm_settings_enable_debug_desc' => "Enable console output",
    'ext__Headerdoc' => 'Customize how the headerdoc works for storm.',
    'storm_settings_profiler' => "Profiler",
    'storm_settings_enable_query' => "Enable DB Queries",
    'storm_class_created' => "Created %s Class: %s has been created successfully!",
    'storm_devfolder_created' => "%s has been successfully created.",
    'storm_settings_tab_debug_css_alt' => "Alt CSS Loading",
    'storm_settings_tab_debug_css_alt_desc' => "if you are getting no css, you could be hitting the query string limit in apache, enable this to try to avoid it.",
    'storm_settings_tab_profiler' => "Profiler",
    'storm_settings_tab_debug' => "Dev & Debug",
    'storm_dev_folder' => "Dev Folder",
    'storm_devfolder_type' => "Type",
    'storm_devfolder_type_desc' => "Select what dev folder type you want to create. (template, javascript)",
    'storm_devfolder_args' => "Arguments",
    'storm_devfolder_args_desc' => "the argumenuts for the file.",
    'storm_devfolder_loc' => "Location",
    'storm_devfolder_loc_desc' => "accessed from (front, admin, global)",
    'storm_devfolder_group' => "Group",
    'storm_devfolder_group_desc' => "containing group for file",
    'storm_devfolder_filename' => "Filename",
    'storm_devfolder_filename_desc' => "name of the file.",
    'storm_devfolder_loc_error' => "You need to select a location",
    'storm_devfolder_group_error' => 'enter a group',
    'storm_devfolder_widgetname_error' => "Widget Name required",
    'storm_devfolder_filename_error' => "enter a filename",
    'storm_devfolder_filename_exist' => "File with this name exists at this location.",
    'storm_devfolder_widgetname' => "Widget Name",
    'storm_devfolder_widgetname_desc' => "Used when loading the widget over the data api",
    'storm_create_class' => "Create Class File",
    'storm_create_class_desc' => "This allows you to create your node/AR/Item/Comment class with your database",
    'storm_classes_no_blank' => "Can't be blank!",
    'storm_class_item_node_class' => "Node/Item Class",
    'storm_class_item_node_class_desc' => "Enter the node/item class for Item/Comment class you are about to create.",
    'storm_class_node_item_missing' => "Node/Item Class doesn't exists.",
    'storm_class_database' => "Database",
    'storm_class_prefix' => "Prefix",
    'storm_profiler_is_fixed' => "Always show Profiler",
    'storm_progress' => "%s out of %s",
    'storm_mc_limit' => "Amount",
    'storm_mc_limit_desc' => "How many dummy records to create",
    'storm_mc_passwords' => "Random Password",
    'storm_mc_avatars' => "Create Avatars",
    'storm_mc_group' => "Group",
    'menu__storm_configuration_generator' => "Dummy Data Generator",
    'storm_gen_type' => "Type",
    'storm_gen_limit' => "Amount",
    'storm_gen_limit_desc' => "How many of the type to create. Forums will create between 1 to 12 topics and each topic will create between 1 to 12 posts, Topics will create 1 to 12 posts.",
    'storm_gen_none' => "Please select a type!",
    'storm_generation_done' => "Generation Done",
    'storm_generation_delete_done' => "Dummy Data Deleted",
    'storm_apps_folder_exist' => "The folder %s already exist. please remove this folder if you want to replace.",
    'storm_apps_please_select' => "Please make a selection",
    'module__storm_bitbucket' => "Bitbucket",
    'module__storm_general' => "General",
    'r__Proxyclass' => "Proxyclass",
    'r__proxyclass_manage' => "can generate proxyclasses",
    'r__apps' => "Apps",
    'r__apps_manage' => "can generate application dev folders",
    'r__members_manage' => "can use generator",
    'r__storm_create_members_loop' => "Generate Members",
    'r__storm_create_generation_loop' => "Generate Forums",
    'r__Geneerators' => "Generators",
    'storm_query_select' => "Action",
    'storm_query_table' => 'Table',
    'storm_query_add_column' => 'Column',
    'storm_query_type' => "Type",
    'storm_query_length' => "Length",
    'storm_query_decimals' => 'Decimals',
    'storm_query_default' => "Default",
    'storm_query_comment' => 'Comment',
    'storm_query_allow_null' => "Allow Null",
    'storm_query_sunsigned' => 'Unsigned',
    'storm_query_zerofill' => "ZeroFill",
    'storm_query_auto_increment' => 'Auto-Increment',
    'storm_query_binary' => 'Binary',
    'storm_query_unsigned' => 'Value',
    'storm_query_values' => 'Values',
    'storm_query_columns' => 'Table Column',
    'storm_query_code' => 'Query Box',
    'storm_member_creation_done' => 'Dummy data creation done',
    'storm_remote_key_use' => "Remote Key",
    'storm_remote_key_use_desc' => "<br>Use this key in another storm instance to sync apps.",
    'storm_remote_url' => "Remote Interface",
    'storm_remote_url_desc' => "<br> Use this for the remote interface in another storm instance to sync an app",
    'storm_ftp_app' => "Remote App",
    'general_tab' => "General",
    'remote_tab' => "Sync",
    'storm_ftp_path' => "FTP Path",
    'storm_ftp_path_desc' => "Full path to where the synced file is located.",
    'storm_ftp_key' => "Remote Key",
    'storm_ftp_interface_host' => "Remote Interface",
    'storm_ftp_host' => "FTP Host",
    'storm_ftp_username' => "FTP Username",
    'storm_ftp_pass' => "FTP Password",
    'storm_ftp_port' => "FTP Port",
    'storm_ftp_timeout' => "FTP Timeout",
    'storm_ftp_ssh' => "Use SSH",
    'storm_cron_task' => "Cron Task",
    'storm_cron_task_desc' => "<br>Add this to your cron, set to however often you want it to run.",
    'menu__storm_configuration_menu' => "Menu",
    'storm_menu_name' => 'Name',
    'storm_menu_parent' => "Parent",
    'storm_menu_type' => 'Type',
    'storm_menu_internal' => 'Url',
    'storm_menu_external' => 'Url',
    'storm_ftp_secure' => "Secure Connection",
    'storm_settings_disable_menu' => "Disable Menu",
    'storm_settings_disable_menu_desc' => "Disables the header menu.",
    'menu__storm_configuration_sync' => "Sync",
    'storm_sources_trait_exists' => "Trait already exists!",
    'storm_sources_interface_exists' => "Interface already exists!",
    'storm_sources_no_trait' => "Trait doesn't exist: %s",
    'storm_class_content_item_class' => "Item Class",
    'storm_class_traits' => 'Traits',
    'storm_class_subnode_class' => 'Subnode Class',
    'storm_class_traitName' => 'Trait Name',
    'storm_class_interfaceName' => "Interface Name"
    //    'storm_apps_select_app' => "Select App"
];

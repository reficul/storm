//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if (!defined('\IPS\SUITE_UNIQUE_KEY')) {
    exit;
}

class storm_hook_adminGlobalThemeHook extends _HOOK_CLASS_
{

    /* !Hook Data - DO NOT REMOVE */
    public static function hookData()
    {
        return parent::hookData();
    }

    /* End Hook Data */
    public function tabs($tabNames, $activeId, $defaultContent, $url, $tabParam = 'tab')
    {
        try
        {

            if (\IPS\Request::i()->app == "core" and \IPS\Request::i()->module == "applications" and \IPS\Request::i()->controller == "developer" and !\IPS\Request::i()->do) {
                $tabNames['class'] = 'dev_class';
                $tabNames['DevFolder'] = 'storm_dev_folder';
            }

            return parent::tabs($tabNames, $activeId, $defaultContent, $url, $tabParam);
        }
        catch ( \RuntimeException $e )
        {
            if ( method_exists( get_parent_class(), __FUNCTION__ ) )
            {
                return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
            }
            else
            {
                throw $e;
            }
        }
    }

    public function globalTemplate($title, $html, $location = array())
    {
        try
        {

            \IPS\Output::i()->cssFiles = \array_merge(
                \IPS\Output::i()->cssFiles,
                \IPS\Theme::i()->css(
                    'devbar/devbar.css',
                    'storm',
                    'admin'
                )
            );

            $parent = parent::globalTemplate($title, $html, $location);
            $applications = false;
            //
            foreach (\IPS\Application::applications() as $apps) {
                $applications[] = [
                    'name' => $apps->directory,
                    'url' => \IPS\Http\Url::internal('app=core&module=applications&controller=developer&appKey=' . $apps->directory)
                ];
            }
            $plugins = false;
            foreach (\IPS\Plugin::plugins() as $plugin) {
                $plugins[] = [
                    'name' => $plugin->name,
                    'url' => \IPS\Http\Url::internal('app=core&module=applications&controller=plugins&do=developer&id=' . $plugin->id)
                ];
            }
            $devBar = \IPS\Theme::i()->getTemplate('dev', 'storm', 'admin')->devBar($applications, $plugins);

            $parent = str_replace('<header>', $devBar, $parent);
            return $parent;

        }
        catch ( \RuntimeException $e )
        {
            if ( method_exists( get_parent_class(), __FUNCTION__ ) )
            {
                return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
            }
            else
            {
                throw $e;
            }
        }
    }
}

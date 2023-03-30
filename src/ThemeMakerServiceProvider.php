<?php
/**
 * PHP Version 8.1.11
 * Laravel Framework 9.34.0
 *
 * @category Service Provider
 *
 * @package Laravel
 *
 * @author CWSPS154 <codewithsps154@gmail.com>
 *
 * @license MIT License https://opensource.org/licenses/MIT
 *
 * @link https://github.com/CWSPS154
 *
 * Date 05/11/22
 * */

namespace CWSPS154\ThemeMaker;

class ThemeMakerServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/theme.php','thememaker');
    }

    public function boot()
    {
        $this->commands([Console\ThemeMakerCommand::class]);
        $this->publishes([__DIR__.'/config/theme.php' => config_path('theme.php')],'config');
    }
}

<?php

namespace CWSPS154\ThemeMaker\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class ThemeMakerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:theme';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create components for theme and build a perfect theme for project';

    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected Filesystem $files;

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $theme = $this->ask('Please enter the name of the theme');
        $options=['Head', 'Header','Logo','Navbar','Sidebar','Account','Search','Notification','Foot','Footer'];
        $components = $this->choice(
            'What are the components you want to build your theme? (Multiple options are separate by comma)',
            array_merge($options,['All']),10,2,true);
        if ($this->confirm('Do you want any additional components', true)) {
            $additional = $this->ask('Please enter the name of the components (Multiple values are separate by comma)');
            if(isset($components[0])=='All')
            {
                $components=array_merge($options,explode(",",$additional));
            }else{
                $components=array_merge($components,explode(",",$additional));
            }
        }
        $this->output->progressStart(count($components));
        for ($i = 0; $i < count($components); $i++) {
            sleep(1);
            try {
                Artisan::call('make:component '.$theme.'/'.$components[$i]);
                $this->output->write(Artisan::output());
            }catch (\Exception $e)
            {
                $this->error($e->getMessage());
            }
            $this->output->progressAdvance();
        }
        $this->output->progressFinish();
        $theme=Str::lower($theme);
        $this->makeLayout($theme,$components);
        $this->info('Theme successfully created');
    }


    /**
     * @param $theme
     * @param $components
     * @return string
     */
    private function createLayout($theme, $components): string
    {
        $layout="<!DOCTYPE html>\n";
        $layout .="<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>\n";
        if(in_array('Head',$components))
        {
            $layout .= "\t".'<x-'.$theme.'.head>'."\n";
            $layout .= "\t\t".'@stack("styles")'."\n";
            $layout .= "\t".'</x-'.$theme.'.head>'."\n";
        }
        $layout .= '<body>'."\n";
        if(in_array('Header',$components))
        {
            $layout.="\t".'<x-'.$theme.'.header/>'."\n";
        }
        if(in_array('Navbar',$components))
        {
            $layout.="\t".'<x-'.$theme.'.navbar/>'."\n";
        }
        if(in_array('Sidebar',$components))
        {
            $layout.="\t".'<x-'.$theme.'.sidebar/>'."\n";
        }
        $layout.="\t".'@yield("content")'."\n";
        if(in_array('Footer',$components))
        {
            $layout.="\t".'<x-'.$theme.'.footer/>'."\n";
        }

        if(in_array('Foot',$components))
        {
            $layout .= "\t".'<x-'.$theme.'.foot>'."\n";
            $layout .= "\t\t".'@stack("scripts")'."\n";
            $layout .= "\t".'</x-'.$theme.'.foot>'."\n";
        }
        $layout .= '</body>'."\n";
        $layout .= '</html>'."\n";
        return $layout;
    }


    /**
     * @param $theme
     * @param $components
     * @return void
     */
    private function makeLayout($theme, $components): void
    {
        $path=resource_path('views/layout/'.$theme.'/'.$theme.'_layout.blade.php');
        $this->makeDirectory(dirname($path));
        $contents=$this->createLayout($theme,$components);
        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param string $path
     * @return string
     */
    protected function makeDirectory(string $path): string
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }
        return $path;
    }

}

# cwsps154/theme-maker
<a href="https://github.com/CWSPS154/ThemeMaker/issues"><img alt="GitHub issues" src="https://img.shields.io/github/issues/CWSPS154/bootstrap-ui-components"></a>
<a href="https://github.com/CWSPS154/ThemeMaker/stargazers"><img alt="GitHub stars" src="https://img.shields.io/github/stars/CWSPS154/bootstrap-ui-components"></a>
<a href="https://github.com/CWSPS154/ThemeMaker"><img alt="GitHub license" src="https://img.shields.io/github/license/CWSPS154/bootstrap-ui-components"></a>

Tool creating components for theme making
# Installation
Using Composer
```bash
composer require cwsps154/theme-maker
```
# Documentation

### Usage
You can create new theme components and layout by using this command
```bash
php artisan make:theme
```
It will ask some queries
```bash
  Please enter the name of the theme: \\Type your theme name
  > MyTheme
```
```bash
  What are the components you want to build your theme? (Multiple options are separate by comma) [All]:
  [0 ] Head
  [1 ] Header
  [2 ] Logo
  [3 ] Navbar
  [4 ] Sidebar
  [5 ] Account
  [6 ] Search
  [7 ] Notification
  [8 ] Foot
  [9 ] Footer
  [10] All
  > 10
```
```bash
  Do you want any additional components (yes/no) [yes]:
  > yes
```
```bash
  Please enter the name of the components (Multiple values are separate by comma):
  > Profile,Test
```
```bash
   0/12 [░░░░░░░░░░░░░░░░░░░░░░░░░░░░]   0%
   INFO  Component [app/View/Components/MyTheme/Head.php] created successfully.  

  1/12 [▓▓░░░░░░░░░░░░░░░░░░░░░░░░░░]   8%
   INFO  Component [app/View/Components/MyTheme/Header.php] created successfully.  

  2/12 [▓▓▓▓░░░░░░░░░░░░░░░░░░░░░░░░]  16%
   INFO  Component [app/View/Components/MyTheme/Logo.php] created successfully.  

  3/12 [▓▓▓▓▓▓▓░░░░░░░░░░░░░░░░░░░░░]  25%
   INFO  Component [app/View/Components/MyTheme/Navbar.php] created successfully.  

  4/12 [▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░░░░░░░]  33%
   INFO  Component [app/View/Components/MyTheme/Sidebar.php] created successfully.  

  5/12 [▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░░░░░]  41%
   INFO  Component [app/View/Components/MyTheme/Account.php] created successfully.  

  6/12 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░░░]  50%
   INFO  Component [app/View/Components/MyTheme/Search.php] created successfully.  

  7/12 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░░░]  58%
   INFO  Component [app/View/Components/MyTheme/Notification.php] created successfully.  

  8/12 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░░░░]  66%
   INFO  Component [app/View/Components/MyTheme/Foot.php] created successfully.  

  9/12 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░░░]  75%
   INFO  Component [app/View/Components/MyTheme/Footer.php] created successfully.  

 10/12 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░░░]  83%
   INFO  Component [app/View/Components/MyTheme/Profile.php] created successfully.  

 11/12 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓░░░]  91%
   INFO  Component [app/View/Components/MyTheme/Test.php] created successfully.  

 12/12 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%

File : /var/www/html/TestApp/resources/views/layout/mytheme/mytheme_layout.blade.php created
Theme successfully created

```
The mytheme_layout.blade.php
```bash
   <!DOCTYPE html>
    <html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>
        <x-mytheme.head>
            @stack("styles")
        </x-mytheme.head>
    <body>
        <x-mytheme.header/>
        <x-mytheme.navbar/>
        <x-mytheme.sidebar/>
        @yield("content")
        <x-mytheme.footer/>
        <x-mytheme.foot>
            @stack("scripts")
        </x-mytheme.foot>
    </body>
    </html>
```

## Author

- Github [@CWSPS154](https://www.github.com/CWSPS154)
- Gmail [@codewithsps154@gmail.com](mailto:codewithsps154@gmail.com)
## License

[MIT](https://github.com/CWSPS154/ThemeMaker/blob/main/LICENSE)

# YiiCalendar extension

This is a Yii 1.x widget, which allows you to put a quite simple, yet very configurable calendar anywhere within your application. Month, week and day views are supported. Most calendar items (including each day in calendar) are rendered as separate subviews, which gives you maximum control power over how this calendar looks and behaves.

Note, that this is pure-presentation, read-only calendar. You can present your data only. If you're looking for rich, user-enabled solution (like Google Calendar), which allows end-user to add, modify and delete events etc., you're most certainly in a wrong place.

This is an enhanced and partially rewritten version of [`ecalendarview` extension](http://www.yiiframework.com/extension/ecalendarview/). Changes includes:

- shorter names for classes (widgets) and extension itself :],
- some basic, default CSS styling (original extension has no default styling),
- an ability to pass additional data to make selected days a links to some URLs,
- a simple fade effect, when updating calendar via AJAX, to notify user, that something is going on,
- fixed path including (no need to add `Yii::setPathOfAlias('ecalendarview', ...)` in config file.

In addition `doc` folder has been removed from original repository, as it contains only files relevant to base `ecalendarview` extension (ancestor), not to this extension.

_Read through [original `ecalendarview` extension's page](http://www.yiiframework.com/extension/ecalendarview/) for all required details. This document only contains changes and differences between `yiicalendar` and `ecalendarview` extensions._

**This project ABANDONED, because I don't code in Yii1 anymore! There is no wiki, issues and no support. There will be no future updates. Unfortunately, you're on your own.**

## Features

As in [original extension](http://www.yiiframework.com/extension/ecalendarview/#hh0) plus mentioned above.

## Requirements

Tested on Yii 1.1.15. _Should_ work on any earlier, down to 1.1.10.

## Installation

Download newest version and extract it into `extensions` folder of your Yii 1.x application.

## Usage

To add YiiCalendar in very basic, default look, put this to any of your views or layouts:

    <?php $this->widget('ext.yiicalendar.YiiCalendar'); ?>
    
If, for example, you'd like to have week-only calendar (showing only current week, not entire month) with Monday as first day of each week (Sunday is default), then you should pass some additional parameters:

```php
<?php $this->widget('ext.yiicalendar.YiiCalendar', array
(
    'dataProvider'=>array
    (
        'pagination'=>array
        (
            'pageSize'=>'week',
            'isMondayFirst'=>TRUE
        )
      )
)); ?>
```
    
The `itemView` property has been enhanced. As in `ecalendarview` extension, it specifies view to be used to render each day. If this is not defined, a default view is used. Inside that view following data can be accessed (new property in bold):

- [CBaseController](http://www.yiiframework.com/doc/api/1.1/CBaseController/) `$this` - the controller,
- [DateTime](http://php.net/manual/en/class.datetime.php) `$data->date` - the date object of particular day,
- boolean `$data->isCurrent` - whether particular day is selected (`TRUE`),
- **array `$data->link` - the link data for particular day (see last section of this document)**,
- boolean `$data->isRelevant` - whether particular day is part of current month (`TRUE`) or only a padding in the beginning and end of the month page (`FALSE`).

All other properties are the same as in case of [original extension](http://www.yiiframework.com/extension/ecalendarview/#hh3).

## i18n

Same rules apply as in case of [`ecalendarview` extension](http://www.yiiframework.com/extension/ecalendarview/#hh4), with only small change, that you should put your translated strings into `[LANGUAGEID]/yiicalendar.php` file, in your application's messages folder (so, for Polish full path would be `/protected/messages/pl/yiicalendar.php`).

## Changelog

Version 1.1:

- some very minor changes to CSS styles,
- added fade / dim / opacity effect, when updating calendar via AJAX,
- made `isMondayFirst` default to `TRUE` (as in most modern calendars).

Version 1.0:

- initial version with changes (toward original extension) mentioned above and below.

If you'd like to see changelog for the original extension, follow [this link](http://www.yiiframework.com/extension/ecalendarview/#hh5).

## Changes to CSS (default styling)

Original [`ecalendarview` extension](http://www.yiiframework.com/extension/ecalendarview/) has nearly no default CSS styling, leaving everything to end user / developer. This extension (`yiicalendar`) introduces some basic styling. Remove or comment line with style given in brackets on the following list, to get rid of particular change).

These changes includes:

- current day is marked with coloured background (`background-color: #C3D6E4;`),
- calendar days are squares and have bigger font size (`table.yiicalendar tbody td`),
- arrows (navigation links) have different style (`table.yiicalendar a.navigation-link`),
- calendar headers have background and border styled in greys (`table.yiicalendar thead th`).

You can override these styles per application by adding `/css/calendar.css` (path is relative to app's root) file and running widget with `'cssFile'=>'css/calendar.css'` property set (you can, of course, change or adapt paths as much as you want). You can also change these styles permanently (edit `extensions/yiicalendar/assets/styles.css` file). But this is **highly not recommended way**.

## Changes to calendar

In addition to CSS changes, I have also changed:

- added fade / dim / opacity effect, when updating calendar via AJAX,
- made `isMondayFirst` default to `TRUE` (as in most modern calendars),
- line arrows (`&larr;` and `&rarr;`) are changes to double arrows (`&laquo;` and `&raquo;`) in navigation links pane.

## Assets registering issue

Note, that due to a strange nature of how original extension register assets, you can have only one style per once -- either built-in one (`extensions/yiicalendar/assets/styles.css`) or custom one (`'cssFile'=>'css/calendar.css'`), not both at the same time (as in most extensions, where custom styles overrides built-in styles). Because only one of these files is registered by extension (basing on whether `cssFile` property is set or not).

And, both assets (`styles.css` and `yiicalendar.js`) are published to separate folders in your app's assets directory, because they're registered in two separate condition checkings (styles are published and registered only, if user is not using custom styles and Javascript code is published and registered only, if `ajaxUpdate` property is set to `TRUE` (by default, it is), that is -- calendar is updated via AJAX.

I didn't change this, because I didn't have enough time. Refer to `YiiCalendar::init()` method, if you don't like this and would like to change this behavior.

## Days links

This extension introduces new property called `linksArray`, which is an array of `'date'=>'data'` sets, used to add links to certain dates in the calendar.

The `date` part (array's key) can be in any date or time format, that is accepted by PHP's [`DateTime` class constructor](http://php.net/manual/en/datetime.construct.php). For example, if using timestamps, you must begin each with `@`. See "[Supported Date and Time Formats](http://php.net/manual/en/datetime.formats.php)" chapter in PHP documentation for details.

If you're using default view (see information about `itemView` property above or in [original extension documentation](http://www.yiiframework.com/extension/ecalendarview/#hh3)), the `data` part (array's value) can be:

- a string -- it will be used as URL under particular day's number,
- an array -- use it like `htmlOptions` (for example in [`CHtml::link()` method](http://www.yiiframework.com/doc/api/1.1/CHtml/#link-detail)).

If you're using your own view to render calendar cells, the `data` part can be of any type, but you have to process it yourself in your view.

First approach (using data as string) let's you add a quick links to selected dates in calendar:

```php
<?php $this->widget('ext.yiicalendar.YiiCalendar', array
(
    'linksArray'=>array
    (
        '@1418123575'=>'http://www.example.com',
        '2014-12-13'=>'http://www.exampleblog.com/date/2014/12/13'
    )
)); ?>
```

Second approach is a bit more complex (but gives you much more power in defining links in calendar):

```php
<?php $this->widget('ext.yiicalendar.YiiCalendar', array
(
    'linksArray'=>array
    (
        '2014-12-13'=>array
        (
            'title'=>'Hoop and goo! :]',
            'style'=>'font-weight: bold; color: red;',
            'href'=>'http://www.exampleblog.com/date/2014/12/13'
        )
    )
)); ?>
```

You can set title, special styling, class or anything, what is supported by standard, Yii 1.x `htmlOptions` array. Yes, you can even attach Javascript events through [`clientChange`](http://www.yiiframework.com/doc/api/1.1/CHtml#clientChange-detail) and use non-standard attributes (like `data-`), for example to use Twitter Bootstrap's [tooltips](http://getbootstrap.com/javascript/#tooltips-usage), [popovers](http://getbootstrap.com/javascript/#popovers-usage) or [modals](http://getbootstrap.com/javascript/#modals-usage). Or anything else from any other library. Sky and your imagination are the only limits.

Of course, with any of above methods you can set link for _any_ date, not just those in current month.

**This project ABANDONED, because I don't code in Yii1 anymore! There is no wiki, issues and no support. There will be no future updates. Unfortunately, you're on your own.**

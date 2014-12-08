# YiiCalendar Extension

This is an enhanced and partially rewritten version of [`ecalendarview` extension](http://www.yiiframework.com/extension/ecalendarview/) for Yii 1.x.

Changes includes:

- some basic, default CSS styling,
- an ability to pass additional data to make selected days a links to some URLs,
- support for locales (non-English calendars) through PHP's locale system (it is not using `Yii:t`!).
- fixed path including (you no longer need to call `Yii::setPathOfAlias('ecalendarview', ...);` in your configuration file.

In addition `doc` folder has been removed from original repository, as it contains only files relevant to base `ecalendarview` extension (ancestor), not to this extension.
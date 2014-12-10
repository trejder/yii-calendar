<?php
/**
 * _view.php
 *
 * Part of YiiCalendar extension for Yii 1.x (based on ecalendarview extension).
 *
 * @website   http://www.yiiframework.com/extension/yii-calendar/
 * @website   https://github.com/trejder/yii-calendar
 * @author    Tomasz Trejderowski <tomasz@trejderowski.pl>
 * @author    Martin Ludvik <matolud@gmail.com>
 * @copyright Copyright (c) 2014 by Tomasz Trejderowski & Martin Ludvik
 * @license   http://opensource.org/licenses/MIT (MIT license)
 */
?>

<?php
    $text = CHtml::encode($data->date->format('j'));

    if(!is_null($data->link))
    {
        if(is_array($data->link))
        {
            $htmlOptions = $data->link;
            $htmlOptions['href'] = CHtml::normalizeUrl($htmlOptions['href']);

            $link = CHtml::link($text, '', $htmlOptions);
        }
        else $link = CHtml::link($text, $data->link);
    }
    else $link = $text;
?>

<?php echo $link; ?>

<?php
/**
 * main.php
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

<?php $view = $pagination->getPageSize(); ?>

<table id="<?php echo $id; ?>" class="e-calendar-view <?php echo $view; ?>">
  <?php $this->render($view, array(
    'id' => $id,
    'data' => $data,
    'pagination' => $pagination,
    'daysInRow' => $daysInRow,
    'itemViewFile' => $itemViewFile,
    'titleViewFile' => $titleViewFile,
    'previousUrl' => $previousUrl,
    'nextUrl' => $nextUrl,
  )); ?>
</table>

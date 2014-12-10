<?php
/**
 * day.php
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

<thead>
  <tr class="month-year-row">
    <th class="previous">
      <?php echo CHtml::link('&laquo;', $previousUrl, array('class' => 'navigation-link')); ?>
    </th>
    <th class="month-year">
      <?php $this->getOwner()->renderFile($titleViewFile, array(
        'pagination' => $pagination,
      )); ?>
    </th>
    <th class="next">
      <?php echo CHtml::link('&raquo;', $nextUrl, array('class' => 'navigation-link')); ?>
    </th>
  </tr>
  <tr class="weekdays-row">
    <th class="<?php echo strtolower($data[0]->getDate()->format('F')); ?>" colspan="3">
      <?php echo Yii::t('yiicalendar', $data[0]->getDate()->format('D')); ?>
    </th>
  </tr>
</thead>

<tbody>
  <tr>
    <?php
      $classes = array();

      if($data[0]->isCurrentDate) {
        $classes[] = 'current';
      } else {
        $classes[] = 'not-current';
      }

      if($data[0]->isRelevantDate) {
        $classes[] = 'relevant';
      } else {
        $classes[] = 'not-relevant';
      }

      $classes[] = strtolower($data[0]->getDate()->format('D'));

      $classesStr = implode(' ', $classes);
    ?>
    <td class="<?php echo $classesStr; ?>" colspan="3">
      <?php $this->getOwner()->renderFile($itemViewFile, array(
        'data' => $data[0]
      )); ?>
    </td>
  </tr>
</tbody>

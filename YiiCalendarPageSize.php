<?php
/**
 * YiiCalendarPageSize.php
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

/**
 * The page size is enumeration of possible pagination types for {@link YiiCalendarPagination}.
 */
class YiiCalendarPageSize extends CEnumerable {

  /**
   * The month pagination.
   */
  const MONTH = 'month';

  /**
   * The week pagination.
   */
  const WEEK = 'week';

  /**
   * The day pagination.
   */
  const DAY = 'day';

  /**
   * Constructs the page size.
   */
  private function __construct() {
  }

  /**
   * Retrieves all possible values.
   * @return array The values.
   */
  public static function getValues() {
    return array(
      self::MONTH,
      self::WEEK,
      self::DAY,
    );
  }

  /**
   * Checks if the value is valid.
   * @param string $value The value.
   * @return boolean True if value belongs to enumeration, otherwise false.
   */
  public static function isValidValue($value) {
    return (boolean) in_array($value, self::getValues());
  }

}
<?php
/**
 * YiiCalendarDataProvider.php
 *
 * @author (yiicalendar extension) Tomasz Trejderowski <tomasz@trejderowski.pl>
 * @author (ecalendarview extension) Martin Ludvik <matolud@gmail.com>
 * @copyright Copyright &copy; 2014 by Tomasz Trejderowski & Martin Ludvik
 * @license http://opensource.org/licenses/MIT MIT licensee
 */

Yii::import('yiicalendar.YiiCalendarItem');
Yii::import('yiicalendar.YiiCalendarPagination');

/**
 * The data provider prepares data to be shown by {@link YiiCalendar}.
 */
class YiiCalendarDataProvider extends CComponent {

  /**
   * @var YiiCalendarPagination The pagination.
   */
  private $_pagination;

  /**
   * @var array Array of 'timestamp'=>'url' or 'timestamp'=>'htmlOptions' sets to add links to certain dates.
   */
  private $_linksArray;

  /**
   * Constructs the data provider and sets it's attributes to default values.
   * @param array $config The attributes as key=>value map.
   */
  public function __construct(array $config = array()) {
    $this->_pagination = new YiiCalendarPagination();

    foreach($config as $key => $value) {
      $this->$key = $value;
    }
  }

  /**
   * Sets the pagination's attributes.
   * @param array $config The attributes as key=>value map.
   */
  public function setPagination(array $config) {
    foreach($config as $key => $value) {
      $this->getPagination()->$key = $value;
    }
  }

  /**
   * @see YiiCalendarDataProvider::$_linksArray
   */
  public function setLinksArray($linksArray)
  {
      $this->_linksArray = $linksArray;
  }

  /**
   * @see YiiCalendarDataProvider::$_pagination
   */
  public function getPagination() {
    return $this->_pagination;
  }

  /**
   * @see YiiCalendar::$_linksArray
   */
  public function getLinksArray()
  {
    return $this->_linksArray;
  }

  /**
   * Retrieves the data.
   * @return array The array of {@link YiiCalendarItem}s.
   */
  public function getData()
  {
    $data = array();
    $dateFormat = 'Ymd';

    /**
     * Purge dates used as keys in @link $this->_linksArray to an acceptable format.
     */
    $newLinks = array();

    foreach($this->getLinksArray() as $linkDate=>$linkData)
    {
      $theDate = date_create($linkDate);

      if($theDate) $newLinks[$theDate->format($dateFormat)] = $linkData;
    }

    $this->setLinksArray($newLinks);
    $links = $this->getLinksArray();

    $endDate = $this->getPagination()->getLastPageDate();
    $startDate = $this->getPagination()->getFirstPageDate();

    $dateIterator = clone($startDate);

    while($dateIterator <= $endDate)
    {
      $data[] = new YiiCalendarItem(array
      (
        'date'=>clone($dateIterator),
        'isCurrentDate'=>$this->getPagination()->isCurrentDate($dateIterator),
        'isRelevantDate'=>$this->getPagination()->isRelevantDate($dateIterator),
        'link'=>isset($links[$dateIterator->format($dateFormat)]) ? $links[$dateIterator->format($dateFormat)] : NULL
      ));

      $dateIterator->add(new DateInterval('P1D'));
    }

    return $data;
  }

}

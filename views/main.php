<?php
/**
 * main.php
 *
 * @author (yiicalendar extension) Tomasz Trejderowski <tomasz@trejderowski.pl>
 * @author (ecalendarview extension) Martin Ludvik <matolud@gmail.com>
 * @copyright Copyright &copy; 2014 by Tomasz Trejderowski & Martin Ludvik
 * @license http://opensource.org/licenses/MIT MIT license
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

<?php
/**
 * _view.php
 *
 * @author (yiicalendar extension) Tomasz Trejderowski <tomasz@trejderowski.pl>
 * @author (ecalendarview extension) Martin Ludvik <matolud@gmail.com>
 * @copyright Copyright &copy; 2014 by Tomasz Trejderowski & Martin Ludvik
 * @license http://opensource.org/licenses/MIT MIT license
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

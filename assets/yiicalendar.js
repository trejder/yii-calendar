/**
 * yiicalendar.js
 *
 * @author (yiicalendar extension) Tomasz Trejderowski <tomasz@trejderowski.pl>
 * @author (ecalendarview extension) Martin Ludvik <matolud@gmail.com>
 * @copyright Copyright &copy; 2014 by Tomasz Trejderowski & Martin Ludvik
 * @license http://opensource.org/licenses/MIT MIT license
 */

!function($) {
  $.fn.yiicalendar = function() {
    this.on('click', '.navigation-link', function() {
      $.ajax({
        'url': $(this).attr('href'),
        'context': $(this).parents('.e-calendar-view'),
        'cache': false,
        'success': function(data) {
          var calendarId = '#' + this.attr('id');
          var calendarData = $(calendarId, data);
          this.html(calendarData.html());
        }
      });
      return false;
    });
  }
}(window.jQuery);
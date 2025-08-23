<?php

function generate_calendar($year, $month)
{
    $firstDay    = mktime(0, 0, 0, $month, 1, $year);
    $daysInMonth = (int) date("t", $firstDay);
    $dayOfWeek   = (int) date("N", $firstDay); // 1=Mon ... 7=Sun

    // Hitung prev & next
    $prevMonth = $month - 1;
    $prevYear  = $year;
    if ($prevMonth < 1) {
        $prevMonth = 12;
        $prevYear--;
    }

    $nextMonth = $month + 1;
    $nextYear  = $year;
    if ($nextMonth > 12) {
        $nextMonth = 1;
        $nextYear++;
    }

    // Mulai wrapper kalender
    $html  = "<div class='calendar'>";

    // Header navigasi kalender
    $html .= "<div class='calendar-nav d-flex justify-content-between align-items-center mb-3'>";
    $html .= "<a href='/admin/dashboard/{$prevYear}/{$prevMonth}' class='btn btn-sm btn-secondary'>&laquo;</a>";
    $html .= "<span class='calendar-title fw-bold fs-5'>" . date("F Y", $firstDay) . "</span>";
    $html .= "<a href='/admin/dashboard/{$nextYear}/{$nextMonth}' class='btn btn-sm btn-secondary'>&raquo;</a>";
    $html .= "</div>";

    // Tabel kalender
    $html .= "<table class='table table-bordered text-center'>";
    $html .= "<thead class='table-light'><tr>
                <th>Sen</th><th>Sel</th><th>Rab</th>
                <th>Kam</th><th>Jum</th><th>Sab</th><th>Min</th>
              </tr></thead><tbody><tr>";

    if ($dayOfWeek > 1) {
        for ($i = 1; $i < $dayOfWeek; $i++) {
            $html .= "<td></td>";
        }
    }

    $currentDay = 1;
    while ($currentDay <= $daysInMonth) {
        if ($dayOfWeek > 7) {
            $dayOfWeek = 1;
            $html .= "</tr><tr>";
        }

        // Highlight hari ini
        $isToday = (date('Y') == $year && date('n') == (int)$month && date('j') == $currentDay);
        $class = $isToday ? 'table-primary fw-bold' : '';
        $html .= "<td class='$class'>{$currentDay}</td>";

        $currentDay++;
        $dayOfWeek++;
    }

    if ($dayOfWeek != 1) {
        for ($i = $dayOfWeek; $i <= 7; $i++) {
            $html .= "<td></td>";
        }
    }

    $html .= "</tr></tbody></table>";
    $html .= "</div>"; // end calendar wrapper
    return $html;
}
import flatpickr from "flatpickr";
import { Japanese } from "flatpickr/dist/l10n/ja.js" //日本語対応

flatpickr("#event_date",{
    "locale": Japanese,
    minDate: "today", //今日以降の日にちを選択できる
    maxDate: new Date().fp_incr(30) //30日先まで選択できる
});

const setting = {
    "locale": Japanese,
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
    minTime: "10:00",
    maxTime: "19:00",
    minuteIncrement: 30
}

flatpickr("#start_time", setting);
flatpickr("#end_time", setting);

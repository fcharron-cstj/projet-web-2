import "./bootstrap";
import "../css/app.css";
import DateRangePicker from "/node_modules/vanillajs-datepicker/js/DateRangePicker.js";
const elem = document.querySelector("#calendar");
const rangepicker = new DateRangePicker(elem, {
    minDate: new Date(2025, 3, 4),
    maxDate: new Date(2025, 3, 6),
    format: "yyyy-mm-dd",
    defaultViewDate: "",
});

import DateRangePicker from "vanillajs-datepicker/DateRangePicker";

const elem = document.querySelector("#calendar");
const rangepicker = new DateRangePicker(elem, {
    minDate: new Date(2025, 3, 4),
    maxDate: new Date(2025, 3, 6),
    format: "yyyy-mm-dd",
    defaultViewDate: "",
});

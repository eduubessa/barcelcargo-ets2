<?php

namespace App\Utils\Constants;

interface StatusInterface {

    const Status_Cargo_Excellent = "cargo_excellent";
    const Status_Cargo_Satisfactory = "cargo_satisfactory";
    const Status_Cargo_Late = "cargo_late";
    const Status_Cargo_VeryLate = "cargo_very_late";
    const Status_Cargo_Damaged = "cargo_damaged";
    const Status_Cargo_Cancelled = "cargo_cancelled";

    const Status_Event_Pending = "event_pending";
    const Status_Event_Approved = "event_approved";
    const Status_Event_Cancelled = "event_cancelled";


}

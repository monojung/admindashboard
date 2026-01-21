<?php


function updateDateRange(year) {
    const buddhistYear = parseInt(year);
    const christianYear = buddhistYear - 543;
    
    // ปีงบประมาณไทย เริ่ม 1 ต.ค. ปีก่อนหน้า ถึง 30 ก.ย. ปีนั้น
    document.getElementsByName('start_date')[0].value = (christianYear - 1) + "-10-01";
    document.getElementsByName('end_date')[0].value = christianYear + "-09-30";
}


?>
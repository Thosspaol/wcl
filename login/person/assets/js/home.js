// แสดงผลรายการ "อนุมัติ" เมื่อกดปุ่ม "อนุมัติ"
$("#approveBtn").click(function(event) {
    event.preventDefault();
    $('#Table').DataTable().search( '' ).columns().search( '' ).draw();
    $('#Table').DataTable().column(6).search('อนุมัติ').draw();
});

// แสดงผลรายการ "รอดำเนินการ" เมื่อกดปุ่ม "รอดำเนินการ"
$("#pendingBtn").click(function(pending) {
    pending.preventDefault();
    $('#Table').DataTable().search( '' ).columns().search( '' ).draw();

    $('#Table').DataTable().column(6).search('รอดำเนินการ').draw();
});

// แสดงผลรายการ "รอรับบัตร" เมื่อกดปุ่ม "รอรับบัตร"
$("#breakwaterBtn").click(function(breakwater) {
    breakwater.preventDefault();
    $('#Table').DataTable().search( '' ).columns().search( '' ).draw();
    
    $('#Table').DataTable().column(9).search('รอรับบัตร').draw(); // เปลี่ยนจาก column(6) เป็น column(9)
});

// แสดงผลรายการ "รับบัตรเสร็จสิ้น" เมื่อกดปุ่ม "รับบัตรเสร็จสิ้น"
$("#finishBtn").click(function(finish) {
    finish.preventDefault();
    $('#Table').DataTable().search( '' ).columns().search( '' ).draw();

    $('#Table').DataTable().column(9).search('รับบัตรเสร็จสิ้น').draw(); // เปลี่ยนจาก column(6) เป็น column(10)
});

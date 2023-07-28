@extends('layouts.app')

{{-- Thêm css vào trong layout cha --}}
@push('css')
<style>
    #calendar a {
        color: #000000;
        text-decoration: none;
    }

    .mr-auto {
        margin-right: auto;
    }

    .ml-atuo {
        margin-left: auto;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="googleCalendarModal" tabindex="-1" aria-labelledby="googleCalendarModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="googleCalendarModalLabel">Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-2">
                    <input type="hidden" name="event_id" id="eventId" />
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Please Enter Title: "
                        required>
                </div>
                <div class="mb-2">
                    <label for="isAllDay" class="form-label">All Day</label>
                    <input type="checkbox" name="is_all_day" id="isAllDay" required>
                </div>
                <div class="mb-2">
                    <label for="startDateTime" class="form-label">Start Date/Time</label>
                    <input type="text" class="form-control" name="start_datetime" id="startDateTime"
                        placeholder="Select Start Date: " required readonly>
                </div>
                <div class="mb-2">
                    <label for="endDateTime" class="form-label">Start Date/Time</label>
                    <input type="text" class="form-control" name="end_datetime" id="endDateTime"
                        placeholder="Select End Date: " required readonly>
                </div>
                <div class="mb-2">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description"
                        placeholder="Enter Description: "></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        console.log(123);
        let options = {
            // Hiển thị Calendar tại 1 thời điểm nhất định
            // now: '2000-11-08',

            // Sẽ ẩn đi ngày thứ bẩy và chủ nhật
            // weekends: false,

            // Xác định xem các sự kiện trên lịch có thể được sửa đổi hay không.
            // editable: true,

            // Đặt tỷ lệ khung hình giữa chiều rộng và chiều cao của lịch.
            // aspectRatio: 1.8,

            // Xác định khoảng cách mà ngăn cuộn ban đầu được cuộn về phía trước. Người dùng sẽ có thể cuộn lại để xem các sự kiện trước thời điểm này
            // scrollTime: "00:00",

            // views: {
            //     timelineThreeDays: {
            //         type: 'timeline',
            //         duration: { days: 3 }
            //     }
            // },

            // Chế độ xem (dayGrid là đang xem chế độ lưới): Xem theo ngày (dayGridDay), tuần (dayGridWeek), tháng (dayGridMonth), năm (dayGridYear)
            initialView: 'dayGridMonth',
            initialDate: new Date(),

            // Hiển thị title và button trên header:
            // Trong đó:
            // - Bên trái sẽ hiển thị các button today, prev, next với chức năng tương ứng.
            // - Ở giữa hiển thị tiêu đề của calendar.
            // - Bên phải hiển thị button chọn chế độ xem  (Thay vì xem theo ngày thì sẽ xem theo giờ).
            // Có thể thay bằng timeGridDay,timeGridWeek (Lưu ý với time chỉ áp dụng cho day với week không áp dụng cho month với year)
            headerToolbar: {
                left: "today,prev,next",
                center: "title",
                right: "dayGridDay,dayGridWeek,dayGridMonth,dayGridYear"
            },
            dateClick: function(info) {
                initializeStartDateEndDateFormat('Y-m-d', false);
                $('#googleCalendarModal').modal('show');
            }
        };
        let calendarEle = document.querySelector('#calendar');
        let calendar = new FullCalendar.Calendar(calendarEle, options);
        calendar.render();
    })

    function initializeStartDateEndDateFormat(format, withTime) {
        let timePicker = withTime;
        $('#startDateTime').datetimepicker({
            format: format,
            timepicker: withTime,
        });
        $('#endDateTime').datetimepicker({
            format: format,
            timepicker: withTime,
        });
    }
</script>
@endpush
@endsection

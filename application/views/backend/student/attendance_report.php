<hr />
<div class="row">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <!-- CALENDAR-->
                <div class="col-md-12 col-xs-12 col-md-offset-1">    
                    <div class="panel panel-primary " data-collapsed="0">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <i class="fa fa-calendar"></i>
                                <span>Asistencia Diaria</span>
                            </div>
                        </div>
                        <div class="panel-body" style="padding:0px;">
                            <div class="calendar-env">
                                <div class="calendar-body">
                                    <div id="notice_calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-md-offset-1">
            <div class="row">
                <div class="col-md-12">

                    <div class="tile-stats tile-red">
                        <div class="icon"><i class="fa fa-crosshairs"></i></div>
                        <div class="num" data-start="0" data-end="<?php echo $this->db->get_where('attendance', array('status' => 2, 'student_id' => $this->session->userdata('login_user_id'), 'year' => $running_year))->num_rows(); ?>" 
                             data-postfix="" data-duration="1500" data-delay="0">0</div>

                        <h3>Faltas</h3>

                    </div>

                </div>
                <div class="col-md-12">

                    <div class="tile-stats tile-green">
                        <div class="icon"><i class="fa fa-check-square-o"></i></div>
                        <div class="num" data-start="0" data-end="<?php echo $this->db->get_where('attendance', array('status' => 1, 'student_id' => $this->session->userdata('login_user_id'), 'year' => $running_year))->num_rows(); ?>" 
                             data-postfix="" data-duration="800" data-delay="0">0</div>

                        <h3>Asistencias</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

    var calendar = $('#notice_calendar');
    calendar.fullCalendar({
    header: {
            left: 'title',
            right: 'today prev,next'
    },
            //defaultView: 'basicWeek',

            editable: false,
            firstDay: 1,
            height: 530,
            droppable: false,
            events: [
<?php
$attendance_student = $this->db->where(array('student_id' => $this->session->userdata('login_user_id'), 'year' => $running_year))->get('attendance')->result_array();

foreach ($attendance_student as $row):
    
    if ($row['status'] == 1) {
        ?>      {
                    title: "Asistio",
                    color: "green",
    <?php } elseif ($row['status'] == 2) { ?>
                {
                    title: "Falto",
                    color: "red",
    <?php } ?>
                    start: new Date(<?php echo date('Y', $row['timestamp']); ?>, <?php echo date('m', $row['timestamp']) - 1; ?>, <?php echo date('d', $row['timestamp']); ?>),
                    end: new Date(<?php echo date('Y', $row['timestamp']); ?>, <?php echo date('m', $row['timestamp']) - 1; ?>, <?php echo date('d', $row['timestamp']); ?>)

                },
    <?php
endforeach
?>

            ]

    });
    });
</script>

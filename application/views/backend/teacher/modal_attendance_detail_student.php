<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-plus-circled"></i>
                    Record de Registro de Asistencia
                </div>
            </div>

            <div class="panel-body">

                <div class="tile-stats tile-red">
                    <div class="icon"><i class="fa fa-asterisk"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->get_where('attendance', array('status' => 2, 'student_id' => $param2))->num_rows(); ?>" 
                         data-postfix="" data-duration="1500" data-delay="0">0</div>

                    <h3>Faltas</h3>

                </div>

                <div class="tile-stats tile-green">
                    <div class="icon"><i class="fa fa-check"></i></div>
                    <div class="num" data-start="0" data-end="<?php echo $this->db->get_where('attendance', array('status' => 1, 'student_id' => $param2))->num_rows(); ?>" 
                         data-postfix="" data-duration="800" data-delay="0">0</div>

                    <h3>Asistencias</h3>

                </div>

            </div>
        </div>
    </div>
</div>
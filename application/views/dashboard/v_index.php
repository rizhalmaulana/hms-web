<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $jumlah_henkaten ?></h3>

                        <p>Jumlah Total Henkaten</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-list"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $jumlah_total_absen ?></h3>

                        <p>Jumlah Total Absen</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $jumlah_pos ?></h3>

                        <p>Jumlah Pos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-document"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= $jumlah_jalur ?></h3>

                        <p>Jumlah Jalur</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard  kehadiran-->
        <div class="row">
            <div class="col-lg-6">
                <!-- DONUT CHART -->
                <div class="box box-danger col-md-12">
                    <div class="box-header with-border">
                        <h3 class="box-title">Total Member Shift A dan B</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="total-member" style="height: 300px; position: relative;"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-lg-6">
                <!-- /.box -->
                <div class="box box-danger col-md-12">
                    <div class="box-header with-border">
                        <h3 class="box-title">Total Absen Shift A dan B</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="total-absen" style="height: 300px; position: relative;"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-lg-12">
                <div class="box box-danger col-md-12">
                    <div class="box-header with-border">
                        <h3 class="box-title">Total Pengganti Shift A dan B</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="total-henkaten" style="height: 300px; position: relative;"></div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <?php $this->load->view('base/navbar') ?>
        <?php $this->load->view('base/modalLogout') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">User Dashboard</h1>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUser" onclick="View_modal('1', 'Add')">Add Data</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="userTable" class="table table-bordered nowrap" width="100%" style="overflow-x: auto;">
                                    <thead>
                                        <th>Id User</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>User Created</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php $this->load->view('base/footerContent'); ?>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

<script type="text/javascript">
    var mainTable = null;
    $(document).ready(function() {
        mainTable = $('#userTable').DataTable({
            "processing": true,
            "serverSide": true,
            "autoWidth": true,
            "pageLength": 5,
            "scrollX" : true,
            "ajax": {
                "url": "<?= site_url('User/get_userData'); ?>",
                "type": "GET"
            },
            "columns": [
                {"data": "IdUser"},
                {"data": "Username"},
                {"data": "Role"},
                {"data": "UserCreated"},
                {"data": "CreatedAt"},
                {"data": "IdUser",
                    "sortable": false,
                    render: function(data, type, meta, row) {
                        mnu = '';
                        mnu = mnu + '<div class="btn btn-success btn-sm ViewModal" data-id="' + data + '" data-toggle="modal" data-target="#modalUser"> <i class="fa fa-eye"></i></div>'
                        return mnu;
                    }
                },
            ]
        });
    });
</script>